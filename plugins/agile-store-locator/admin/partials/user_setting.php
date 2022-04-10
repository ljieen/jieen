<?php

$faq_basic = array(
	array(
		'q' 	=> 'How to add the store locator on the page?',
		'ans' => 'To add the store locator on the page write down the shortcode of the plugin <b>[ASL_STORELOCATOR]</b>, after that click publish to save the page.'
	),
	array(
		'q' 	=> 'How to change the default map location?',
		'ans' => 'To change the location of the Google Map, add the <b>Default Coordinates</b> value of your desired location in the ASL Settings, you can get your values by right-click over Google Maps.'
	),
	array(
		'q' 	=> 'Why the newly added stores are not appearing?',
		'ans' => 'Make sure to refresh the Fast Cache if it is enabled in the ASL Settings, and click over Validate Coordinates on the Manage Stores page to see all stores have valid coordinates.'
	),
	array(
		'q' 	=> 'Why I am not getting auto-updates?',
		'ans' => 'Premium version is hosting on Envato market, so follow this <a target="_blank" href="https://agilestorelocator.com/wiki/automatic-updates/">article guide</a> to recieve updates.'
	),
	array(
		'q' 	=> 'Why th Google Map is showing "development" watermark?',
		'ans' => 'The "Development" watermark appears over the Google Maps when the Google API isn\'t configured properly or the required libraries are not enabled, please follow this <a target="_blank" href="https://agilestorelocator.com/blog/enable-google-maps-api-agile-store-locator-plugin/">guide article</a>.'
	)
);

$faq_links = array(
	array(
		'title' => 'How to translate the static content of the plugin?',
		'link'  => 'https://agilestorelocator.com/wiki/language-translation-store-locator/'
	),
	array(
		'title' => 'How can we avoid the template to be overwrite by updates?',
		'link'  => 'https://agilestorelocator.com/wiki/customize-template-without-modifying-core-plugin/'
	),
	array(
		'title' => 'How can we pre-load filter values by the URL?',
		'link'  => 'https://agilestorelocator.com/wiki/load-parameter-with-query-string/'
	),
	array(
		'title' => 'How to create multiple Store Locator on different pages?',
		'link'  => 'https://agilestorelocator.com/wiki/create-multiple-store-locator-different-wordpress-pages/'
	),
	array(
		'title' => 'How can we sort by the categories?',
		'link'  => 'https://agilestorelocator.com/wiki/sort-store-attribute/'
	),
	array(
		'title' => 'How can we change the address format?',
		'link'  => 'https://agilestorelocator.com/wiki/change-address-format/'
	),
	array(
		'title' => 'How to change the user location marker?',
		'link'  => 'https://agilestorelocator.com/wiki/change-user-location-marker-image/'
	),
	array(
		'title' => 'How to add custom tag in the template?',
		'link'  => 'https://agilestorelocator.com/wiki/custom-script-method-store-locator/'
	),
	array(
		'title' => 'Why Store Locator doesn’t appear at all?',
		'link'  => 'https://agilestorelocator.com/wiki/store-locator-doesnot-appear/'
	),
	array(
		'title' => 'How to change the cluster color or size?',
		'link'  => 'https://agilestorelocator.com/wiki/store-locator-clusters/'
	),
	array(
		'title' => 'How to change the font sizing?',
		'link'  => 'https://agilestorelocator.com/wiki/how-to-adjust-the-font-size/'
	),
	array(
		'title' => 'How to change the "Website" text?',
		'link'  => 'https://agilestorelocator.com/wiki/language-translation-store-locator/'
	)
);

?>

