<?php


/**
 * Helper Class for the Store Locator
 */
class AgileStoreLocator_Helper {


	/**
	 * [slugify Create Slug]
	 * @param  [type] $string [description]
	 * @return [type]         [description]
	 */
	public static function slugify($store) {

		$string = $store['title'].'-'.$store['city'];

    $string = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));

    return preg_replace('/-+/', '-', $string);
	}



	/**
	 * [validate_coordinate Check if the Coordinates are correct]
	 * @return [type] [description]
	 */
	public static function validate_coordinate($lat, $lng) {

			if($lat && $lng && is_numeric($lat) && is_numeric($lng)) {

					if ($lat < -90 || $lat > 90) {
						return false;
					}


					if ($lng < -180 || $lng > 180) {
						return false;
					}

					return true;
			}

			return false;
	}



	/**
	 * [openHours Provide string of Opening Hours]
	 * @param  [type] $store [description]
	 * @return [type]        [description]
	 */
	public static function openHours($store) {

		$timings  	= '';

		$days_str   = array('sun'=>__( 'Sun','asl_locator'), 'mon'=>__('Mon','asl_locator'), 'tue'=>__( 'Tues','asl_locator'), 'wed'=>__( 'Wed','asl_locator' ), 'thu'=> __( 'Thur','asl_locator'), 'fri'=>__( 'Fri','asl_locator' ), 'sat'=> __( 'Sat','asl_locator'));

		if($store->open_hours) {

        $open_hours = json_decode($store->open_hours);

        $timings  	= '';

        if(is_object($open_hours)) {

          $open_details = array();

          foreach($open_hours as $key => $_day) {

            $key_value = '';

            if($_day && is_array($_day)) {

              $key_value = implode(',', $_day);

              $timings  .= '<div class="sl-day">';
              $timings  .= '<div class="sl-day-lbl">'.$days_str[$key].'</div><div class="sl-timings">';


              //	Loop Over the Timing
              foreach ($_day as $time) {
              	
              	$timings .= '<span class="sl-time">'.$time.'</span>';
              }

              $timings  .= '</div></div>';

            }
            else if($_day == '1') {

              $key_value = $_day;
            }
            else  {

              $key_value = '0';
            }

            $open_details[] = $key.'='.$key_value;
          }

          $open_hours_value = implode('|', $open_details);
        }

    }


    return $timings;
	}


	/**
	 * [dayFullName Convert the symbol to full name]
	 * @param  [type] $day [description]
	 * @return [type]      [description]
	 */
	public static function dayFullName($day) {

		$days_full = [
			'mon' => 'Monday',
			'tue' => 'Tuesday',
			'wed' => 'Wednesday',
			'thu' => 'Thursday',
			'fri' => 'Friday',
			'sat' => 'Saturday',
			'sun' => 'Sunday'
		];

		return $days_full[$day];
	}

	/**
	 * [googleSchema description]
	 * @param  [type] $store_data [description]
	 * @return [type]             [description]
	 */
	public static function googleSchema($store_data) {

		
		require_once 'Schema/SLSchemaGenerator.php';

		//	Main instance
		$store = new SLSchemaGenerator('Store');

    $store->name($store_data->title);

    if($store_data->email)
    	$store->email($store_data->email);

    if(isset($store_data->path) && $store_data->path)
    	$store->setProperty('images', [ASL_UPLOAD_URL.'Logo/'.$store_data->path]);

    //	Address
    $address = new SLSchemaGenerator('PostalAddress', false);

    if($store_data->street)
    	$address->setProperty('streetAddress', $store_data->street);

    if($store_data->city)
    	$address->setProperty('addressLocality', $store_data->city);

    if($store_data->state)
    	$address->setProperty('addressRegion', $store_data->state);

    if($store_data->postal_code)
    	$address->setProperty('postalCode', $store_data->postal_code);

    if($store_data->country)
    	$address->setProperty('addressCountry', $store_data->country);


    //	Geo
    $geo = new SLSchemaGenerator('GeoCoordinates', false);
    $geo->setProperty('latitude', $store_data->lat);
    $geo->setProperty('longitude', $store_data->lng);



    $store->setProperty('address', $address);
    $store->setProperty('geo', $geo);

    //	URL
    if(isset($store_data->website) && $store_data->website)
    	$store->setProperty('url', $store_data->website);

    //	Phone
		if($store_data->phone)
    	$store->setProperty('telephone', $store_data->phone);

    
   	//	Opening hours
   	if(isset($store_data->hours) && $store_data->hours) {

   		$all_open_hours = [];

   		$week_hours = json_decode($store_data->hours);
   		

   		foreach($week_hours as $day => $day_hours) {

   			$day_full = self::dayFullName($day);
				
				//	only process array
				if(!$day_hours || !is_array($day_hours))continue;

   			$hours_spec = new SLSchemaGenerator('OpeningHoursSpecification', false);
   			$hours_spec->setProperty('dayOfWeek', $day_full);
   			$hours_spec->setProperty('opens', $day_full);
	
				//	explode to get hours   				
   			$open_close = explode('-', $day_hours[0]);

   			$open_close = array_map(function($o) { return trim($o); }, $open_close);

   			$hours_spec->setProperty('opens', $open_close[0]);
   			$hours_spec->setProperty('closes', $open_close[1]);

   			$all_open_hours[] = $hours_spec;
   		}

   		if(count($all_open_hours) > 1) {

   			$store->setProperty('openingHoursSpecification', $all_open_hours);
   		}
   	}


   	return $store->toScript();
	}

	/**
	 * [fix_backward_compatible Fix the Backward Compatibility]
	 * @return [type] [description]
	 */
	public static function fix_backward_compatible()
	{
		
		global $wpdb;

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		
		$prefix 	 = $wpdb->prefix."asl_";
		$table_name  = ASL_PREFIX."stores_timing";
		$store_table = ASL_PREFIX."stores";
		$database    = $wpdb->dbname;

		//Add Open Hours Column		
		$sql 	= "SELECT count(*) as c FROM information_schema.COLUMNS WHERE TABLE_NAME = '{$store_table}' AND COLUMN_NAME = 'open_hours';";// AND TABLE_SCHEMA = '{$database}'
		$result = $wpdb->get_results($sql);
		
		if($result[0]->c == 0) {

			$wpdb->query("ALTER TABLE {$store_table} ADD open_hours text;");
		}
		else {
			
			return;
		}


		//Check if Exist
		/*
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			return;
		}
		*/
		


		//Convert All Timings
		$stores = $wpdb->get_results("SELECT s.`id` , s.`start_time`, s.`time_per_day` , s.`end_time`, t.* FROM {$store_table} s LEFT JOIN {$table_name} t ON s.`id` = t.`store_id`");
		
		foreach($stores as $timing) {

			$time_object = new \stdClass();
			$time_object->mon = array();
			$time_object->tue = array();
			$time_object->wed = array();
			$time_object->thu = array();
			$time_object->fri = array();
			$time_object->sat = array();
			$time_object->sun = array();
			

			if($timing->time_per_day == '1') {

				if($timing->start_time_0 && $timing->end_time_0) {

					$time_object->sun[] = $timing->start_time_0 .' - '. $timing->end_time_0;
				}

				if($timing->start_time_1 && $timing->end_time_1) {

					$time_object->mon[] = $timing->start_time_1 .' - '. $timing->end_time_1;
				}

				if($timing->start_time_2 && $timing->end_time_2) {

					$time_object->tue[] = $timing->start_time_2 .' - '. $timing->end_time_2;
				}


				if($timing->start_time_3 && $timing->end_time_3) {

					$time_object->wed[] = $timing->start_time_3 .' - '. $timing->end_time_3;
				}

				if($timing->start_time_4 && $timing->end_time_4) {

					$time_object->thu[] = $timing->start_time_4 .' - '. $timing->end_time_4;
				}

				if($timing->start_time_5 && $timing->end_time_5) {

					$time_object->fri[] = $timing->start_time_5 .' - '. $timing->end_time_5;
				}

				if($timing->start_time_6 && $timing->end_time_6) {

					$time_object->sat[] = $timing->start_time_6 .' - '. $timing->end_time_6;
				}
			}
			else if(trim($timing->start_time) && trim($timing->end_time)) {

				$time_object->mon[] = $time_object->sun[] = $time_object->tue[] = $time_object->wed[] = $time_object->thu[] =$time_object->fri[] = $time_object->sat[] = trim($timing->start_time) .' - '. trim($timing->end_time);
			}
			else {

				$time_object->mon = $time_object->tue = $time_object->wed = $time_object->thu = $time_object->fri = $time_object->sat = $time_object->sun = '1';
			}
			
			$time_object = json_encode($time_object);

			//Update new timings
			$wpdb->update(ASL_PREFIX."stores",
				array('open_hours'	=> $time_object),
				array('id' => $timing->id)
			);
		}


		$sql = "DROP TABLE IF EXISTS `".$table_name."`;";
		$wpdb->query( $sql );
	}

	
}

?>
