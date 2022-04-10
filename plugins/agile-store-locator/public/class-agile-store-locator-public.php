<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://agilelogix.com
 * @since      1.0.0
 *
 * @package    AgileStoreLocator
 * @subpackage AgileStoreLocator/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    AgileStoreLocator
 * @subpackage AgileStoreLocator/public
 * @author     AgileLogix <support@agilelogix.com>
 */
class AgileStoreLocator_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $AgileStoreLocator    The ID of this plugin.
	 */
	private $AgileStoreLocator;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * [$scripts_data load the scripts]
	 * @var array
	 */
	private $scripts_data = array();

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $AgileStoreLocator       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $AgileStoreLocator, $version ) {

		
		$this->AgileStoreLocator = $AgileStoreLocator;
		$this->version = time();
		$this->version = $version;

		$this->script_name = '';
	}

	/**
	 * [register_styles Load the very basic style]
	 * @return [type] [description]
	 */
	public function register_styles() {

		wp_enqueue_style( $this->AgileStoreLocator.'-init',  ASL_URL_PATH.'public/css/init.css', array(), $this->version, 'all' );
	}

	/**
	 * [register_scripts Register all the scripts]
	 * @return [type] [description]
	 */
	public function register_scripts() {

		//	Store Detail page
		wp_register_script( $this->AgileStoreLocator.'-tmpl-detail', ASL_URL_PATH . 'public/js/sl_detail.js', array('jquery'), $this->version, true );

		wp_register_script( $this->AgileStoreLocator.'-lib', ASL_URL_PATH . 'public/js/asl_libs.min.js', array('jquery'), $this->version, true );
		
		//	Default Script
		wp_register_script( $this->AgileStoreLocator.'-script', ASL_URL_PATH . 'public/js/site_script.js', array('jquery'), $this->version, true );
	}


	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles($template = '') {

		$media = 'all'; //screen, all


		if($template == 'page') {

							//	fonts
				wp_enqueue_style( $this->AgileStoreLocator.'-tmpl-3-fonts',  ASL_URL_PATH.'public/css/fontello.css', array(), $this->version, $media );
				
				//	Bootstrap
				wp_enqueue_style( $this->AgileStoreLocator.'-tmpl-3-bootstrap',  ASL_URL_PATH.'public/css/bootstrap.min.css', array(), $this->version, $media );


				//	Add the CSS for the Template 3
				wp_enqueue_style( $this->AgileStoreLocator.'-page',  ASL_URL_PATH.'public/css/store-page.css', array(), $this->version, $media );

				return;
		}
		
		wp_enqueue_style( $this->AgileStoreLocator.'-all-css',  ASL_URL_PATH.'public/css/all-css.min.css', array(), $this->version, $media );				

		//	Add the CSS for the Locator
		wp_enqueue_style( $this->AgileStoreLocator.'-asl',  ASL_URL_PATH.'public/css/asl.css', array(), $this->version, $media );		

		//	Responsive
		wp_enqueue_style( $this->AgileStoreLocator.'-asl-responsive',  ASL_URL_PATH.'public/css/asl_responsive.css', array(), $this->version, $media );		
	}

	/**
	 * Enqueue the Store Locator Scripts
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($type = '', $atts = array()) {

		//	Register Before Enqueue
		$this->register_scripts();
		
		global $wpdb;

		//	Google Maps & ASL Libraries
		if($type != 'form') {

			$sql = "SELECT `key`,`value` FROM ".ASL_PREFIX."configs WHERE `key` = 'api_key' OR `key` = 'map_language' OR `key` = 'map_region' ORDER BY id ASC;";
			$all_result = $wpdb->get_results($sql);
			
			$map_url = '//maps.googleapis.com/maps/api/js?libraries=places,drawing';

			//	Set the API Key
			if(isset($all_result[0]) && $all_result[0]->value) {
				$api_key = $all_result[0]->value;

				$map_url .= '&key='.$api_key;
			}

			//	Set the map language
			$map_country = null;

			if(isset($atts['map_language']) && $atts['map_language'])
				$map_country = $atts['map_language'];
			else if(isset($all_result[1]) && $all_result[1]->value) {
				$map_country = $all_result[1]->value;
			}

			//	When we have a country
			if($map_country) {
				$map_url .= '&language='.$map_country;
			}



			//	Set the map region
			$map_region   = null;

			if(isset($atts['map_region']))
				$map_region = $atts['map_region'];
			else if(isset($all_result[2]) && $all_result[2]->value) {
				$map_region = $all_result[2]->value;
			}
				
			if($map_region)
				$map_url   .= '&region='.$map_region;

			wp_enqueue_script('asl_google_maps', $map_url , array('jquery'), null, true );
		}

		//	We only want the Google Maps
		if($type == 'wc') {
			return;
		}

		if($type == 'detail') {

			wp_enqueue_script( $this->AgileStoreLocator.'-tmpl-detail');
			return;
		}
		
		wp_enqueue_script( $this->AgileStoreLocator.'-lib');
		wp_enqueue_script( $this->AgileStoreLocator.'-script');
	}


 
	/**
	 * [storePage Store Page]
	 * @param  [type] $atts [description]
	 * @return [type]       [description]
	 */
	public function storePage($atts) {

		global $wpdb;

		$this->enqueue_styles('page');

		if(!$atts) {
			$atts = array();
		}
		

		/////////////////////////
		///	Store Id Attribute //
		/////////////////////////
		
		// Try to get from the attributes
		$where_clause = 's.`id` = %d'; 
		$q_param 		  = null;

		//	Get value by attribute
		$q_param 		= isset($atts['sl-store'])? intval($atts['sl-store']): null;

		//	Get value by the $_GET
		if(!$q_param) {
			$q_param   = (isset($_GET['sl-store']) && $_GET['sl-store'])? $_GET['sl-store']: null;
		}

		//	Check for the slug when store id is missing
		if(!$q_param) {
			
			//	For the Slug
			$q_param   = get_query_var('sl-store');  
			
			if($q_param) {

				// Clear the Slug for SQL injection
				$q_param = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $q_param), '-'));
				$q_param = preg_replace('/-+/', '-', $q_param);

				$where_clause = 's.`slug` = %s';
			}
		}
		
		if($q_param) {


			//Load the Scripts
			$this->enqueue_scripts('detail', $atts);

			$ASL_PREFIX = ASL_PREFIX;

			$query   = "SELECT s.`id`, `title`,  `description`, `street`,  `city`,  `state`, `postal_code`, `country`, `lat`,`lng`,`phone`,  `fax`,`email`,`website`,`logo_id`,{$ASL_PREFIX}storelogos.`path`,`marker_id`,`description_2`,`open_hours`, `ordr`, `custom`,
					group_concat(category_id) as categories FROM {$ASL_PREFIX}stores as s 
					LEFT JOIN {$ASL_PREFIX}storelogos ON logo_id = {$ASL_PREFIX}storelogos.id
					LEFT JOIN {$ASL_PREFIX}stores_categories ON s.`id` = {$ASL_PREFIX}stores_categories.store_id
					WHERE {$where_clause}";

			$results  = $wpdb->get_results($wpdb->prepare($query, array($q_param)));		

			//	Only for the correct record
			if($results && isset($results[0]) && $results[0]->id) {

				ob_start();

				//	Template file
				$template_file = 'asl-store-page.php';

				$store_data    = $results[0];

				//	Get the Country
				$country = $wpdb->get_results("SELECT country FROM ".ASL_PREFIX."countries WHERE id = ".$store_data->country);

				$store_data->country = ($country && isset($country[0]))? $country[0]->country: '';

			
				//	Custom Field
				if(isset($store_data->custom) && $store_data->custom) {

					$custom_fields = json_decode($store_data->custom, true);

					if($custom_fields && is_array($custom_fields) && count($custom_fields) > 0) {

						foreach ($custom_fields as $custom_key => $custom_value) {
							
							$store_data->$custom_key = $custom_value;
						}
					}
				}


				////////////////////
				///Get Categories //
				////////////////////
				$store_categories = null;


        if(isset($store_data->categories) && $store_data->categories) {

        	//	filter the numbers
        	$ids = explode(',', $store_data->categories);
        	$ids = array_map( 'absint', $ids );
        	$ids = implode(',', $ids);

          $categories = $wpdb->get_results("SELECT * FROM `{$ASL_PREFIX}categories` WHERE id IN ($ids)");

          if($categories) {

            foreach($categories as $b) {
              $store_categories[] = $b->category_name;
            }

            //	Fill the categories for Schema
        		$store_data->all_categories = $store_categories;
          }
        }


				//	Open hours
				$store_data->hours = $store_data->open_hours;

				require_once ASL_PLUGIN_PATH . 'includes/class-agile-store-locator-helper.php';
				$store_data->open_hours = AgileStoreLocator_Helper::openHours($store_data);

				//	All the configuration
		    $all_configs = $this->getConfig(['store_schema', 'zoom', 'map_layout']);

		    $all_configs['default_lat'] = $store_data->lat;
		    $all_configs['default_lng'] = $store_data->lng;
		    
		    $all_configs = shortcode_atts( $all_configs, $atts );

				// Add the missing attributes into settings
				$all_configs = array_merge($all_configs, $atts);

				//	Generate the Google Schema
				$google_schema 	= ($all_configs['store_schema'] == '1')? AgileStoreLocator_Helper::googleSchema($store_data):'';



				//	Get the JSON for the Map layout
				$all_configs['map_layout'] = $this->_map_layout($all_configs['map_layout']);


				$all_configs['URL'] 				= ASL_UPLOAD_URL;
				$all_configs['PLUGIN_URL'] 	= ASL_URL_PATH;
		  
		    


				// Check for Local Version
				if($template_file) {

					if ($theme_file   = locate_template(array($template_file))) {
			            $template_path = $theme_file;
			        }
			        else {
			            $template_path = 'partials/'.$template_file;
			        }

			        include $template_path;
				}

				$sl_output = ob_get_contents();

				ob_end_clean();


				$this->localize_scripts( $this->AgileStoreLocator.'-tmpl-detail', 'asl_detail_config', $all_configs);
				
				//	Inject script with inline_script
				//wp_add_inline_script( $this->AgileStoreLocator.'-tmpl-detail', $this->get_local_script_data(), 'before');

				$sl_output = $sl_output.$this->get_local_script_data(true);

				return $sl_output;
			}
		}

		return '';
	}


	/**
	 * [frontendStoreLocator Frontend of Plugin]
	 * @param  [type] $atts [description]
	 * @return [type]       [description]
	 */
	public function frontendStoreLocator($atts) {
		
		global $wpdb;


		$configs = $wpdb->get_results("SELECT * FROM ".ASL_PREFIX."configs WHERE `key` != 'server_key'");

		$all_configs = array(
			'map_layout' => '0',
			'infobox_layout' => '1',
			'color_scheme' => '0',
			'direction_btn' => '1',
			'print_btn' => '1'
		);
		
		foreach($configs as $_config)
			$all_configs[$_config->key] = $_config->value;


		//	The Upload Directory
		$all_configs['URL'] 				= ASL_UPLOAD_URL;
		$all_configs['PLUGIN_URL'] 	= ASL_URL_PATH;

		
		if(!$atts) {

			$atts = array();
		}
		

		$all_configs = shortcode_atts( $all_configs, $atts );

		//add the missing attributes into settings
		$all_configs = array_merge($all_configs, $atts);

		//	Check the template to load
		$template = '0';



		//Load the Scripts
		$this->enqueue_scripts($template, $atts);

		//	for the localization script
		$this->script_name = '-script';
		

		//Load the Style
		$this->enqueue_styles($template);


		//	If the GDPR is enabled, dequeue the Google Maps
		if(isset($all_configs['gdpr']) && $all_configs['gdpr'] == '1') {
			wp_deregister_script('asl_google_maps');
		}


		$category_clause = "";


		////////////////////////////////////////
		////////The Redirect Attribute Params //
		////////////////////////////////////////

	


    if(isset($_GET['sl-addr']) && $_GET['sl-addr']) {
      $all_configs['default-addr'] = $_GET['sl-addr'];
    }
		elseif(isset($atts['sl-addr'])) {
			$all_configs['default-addr'] = $atts['sl-addr'];
			$all_configs['req_coords'] = true;
		}
		


		if(isset($_GET['lat']) && $_GET['lng']) {

			$all_configs['default_lat'] = $_GET['lat'];
			$all_configs['default_lng'] = $_GET['lng'];
		}
		//	Get the Coordinates
		else if(isset($all_configs['default-addr']) && $all_configs['default-addr']) {

			$all_configs['req_coords'] = true;
		}



		////////////////////////////////////////
		////////The Redirect Attribute ENDING //
		////////////////////////////////////////

		//Only show Valid Categories		
		if(isset($atts['category'])) {

			$all_configs['category'] = $atts['category'];

			$load_categories = explode(',', $all_configs['category']);

			$the_categories  = array();

			foreach($load_categories as $_c) {

				if(is_numeric($_c)) {

					$the_categories[] = $_c;
				}
			}

			$the_categories  = implode(',', $the_categories);
			$category_clause = " AND id IN (".$the_categories.')';
			$all_configs['category'] = $the_categories;
		}

	

		//min and max zoom
		
		if(isset($atts['maxZoom']) || isset($atts['maxzoom'])) {
			
			$all_configs['maxzoom'] = isset($atts['maxZoom'])?$atts['maxZoom']:$atts['maxzoom'];
		}

		if(isset($atts['minZoom']) || isset($atts['minzoom'])) {
			
			$all_configs['minzoom'] = isset($atts['minZoom'])?$atts['minZoom']:$atts['minzoom'];
		}
		


		//for limited markers
		
		if(isset($atts['stores'])) {
			
			$all_configs['stores'] = $atts['stores'];
		}

		
		if(isset($atts['mobile_stores_limit']) && is_numeric($atts['mobile_stores_limit'])) {
			
			$all_configs['mobile_stores_limit'] = $atts['mobile_stores_limit'];
		}
		
		


		if(isset($atts['fixed_radius']) && is_numeric($atts['fixed_radius'])) {
			
			$all_configs['fixed_radius'] = $atts['fixed_radius'];
		}



		//ADD The missing parameters
		$default_options = array();

		$all_configs  = array_merge($default_options, $all_configs);
	
		
		if($all_configs['sort_by'] == 'distance') {
			
			$all_configs['sort_by'] = '';
		}


		//Get the categories
		$all_categories = array();
		$results = $wpdb->get_results("SELECT id,category_name as name,icon, ordr FROM ".ASL_PREFIX."categories WHERE is_active IN (0,1) ".$category_clause.' ORDER BY category_name ASC');

		foreach($results as $_result) {

			$all_categories[$_result->id] = $_result;
		}
		



		/////////////////////
		// Get the Markers //
		/////////////////////
		$all_markers = array();
		$results = $wpdb->get_results("SELECT id, marker_name as name,icon FROM ".ASL_PREFIX."markers");

		foreach($results as $_result) {
			
			$all_markers[$_result->id] = $_result;
		}

		
		//	Get the JSON for the Map layout
		$all_configs['map_layout'] = $this->_map_layout($all_configs['map_layout']);


		
		//For Translation	
		$words = array(
			'direction' => __('Directions','asl_locator'),
			'zoom' 		=> __('Zoom','asl_locator'),
			'detail' 	=> __('Website','asl_locator'),
			'select_option' => __('Select Option','asl_locator'),
			'search' 	=> __('Search','asl_locator'),
			'all_selected' => __('All selected','asl_locator'),
			'none' 		=> __('None','asl_locator'),
			'none_selected' => __('None Selected','asl_locator'),
			'reset_map' => __('Reset Map','asl_locator'),
			'reload_map' => __('Scan Area','asl_locator'),
			'selected' => __('selected','asl_locator'),
			'current_location' => __('Current Location','asl_locator'),
			'your_cur_loc' => __('Your Current Location','asl_locator'),
			/*Template words*/
			'Miles' 	 => __('Miles','asl_locator'),
			'Km' 	 	 => __('Km','asl_locator'),
			'phone' 	 => __('Phone','asl_locator'),
			'fax' 		 => __('Fax','asl_locator'),
			'directions' => __('Directions','asl_locator'),
			'distance' 	 => __('Distance','asl_locator'),
			'read_more'  => __('Read more','asl_locator'),
			'hide_more'  => __('Hide Details','asl_locator'),
			'select_distance'  	=> __('Select Distance','asl_locator'),
			'none_distance'  	=> __('None','asl_locator'),
			'cur_dir'  				=> __('Current+Location','asl_locator'),
			'radius_circle' 	=> __('Radius Circle','asl_locator')
		);

		$all_configs['words'] 	  = $words;
		$all_configs['version']   = $this->version;
		$all_configs['days']   	  = array('sun'=>__( 'Sun','asl_locator'), 'mon'=>__('Mon','asl_locator'), 'tue'=>__( 'Tues','asl_locator'), 'wed'=>__( 'Wed','asl_locator' ), 'thu'=> __( 'Thur','asl_locator'), 'fri'=>__( 'Fri','asl_locator' ), 'sat'=> __( 'Sat','asl_locator'));


		//	SHOW/Hide Custom CSS
		$css_code = '';

		if($all_configs['direction_btn'] == '0') {

			$css_code .= '.asl-p-cont .sl-direction,.asl-cont .sl-direction, .asl-buttons .directions {display: none !important;}';
		}

		if($all_configs['print_btn'] == '0') {

			$css_code .= '.asl-p-cont .asl-print-btn,.asl-cont .asl-print-btn {display: none !important;}';
		}

		ob_start();

		
		$template_file = 'template-frontend.php';

		if($all_configs['color_scheme'] < 0 && $all_configs['color_scheme'] > 9)
      $all_configs['color_scheme'] = 0;

    if(isset($atts['no_script']) && $atts['no_script'] == '1') {

    	$asl_tmpls = array(
    		'list'    => '<div class="sl-item" data-id="{{:id}}"><div class="addr-sec"><p class="p-title">{{:title}}</p></div><div class="row"><div class="{{if path}}col-md-9 col-xs-9{{else}}col-md-12{{/if}} addr-sec"><p class="p-area"><span class="glyphicon icon-location"></span><span>{{:address}}</span></p>{{if phone}}<p class="p-area"><span class="glyphicon icon-phone-outline"></span><a href="tel:{{:phone}}">{{:phone}}</a></p>{{/if}}{{if email}}<p class="p-area"><span class="glyphicon icon-at"></span><a href="mailto:{{:email}}" style="text-transform: lowercase">{{:email}}</a></p>{{/if}}{{if fax}}<p class="p-area"><span class="glyphicon icon-fax"></span> {{:fax}}</p>{{/if}}{{if c_names}}<p class="p-area"><span class="glyphicon icon-tag"></span> {{:c_names}}</p>{{/if}}{{if open_hours}}<p class="p-area"><span class="glyphicon icon-clock-1"></span> {{:open_hours}}</p>{{/if}}{{if days_str}}<p class="p-area"><span class="glyphicon icon-calendar"></span> {{:days_str}}</p>{{/if}}<p class="p-area"> {{:str_brand}}</p>{{if description}}<p class="p-description">{{:description}}</p>{{/if}}</div>{{if path}}<div class="sm-pl-0 col-md-3 col-xs-3"><div class="item-thumb"><a class="thumb-a"><img src="'.ASL_UPLOAD_URL.'Logo/{{:path}}" alt="logo"></a></div></div>{{/if}}</div><div class="row"><div class="mt-10 distance"><div class="col-xs-6"><p class="p-direction"><button type="button" class="btn btn-asl s-direction">'.$words['directions'].'</button></p></div>{{if dist_str}}<div class="col-xs-6"><span class="s-distance">{{:dist_str}}</span></div>{{/if}}</div></div></div>',
    		'infobox' => '{{if path}}<div class="image_map_popup" style="display:none"><img src="{{:URL}}Logo/{{:path}}" /></div>{{/if}}  <h3>{{:title}}</h3>  <div class="infowindowContent"> <div class="info-box-cont"><div class="row">  <div class="col-md-12"> <div class="{{if path}}info-addr{{else}}info-addr w-100-p{{/if}}"><div class="address"><span class="glyphicon icon-location"></span><span>{{:address}}</span></div>{{if phone}}<div class="phone"><span class="glyphicon icon-phone-outline"></span><a href="tel:{{:phone}}">{{:phone}}</a></div>{{/if}}{{if email}}<div class="p-time"><span class="glyphicon icon-at"></span><a href="mailto:{{:email}}" style="text-transform: lowercase">{{:email}}</a></div>{{/if}} </div> {{if path}} <div class="img_box" style="display:none"><img src="{{:URL}}Logo/{{:path}}" alt="logo"> </div> {{/if}}  </div></div><div class="row">  <div class="col-md-12 asl-tt-details"> {{if open_hours}} <div class="p-time"><span class="glyphicon icon-clock-1"></span> {{:open_hours}}</div> {{/if}} {{if days_str}} <div class="p-time"><span class="glyphicon icon-calendar-outlilne"></span> {{:days_str}}</div> {{/if}} {{if show_categories && c_names}} <div class="categories asl-p-0"><span class="glyphicon icon-tag"></span><span>{{:c_names}}</span></div> {{/if}} {{if dist_str}} <div class="distance">'.$words['distance'].': {{:dist_str}}</div> {{/if}}  </div></div> </div>  <div class="asl-buttons"></div></div><div class="arrow-down"></div>'
    	);

      $this->localize_scripts( $this->AgileStoreLocator.$this->script_name, 'asl_tmpls', $asl_tmpls);
    }
    else
      $atts['no_script'] = 0;

      


		//Customization of Template
		if($template_file) {

			if ( $theme_file   = locate_template( array ( $template_file ) ) ) {
	            $template_path = $theme_file;
	        }
	        else {
	            $template_path = 'partials/'.$template_file;
	        }

	        include $template_path;
		}
    
		$sl_output = ob_get_contents();

		ob_end_clean();

		
		$title_nonce = wp_create_nonce( 'asl_remote_nonce' );
		
		$this->localize_scripts( $this->AgileStoreLocator.$this->script_name, 'ASL_REMOTE', array(
		    'ajax_url' => admin_url( 'admin-ajax.php' ),
		    'nonce'    => $title_nonce
		));

		//dd($this->AgileStoreLocator.$this->script_name);
		$this->localize_scripts( $this->AgileStoreLocator.$this->script_name, 'asl_configuration', $all_configs);
		$this->localize_scripts( $this->AgileStoreLocator.$this->script_name, 'asl_categories', $all_categories);
		$this->localize_scripts( $this->AgileStoreLocator.$this->script_name, 'asl_markers', $all_markers);
			
		//	Inject script with inline_script
		//wp_add_inline_script( $this->AgileStoreLocator.$this->script_name, $this->get_local_script_data(), 'before');

		$sl_output = $sl_output.$this->get_local_script_data(true);

		return $sl_output;
	}

	

	/**
	 * [load_stores Load the Stores using AJAX Request]
	 * @return [type] [description]
	 */
	public function load_stores($output_return = false) {

		global $wpdb;

		$nonce = isset($_GET['nonce'])?$_GET['nonce']: null;
		/*
		if ( ! wp_verify_nonce( $nonce, 'asl_remote_nonce' ))
 			die ( 'CRF check error.');
 		*/
		$load_all 	 = (isset($_GET['load_all']) && $_GET['load_all'] == '1' || $output_return)?	true:false;
		$accordion   = (isset($_GET['layout']) && $_GET['layout'] == '1')?true:false;
		$category    = (isset($_GET['category']))?$_GET['category']:null;
		$stores      = (isset($_GET['stores']))?$_GET['stores']:null;

		$ASL_PREFIX  = ASL_PREFIX;

		$bound   				= '';

		$extra_sql 			= '';
		$country_field 	= '';
	
		

    

    $clause = '';

    if($category) {

			$load_categories = explode(',', $category);
			$the_categories  = array();

			foreach($load_categories as $_c) {

				if(is_numeric($_c)) {

					$the_categories[] = $_c;
				}
			}

			$the_categories  = implode(',', $the_categories);
			$category_clause = " AND id IN (".$the_categories.')';
			$clause 		     = " AND {$ASL_PREFIX}stores_categories.`category_id` IN (".$the_categories.")";
		}


    ///if marker param exist
		if($stores) {

			$stores = explode(',', $stores);

			//only number
			$store_ids = array();
			foreach($stores as $m) {

				if(is_numeric($m)) {
					$store_ids[] = $m;
				}
			}

			if($store_ids) {

				$store_ids = implode(',', $store_ids);
				$clause    .= " AND s.`id` IN ({$store_ids})";				
			}
		}

	


		$query   = "SELECT s.`id`, `title`,  `description`, `street`,  `city`,  `state`, `postal_code`, {$country_field} `lat`,`lng`,`phone`,  `fax`,`email`,`website`,`logo_id`,{$ASL_PREFIX}storelogos.`path`,`marker_id`,`description_2`,`open_hours`, `ordr`, `custom`,`slug`,
					group_concat(category_id) as categories FROM {$ASL_PREFIX}stores as s 
					LEFT JOIN {$ASL_PREFIX}storelogos ON logo_id = {$ASL_PREFIX}storelogos.id
					LEFT JOIN {$ASL_PREFIX}stores_categories ON s.`id` = {$ASL_PREFIX}stores_categories.store_id
					$extra_sql
					WHERE (is_disabled is NULL || is_disabled = 0) AND (`lat` != '' AND `lng` != '') {$bound} {$clause}
					GROUP BY s.`id` ORDER BY `title` ";

		$query .= " LIMIT 10000";
		

		
		$all_results = $wpdb->get_results($query);
		$err_message = isset($wpdb->last_error)? $wpdb->last_error: null;

		//	Show Error
		if(!$all_results && $err_message) {

			//	Check if the new columns are there or not
			$sql 	= "SELECT count(*) as c FROM information_schema.COLUMNS WHERE TABLE_NAME = '{$ASL_PREFIX}stores' AND COLUMN_NAME = 'slug' AND TABLE_SCHEMA = '{$database}'";
			$col_check_result = $wpdb->get_results($sql);
			
			if($col_check_result[0]->c == 0) {
					require_once ASL_PLUGIN_PATH . 'includes/class-agile-store-locator-activator.php';
	        //  Run the script to add missing tables
	        AgileStoreLocator_Activator::activate();
			}

			echo json_encode([$err_message]);die;
		}


		$days_in_words 	= array('sun'=>__( 'Sun','asl_locator'), 'mon'=>__('Mon','asl_locator'), 'tue'=>__( 'Tues','asl_locator'), 'wed'=>__( 'Wed','asl_locator' ), 'thu'=> __( 'Thur','asl_locator'), 'fri'=>__( 'Fri','asl_locator' ), 'sat'=> __( 'Sat','asl_locator'));
		$days 		   		= array('mon','tue','wed','thu','fri','sat','sun');


		//	Loop over the rows
		foreach($all_results as $aRow) {

			if($aRow->open_hours) {

				$days_are 	= array();
				$open_hours = json_decode($aRow->open_hours);

				foreach($days as $day) {

					if(!empty($open_hours->$day)) {

						$days_are[] = $days_in_words[$day];
					}
				}

				$aRow->days_str = implode(', ', $days_are);
			}


			//	Decode the Custom Fields
			if($aRow->custom) {

				$custom_fields = json_decode($aRow->custom, true);

				if($custom_fields && is_array($custom_fields) && count($custom_fields) > 0) {

					foreach ($custom_fields as $custom_key => $custom_value) {
						
						$aRow->$custom_key = $custom_value;
					}
				}
			}

			unset($aRow->custom);
	  }

	  //	To Return the output object
	  if($output_return) {
	  	return $all_results;
	  }

		echo json_encode($all_results);die;
	}



	/**
   * [_get_custom_fields Method to Get the Custom Fields]
   * @return [type] [description]
   */
  private function _get_custom_fields() {

  	global $wpdb;
  	
  	//	Fields
		$fields = $wpdb->get_results("SELECT content FROM ".ASL_PREFIX."settings WHERE `type` = 'fields'");
		$fields = ($fields && isset($fields[0]))? json_decode($fields[0]->content, true): [];

		return $fields;
  }


  /**
   * [_map_layout Return the JSON for the Map layout]
   * @param  [type] $layout_code [description]
   * @return [type]              [description]
   */
  private function _map_layout($layout_code) {

  	global $wpdb;

  	/// Get the map configuration
		switch($layout_code) {

			//
			case '-1':
				return '[]';
			break;

			//25-blue-water
			case '0':
				return '[{featureType:"administrative",elementType:"labels.text.fill",stylers:[{color:"#444444"}]},{featureType:"landscape",elementType:"all",stylers:[{color:"#f2f2f2"}]},{featureType:"poi",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"road",elementType:"all",stylers:[{saturation:-100},{lightness:45}]},{featureType:"road.highway",elementType:"all",stylers:[{visibility:"simplified"}]},{featureType:"road.arterial",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"transit",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"water",elementType:"all",stylers:[{color:"#46bcec"},{visibility:"on"}]}]';
			break;

			//Flat Map
			case '1':
				return '[{featureType:"landscape",elementType:"all",stylers:[{visibility:"on"},{color:"#f3f4f4"}]},{featureType:"landscape.man_made",elementType:"geometry",stylers:[{weight:.9},{visibility:"off"}]},{featureType:"poi.park",elementType:"geometry.fill",stylers:[{visibility:"on"},{color:"#83cead"}]},{featureType:"road",elementType:"all",stylers:[{visibility:"on"},{color:"#ffffff"}]},{featureType:"road",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"road.highway",elementType:"all",stylers:[{visibility:"on"},{color:"#fee379"}]},{featureType:"road.arterial",elementType:"all",stylers:[{visibility:"on"},{color:"#fee379"}]},{featureType:"water",elementType:"all",stylers:[{visibility:"on"},{color:"#7fc8ed"}]}]';
			break;

			//Icy Blue
			case '2':
				return '[{stylers:[{hue:"#2c3e50"},{saturation:250}]},{featureType:"road",elementType:"geometry",stylers:[{lightness:50},{visibility:"simplified"}]},{featureType:"road",elementType:"labels",stylers:[{visibility:"off"}]}]';
			break;


			//Pale Dawn
			case '3':
				return '[{featureType:"administrative",elementType:"all",stylers:[{visibility:"on"},{lightness:33}]},{featureType:"landscape",elementType:"all",stylers:[{color:"#f2e5d4"}]},{featureType:"poi.park",elementType:"geometry",stylers:[{color:"#c5dac6"}]},{featureType:"poi.park",elementType:"labels",stylers:[{visibility:"on"},{lightness:20}]},{featureType:"road",elementType:"all",stylers:[{lightness:20}]},{featureType:"road.highway",elementType:"geometry",stylers:[{color:"#c5c6c6"}]},{featureType:"road.arterial",elementType:"geometry",stylers:[{color:"#e4d7c6"}]},{featureType:"road.local",elementType:"geometry",stylers:[{color:"#fbfaf7"}]},{featureType:"water",elementType:"all",stylers:[{visibility:"on"},{color:"#acbcc9"}]}]';
			break;


			//cladme
			case '4':
				return '[{featureType:"administrative",elementType:"labels.text.fill",stylers:[{color:"#444444"}]},{featureType:"landscape",elementType:"all",stylers:[{color:"#f2f2f2"}]},{featureType:"poi",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"road",elementType:"all",stylers:[{saturation:-100},{lightness:45}]},{featureType:"road.highway",elementType:"all",stylers:[{visibility:"simplified"}]},{featureType:"road.arterial",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"transit",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"water",elementType:"all",stylers:[{color:"#4f595d"},{visibility:"on"}]}]';
			break;


			//light monochrome
			case '5':
				return '[{featureType:"administrative.locality",elementType:"all",stylers:[{hue:"#2c2e33"},{saturation:7},{lightness:19},{visibility:"on"}]},{featureType:"landscape",elementType:"all",stylers:[{hue:"#ffffff"},{saturation:-100},{lightness:100},{visibility:"simplified"}]},{featureType:"poi",elementType:"all",stylers:[{hue:"#ffffff"},{saturation:-100},{lightness:100},{visibility:"off"}]},{featureType:"road",elementType:"geometry",stylers:[{hue:"#bbc0c4"},{saturation:-93},{lightness:31},{visibility:"simplified"}]},{featureType:"road",elementType:"labels",stylers:[{hue:"#bbc0c4"},{saturation:-93},{lightness:31},{visibility:"on"}]},{featureType:"road.arterial",elementType:"labels",stylers:[{hue:"#bbc0c4"},{saturation:-93},{lightness:-2},{visibility:"simplified"}]},{featureType:"road.local",elementType:"geometry",stylers:[{hue:"#e9ebed"},{saturation:-90},{lightness:-8},{visibility:"simplified"}]},{featureType:"transit",elementType:"all",stylers:[{hue:"#e9ebed"},{saturation:10},{lightness:69},{visibility:"on"}]},{featureType:"water",elementType:"all",stylers:[{hue:"#e9ebed"},{saturation:-78},{lightness:67},{visibility:"simplified"}]}]';
			break;
			

			//mostly grayscale
			case '6':
				return '[{featureType:"administrative",elementType:"all",stylers:[{visibility:"on"},{lightness:33}]},{featureType:"administrative",elementType:"labels",stylers:[{saturation:"-100"}]},{featureType:"administrative",elementType:"labels.text",stylers:[{gamma:"0.75"}]},{featureType:"administrative.neighborhood",elementType:"labels.text.fill",stylers:[{lightness:"-37"}]},{featureType:"landscape",elementType:"geometry",stylers:[{color:"#f9f9f9"}]},{featureType:"landscape.man_made",elementType:"geometry",stylers:[{saturation:"-100"},{lightness:"40"},{visibility:"off"}]},{featureType:"landscape.natural",elementType:"labels.text.fill",stylers:[{saturation:"-100"},{lightness:"-37"}]},{featureType:"landscape.natural",elementType:"labels.text.stroke",stylers:[{saturation:"-100"},{lightness:"100"},{weight:"2"}]},{featureType:"landscape.natural",elementType:"labels.icon",stylers:[{saturation:"-100"}]},{featureType:"poi",elementType:"geometry",stylers:[{saturation:"-100"},{lightness:"80"}]},{featureType:"poi",elementType:"labels",stylers:[{saturation:"-100"},{lightness:"0"}]},{featureType:"poi.attraction",elementType:"geometry",stylers:[{lightness:"-4"},{saturation:"-100"}]},{featureType:"poi.park",elementType:"geometry",stylers:[{color:"#c5dac6"},{visibility:"on"},{saturation:"-95"},{lightness:"62"}]},{featureType:"poi.park",elementType:"labels",stylers:[{visibility:"on"},{lightness:20}]},{featureType:"road",elementType:"all",stylers:[{lightness:20}]},{featureType:"road",elementType:"labels",stylers:[{saturation:"-100"},{gamma:"1.00"}]},{featureType:"road",elementType:"labels.text",stylers:[{gamma:"0.50"}]},{featureType:"road",elementType:"labels.icon",stylers:[{saturation:"-100"},{gamma:"0.50"}]},{featureType:"road.highway",elementType:"geometry",stylers:[{color:"#c5c6c6"},{saturation:"-100"}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{lightness:"-13"}]},{featureType:"road.highway",elementType:"labels.icon",stylers:[{lightness:"0"},{gamma:"1.09"}]},{featureType:"road.arterial",elementType:"geometry",stylers:[{color:"#e4d7c6"},{saturation:"-100"},{lightness:"47"}]},{featureType:"road.arterial",elementType:"geometry.stroke",stylers:[{lightness:"-12"}]},{featureType:"road.arterial",elementType:"labels.icon",stylers:[{saturation:"-100"}]},{featureType:"road.local",elementType:"geometry",stylers:[{color:"#fbfaf7"},{lightness:"77"}]},{featureType:"road.local",elementType:"geometry.fill",stylers:[{lightness:"-5"},{saturation:"-100"}]},{featureType:"road.local",elementType:"geometry.stroke",stylers:[{saturation:"-100"},{lightness:"-15"}]},{featureType:"transit.station.airport",elementType:"geometry",stylers:[{lightness:"47"},{saturation:"-100"}]},{featureType:"water",elementType:"all",stylers:[{visibility:"on"},{color:"#acbcc9"}]},{featureType:"water",elementType:"geometry",stylers:[{saturation:"53"}]},{featureType:"water",elementType:"labels.text.fill",stylers:[{lightness:"-42"},{saturation:"17"}]},{featureType:"water",elementType:"labels.text.stroke",stylers:[{lightness:"61"}]}]';
			break;


			//turquoise water
			case '7':
				return '[{stylers:[{hue:"#16a085"},{saturation:0}]},{featureType:"road",elementType:"geometry",stylers:[{lightness:100},{visibility:"simplified"}]},{featureType:"road",elementType:"labels",stylers:[{visibility:"off"}]}]';
			break;


			//unsaturated browns
			case '8':
				return '[{elementType:"geometry",stylers:[{hue:"#ff4400"},{saturation:-68},{lightness:-4},{gamma:.72}]},{featureType:"road",elementType:"labels.icon"},{featureType:"landscape.man_made",elementType:"geometry",stylers:[{hue:"#0077ff"},{gamma:3.1}]},{featureType:"water",stylers:[{hue:"#00ccff"},{gamma:.44},{saturation:-33}]},{featureType:"poi.park",stylers:[{hue:"#44ff00"},{saturation:-23}]},{featureType:"water",elementType:"labels.text.fill",stylers:[{hue:"#007fff"},{gamma:.77},{saturation:65},{lightness:99}]},{featureType:"water",elementType:"labels.text.stroke",stylers:[{gamma:.11},{weight:5.6},{saturation:99},{hue:"#0091ff"},{lightness:-86}]},{featureType:"transit.line",elementType:"geometry",stylers:[{lightness:-48},{hue:"#ff5e00"},{gamma:1.2},{saturation:-23}]},{featureType:"transit",elementType:"labels.text.stroke",stylers:[{saturation:-64},{hue:"#ff9100"},{lightness:16},{gamma:.47},{weight:2.7}]}]';
			break;


			case '9':
				
			$custom_map_style = $wpdb->get_results("SELECT * FROM ".ASL_PREFIX."settings WHERE `name` = 'map_style'");

			if($custom_map_style && $custom_map_style[0]) {

				return $custom_map_style[0]->content;
			}

			break;

			//turquoise water
			default:
				return '[{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2e5d4"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]}]';
			break;
		}

		return '[]';
  }

  /**
   * [fixURL Add https:// to the URL]
   * @param  [type] $url    [description]
   * @param  string $scheme [description]
   * @return [type]         [description]
   */
  private function fixURL($url, $scheme = 'http://') {

    if(!$url)
      return '';

    return parse_url($url, PHP_URL_SCHEME) === null ? $scheme . $url : $url;
  }


  /**
   * [getConfig Get the Configuration]
   * @param  [type] $all_columns [description]
   * @return [type]              [description]
   */
  private function getConfig($all_columns) {

  	global $wpdb;

  	$where_clause  = (!$all_columns)? "`key` != 'server_key' AND `key` != 'notify_email'": '`key` IN ('.implode(',', array_map(function($val){return "'$val'";}, $all_columns)).')';


  	$configs 			 = $wpdb->get_results("SELECT * FROM ".ASL_PREFIX."configs WHERE $where_clause");

		$all_configs = array();
		
		foreach($configs as $_config)
			$all_configs[$_config->key] = $_config->value;

		return $all_configs;
  }

    /**
   * [localize_scripts description]
   * @param  [type] $script_name [description]
   * @param  [type] $variable    [description]
   * @param  [type] $data        [description]
   * @return [type]              [description]
   */
  private function localize_scripts($script_name, $variable, $data) {

  	$this->scripts_data[] = [$variable, $data]; 
  }


  /**
   * [get_local_script_data Render the scripts data]
   * @return [type] [description]
   */
  private function get_local_script_data($with_tags = false) {

  	$scripts = '';

  	foreach ($this->scripts_data as $script_data) {
  		
  		$scripts .= 'var '.$script_data[0].' = '.(($script_data[1] && !empty($script_data[1]))?json_encode($script_data[1]): "''").';';
  	}

  	//	With script tags
  	if($with_tags) {

  		$scripts = "<script type='text/javascript' id='agile-store-locator-script-js'>".$scripts."</script>";
  	}

  	return $scripts;
  }
}