<div class="asl-p-cont asl-new-bg">
	<div class="hide">
		<svg xmlns="http://www.w3.org/2000/svg">
		  <symbol id="i-trash" viewBox="0 0 32 32" width="13" height="13" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
		  		<title><?php echo __('Trash','asl_admin') ?></title>
			    <path d="M28 6 L6 6 8 30 24 30 26 6 4 6 M16 12 L16 24 M21 12 L20 24 M11 12 L12 24 M12 6 L13 2 19 2 20 6" />
			</symbol>
			<symbol id="i-clock" viewBox="0 0 32 32" width="13" height="13" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
		    <circle cx="16" cy="16" r="14" />
		    <path d="M16 8 L16 16 20 20" />
			</symbol>
			<symbol id="i-plus" viewBox="0 0 32 32" width="13" height="13" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
		  	<title><?php echo __('Add','asl_admin') ?></title>
		    <path d="M16 2 L16 30 M2 16 L30 16" />
			</symbol>
      <symbol id="i-chevron-top" viewBox="0 0 32 32" width="13" height="13" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <path d="M30 20 L16 8 2 20" />
      </symbol>
      <symbol id="i-chevron-bottom" viewBox="0 0 32 32" width="13" height="13" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <path d="M30 12 L16 24 2 12" />
      </symbol>
		</svg>
	</div>
	<div class="container">
		<div class="row asl-setting-cont">
			<div class="col-md-12">
			  <div class="asl-user-setting p-0 mb-4 mt-4">
			     <h3 class="asl-user-setting-title"><?php echo __('ASL Settings (Free Version - ','asl_admin').ASL_CVERSION ?>)</h3>
			     <div class="asl-user-setting-body">
			        <ul class="nav nav-pills justify-content-center">
			           <li class="active rounded"><a data-toggle="pill" href="#sl-gen-tab"><?php echo __('General','asl_admin') ?></a></li>
			           <li class="rounded"><a data-toggle="pill" href="#maps-tab"><?php echo __('Maps','asl_admin') ?></a></li>
			           <li class="rounded"><a data-toggle="pill" href="#sl-ui-tab"><?php echo __('UI Settings','asl_admin') ?></a></li>
			           <li class="rounded"><a data-toggle="pill" href="#sl-detail"><?php echo __('Detail Page','asl_admin') ?></a></li>
			           <li class="rounded"><a class="disabled" data-toggle="pill" href="#sl-register"><?php echo __('Register Form','asl_admin') ?></a></li>
			        </ul>
			        <form id="frm-usersetting">
			        	<div class="tab-content">
		              <div id="sl-gen-tab" class="tab-pane in active">
		              	<div class="row mt-2">
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
				                <div class="form-group d-lg-flex d-md-block">
				                  <label class="custom-control-label" for="asl-api_key"><?php echo __('Google API KEY','asl_admin') ?></label>
				                  <div class="form-group-inner">
				                  <input  type="text" class="form-control" name="data[api_key]" id="asl-api_key" placeholder="<?php echo __('API KEY','asl_admin') ?>">
				                  <p class="help-p"><a target="_blank" class="text-muted" href="https://agilestorelocator.com/blog/enable-google-maps-api-agile-store-locator-plugin/"><?php echo __('How to generate Google API?','asl_admin') ?></a></p>
				                  </div>
				                </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-default_lat"><?php echo __('Default Coordinates','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <div class="input-group">
			                      	<input  type="number" class="form-control validate[required]" name="data[default_lat]" id="asl-default_lat" placeholder="<?php echo __('Latitude','asl_admin') ?>">
			                      	<input  type="number" class="form-control validate[required]" name="data[default_lng]"  id="asl-default_lng" placeholder="<?php echo __('Longitude','asl_admin') ?>">
			                      </div>
			                      <p class="help-p"><a target="_blank" class="text-muted" href="https://www.google.com/maps"><?php echo __('Get your coordinates by right click on the map','asl_admin') ?></a></p>
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="search_type"><?php echo __('Search Type','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <select  name="data[search_type]" id="asl-search_type" class="custom-select">
			                        <option value="0"><?php echo __('Search By Address (Google)','asl_admin') ?></option>
			                        <option value="1" disabled="disabled"><?php echo __('Search By Store Name (Database)','asl_admin') ?></option>
			                        <option value="2" disabled="disabled"><?php echo __('Search By Stores Cities, States (Database)','asl_admin') ?></option>
			                        <option value="3"><?php echo __('Geocoding on Enter key (Google Geocoding API)','asl_admin') ?></option>
			                      </select>
			                      <p class="help-p"><?php echo __('Select the Address search type, it can be database search or Google Place API/Geocoding.','asl_admin') ?></p>
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-direction_redirect"><?php echo __('Store Direction','asl_admin') ?></label>
			                    <div class="form-group-inner">
		                        <select  name="data[direction_redirect]" id="asl-direction_redirect" class="custom-select">
		                          <option value="0"><?php echo __('Show Direction in the Panel via Google Direction API','asl_admin') ?></option>
		                          <option value="1"><?php echo __('Open in Google Maps (Mobile)','asl_admin') ?></option>
		                          <option value="2"><?php echo __('Open in Google Maps (All Devices)','asl_admin') ?></option>
		                        </select>
			                      <p class="help-p"><?php echo __('Select how you want the direction to work.','asl_admin') ?></p>
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="prompt_location"><?php echo __('Geolocation','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <select  id="asl-prompt_location" name="data[prompt_location]" class="custom-select">
			                        <option value="0"><?php echo __('Disable','asl_admin') ?></option>
			                        <option value="1"><?php echo __('Geo-location Modal','asl_admin') ?></option>
			                        <option value="2"><?php echo __('Type your Location Modal','asl_admin') ?></option>
			                        <option value="3"><?php echo __('Geolocation On Load','asl_admin') ?></option>
			                      </select>
			                      <p class="help-p"><a target="_blank" class="text-muted" href="https://agilestorelocator.com/wiki/prompt-geo-location-dialog/"><?php echo __('How Geolocation works?','asl_admin') ?></a></p>
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="sort_by"><?php echo __('Sort List','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <select  id="asl-sort_by" name="data[sort_by]" class="custom-select">
			                        <option value=""><?php echo __('Default (Distance)','asl_admin') ?></option>
			                        <option value="id"><?php echo __('Store ID','asl_admin') ?></option>
			                        <option value="title"><?php echo __('Title','asl_admin') ?></option>
			                        <option value="city"><?php echo __('City','asl_admin') ?></option>
			                        <option value="state"><?php echo __('State','asl_admin') ?></option>
			                        <option value="cat"><?php echo __('Categories','asl_admin') ?></option>
			                      </select>
			                      <p class="help-p"><a target="_blank" class="text-muted" href="https://agilestorelocator.com/wiki/sort-store-attribute/"><?php echo __('Sort your listing based on fields, default is Distance','asl_admin') ?></a></p>
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="stores_limit"><?php echo __('Stores Limit','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <input  type="number" class="form-control validate[integer]" name="data[stores_limit]" id="asl-stores_limit">
			                      <p class="help-p"><a target="_blank" class="text-muted" href="https://agilestorelocator.com/wiki/show-limited-stores-sort-by-distance/"><?php echo __('To show a limited number of stores.','asl_admin') ?></a></p>
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-distance_control"><?php echo __('Distance Control','asl_admin') ?></label>
			                    <div>
                             	<div class="asl-wc-radio">
                                <label for="asl-distance_control-"><input type="radio" name="data[distance_control]" value=""  id="asl-distance_control-"><?php echo __('None','asl_admin') ?></label>
                             	</div>
                             	<div class="asl-wc-radio">
                                <label for="asl-distance_control-2"><input type="radio" name="data[distance_control]" value="2" id="asl-distance_control-2"><?php echo __('Boundary Box','asl_admin') ?></label>
                             	</div>
                             	<p class="help-p"><a class="text-muted" target="_blank" href="https://agilestorelocator.com/wiki/set-radius-value-distance-range-slider/"><?php echo __('Select the distance filter control','asl_admin') ?></a></p>
                          </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-distance_unit"><?php echo __('Distance Unit','asl_admin') ?></label>
			                    <div>
                             <div class="asl-wc-radio">
                                <label for="asl-distance_unit-KM"><input type="radio" name="data[distance_unit]" value="KM"  id="asl-distance_unit-KM"><?php echo __('KM','asl_admin') ?></label>
                             </div>
                             <div class="asl-wc-radio">
                                <label for="asl-distance_unit-Miles"><input type="radio" name="data[distance_unit]" value="Miles" id="asl-distance_unit-Miles"><?php echo __('Miles','asl_admin') ?></label>
                             </div>
                             <p class="help-p"><?php echo __('Select the distance unit to use on Store Locator','asl_admin') ?></p>
                          </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="geo_button"><?php echo __('Search Button Type','asl_admin') ?></label>
			                    <div>
                             	<div class="asl-wc-radio">
                                <label for="asl-geo_button-0"><input type="radio" name="data[geo_button]" value="0"  id="asl-geo_button-0"><?php echo __('Search Location','asl_admin') ?></label>
                             	</div>
                             	<div class="asl-wc-radio">
                                <label for="asl-geo_button-1"><input type="radio" name="data[geo_button]" value="1" id="asl-geo_button-1"><?php echo __('Geo-Location','asl_admin') ?></label>
                             	</div>
                             	<p class="help-p"><?php echo __('Select either to display the geolocation button or the search button next to address search','asl_admin') ?></p>
                          </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="load_all"><?php echo __('Marker Load','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <select  name="data[load_all]" id="asl-load_all" class="custom-select">
			                        <option value="1"><?php echo __('Load All','asl_admin') ?></option>
			                        <option value="0" disabled="disabled"><?php echo __('Load on Bound','asl_admin') ?></option>
			                        <option value="2" disabled="disabled"><?php echo __('Load via Button','asl_admin') ?></option>
			                      </select>
			                      <p class="help-p"><?php echo __('Use Load on Bound in case of 1K+ markers','asl_admin') ?></p>
			                    </div>
			                  </div>
			                </div>
			                
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-country_restrict"><?php echo __('Restrict Search','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <input  type="text" class="form-control validate[minSize[2]]" name="data[country_restrict]" id="asl-country_restrict" placeholder="Example: US">
			                      <p class="help-p"><?php echo __('Enter 2 alphabet country, for multiple countries comma separated','asl_admin') ?> <a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2" target="_blank" rel="nofollow">Code</a></p>
			                    </div>
			                  </div>
			                </div>

			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-first_load"><?php echo __('List Load','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                    <select  name="data[first_load]" id="asl-first_load" class="custom-select">
			                      <option value="1"><?php echo __('Default','asl_admin') ?></option>
			                      <option value="2" disabled="disabled"><?php echo __('No List and Markers at Load','asl_admin') ?></option>
			                      <option value="3" disabled="disabled"><?php echo __('No List with Full Map at Load','asl_admin') ?></option>
			                      <option value="4"><?php echo __('No List at Load','asl_admin') ?></option>
			                      <option value="5" disabled="disabled"><?php echo __('No List & Map at Load','asl_admin') ?></option>
			                    </select>
			                    <p class="help-p"><?php echo __('Show no stores on the page load','asl_admin') ?></p>
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
	                      <div class="form-group d-lg-flex d-md-block">
	                          <label class="custom-control-label" for="asl-sort_by_bound"><?php echo __('Sort By Bound','asl_admin') ?></label>
	                        	<div class="form-group-inner">
	                          	<label class="switch" for="asl-sort_by_bound"><input type="checkbox" value="1" class="custom-control-input" name="data[sort_by_bound]" id="asl-sort_by_bound"><span class="slider round"></span></label>
	                          	<p class="help-p"><?php echo __('Refresh list to show nearest stores in the view.','asl_admin') ?></p>
	                        	</div>
	                      </div>
                      </div>
                       <div class="col-md-6 col-sm-6 col-12 mb-5">
	                      <div class="form-group d-lg-flex d-md-block">
	                          <label class="custom-control-label" for="asl-target_blank"><?php echo __('Open Link New Tab','asl_admin') ?></label>
	                        	<div class="form-group-inner">
	                          	<label class="switch" for="asl-target_blank"><input type="checkbox" value="1" class="custom-control-input" name="data[target_blank]" id="asl-target_blank"><span class="slider round"></span></label>
	                        	</div>
	                      </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-12 mb-5">
	                      <div class="form-group d-lg-flex d-md-block">
	                          <label class="custom-control-label" for="asl-geo_marker"><?php echo __('Geo-Location Marker','asl_admin') ?></label>
	                        	<div class="form-group-inner">
	                          	<label class="switch" for="asl-geo_marker"><input type="checkbox" value="1" class="custom-control-input" name="data[geo_marker]" id="asl-geo_marker"><span class="slider round"></span></label>
	                        		<p class="help-p"><?php echo __('To remove the user own location marker','asl_admin') ?></p>
	                        	</div>
	                      </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-12 mb-5">
	                      <div class="form-group d-lg-flex d-md-block">
	                          <label class="custom-control-label" for="asl-sort_random"><?php echo __('Sort Random','asl_admin') ?></label>
		                        <div class="form-group-inner">
		                          <label class="switch" for="asl-sort_random"><input type="checkbox" value="1" class="custom-control-input" name="data[sort_random]" id="asl-sort_random"><span class="slider round"></span></label>
	                        		<p class="help-p"><?php echo __('Sort stores list randomly on the load of the Store Locator (Enabling it will disable Default Location Marker)','asl_admin') ?></p>
		                        </div>
	                      </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-12 mb-5">
	                      <div class="form-group d-lg-flex d-md-block">
	                          <label class="custom-control-label" for="asl-gdpr"><?php echo __('GDPR','asl_admin') ?></label>
		                        <div class="form-group-inner">
		                          <label class="switch" for="asl-gdpr"><input type="checkbox" value="1" class="custom-control-input" name="data[gdpr]" id="asl-gdpr"><span class="slider round"></span></label>
	                        		<p class="help-p">(<?php echo __('Display a GDPR consent message to accept the law','asl_admin') ?>)</p>
		                        </div>
	                      </div>
                      </div>
                      <div class="col-12 sl-pro-ctrls">
                      	<p class="pro-label"><?php echo __('Pro Version Features','asl_admin') ?></p>
                      	<hr>
                      	<p class="text-center"><a class="pro-opt-switch"><?php echo __('View Options','asl_admin') ?></a><a class="pro-opt-switch"><?php echo __('Hide Options','asl_admin') ?></a></p>
	                      <div class="row sl-pro-opts">
		                      <div class="col-md-6 col-sm-6 col-12 mb-5">
					                  <div class="form-group d-lg-flex d-md-block">
					                    <label class="custom-control-label" for="asl-server_key"><?php echo __('Google Server API Key','asl_admin') ?></label>
					                    <div class="form-group-inner">
					                    <input  type="text" disabled="disabled" class="form-control" name="data[server_key]" id="asl-server_key" placeholder="<?php echo __('Google API KEY (Geocoding)','asl_admin') ?>">
					                    <p class="help-p"><a target="_blank" class="text-muted" href="https://agilestorelocator.com/wiki/what-is-google-server-key/"><?php echo __('What is Google Server Key?','asl_admin') ?></a> | <a target="_blank" class="text-muted" href="https://agilestorelocator.com/wiki/google-server-api-key-troubleshooting/"><?php echo __('Troubleshoot','asl_admin') ?></a></p>
					                    </div>
					                  </div>
					                </div>
					                <div class="col-md-6 col-sm-6 col-12 mb-5">
					                  <div class="form-group d-lg-flex d-md-block">
					                    <label class="custom-control-label" for="search_destin"><?php echo __('Search Result','asl_admin') ?></label>
					                    <div class="form-group-inner">
					                      <select  id="asl-search_destin" name="data[search_destin]" class="custom-select">
					                        <option value="0"><?php echo __('Default','asl_admin') ?></option>
					                        <option value="1"><?php echo __('Show My Nearest Location From Search','asl_admin') ?></option>
					                      </select>
					                      <p class="help-p"><?php echo __('Search will pinpoint the nearest available store instead of actual location','asl_admin') ?></p>
					                    </div>
					                  </div>
					                </div>
					                <div class="col-md-6 col-sm-6 col-12 mb-5">
					                  <div class="form-group d-lg-flex d-md-block">
					                    <label class="custom-control-label" class="custom-control-label" for="asl-google_search_type"><?php echo __('Search Field','asl_admin') ?></label>
					                    <div class="form-group-inner">
					                      <select  name="data[google_search_type]" id="asl-google_search_type" class="custom-select">
					                        <option value=""><?php echo __('All','asl_admin') ?></option>
					                        <option value="cities"><?php echo __('Cities (Cities)','asl_admin') ?></option>
					                        <option value="regions"><?php echo __('Regions (Locality, City, State)','asl_admin') ?></option>
					                        <option value="geocode"><?php echo __('Geocode','asl_admin') ?></option>
					                        <option value="address"><?php echo __('Address','asl_admin') ?></option>
					                      </select>
					                      <p class="help-p"><?php echo __('To restrict the Google Place API search scope','asl_admin') ?></p>
					                    </div>
					                  </div>
					                </div>
					                <div class="col-md-6 col-sm-6 col-12 mb-5">
					                  <div class="form-group d-lg-flex d-md-block">
					                    <label class="custom-control-label" for="asl-dropdown_range"><?php echo __('Distance Options','asl_admin') ?></label>
					                    <div class="form-group-inner">
					                    <input type="text" disabled="disabled" class="form-control" name="data[dropdown_range]" id="asl-dropdown_range" placeholder="Example: 10,20,30">
					                    <p class="help-p"><?php echo __('Enter the search dropdown options values, comma separated. Add default value with * symbol.','asl_admin') ?></p>
					                    </div>
					                  </div>
					                </div>
		                      <div class="col-md-6 col-sm-6 col-12 mb-5">
					                  <div class="form-group d-lg-flex d-md-block">
					                    <label class="custom-control-label" for="single_cat_select"><?php echo __('Category Select','asl_admin') ?></label>
					                    <div>
		                             <div class="asl-wc-radio">
		                                <label for="asl-single_cat_select-0"><input disabled="disabled" type="radio" name="data[single_cat_select]" value="0"  id="asl-single_cat_select-0"><?php echo __('Multiple Category Selection','asl_admin') ?></label>
		                             </div>
		                             <div class="asl-wc-radio">
		                                <label for="asl-single_cat_select-1"><input disabled="disabled" type="radio" name="data[single_cat_select]" value="1" id="asl-single_cat_select-1"><?php echo __('Single Category Selection','asl_admin') ?></label>
		                             </div>
		                             <p class="help-p"><?php echo __('To make the category selection mode','asl_admin') ?></p>
		                          </div>
					                  </div>
					                </div>
					                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                      <div class="form-group d-lg-flex d-md-block">
			                          <label class="custom-control-label" for="asl-advance_filter"><?php echo __('Advance Filter','asl_admin') ?></label>
			                        	<div class="form-group-inner">
			                          	<label class="switch" for="asl-advance_filter"><input disabled="disabled" type="checkbox" value="1" class="custom-control-input" name="data[advance_filter]" id="asl-advance_filter"><span class="slider round"></span></label>
			                          	<p class="help-p"><a href="https://agilestorelocator.com/wiki/enable-disable-advance-features/" target="_blank"><?php echo __('Disabling it will remove all the filters','asl_admin') ?></a></p>
			                        	</div>
			                      </div>
		                      </div>
		                      <div class="col-md-6 col-sm-6 col-12 mb-5">
			                      <div class="form-group d-lg-flex d-md-block">
			                          <label class="custom-control-label" for="asl-time_switch"><?php echo __('Time Switch','asl_admin') ?></label>
			                        	<div class="form-group-inner">
			                          	<label class="switch" for="asl-time_switch"><input disabled="disabled" type="checkbox" value="1" class="custom-control-input" name="data[time_switch]" id="asl-time_switch"><span class="slider round"></span></label>
			                          	<p class="help-p"><?php echo __('Control will show a switch to see opened stores at the current time','asl_admin') ?></p>
			                        	</div>
			                      </div>
		                      </div>
		                      <div class="col-md-6 col-sm-6 col-12 mb-5">
					                  <div class="form-group d-lg-flex d-md-block">
					                    <label class="custom-control-label" for="asl-cat_in_grid"><?php echo __('Reduce Query (Admin)','asl_admin') ?></label>
					                    <div class="form-group-inner">
			                            <label class="switch" for="asl-cat_in_grid"><input disabled="disabled" type="checkbox" value="1" class="custom-control-input" name="data[cat_in_grid]" id="asl-cat_in_grid"><span class="slider round"></span></label>
			                            <p class="help-p"><?php echo __('Show/Hide category in admin listing touce query stress on manage stores.','asl_admin') ?></p>
			                          </div>
					                  </div>
					                </div>
		                      <div class="col-md-6 col-sm-6 col-12 mb-5">
			                      <div class="form-group d-lg-flex d-md-block">
			                          <label class="custom-control-label" for="asl-distance_slider"><?php echo __('Distance Control','asl_admin') ?></label>
				                        <div class="form-group-inner">
				                          <label class="switch" for="asl-distance_slider"><input disabled="disabled" type="checkbox" value="1" class="custom-control-input" name="data[distance_slider]" id="asl-distance_slider"><span class="slider round"></span></label>
				                        </div>
			                      </div>
		                      </div>
		                      <div class="col-md-6 col-sm-6 col-12 mb-5">
			                      <div class="form-group d-lg-flex d-md-block">
			                          <label class="custom-control-label" for="asl-analytics"><?php echo __('Analytics','asl_admin') ?></label>
				                        <div class="form-group-inner">
				                          <label class="switch" for="asl-analytics"><input disabled="disabled" type="checkbox" value="1" class="custom-control-input" name="data[analytics]" id="asl-analytics"><span class="slider round"></span></label>
				                        </div>
			                      </div>
		                      </div>
		                      <div class="col-md-6 col-sm-6 col-12 mb-5">
			                      <div class="form-group d-lg-flex d-md-block">
			                          <label class="custom-control-label" for="asl-radius_circle"><?php echo __('Radius Circle','asl_admin') ?></label>
				                        <div class="form-group-inner">
				                          <label class="switch" for="asl-radius_circle"><input disabled="disabled" type="checkbox" value="1" class="custom-control-input" name="data[radius_circle]" id="asl-radius_circle"><span class="slider round"></span></label>
			                        		<p class="help-p"><?php echo __('Enable the distance radius circle, it only appear with dropdown control. It overrides the search zoom value, as it fit bound to the radius circle','asl_admin') ?></p>
				                        </div>
			                      </div>
		                      </div>
		                      <div class="col-md-6 col-sm-6 col-12 mb-5">
			                      <div class="form-group d-lg-flex d-md-block">
			                        <label class="custom-control-label" for="asl-user_center"><?php echo __('Default Location Center','asl_admin') ?></label>
			                        <div class="form-group-inner">
			                          <label class="switch" for="asl-user_center"><input disabled="disabled" type="checkbox" value="1" class="custom-control-input" name="data[user_center]" id="asl-user_center"><span class="slider round"></span></label>
			                        	<p class="help-p"><?php echo __('Store Locator will consider Default coordinates as the center point','asl_admin') ?></p>
			                        </div>
			                      </div>
		                      </div>
		                      <div class="col-md-6 col-sm-6 col-12 mb-5">
			                      <div class="form-group d-lg-flex d-md-block">
			                          <label class="custom-control-label" for="asl-remove_maps_script"><?php echo __('Remove Other Maps Scripts','asl_admin') ?></label>
				                        <div class="form-group-inner">
				                          <label class="switch" for="asl-remove_maps_script"><input disabled="disabled" type="checkbox" value="1" class="custom-control-input" name="data[remove_maps_script]" id="asl-remove_maps_script"><span class="slider round"></span></label>
				                          <p class="help-p"><?php echo __('Remove other Google Maps scripts in case of malfunctioning','asl_admin') ?></p>
				                        </div>
			                      </div>
		                      </div>
		                      <div class="col-md-6 col-sm-6 col-12 mb-5">
			                      <div class="form-group d-lg-flex d-md-block">
			                          <label class="custom-control-label" for="asl-and_filter"><?php echo __('AND Filter','asl_admin') ?></label>
				                        <div class="form-group-inner">
				                          <label class="switch" for="asl-and_filter"><input disabled="disabled" type="checkbox" value="1" class="custom-control-input" name="data[and_filter]" id="asl-and_filter"><span class="slider round"></span></label>
			                        		<p class="help-p"><?php echo __('To change the category filter logic from OR to AND','asl_admin') ?></p>
				                        </div>
			                      </div>
		                      </div>
		                      <div class="col-md-6 col-sm-6 col-12 mb-5">
			                      <div class="form-group d-lg-flex d-md-block">
			                          <label class="custom-control-label" for="asl-category_marker"><?php echo __('Category Marker','asl_admin') ?></label>
				                        <div class="form-group-inner">
				                          <label class="switch" for="asl-category_marker"><input disabled="disabled" type="checkbox" value="1" class="custom-control-input" name="data[category_marker]" id="asl-category_marker"><span class="slider round"></span></label>
			                        		<p class="help-p"><?php echo __('Manage Markers will be replaced by the Category Icons','asl_admin') ?></p>
				                        </div>
			                      </div>
		                      </div>
		                      <div class="col-md-6 col-sm-6 col-12 mb-5">
			                      <div class="form-group d-lg-flex d-md-block">
			                          <label class="custom-control-label" for="asl-category_bound"><?php echo __('Category Bound','asl_admin') ?></label>
				                        <div class="form-group-inner">
				                          <label class="switch" for="asl-category_bound"><input disabled="disabled" type="checkbox" value="1" class="custom-control-input" name="data[category_bound]" id="asl-category_bound"><span class="slider round"></span></label>
			                        		<p class="help-p"><?php echo __('Fit bound to markers when a category is selected','asl_admin') ?></p>
				                        </div>
			                      </div>
		                      </div>
	                      </div>
                      </div>
			              </div>
		              </div>
		              <div id="maps-tab" class="tab-pane">
		              	<div class="row">
		              		<div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-map_type"><?php echo __('Default Map','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <select  id="asl-map_type" name="data[map_type]" class="custom-select">
			                        <option value="hybrid"><?php echo __('Hybrid','asl_admin') ?></option>
			                        <option value="roadmap"><?php echo __('Road Map','asl_admin') ?></option>
			                        <option value="satellite"><?php echo __('Satellite','asl_admin') ?></option>
			                        <option value="terrain"><?php echo __('Terrain','asl_admin') ?></option>
			                      </select>
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-zoom"><?php echo __('Default Zoom','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <select  id="asl-zoom" name="data[zoom]" class="custom-select">
			                        <?php for($index = 2;$index <= 20;$index++):?>
			                        <option value="<?php echo $index ?>"><?php echo $index ?></option>
			                        <?php endfor; ?>
			                      </select>
			                      <p class="help-p"><?php echo __('Default zoom will not work when Default Location Center is enabled','asl_admin') ?></p>
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-zoom_li"><?php echo __('Clicked Zoom','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <select  id="asl-zoom_li" name="data[zoom_li]" class="custom-select">
			                        <?php for($index = 2;$index <= 20;$index++):?>
			                        <option value="<?php echo $index ?>"><?php echo $index ?></option>
			                        <?php endfor; ?>
			                      </select>
			                      <p class="help-p"><?php echo __('Zoom value when store list item is clicked','asl_admin') ?></p>
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-search_zoom"><?php echo __('Search Zoom','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <select  id="asl-search_zoom" name="data[search_zoom]" class="custom-select">
			                        <?php for($index = 2;$index <= 20;$index++):?>
			                        <option value="<?php echo $index ?>"><?php echo $index ?></option>
			                        <?php endfor; ?>
			                      </select>
			                      <p class="help-p"><?php echo __('Zoom value when a search is performed','asl_admin') ?></p>
			                    </div>
			                  </div>
			                </div>
		              		<div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label"  for="asl-map_region"><?php echo __('Map Region','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <select  id="asl-map_region" name="data[map_region]" class="custom-select">
			                        <option value=""><?php echo __('None','asl_admin') ?></option>
			                        <?php foreach($countries as $country): ?>
			                        <option value="<?php echo $country->code ?>"><?php echo $country->country ?></option>
			                        <?php endforeach ?>
			                      </select>
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-map_language"><?php echo __('Map Language','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <input type="text" class="form-control validate[minSize[2]]" maxlength="2" name="data[map_language]" id="asl-map_language" placeholder="Example: US">
			                      <p class="help-p"><?php echo __('Enter the language code.','asl_admin') ?> <a href="https://agilestorelocator.com/wiki/display-maps-different-language/" target="_blank" rel="nofollow">Get Code</a></p>
			                    </div>
			                  </div>
			                </div>
		              		<div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-cluster"><?php echo __('Cluster','asl_admin') ?></label>
			                    <div class="form-group-inner">
	                          <label class="switch" for="asl-cluster"><input type="checkbox" value="1" class="custom-control-input" name="data[cluster]" id="asl-cluster"><span class="slider round"></span></label>
	                          <p class="help-p"><a href="https://agilestorelocator.com/wiki/store-locator-clusters/" target="_blank" rel="nofollow"><?php echo __('Count of markers will appear as clusters','asl_admin') ?></a></p>
	                        </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
	                      <div class="form-group d-lg-flex d-md-block">
	                          <label class="custom-control-label" for="asl-scroll_wheel"><?php echo __('Mouse Scroll','asl_admin') ?></label>
	                        	<div class="form-group-inner">
	                          	<label class="switch" for="asl-scroll_wheel"><input type="checkbox" value="1" class="custom-control-input" name="data[scroll_wheel]" id="asl-scroll_wheel"><span class="slider round"></span></label>
	                        	</div>
	                      </div>
                      </div>
                    </div>
                    <div class="row">
			          			<div class="col-md-12 form-group mb-3 map_layout">
										    <label class="custom-control-label" for="asl-map_layout"><?php echo __('Map Layouts','asl_admin') ?></label>
										    <div class="row">
										    	<div class="col-md-6 a-radio-select">
											      <input type="radio" id="asl-map_layout-0" value="0" name="data[map_layout]"><label for="asl-map_layout-0"><span class="actv"></span><img src="<?php echo ASL_URL_PATH ?>admin/images/map/25-blue-water/25-blue-water.png" /></label>
											      <input type="radio" id="asl-map_layout-1" value="1" name="data[map_layout]"><label for="asl-map_layout-1"><span class="actv"></span><img src="<?php echo ASL_URL_PATH ?>admin/images/map/Flat Map/53-flat-map.png" /></label>
											      <input type="radio" id="asl-map_layout-2" value="2" name="data[map_layout]"><label for="asl-map_layout-2"><span class="actv"></span><img src="<?php echo ASL_URL_PATH ?>admin/images/map/Icy Blue/7-icy-blue.png" /></label>
											      <input type="radio" id="asl-map_layout-3" value="3" name="data[map_layout]"><label for="asl-map_layout-3"><span class="actv"></span><img src="<?php echo ASL_URL_PATH ?>admin/images/map/Pale Dawn/1-pale-dawn.png" /></label>
											      <input type="radio" id="asl-map_layout-4" value="4" name="data[map_layout]"><label for="asl-map_layout-4"><span class="actv"></span><img src="<?php echo ASL_URL_PATH ?>admin/images/map/cladme/6618-cladme.png" /></label>
											      <input type="radio" id="asl-map_layout-5" value="5" name="data[map_layout]"><label for="asl-map_layout-5"><span class="actv"></span><img src="<?php echo ASL_URL_PATH ?>admin/images/map/light monochrome/29-light-monochrome.png" /></label>
											      <input type="radio" id="asl-map_layout-6" value="6" name="data[map_layout]"><label for="asl-map_layout-6"><span class="actv"></span><img src="<?php echo ASL_URL_PATH ?>admin/images/map/mostly grayscale/4183-mostly-grayscale.png" /></label>
											      <input type="radio" id="asl-map_layout-7" value="7" name="data[map_layout]"><label for="asl-map_layout-7"><span class="actv"></span><img src="<?php echo ASL_URL_PATH ?>admin/images/map/turquoise water/8-turquoise-water.png" /></label>
											      <input type="radio" id="asl-map_layout-8" value="8" name="data[map_layout]"><label for="asl-map_layout-8"><span class="actv"></span><img src="<?php echo ASL_URL_PATH ?>admin/images/map/unsaturated browns/70-unsaturated-browns.png" /></label>
											      <input type="radio" id="asl-map_layout-9" value="9" name="data[map_layout]"><label for="asl-map_layout-9"><span class="actv"></span><span class="ml-custom"><b><?php echo __('Custom','asl_admin') ?></b></span></label>
											    </div>
											    <div class="col-md-6 col-sm-6 col-12 mb-5">
					                  <div class="form-group d-lg-flex d-md-block">
					                    <label class="custom-control-label" for="asl-map_layout_custom"><?php echo __('Map Custom','asl_admin') ?></label>
					                    <div class="form-group-inner">
					                      <textarea id="asl-map_layout_custom"  rows="6"  placeholder="<?php echo __('Google Style','asl_admin') ?>"  class="input-medium form-control"><?php echo $custom_map_style ?></textarea>
					                    </div>
					                  </div>
					                </div>
										    </div>
										  </div>
			          		</div>
		              </div>
		              <div id="sl-ui-tab" class="tab-pane">
		              	<div class="row mt-2">
		              		<div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-head_title"><?php echo __('Header Title','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <input  type="text" class="form-control validate[required]" name="data[head_title]" id="asl-head_title" placeholder="<?php echo __('Head title','asl_admin') ?>">
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-category_title"><?php echo __('Category Title','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <input  type="text" class="form-control validate[required]" name="data[category_title]" id="asl-category_title" placeholder="<?php echo __('Category title','asl_admin') ?>">
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-no_item_text"><?php echo __('No Item Text','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <input  type="text" class="form-control validate[required]" name="data[no_item_text]" id="asl-no_item_text" placeholder="<?php echo __('No Item Text','asl_admin') ?>">
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-map_top"><?php echo __('Map & List Order','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                    <select  name="data[map_top]" id="asl-map_top" class="custom-select">
			                      <option value="0"><?php echo __('List Top, Map Bottom','asl_admin') ?></option>
			                      <option value="2"><?php echo __('Map Top, List Bottom','asl_admin') ?></option>
			                    </select>
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-additional_info"><?php echo __('Description','asl_admin') ?></label>
			                    <div>
			                    	<div class="asl-wc-radio">
															<label for="asl-additional_info-0"><input type="radio" name="data[additional_info]" value="0"  id="asl-additional_info-0"><?php echo __('Hide','asl_admin') ?></label>
														</div>
														<div class="asl-wc-radio">
															<label for="asl-additional_info-1"><input type="radio" name="data[additional_info]" value="1"  id="asl-additional_info-1"><?php echo __('In Store List','asl_admin') ?></label>
														</div>
														<div class="asl-wc-radio">
															<label for="asl-additional_info-2"><input type="radio" name="data[additional_info]" value="2" id="asl-additional_info-2"><?php echo __('In Modal via Link','asl_admin') ?></label>
														</div>
														<p class="help-p"><?php echo __('To show the description text either in listing or modal.','asl_admin') ?></p>
                          </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-full_height"><?php echo __('Full Height','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <select  name="data[full_height]" id="asl-full_height" class="custom-select">
			                        <option value=""><?php echo __('None','asl_admin') ?></option>
			                        <option value="full-height"><?php echo __('Full Height (Not Fixed)','asl_admin') ?></option>
			                        <option value="full-height asl-fixed"><?php echo __('Full Height (Fixed)','asl_admin') ?></option>
			                      </select>
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
	                      <div class="form-group d-lg-flex d-md-block">
	                          <label class="custom-control-label" for="asl-full_width"><?php echo __('Full Width','asl_admin') ?></label>
		                        <div class="form-group-inner">
		                          <label class="switch" for="asl-full_width"><input type="checkbox" value="1" class="custom-control-input" name="data[full_width]" id="asl-full_width"><span class="slider round"></span></label>
	                        		<p class="help-p"><?php echo __('Make the store locator full width 100% with respect to the parent container','asl_admin') ?></p>
		                        </div>
	                      </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="week_hours"><?php echo __('Hours Format','asl_admin') ?></label>
			                    <div>
														<div class="asl-wc-radio">
															<label for="asl-week_hours-0"><input type="radio" name="data[week_hours]" value="0"  id="asl-week_hours-0"><?php echo __('Today','asl_admin') ?></label>
														</div>
														<div class="asl-wc-radio">
															<label for="asl-week_hours-1"><input type="radio" name="data[week_hours]" value="1" id="asl-week_hours-1"><?php echo __('7 Days','asl_admin') ?></label>
														</div>
														<p class="help-p"><?php echo __('To show only the current day hours or full week','asl_admin') ?></p>
                          </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-time_format"><?php echo __('Time Format','asl_admin') ?></label>
			                    <div>
                             <div class="asl-wc-radio">
                                <label for="asl-time_format-0"><input type="radio" name="data[time_format]" value="0"  id="asl-time_format-0"><?php echo __('12 Hours','asl_admin') ?></label>
                             </div>
                             <div class="asl-wc-radio">
                                <label for="asl-time_format-1"><input type="radio" name="data[time_format]" value="1" id="asl-time_format-1"><?php echo __('24 Hours','asl_admin') ?></label>
                             </div>
                             <p class="help-p"><?php echo __('Select either 12 or 24 hours time format','asl_admin') ?></p>
                          </div>
			                  </div>
			                </div>
                      <div class="col-md-6 col-sm-6 col-12 mb-5">
	                      <div class="form-group d-lg-flex d-md-block">
	                          <label class="custom-control-label" for="asl-show_categories"><?php echo __('Show Categories','asl_admin') ?></label>
	                          <div class="form-group-inner">
	                            <label class="switch" for="asl-show_categories"><input type="checkbox" value="1" class="custom-control-input" name="data[show_categories]" id="asl-show_categories"><span class="slider round"></span></label>
	                          </div>
	                      </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-direction_btn"><?php echo __('Direction Button','asl_admin') ?></label>
			                    <div class="form-group-inner">
	                            <label class="switch" for="asl-direction_btn"><input type="checkbox" value="1" class="custom-control-input" name="data[direction_btn]" id="asl-direction_btn"><span class="slider round"></span></label>
	                            <p class="help-p"><?php echo __('Show/Hide direction button in the listing and infobox.','asl_admin') ?></p>
	                          </div>
			                  </div>
			                </div>
                      <div class="col-md-6 col-sm-6 col-12 mb-5">
	                      <div class="form-group d-lg-flex d-md-block">
	                          <label class="custom-control-label" for="asl-hide_hours"><?php echo __('Hide Hours','asl_admin') ?></label>
	                          <div class="form-group-inner">
	                            <label class="switch" for="asl-hide_hours"><input type="checkbox" value="1" class="custom-control-input" name="data[hide_hours]" id="asl-hide_hours"><span class="slider round"></span></label>
	                          </div>
	                      </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-12 mb-5">
	                      <div class="form-group d-lg-flex d-md-block">
	                          <label class="custom-control-label" for="asl-slug_link"><?php echo __('Website Link','asl_admin') ?></label>
	                          <div class="form-group-inner">
	                            <label class="switch" for="asl-slug_link"><input type="checkbox" value="1" class="custom-control-input" name="data[slug_link]" id="asl-slug_link"><span class="slider round"></span></label>
	                          </div>
	                      </div>
                      </div>
		              		<div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-display_list"><?php echo __('Display List','asl_admin') ?></label>
			                    <div class="form-group-inner">
	                          <label class="switch" for="asl-display_list"><input type="checkbox" value="1" class="custom-control-input" name="data[display_list]" id="asl-display_list"><span class="slider round"></span></label>
	                        </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
	                      <div class="form-group d-lg-flex d-md-block">
	                          <label class="custom-control-label" for="asl-print_btn"><?php echo __('Print Button','asl_admin') ?></label>
		                        <div class="form-group-inner">
		                          <label class="switch" for="asl-print_btn"><input type="checkbox" value="1" class="custom-control-input" name="data[print_btn]" id="asl-print_btn"><span class="slider round"></span></label>
	                        		<p class="help-p"><?php echo __('To show or hide the print button.','asl_admin') ?> | <a target="_blank" href="https://agilestorelocator.com/wiki/custom-print-header-for-store-list/"><?php echo __('Add Print Header','asl_admin') ?></a></p>
		                        </div>
	                      </div>
                      </div>
		              	</div>
		              	<div class="col-12 sl-pro-ctrls">
                      	<p class="pro-label"><?php echo __('Pro Version Features','asl_admin') ?></p>
                      	<hr>
                      	<p class="text-center"><a class="pro-opt-switch"><?php echo __('View Options','asl_admin') ?></a><a class="pro-opt-switch"><?php echo __('Hide Options','asl_admin') ?></a></p>
	                      <div class="row sl-pro-opts">
	                      	<div class="col-12">
	                      		<div class="row mb-4">
						              		<div class="col-md-6 col-sm-6 col-12 mb-5">
					                      <div class="form-group d-lg-flex d-md-block">
					                          <label class="custom-control-label" for="asl-hide_logo"><?php echo __('Hide Logo','asl_admin') ?></label>
					                          <div class="form-group-inner">
					                            <label class="switch" for="asl-hide_logo"><input type="checkbox" value="1" class="custom-control-input" name="data[hide_logo]" id="asl-hide_logo"><span class="slider round"></span></label>
					                          </div>
					                      </div>
				                      </div>
							          			<div class="col-md-4">
							          					<div class="form-group">
							          							<label class="custom-control-label" for="asl-template"><?php echo __('UI Templates','asl_admin') ?></label>
							                        <div class="input-group mb-3">
							                            <div class="input-group-prepend">
							                                <label class="input-group-text" for="asl-template"><?php echo __('Template','asl_admin') ?></label>
							                            </div>
							                            <select id="asl-template" class="custom-select col-md-12">
							                                <option value="0"><?php echo __('Template','asl_admin') ?> 0</option>
							                                <option value="1" disabled="disabled"><?php echo __('Template','asl_admin') ?> 1</option>
							                                <option value="2" disabled="disabled"><?php echo __('Template','asl_admin') ?> 2</option>
							                                <option value="3" disabled="disabled"><?php echo __('Template','asl_admin') ?> 3</option>
							                                <option value="list" disabled="disabled"><?php echo __('Template','asl_admin') ?> List (BETA version)</option>
							                            </select>
							                        </div>
							                    </div>
							                    <div class="form-group layout-section">
							                      <div class="input-group mb-3">
							                          <div class="input-group-prepend">
							                            <label for="asl-layout" class="input-group-text"><?php echo __('Layout','asl_admin') ?></label>
							                          </div>
							                          <select id="asl-layout" class="custom-select">
							                              <option value="0"><?php echo __('List Format','asl_admin') ?></option>
							                              <option value="1" disabled="disabled"><?php echo __('Accordion (States, Cities, Countries)','asl_admin') ?></option>
							                              <option value="2" disabled="disabled"><?php echo __('Accordion (Categories)','asl_admin') ?></option>
							                          </select>
							                      </div>
							                    </div>
							                    <div class="form-group">
							                    	<div class="template-box box_layout_list box_layout_3 box_layout_0 hide">
																	    <div class="form-group mb-3 color_scheme">
																	      <label class="custom-control-label" for="asl-color_scheme"><?php echo __('Color Schema','asl_admin') ?></label>
																	      <div class="a-radio-select">
																	        <?php for($_ind = 0; $_ind <= 9; $_ind++): ?>
																	        <span>
																	          <input disabled="disabled" type="radio" id="asl-color_scheme-<?php echo $_ind ?>" value="<?php echo $_ind ?>" name="data[color_scheme]">
																	          <label class="color-box color-<?php echo $_ind ?>" for="asl-color_scheme-<?php echo $_ind ?>"></label>
																	        </span>
																	        <?php endfor; ?>
																	      </div>
																	    </div>
																	  </div>
																	  <div class="template-box box_layout_2 hide">
																	    <div class="form-group map_layout mb-3 color_scheme layout_2">
																	      <label class="custom-control-label" for="asl-color_scheme"><?php echo __('Color Scheme','asl_admin') ?></label>
																	      <div class="a-radio-select">
																	        <?php 
																	        $tmpl_2_colors = array(
																	          '0' => array('#CC3333', '#542733'),
																	          '1' => array('#008FED', '#2580C3'),
																	          '2' => array('#93628F', '#4A2849'),
																	          '3' => array('#FF9800', '#FFC107'),
																	          '4' => array('#01524B', '#75C9D3'),
																	          '5' => array('#ED468B', '#FDCC29'),
																	          '6' => array('#D55121', '#FB9C6C'),
																	          '7' => array('#D13D94', '#AD0066'),
																	          '8' => array('#99BE3B', '#01735A'),
																	          '9' => array('#3D5B99', '#EFF1F6')
																	        );
																	        foreach($tmpl_2_colors as $_ct => $ctv):
																	        ?>
																	        <span>
																	          <input disabled="disabled" type="radio" id="asl-color_scheme_2-<?php echo $_ct ?>" value="<?php echo $_ct ?>" name="data[color_scheme_2]">
																	          <label class="color-box color-<?php echo $_ct ?>" for="asl-color_scheme_2-<?php echo $_ct ?>" style="background-color:<?php echo $ctv[0] ?>">
																	          	<i class="actv"></i>
																	            <span class="co_1"></span>
																	          </label>
																	        </span>
																	      <?php endforeach; ?>
																	      </div>
																	    </div>
																	  </div>
																	  <p class="help-p"><?php echo __('Colors Missing? Create your own color using the ','asl_admin') ?><a target="_blank" href="https://agilestorelocator.com/store-locator-color-maker/"><?php echo __('Color Maker','asl_admin') ?></a></p>
							                    </div>
							                </div>
							                <div class="col-md-4 justify-content-md-center text-center">
							                  <figure class="figure">
							                    <img  id="asl-tmpl-img" src="<?php echo ASL_URL_PATH ?>admin/images/asl-tmpl-0-0.png" alt="Thumbnail" class="figure-img img-fluid rounded">
							                    <figcaption class="figure-caption text-center"><?php echo __('Selected Store Locator','asl_admin') ?></figcaption>
							                  </figure>
							                </div>
			          						</div>
							          		<div class="row">
							          			<div class="col-md-12 form-group mb-3 infobox_layout">
							          				<label class="custom-control-label" for="asl-infobox_layout"><?php echo __('Infobox Layout','asl_admin') ?></label>
														    <div class="a-radio-select">
														      <input disabled="disabled" type="radio" id="asl-infobox_layout-0" value="0" name="data[infobox_layout]"><label for="asl-infobox_layout-0"><img src="<?php echo ASL_URL_PATH ?>/admin/images/infobox_1.png" /></label>
														      <input disabled="disabled" type="radio" id="asl-infobox_layout-2" value="2" name="data[infobox_layout]"><label for="asl-infobox_layout-2"><img src="<?php echo ASL_URL_PATH ?>/admin/images/infobox_2.png" /></label>
														      <input disabled="disabled" type="radio" id="asl-infobox_layout-1" value="1" name="data[infobox_layout]"><label for="asl-infobox_layout-1"><img src="<?php echo ASL_URL_PATH ?>/admin/images/infobox_3.png" /></label>
														    </div>
														  </div>
							          		</div>
	                      	</div>
	                      </div>
	                  </div>
		              </div>
		              <div id="sl-detail" class="tab-pane">
		              	<div class="row mt-2">
		              		<div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-link_type"><?php echo __('Website Link Type','asl_admin') ?></label>
			                    <div>
                             	<div class="asl-wc-radio">
                                <label for="asl-link_type-0"><input type="radio" name="data[link_type]" value="0" id="asl-link_type-0"><?php echo __('Website Field','asl_admin') ?></label>
                             	</div>
                             	<div class="asl-wc-radio">
                                <label for="asl-link_type-1"><input type="radio" name="data[link_type]" value="1" id="asl-link_type-1"><?php echo __('Page Slug','asl_admin') ?></label>
                             	</div>
                             	<p class="help-p"><?php echo __('Select the URL type of website link, page slug will only work when page slug is provided','asl_admin') ?></p>
                          </div>
			                  </div>
			                </div>
			                <div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-store_schema"><?php echo __('Store JSON-LD','asl_admin') ?></label>
			                    <div class="form-group-inner">
	                          <label class="switch" for="asl-store_schema"><input type="checkbox" value="1" class="custom-control-input" name="data[store_schema]" id="asl-store_schema"><span class="slider round"></span></label>
	                          <p class="help-p"><?php echo __('JSON schema data for Google SEO','asl_admin') ?></p>
	                        </div>
			                  </div>
			                </div>
		              		<div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-rewrite_slug"><?php echo __('Store Page Slug','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <div class="input-group">
			                      	<input  type="text" class="form-control" name="data[rewrite_slug]" id="asl-rewrite_slug" placeholder="<?php echo __('stores','asl_admin') ?>">
			                      	<input  type="number" class="form-control" name="data[rewrite_id]"  id="asl-rewrite_id" placeholder="<?php echo __('156','asl_admin') ?>">
			                      </div>
			                      <p class="help-p">
			                      	<?php echo __('1- Provide the page relative URL and the WordPress Page id','asl_admin') ?><br>
															<?php echo __('2- Add [ASL_STORE] on the same page','asl_admin') ?><br>
															3- <a href="/wp-admin/options-permalink.php"><?php echo __('"Save Changes" Permalink','asl_admin') ?></a>
			                      </p>
			                    </div>
			                  </div>
			                </div>
		              	</div>
		              </div>
		              <div id="sl-register" class="tab-pane">
		              	<div class="row mt-2">
		              		<div class="col-md-6 col-sm-6 col-12 mb-5">
			                  <div class="form-group d-lg-flex d-md-block">
			                    <label class="custom-control-label" for="asl-notify_email"><?php echo __('Notification Email','asl_admin') ?></label>
			                    <div class="form-group-inner">
			                      <input disabled="disabled"  type="text" class="form-control" name="data[notify_email]" id="asl-notify_email" placeholder="<?php echo __('Email address','asl_admin') ?>">
			                      <p class="help-p"><?php echo __('Email address to recieve the email notification for stores registered through frontend form.','asl_admin') ?></p>
			                    </div>
			                  </div>
			                </div>
		              		<div class="col-md-6 col-sm-6 col-12 mb-5">
	                      <div class="form-group d-lg-flex d-md-block">
	                          <label class="custom-control-label" for="asl-admin_notify"><?php echo __('Notification Status','asl_admin') ?></label>
		                        <div class="form-group-inner">
		                          <label class="switch" for="asl-admin_notify"><input disabled="disabled" type="checkbox" value="1" class="custom-control-input" name="data[admin_notify]" id="asl-admin_notify"><span class="slider round"></span></label>
	                        		<p class="help-p"><?php echo __('Send email alert for the newly registered store or cronjobs','asl_admin') ?></p>
		                        </div>
	                      </div>
                      </div>
		              	</div>
		              </div>
			          </div>
	          		<div class="row">
	          			<div class="col-md-12 mt-3">
	          				<button type="button" class="btn btn-primary float-right" data-loading-text="<?php echo __('Saving...','asl_admin') ?>" data-completed-text="Settings Updated" id="btn-asl-user_setting"><?php echo __('Save Settings','asl_admin') ?></button>
	          			</div>
	          		</div>
          	</form>
			     </div>
			  </div>
			</div>
    </div>
		<div class="row asl-inner-cont">
      <div class="col-md-12">
      	<div class="card p-0 mb-4">
					<h3 class="card-title"><?php echo __('Manage Custom Fields','asl_admin') ?></h3>
	          <div class="card-body">
	            	<div class="row">
	            		<div class="col-md-12">
	            			<p><?php echo __('Additional fields for the store can be created through this section, new fields will appear in the store form and via CSV import.','asl_admin') ?> <?php echo __('To show the additional fields on the template, please add the fields in the template as in this <a target="_blank" href="https://www.youtube.com/watch?v=WpPUMxlNX4M">Video Guide</a>.','asl_admin') ?></p>
										<p class="alert alert-info" role="alert"><?php echo __(' <b>Control Name</b> must be small-case and without spacing, please use underscore sign (_) as the space separator, example: <b>facebook_url</b></p>','asl_admin') ?> </p>
	            			<form id="frm-asl-custom-fields">
											<div class="table-responsive">
					            	<table class="table table-bordered table-stripped asl-attr-manage">
					            		<thead>
					            			<tr>
					            				<th><?php echo __('Label','asl_admin') ?></th>
					            				<th><?php echo __('Control Name','asl_admin') ?></th>
					            				<th><?php echo __('Action','asl_admin') ?></th>
					            			</tr>
					            		</thead>
												  <tbody>
												  	<?php 
												  	foreach($fields as $field): 

												  		$field_name  = strip_tags($field['name']);
                      				$field_label = strip_tags($field['label']);
												  		?>
															<tr>
		                            <td colspan="1"><div class="form-group"><input value="<?php echo $field_label; ?>" type="text" class="asl-attr-label form-control validate[required,funcCall[ASLValidateLabel]]"></div></td>
		                            <td colspan="1"><div class="form-group"><input value="<?php echo $field_name; ?>" type="text" class="asl-attr-name form-control validate[required,funcCall[ASLValidateName]]"></div></td>
		                            <td colspan="1">
		                              <span class="add-k-delete glyp-trash">
		                                <svg width="16" height="16"><use xlink:href="#i-trash"></use></svg>
		                              </span>
		                            </td>
		                          </tr>
												  	<?php endforeach; ?>
												  </tbody>
												</table>
											</div>
									</form>
									</div>
	            	</div>
								
								<div class="row">
	          			<div class="col-md-12">
	          				<button type="button" class="btn btn-dark mrg-r-10 mt-3 float-left" id="btn-asl-add-field"><i><svg width="13" height="13"><use xlink:href="#i-plus"></use></svg></i><?php echo __('New Field','asl_admin') ?></button>
	          				<button type="button" class="btn btn-primary mt-3 float-right" data-loading-text="<?php echo __('Saving...','asl_admin') ?>" data-completed-text="Fields Updated" id="btn-asl-save-schema"><?php echo __('Save Fields','asl_admin') ?></button>
	          			</div>
          			</div>
          		
	        </div>
	      </div>
    	</div>      
      <div class="row asl-setting-cont">
	      <div class="col-md-12">
	        <div class="asl-seting-faq p-0 mb-4 mt-0">
	           <h3 class="card-title"><?php echo __('FAQ & Help','asl_wc') ?></h3>
	           <div class="asl-seting-body">
	              <div class="alert border-0 alert-primary d-flex py-3 mb-4" role="alert">
	                 <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
	                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
	                 </svg>
	                 <p class="m-0"><?php echo __('Create a support ticket by emailing us at ','asl_wc') ?> <a target="_blank" href="mailto:support@agilelogix.com" class="text-decoration-underline">support@agilelogix.com</a>, <?php echo __('we will get back to you as soon as possible, please include ("Store Locator" in the Subject) to avoid the spam list.','asl_wc') ?></p>
	              </div>
	              <!-- Accordian -->
	              <div class="faqs-accordion" id="accordionfaqs">
	              	<?php foreach ($faq_basic as $key => $faq): ?>
	                 <div class="cards p-0">
	                    <div class="card-header py-3 px-2">
	                       <h2 class="mb-0 d-flex align-items-center">
	                          <span>0<?php echo $key + 1?></span>
	                          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $key ?>" aria-expanded="true" aria-controls="collapseOne">
	                          <?php echo $faq['q'] ?>
	                          </button>
	                       </h2>
	                    </div>
	                    <div id="collapse-<?php echo $key ?>" class="collapse" aria-labelledby="store-locator" data-parent="#accordionExample">
	                       <div class="card-body">
	                          <p><?php echo $faq['ans'] ?></p>
	                       </div>
	                    </div>
	                 </div>
	                <?php endforeach; ?>
	              </div>
	              <!-- Accordian -->
	              <!-- Videos Slider -->
	              <div class="asl-video-sec">
	                 <div class="top-title mt-5 mb-3 d-flex align-items-center justify-content-between">
	                    <b>FAQ Videos</b>
	                    <a target="_blank" href="https://www.youtube.com/channel/UCtr44_UG4DoxcEAhzWepYJw/videos" class="d-flex align-items-center">See All <span class="dashicons dashicons-arrow-right-alt"></span></a>
	                 </div>
	                 <div class="row">
	                    <div class="col-md-6">
	                       <iframe height="315" src="https://www.youtube.com/embed/CC0WMJcGpFM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	                    </div>
	                    <div class="col-md-6">
	                       <iframe height="315" src="https://www.youtube.com/embed/WpPUMxlNX4M" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	                    </div>
	                 </div>
	              </div>
	              <!-- Videos Slider -->
	              <!-- FAQ'S Links -->
	              <div class="asl-faq-link mt-5">
	                 <div class="top-title text-center">
	                    <b>FAQ Links</b>
	                 </div>
	                 <div class="row faq-slider">
	                 		<?php foreach ($faq_links as $key => $faq): ?>
	                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
	                       <a target="_blank" class="asl-faq-inner-box card" href="<?php echo $faq['link'] ?>">
	                          <div class="row align-items-center">
	                             <div class="col-9">
	                                <span class="link-title"><?php echo $faq['title'] ?></span>
	                             </div>
	                             <div class="col-3">
	                                <span class="dashicons dashicons-admin-links"></span>
	                             </div>
	                          </div>
	                       </a>
	                    </div>
	                    <?php endforeach; ?>
	                 </div>
	              </div>
	              <!-- FAQ'S Links -->
	           </div>
	        </div>
	     	</div>
     	</div>
    </div>
    <div class="col-12 asl-pro-features">
      	<div class="card p-0 mb-4">
					<h3 class="card-title"><?php echo __('Pro Version Features','asl_admin') ?></h3>
          <div class="card-body">
						<p class="alert alert-success">You can upgrade to the pro version any time for these extra features, that are available in the pro version, upgrading to the pro version is very simple, and can be done in a few minutes, without re-uploading any data or re-setting the existing configuration.</p>
						<div class="row">
							<div class="col-md-12 mb-2 text-center">
								<a target="_blank" href="https://codecanyon.net/item/agile-store-locator-google-maps-for-wordpress/16973546" class="btn btn-xl btn-success">Upgrade Now (Lifetime License)</a>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<a target="_blank" href="https://agilestorelocator.com/wp-content/plugins/agile-store-locator/public/import/demo-import.csv"><img src="<?php echo ASL_URL_PATH ?>admin/images/pro/pro-0.png"></a>
							</div>
							<div class="col-md-4">
								<img src="<?php echo ASL_URL_PATH ?>admin/images/pro/pro-2.png">
							</div>
							<div class="col-md-4">
								<a target="_blank" href="https://agilestorelocator.com/demos/"><img src="<?php echo ASL_URL_PATH ?>admin/images/pro/pro-1.png"></a>
							</div>
							
							<div class="col-md-4">
								<a target="_blank" href="https://agilestorelocator.com/search-widget/"><img src="<?php echo ASL_URL_PATH ?>admin/images/pro/pro-3.png"></a>
							</div>
							<div class="col-md-4">
								<img src="<?php echo ASL_URL_PATH ?>admin/images/pro/pro-4.png">
							</div>
							<div class="col-md-4">
								<img src="<?php echo ASL_URL_PATH ?>admin/images/pro/pro-6.png">
							</div>
							<div class="col-md-4">
								<img src="<?php echo ASL_URL_PATH ?>admin/images/pro/pro-5.png">
							</div>
							<div class="col-md-4">
								<a target="_blank" href="https://agilestorelocator.com/demos/store-locator-demo-3/"><img src="<?php echo ASL_URL_PATH ?>admin/images/pro/pro-7.png"></a>
							</div>
							<div class="col-md-4">
								<a target="_blank" href="https://agilestorelocator.com/demos/locator-list-template/"><img src="<?php echo ASL_URL_PATH ?>admin/images/pro/pro-8.png"></a>
							</div>
							<div class="col-md-4">
								<a target="_blank" href="https://agilestorelocator.com/store-register-form/"><img class="mt-3" src="<?php echo ASL_URL_PATH ?>admin/images/pro/pro-9.png"></a>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<a target="_blank" href="https://codecanyon.net/item/agile-store-locator-google-maps-for-wordpress/16973546" class="btn btn-xl btn-success">Upgrade Now (Lifetime License)</a>
							</div>
						</div>
          </div>
        </div>  
      </div>
	</div>
</div>

<!-- SCRIPTS -->
<script type="text/javascript">
	var ASL_Instance = {
		url: '<?php echo ASL_UPLOAD_URL ?>',
		plugin_url: '<?php echo ASL_URL_PATH ?>'
	},
	asl_configs =  <?php echo json_encode($all_configs); ?>;
	window.addEventListener("load", function() {
	asl_engine.pages.user_setting(asl_configs);
	});
</script>