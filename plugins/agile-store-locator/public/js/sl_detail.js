jQuery( document ).ready(function() {
  
  if(!window['google'] || !google.maps)return;

  (function($) {

    //Only if found
    if (!document.getElementById('asl-map-cont'))
      return false;


    /**
     * [createMarker Create a marker]
     * @param  {[type]} _lat [description]
     * @param  {[type]} _lng [description]
     * @return {[type]}      [description]
     */
    function createMarker(_location) {

      var url          = asl_detail_config.URL + 'icon/default.png';

      var marker_param = {
        position: _location,
        //animation: google.maps.Animation.BOUNCE,
        icon: {
          url: url
        }
      };

      return new google.maps.Marker(marker_param);
    };

    var asl_lat  = (asl_detail_config.default_lat) ? parseFloat(asl_detail_config.default_lat) : 39.9217698526,
        asl_lng  = (asl_detail_config.default_lng) ? parseFloat(asl_detail_config.default_lng) : -75.5718432,
        location = new google.maps.LatLng(asl_lat, asl_lng);


    var maps_params = {
      center: location,
      zoom: parseInt(asl_detail_config.zoom),
      scrollwheel: asl_detail_config.scroll_wheel,
      gestureHandling: asl_detail_config.gesture_handling || 'cooperative', //cooperative,greedy
      mapTypeId: asl_detail_config.map_type
    };

    if (asl_detail_config.zoomcontrol == 'false') maps_params.zoomControl = false;
    if (asl_detail_config.maptypecontrol == 'false') maps_params.mapTypeControl = false;
    if (asl_detail_config.scalecontrol == 'false') maps_params.scaleControl = false;
    if (asl_detail_config.rotatecontrol == 'false') maps_params.rotateControl = false;
    if (asl_detail_config.fullscreencontrol == 'false') maps_params.fullscreenControl = false;
    if (asl_detail_config.streetviewcontrol == 'false') maps_params.streetViewControl = false;

    maps_params['fullscreenControlOptions'] = {
      position: google.maps.ControlPosition.RIGHT_CENTER
    };

    // FULL SCREEN Positions
    if(asl_detail_config.position_fullscreen) {
      maps_params['fullscreenControlOptions'] = {position: google.maps.ControlPosition[asl_detail_config.position_fullscreen]};
    }

    // ZOOM Positions
    if(asl_detail_config.position_zoom) {
      maps_params['zoomControlOptions'] = {position: google.maps.ControlPosition[asl_detail_config.position_zoom]};
    }

    // STREETVIEW Positions
    if(asl_detail_config.position_streetview) {
      maps_params['streetViewControlOptions'] = {position: google.maps.ControlPosition[asl_detail_config.position_streetview]};
    }

    if (asl_detail_config.maxzoom && !isNaN(asl_detail_config.maxzoom)) {
      maps_params['maxZoom'] = parseInt(asl_detail_config.maxzoom);
    }

    if (asl_detail_config.minzoom && !isNaN(asl_detail_config.minzoom)) {
      maps_params['minZoom'] = parseInt(asl_detail_config.minzoom);
    }

    map = new google.maps.Map(document.getElementById('asl-map-cont'), maps_params);

    if (asl_detail_config.map_layout) {
      var map_style = eval('(' + asl_detail_config.map_layout + ')');
      map.set('styles', map_style);
    }
    
    //  Create a marker to the location

    var marker_inst = createMarker(location);

    marker_inst.setMap(map);

  })(jQuery);
});