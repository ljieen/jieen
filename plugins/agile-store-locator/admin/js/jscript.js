var asl_engine = {};

function asl_lock(){

  aswal({
    title: "AGILE STORE LOCATOR",
    customClass: 'asl-aswal',
    html: 'THANK YOU FOR USING AGILE STORE LOCATOR, MANY OTHER FEATURES INCLUDING THIS ONE IS INCLUDED IN <a target="_blank" href="https://agilestorelocator.com/demos/?v=lite">FULL VERSION</a>.'
  });
}

(function($, app_engine) {
  'use strict';


  /* API method to get paging information */
  $.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings ){return {"iStart":         oSettings._iDisplayStart,"iEnd":           oSettings.fnDisplayEnd(),"iLength":        oSettings._iDisplayLength,"iTotal":         oSettings.fnRecordsTotal(),"iFilteredTotal": oSettings.fnRecordsDisplay(),"iPage":          oSettings._iDisplayLength === -1 ?0 : Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),"iTotalPages":    oSettings._iDisplayLength === -1 ?0 : Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )};};

  /* Bootstrap style pagination control */
  $.extend($.fn.dataTableExt.oPagination,{bootstrap:{fnInit:function(i,a,e){var t=i.oLanguage.oPaginate,l=function(a){a.preventDefault(),i.oApi._fnPageChange(i,a.data.action)&&e(i)};$(a).addClass("pagination").append('<ul class="pagination mt-3"><li class="page-item prev disabled"><a class="page-link" href="#">&larr; '+t.sPrevious+'</a></li><li class="page-item next disabled"><a class="page-link" href="#">'+t.sNext+" &rarr; </a></li></ul>");var s=$("a",a);$(s[0]).bind("click.DT",{action:"previous"},l),$(s[1]).bind("click.DT",{action:"next"},l)},fnUpdate:function(i,e){var a,t,l,s,n,o=i.oInstance.fnPagingInfo(),g=i.aanFeatures.p,r=Math.floor(2.5);n=o.iTotalPages<5?(s=1,o.iTotalPages):o.iPage<=r?(s=1,5):o.iPage>=o.iTotalPages-r?(s=o.iTotalPages-5+1,o.iTotalPages):(s=o.iPage-r+1)+5-1;var d=g.length;for(a=0;a<d;a++){for($("li:gt(0)",g[a]).filter(":not(:last)").remove(),t=s;t<=n;t++)l=t==o.iPage+1?"active":"",$('<li class="page-item '+l+'"><a class="page-link" href="#">'+t+"</a></li>").insertBefore($("li:last",g[a])[0]).bind("click",function(a){a.preventDefault(),i._iDisplayStart=(parseInt($("a",this).text(),10)-1)*o.iLength,e(i)});0===o.iPage?$("li:first",g[a]).addClass("disabled"):$("li:first",g[a]).removeClass("disabled"),o.iPage===o.iTotalPages-1||0===o.iTotalPages?$("li:last",g[a]).addClass("disabled"):$("li:last",g[a]).removeClass("disabled")}}}});
  

  function codeAddress(_address, _callback) {

    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ 'address': _address }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        _callback(results[0].geometry);
      } else {
        atoastr.error(ASL_REMOTE.LANG.geocode_fail + status);
      }
    });
  };


  function isEmpty(obj) {

    if (obj == null) return true;
    if (typeof(obj) == 'string' && obj == '') return true;
    return Object.keys(obj).length === 0;
  };

  // Asynchronous load
  var map,
    map_object = {
      is_loaded: true,
      marker: null,
      changed: false,
      store_location: null,
      map_marker: null,
      intialize: function(_callback) {

        var API_KEY = '';
        if (asl_configs && asl_configs.api_key) {
          API_KEY = '&key=' + asl_configs.api_key;
        }

        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = '//maps.googleapis.com/maps/api/js?libraries=places,drawing&' +
          'callback=asl_map_intialized' + API_KEY;
        //+'callback=asl_map_intialized';
        document.body.appendChild(script);
        this.cb = _callback;
      },
      render_a_map: function(_lat, _lng) {

        var hdlr = this,
          map_div = document.getElementById('map_canvas'),
          _draggable = true;

        hdlr.store_location = (_lat && _lng) ? [parseFloat(_lat), parseFloat(_lng)] : [-37.815, 144.965];

        var latlng = new google.maps.LatLng(hdlr.store_location[0], hdlr.store_location[1]);

        if (!map_div) return false;

        var mapOptions = {
          zoom: 14,
          minZoom: 8,
          center: latlng,
          //maxZoom: 10,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          styles: [{ "stylers": [{ "saturation": -100 }, { "gamma": 1 }] }, { "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.business", "elementType": "labels.text", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.business", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.place_of_worship", "elementType": "labels.text", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.place_of_worship", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "water", "stylers": [{ "visibility": "on" }, { "saturation": 50 }, { "gamma": 0 }, { "hue": "#50a5d1" }] }, { "featureType": "administrative.neighborhood", "elementType": "labels.text.fill", "stylers": [{ "color": "#333333" }] }, { "featureType": "road.local", "elementType": "labels.text", "stylers": [{ "weight": 0.5 }, { "color": "#333333" }] }, { "featureType": "transit.station", "elementType": "labels.icon", "stylers": [{ "gamma": 1 }, { "saturation": 50 }] }]
        };

        hdlr.map_instance = map = new google.maps.Map(map_div, mapOptions);

        // && navigator.geolocation && _draggable
        if ((!hdlr.store_location || isEmpty(hdlr.store_location[0]))) {

          /*navigator.geolocation.getCurrentPosition(function(position){
          	
          	hdlr.changed = true;
          	hdlr.store_location = [position.coords.latitude,position.coords.longitude];
          	var loc = new google.maps.LatLng(position.coords.latitude,  position.coords.longitude);
          	hdlr.add_marker(loc);
          	map.panTo(loc);
          });*/

          hdlr.add_marker(latlng);
        } else if (hdlr.store_location) {
          if (isNaN(hdlr.store_location[0]) || isNaN(hdlr.store_location[1])) return;
          //var loc = new google.maps.LatLng(hdlr.store_location[0], hdlr.store_location[1]);
          hdlr.add_marker(latlng);
          map.panTo(latlng);
        }
      },
      add_marker: function(_loc) {

        var hdlr = this;

        hdlr.map_marker = new google.maps.Marker({
          draggable: true,
          position: _loc,
          map: map
        });

        var marker_icon = new google.maps.MarkerImage(ASL_Instance.url + 'admin/images/pin1.png');
        marker_icon.size = new google.maps.Size(24, 39);
        marker_icon.anchor = new google.maps.Point(24, 39);
        hdlr.map_marker.setIcon(marker_icon);
        hdlr.map_instance.panTo(_loc);

        google.maps.event.addListener(
          hdlr.map_marker,
          'dragend',
          function() {

            hdlr.store_location = [hdlr.map_marker.position.lat(), hdlr.map_marker.position.lng()];
            hdlr.changed = true;
            var loc = new google.maps.LatLng(hdlr.map_marker.position.lat(), hdlr.map_marker.position.lng());
            //map.setPosition(loc);
            map.panTo(loc);

            app_engine.pages.store_changed(hdlr.store_location);
          });

      }
    };

  //add the uploader
  app_engine.uploader = function($form, _URL, _done /*,_submit_callback*/ ) {


    function formatFileSize(bytes) {
      if (typeof bytes !== 'number') {
        return ''
      }
      if (bytes >= 1000000000) {
        return (bytes / 1000000000).toFixed(2) + ' GB'
      }
      if (bytes >= 1000000) {
        return (bytes / 1000000).toFixed(2) + ' MB'
      }
      return (bytes / 1000).toFixed(2) + ' KB'
    };

    var ul = $form.find('ul');
    $form[0].reset();


    $form.fileupload({
        url: _URL,
        dataType: 'json',
        //multipart: false,
        done: function(e, _data) {

          ul.empty();
          _done(e, _data);

          $form.find('.progress-bar').css('width', '0%');
          $form.find('.progress').hide();

          //reset form if success
          if (_data.result.success) {}
        },
        add: function(e, _data) {

          ul.empty();

          //Check file Extension
          var exten = _data.files[0].name.split('.'),
            exten = exten[exten.length - 1];
          if (['jpg', 'png', 'jpeg', 'gif', 'JPG', 'svg', 'zip', 'xlsx', 'xls', 'csv'].indexOf(exten) == -1) {

            atoastr.error((ASL_REMOTE.LANG.invalid_file_error));
            return false;
          }


          var tpl = $('<li class="working"><p class="col-12 text-muted"><span class="float-left"></span></p></li>');
          tpl.find('p').text(_data.files[0].name.substr(0, 50)).append('<i class="float-right">' + formatFileSize(_data.files[0].size) + '</i>');
          _data.context = tpl.appendTo(ul);

          var jqXHR = null;
          $form.find('.btn-start').unbind().bind('click', function() {

            
            /*if(_submit_callback){
            	if(!_submit_callback())return false;
            }*/

            jqXHR = _data.submit();

            $form.find('.progress').show()
          });


          $form.find('.custom-file-label').html(_data.files[0].name);
        },
        progress: function(e, _data) {
          var progress = parseInt(_data.loaded / _data.total * 100, 10);
          $form.find('.progress-bar').css('width', progress + '%');
          $form.find('.sr-only').html(progress + '%');

          if (progress == 100) {
            _data.context.removeClass('working');
          }
        },
        fail: function(e, _data) {
          _data.context.addClass('error');
          $form.find('.upload-status-box').html(ASL_REMOTE.LANG.upload_fail).addClass('bg-warning alert')
        }
        /*
        formData: function(_form) {

        	var formData = [{
        		name: '_data[action]',
        		value: 'asl_add_store'
        	}]

        	//	console.log(formData);
        	return formData;
        }*/
      })
      .bind('fileuploadsubmit', function(e, _data) {
        _data.formData = $form.ASLSerializeObject();
      })
      .prop('disabled', !$.support.fileInput)
      .parent().addClass($.support.fileInput ? undefined : 'disabled');
  };

  //http://harvesthq.github.io/chosen/options.html
  app_engine['pages'] = {
    _validate_page: function() {

      if (ASL_REMOTE.Com) return;

      aswal({
        title: ASL_REMOTE.LANG.pur_title,
        html: ASL_REMOTE.LANG.pur_text,
        input: 'text',
        type: "question",
        showCancelButton: false,
        allowOutsideClick: false,
        allowEscapeKey: false,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "VALIDATE",
        preConfirm: function(_value) {

          return new Promise(function(resolve, reject) {

            if ($.trim(_value) == '') {

              aswal.showValidationError('Purchase Code is Missing!');
              return false;
            }

            aswal.showLoading();

            ServerCall(ASL_REMOTE.URL + "?action=asl_validate_me", { value: _value }, function(_response) {

              aswal.hideLoading();

              if (!_response.success) {

                aswal.showValidationError(_response.message);
                reject();
                return false;
              } else {

                aswal({
                  type: (_response.success) ? 'success' : 'error',
                  title: (_response.success) ? 'Validate Successfully!' : 'Validation Failed!',
                  html: (_response.message) ? _response.message : ('Validation Failed, Please Contact Support')
                });

                reject();
                return true;
              }

            }, 'json');

          })
        }
        /*inputValidator: function(value) {
					    return !value && 'You need to write something!'
					}*/
      })
    },
    store_changed: function(_position) {

      $('#asl_txt_lat').val(_position[0]);
      $('#asl_txt_lng').val(_position[1]);
    },
    manage_categories: function() {

      var table = null;

      //prompt the category box
      $('#btn-asl-new-c').bind('click', function() {
        $('#asl-add-modal').smodal('show');
      });


      var asInitVals = {};
      table = $('#tbl_categories').dataTable({
        "sPaginationType": "bootstrap",
        "bProcessing": true,
        "bFilter": false,
        "bServerSide": true,
        //"scrollX": true,
        /*"aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 1 ] }
        ],*/
        "bAutoWidth": true,
        "columnDefs": [
          { 'bSortable': false, "width": "75px", "targets": 0 },
          { "width": "75px", "targets": 1 },
          { "width": "200px", "targets": 2 },
          { "width": "100px", "targets": 3 },
          { "width": "100px", "targets": 4 },
          { "width": "150px", "targets": 5 },
          { "width": "150px", "targets": 6 },
          { 'bSortable': false, 'aTargets': [0, 6] }
        ],
        "iDisplayLength": 10,
        "sAjaxSource": ASL_REMOTE.URL + "?action=asl_get_categories",
        "columns": [
          { "data": "check" },
          { "data": "id" },
          { "data": "category_name" },
          { "data": "is_active" },
          { "data": "icon" },
          { "data": "created_on" },
          { "data": "action" }
        ],
        'fnServerData': function(sSource, aoData, fnCallback) {

          $.get(sSource, aoData, function(json) {

            fnCallback(json);

          }, 'json');

        },
        "fnServerParams": function(aoData) {

          $("thead input").each(function(i) {

            if (this.value != "") {
              aoData.push({
                "name": 'filter[' + $(this).attr('data-id') + ']',
                "value": this.value
              });
            }
          });
        },
        "order": [
          [1, 'desc']
        ]
      });


      //Select all button
      $('.table .select-all').bind('click', function(e) {

        $('.asl-p-cont .table input').attr('checked', 'checked');

      });

      //Delete Selected Categories:: bulk
      $('#btn-asl-delete-all').bind('click', function(e) {

        var $tmp_categories = $('.asl-p-cont .table input:checked');

        if ($tmp_categories.length == 0) {
          atoastr.error('No Category selected');
          return;
        }

        var item_ids = [];
        $('.asl-p-cont .table input:checked').each(function(i) {

          item_ids.push($(this).attr('data-id'));
        });


        aswal({
          title: ASL_REMOTE.LANG.delete_categories,
          text: ASL_REMOTE.LANG.warn_question + ' ' + ASL_REMOTE.LANG.delete_categories + '?',
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: ASL_REMOTE.LANG.delete_it
        }).then(function() {

          ServerCall(ASL_REMOTE.URL + "?action=asl_delete_category", { item_ids: item_ids, multiple: true }, function(_response) {

            if (_response.success) {
              atoastr.success(_response.msg);
              table.fnDraw();
              return;
            } else {
              atoastr.error((_response.error || ASL_REMOTE.LANG.error_try_again));
              return;
            }

          }, 'json');
        });
      });


      //TO ADD NEW Categories
      var url_to_upload = ASL_REMOTE.URL,
        $form = $('#frm-addcategory');

      app_engine.uploader($form, url_to_upload + '?action=asl_add_categories', function(e, data) {

        var data = data.result;

        if (!data.success) {

          atoastr.error(data.msg);
        } else {

          atoastr.success(data.msg);
          //reset form
          $('#asl-add-modal').smodal('hide');
          $('#frm-addcategory').find('input:text, input:file').val('');
          $('#progress_bar').hide();
          //show table value
          table.fnDraw();
        }
      });

      //Validate
      $('#btn-asl-add-categories').bind('click', function(e) {

        if ($('#frm-addcategory ul li').length == 0) {

          atoastr.error('Please Upload Category Icon');

          e.preventDefault();
          return;
        }
      });

      //show edit category model
      $('#tbl_categories tbody').on('click', '.edit_category', function(e) {

        $('#updatecategory_image').show();
        $('#updatecategory_editimage').hide();
        $('#asl-update-modal').smodal('show');
        $('#update_category_id_input').val($(this).attr("data-id"));

        ServerCall(ASL_REMOTE.URL + "?action=asl_get_category_byid", { category_id: $(this).attr("data-id") }, function(_response) {

          if (_response.success) {

            $("#update_category_name").val(_response.list[0]['category_name']);
            $("#update_category_icon").attr("src", ASL_Instance.url + "public/svg/" + _response.list[0]['icon']);
          } else {

            atoastr.error(_response.error);
            return;
          }
        }, 'json');
      });

      //show edit category upload image
      $('#change_image').click(function() {

        $("#update_category_icon").attr("data-id", "")
        $('#updatecategory_image').hide();
        $('#updatecategory_editimage').show();
      });

      //	Update category without icon
      $('#btn-asl-update-categories').click(function() {

        ServerCall(ASL_REMOTE.URL + "?action=asl_update_category", { data: { category_id: $("#update_category_id_input").val(), action: "same", category_name: $("#update_category_name").val() } },
        function(_response) {

          if (_response.success) {

            atoastr.success(_response.msg);

            table.fnDraw();

            return;
          } else if (_response.error) {
            atoastr.error(_response.msg);
            return;
          }
        }, 'json');

      });

      //	Update category with icon

      var url_to_upload = ASL_REMOTE.URL,
        $form = $('#frm-updatecategory');

      $form.append('<input type="hidden" name="data[action]" value="notsame" /> ');

      app_engine.uploader($form, url_to_upload + '?action=asl_update_category', function(e, data) {

        var data = data.result;

        if (data.success) {

          atoastr.success(data.msg);
          $('#asl-update-modal').smodal('hide');
          $('#frm-updatecategory').find('input:text, input:file').val('');
          $('#progress_bar_').hide();
          table.fnDraw();
        } else
          atoastr.error(data.msg);
      });

      //show delete category model
      $('#tbl_categories tbody').on('click', '.delete_category', function(e) {

        var _category_id = $(this).attr("data-id");

        aswal({
          title: ASL_REMOTE.LANG.delete_category,
          text: ASL_REMOTE.LANG.warn_question + ' ' + ASL_REMOTE.LANG.delete_category + ' ' + _category_id + " ?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: ASL_REMOTE.LANG.delete_it,
        }).then(
          function() {

            ServerCall(ASL_REMOTE.URL + "?action=asl_delete_category", { category_id: _category_id }, function(_response) {

              if (_response.success) {
                atoastr.success(_response.msg);
                table.fnDraw();
                return;
              } else {
                atoastr.error((_response.error || ASL_REMOTE.LANG.error_try_again));
                return;
              }

            }, 'json');

          }
        );
      });



      $("thead input").keyup(function(e) {

        if (e.keyCode == 13) {
          table.fnDraw();
        }
      });
    },
    dashboard: function() {

      var current_date = 0,
        date_ = new Date();

      var day_arr = [];
      var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        month = months[date_.getMonth()],
        data_arr = [];


      $('.asl-p-cont .nav-tabs a').click(function(e) {
        e.preventDefault()
        $(this).tab('show');
      })
      
      //Reset
      $('#asl-search-month')[0].selectedIndex = 0;


      for (var a = 1; a <= date_.getDate(); a++) {

        day_arr.push(a + ' ' + month);
        data_arr.push(0);
      }

    },
    /**
     * [manage_stores description]
     * @return {[type]} [description]
     */
    manage_stores: function() {

      var table          = null,
        row_duplicate_id = null,
        pending_stores   = false;


      /*DUPLICATE STORES*/
      var duplicate_store = function(_id) {

        ServerCall(ASL_REMOTE.URL + "?action=asl_duplicate_store", { store_id: _id }, function(_response) {

          if (_response.success) {
            atoastr.success(_response.msg);
            table.fnDraw();
            return;
          } else if (_response.error) {
            atoastr.error(_response.error);
            return;
          } else {
            atoastr.error(ASL_REMOTE.LANG.error_try_again);
          }
        }, 'json');
      };

      //Prompt the DUPLICATE alert
      $('#tbl_stores').on('click', '.row-cpy', function() {

        row_duplicate_id = $(this).data('id');

        aswal({
            title: ASL_REMOTE.LANG.duplicate_stores,
            text: ASL_REMOTE.LANG.warn_question + " " + ASL_REMOTE.LANG.duplicate_stores + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: ASL_REMOTE.LANG.duplicate_it,
          })
          .then(
            function() {

              duplicate_store(row_duplicate_id);
            }
          );
        });


      /*Delete Stores*/
      var _delete_all_stores = function() {

        var $this = $('#asl-delete-stores');
        $this.bootButton('loading');

        ServerCall(ASL_REMOTE.URL + '?action=asl_delete_all_stores', {}, function(_response) {

          $this.bootButton('reset');
          atoastr.success(_response.msg);
          table.fnDraw();
        }, 'json');
      };

      /*Delete All stores*/
      $('#asl-delete-stores').bind('click', function(e) {

        aswal({
          title: ASL_REMOTE.LANG.delete_all_stores,
          text: ASL_REMOTE.LANG.warn_question + ' ' + ASL_REMOTE.LANG.delete_all_stores + "?",
          type: "error",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: ASL_REMOTE.LANG.delete_all
        }).then(
          function() {

            _delete_all_stores();
          }
        );
      });

      var columnDefs = [
        { "width": "2000px", "targets": 0},
        { "width": "250px", "targets": 1 },
        { "width": "200px", "targets": 2 },
        { "width": "300px", "targets": 3 },
        { "width": "300px", "targets": 4 },
        { "width": "300px", "targets": 5 },
        { "width": "300px", "targets": 6 },
        { "width": "150px", "targets": 7 },
        { "width": "150px", "targets": 8 },
        { "width": "150px", "targets": 9 },
        { "width": "150px", "targets": 10 },
        { "width": "150px", "targets": 11 },
        { "width": "150px", "targets": 12 },
        { "width": "50px", "targets": 13 },
        { "width": "350px", "targets": 14 },
        { "width": "50px", "targets": 15 },
        { "width": "50px", "targets": 16 },
        { "width": "150px", "targets": 17 },
        { 'bSortable': false, 'aTargets': [0, 13, 1] }
      ];


      
      //  Loop over to hide
      for(var ch in asl_hidden_columns) {

        if (!asl_hidden_columns.hasOwnProperty(ch)) continue;
        columnDefs[asl_hidden_columns[ch]]['visible'] = false;
      }


      var asInitVals = {};
      table = $('#tbl_stores').dataTable({
        "sPaginationType": "bootstrap",
        "bProcessing": true,
        "bFilter": false,
        "bServerSide": true,
        "scrollX": true,
        "bAutoWidth": false,
        "columnDefs": columnDefs,
        "iDisplayLength": 10,
        "sAjaxSource": ASL_REMOTE.URL + "?action=asl_get_store_list",
        "columns": [
          { "data": "check" },
          { "data": "action" },
          { "data": "id" },
          { "data": "title" },
          { "data": "lat" },
          { "data": "lng" },
          { "data": "street" },
          { "data": "state" },
          { "data": "city" },
          { "data": "phone" },
          { "data": "email" },
          { "data": "website" },
          { "data": "postal_code" },
          { "data": "is_disabled" },
          { "data": "categories" },
          { "data": "marker_id" },
          { "data": "logo_id" },
          { "data": "created_on" }
        ],
        "fnServerParams": function(aoData) {

          //  When pending stores is enabled
          if(pending_stores) {

            aoData.push({
              "name": 'filter[pending]',
              "value": '1'
            });
          }

          $("#tbl_stores_wrapper .dataTables_scrollHead thead input").each(function(i) {

            if (this.value != "") {
              aoData.push({
                "name": 'filter[' + $(this).attr('data-id') + ']',
                "value": this.value

              });
            }
          });

        },
        "order": [
          [2, 'desc']
        ]
      });


      $('#btn-pending-stores').bind('click', function(e) {

        var $pending_btn = $(this);

        //  Change State
        pending_stores   = !pending_stores;

        if(pending_stores) {
  

          $pending_btn.find('span').html($pending_btn[0].dataset.pending);

        }
        else {
          
          $pending_btn.find('span').html($pending_btn[0].dataset.all);
        }

        //  Recall the datatable
        table.fnDraw();
      });

      //oTable.fnSort( [ [10,'desc'] ] );

      //Select all button
      $('.table .select-all').bind('click', function(e) {

        $('.asl-p-cont .table input').attr('checked', 'checked');
      });

      //Delete Selected Stores:: bulk
      $('#btn-asl-delete-all').bind('click', function(e) {

        var $tmp_stores = $('.asl-p-cont .table input:checked');

        if ($tmp_stores.length == 0) {
          atoastr.error('No Store selected');
          return;
        }

        var item_ids = [];
        $('.asl-p-cont .table input:checked').each(function(i) {

          item_ids.push($(this).attr('data-id'));
        });


        aswal({
            title: ASL_REMOTE.LANG.delete_stores,
            text: ASL_REMOTE.LANG.warn_question + " " + ASL_REMOTE.LANG.delete_stores + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: ASL_REMOTE.LANG.delete_it,
          })
          .then(
            function() {

              ServerCall(ASL_REMOTE.URL + "?action=asl_delete_store", { item_ids: item_ids, multiple: true }, function(_response) {

                if (_response.success) {
                  atoastr.success(_response.msg);
                  table.fnDraw();
                  return;
                } else {
                  atoastr.error((_response.error || ASL_REMOTE.LANG.error_try_again));
                  return;
                }

              }, 'json');
            }
          );
      });

      //Change the Status
      $('#btn-change-status').bind('click', function(e) {

        var $tmp_stores = $('.asl-p-cont .table input:checked');

        if ($tmp_stores.length == 0) {
          atoastr.error('No Store Selected');
          return;
        }

        var item_ids = [];
        $('.asl-p-cont .table input:checked').each(function(i) {

          item_ids.push($(this).attr('data-id'));
        });


        ServerCall(ASL_REMOTE.URL + "?action=asl_store_status", { item_ids: item_ids, multiple: true, status: $('#asl-ddl-status').val() }, function(_response) {

          if (_response.success) {
            atoastr.success(_response.msg);
            table.fnDraw();
            return;
          } else {
            atoastr.error((_response.error || ASL_REMOTE.LANG.error_try_again));
            return;
          }

        }, 'json');
      });


      //Validate the Coordinates
      $('#btn-validate-coords').bind('click', function(e) {

        var $btn = $(this);

        $btn.bootButton('loading');

        ServerCall(ASL_REMOTE.URL + "?action=asl_validate_coords", { }, function(_response) {

          $btn.bootButton('reset');

          if (_response.success) {

            atoastr.success(_response.msg);
          } 
          else
            atoastr.error(_response.msg);

        }, 'json');
      });


      //  show delete store model
      $('#tbl_stores tbody').on('click', '.glyphicon-trash', function(e) {

        var _store_id = $(this).attr("data-id");

        aswal({
          title: ASL_REMOTE.LANG.delete_store,
          text: ASL_REMOTE.LANG.warn_question + " " + ASL_REMOTE.LANG.delete_store + " " + _store_id + "?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: ASL_REMOTE.LANG.delete_it,
        }).then(function() {

          ServerCall(ASL_REMOTE.URL + "?action=asl_delete_store", { store_id: _store_id }, function(_response) {

            if (_response.success) {
              atoastr.success(_response.msg);
              table.fnDraw();
              return;
            } else {
              atoastr.error((_response.error || ASL_REMOTE.LANG.error_try_again));
              return;
            }

          }, 'json');

        });
      });


      //  Approve Pending Stores
      $('#tbl_stores tbody').on('click', '.btn-approve', function(e) {

        var _store_id = $(this).attr("data-id");

        ServerCall(ASL_REMOTE.URL + "?action=asl_approve_stores", { store_id: _store_id }, function(_response) {

          if (_response.success) {
            
            atoastr.success(_response.msg);
          
            //  Update the Pending Count
            if(parseInt(_response.pending_count) != 0) {
              $('#btn-pending-stores i').html(_response.pending_count);
            }
            //  Remove the alert
            else {
              $('#alert-pending-stores').remove();
              pending_stores   = false;
            }

            table.fnDraw();

            return;
          } 
          else {
            atoastr.error((_response.error || _response.msg || ASL_REMOTE.LANG.error_try_again));
            return;
          }

        }, 'json');
      });


      $("thead input").keyup(function(e) {

        if (e.keyCode == 13) {
          table.fnDraw();
        }
      });

      //  Load default values for the hidden columns
      if(asl_hidden_columns) {
        $('#ddl-fs-cntrl').val(asl_hidden_columns);
      }

      //the Show/hide columns
      $('#ddl-fs-cntrl').chosen({
        width: "100%",
        placeholder_text_multiple: 'Select Columns',
        no_results_text: 'No Columns'
      });


      //  Show/Hide the Columns
      $('#sl-btn-sh').bind('click', function(e) {

        var sh_columns = $('#ddl-fs-cntrl').val();
        var $btn       = $(this);

        $btn.bootButton('loading');

        ServerCall(ASL_REMOTE.URL + "?action=asl_change_options", {'content': sh_columns, 'stype': 'hidden'}, function(_response) {

          $btn.bootButton('reset');

          if (_response.success) {

            atoastr.success(_response.msg);
            $('#sl-fields-sh').smodal('hide');
            window.location.reload();
          } 
          else
            atoastr.error(_response.msg);

        }, 'json');
      });
    },
    /**
     * [customize_map description]
     * @param  {[type]} _asl_map_customize [description]
     * @return {[type]}                    [description]
     */
    customize_map: function(_asl_map_customize) {

    
    },
    /**
     * [edit_store description]
     * @param  {[type]} _store [description]
     * @return {[type]}        [description]
     */
    edit_store: function(_store) {

      this.add_store(true, _store);
    },
    /**
     * [add_store description]
     * @param {[type]} _is_edit [description]
     * @param {[type]} _store   [description]
     */
    add_store: function(_is_edit, _store) {

      var $form = $('#frm-addstore'),
          hdlr  = this;

      /*var current_time = new Date();
      current_time.setHours(7);
      current_time.setMinutes(0);

      var start_time = current_time.toLocaleTimeString(navigator.language, { hour: '2-digit', minute: '2-digit' });
      current_time.setHours(current_time.getHours() + 12);
      var end_time = current_time.toLocaleTimeString(navigator.language, { hour: '2-digit', minute: '2-digit' });*/

     

      //  Store Marker ID DDL Set value
      if (_store && _store.marker_id)
        $('#ddl-asl-markers').val(String(_store.marker_id));

      //  Marker DDL
      $('#ddl-asl-markers').ddslick({
        imagePosition: "right",
        selectText: ASL_REMOTE.LANG.select_marker,
        truncateDescription: true
      });

      //  The Current Date
      var current_date      = new Date(),
          open_time_tmpl    = '9:30 AM',
          close_time_tmpl   = '6:30 PM';


      /**
       * [timeChangeEvent Event that is fired when the time is changed]
       * @param  {[type]} e [description]
       * @return {[type]}   [description]
       */
      function timeChangeEvent(e) {

        if($(e.currentTarget).hasClass('asl-start-time')) {
          open_time_tmpl =  e.time.value;
        }
        else
          close_time_tmpl   =  e.time.value; 
      };

      //  Add/Remove DateTime Picker
      $('.asl-time-details tbody').on('click', '.add-k-add', function(e) {

        var $new_slot = $('<div class="form-group">\
                    <div class="input-group bootstrap-asltimepicker">\
                          <input type="text" class="form-control asltimepicker asl-start-time validate[required,funcCall[ASLmatchTime]]" placeholder="' + ASL_REMOTE.LANG.start_time + '"  value="'+open_time_tmpl+'">\
                          <span class="input-group-append add-on"><span class="input-group-text"><svg width="16" height="16"><use xlink:href="#i-clock"></use></svg></span></span>\
                        </div>\
                        <div class="input-append input-group bootstrap-asltimepicker">\
                          <input type="text" class="form-control asltimepicker asl-end-time validate[required]" placeholder="' + ASL_REMOTE.LANG.end_time + '" value="'+close_time_tmpl+'">\
                          <span class="input-group-append add-on"><span class="input-group-text"><svg width="16" height="16"><use xlink:href="#i-clock"></use></svg></span></span>\
                        </div>\
                        <span class="add-k-delete glyp-trash">\
                          <svg width="16" height="16"><use xlink:href="#i-trash"></use></svg>\
                        </span>\
                    </div>');


        var $cur_slot = $(this).parent().prev().find('.asl-all-day-times .asl-closed-lbl');
  
        $cur_slot.before($new_slot);

        //  Add the Time slot timepicker
        $new_slot.find('input.asltimepicker').removeAttr('id').attr('class', 'form-control asltimepicker validate[required]').asltimepicker({
          //defaultTime: current_date,
          //orientation: 'auto',
          showMeridian: (asl_configs && asl_configs.time_format == '1') ? false : true,
          appendWidgetTo: '.asl-p-cont'
        })
        .on('changeTime.asltimepicker', timeChangeEvent);
      });


      //  Delete the Time Row
      $('.asl-time-details tbody').on('click', '.add-k-delete', function(e) {
        var $this_tr = $(this).parent().remove();
      });


      //  Add the time Picker
      $('.asl-p-cont .asl-time-details .asltimepicker').asltimepicker({
        showMeridian: (asl_configs && asl_configs.time_format == '1') ? false : true,
        appendWidgetTo: '.asl-p-cont',
      })
      .on('changeTime.asltimepicker', timeChangeEvent);

      //Convert the time for validation
      function asl_timeConvert(_str) {

        if (!_str) return 0;

        var time = $.trim(_str).toUpperCase();

        //when 24 hours
        if (asl_configs && asl_configs.time_format == '1') {

          var regex = /(1[012]|[0-9]):[0-5][0-9]/;

          if (!regex.test(time))
            return 0;

          var hours = Number(time.match(/^(\d+)/)[1]);
          var minutes = Number(time.match(/:(\d+)/)[1]);

          return hours + (minutes / 100);
        } else {

          var regex = /(1[012]|[1-9]):[0-5][0-9][ ]?(AM|PM)/;

          if (!regex.test(time))
            return 0;

          var hours = Number(time.match(/^(\d+)/)[1]);
          var minutes = Number(time.match(/:(\d+)/)[1]);
          var AMPM = (time.indexOf('PM') != -1) ? 'PM' : 'AM';

          if (AMPM == "PM" && hours < 12) hours = hours + 12;
          if (AMPM == "AM" && hours == 12) hours = hours - 12;

          return hours + (minutes / 100);
        }
      };

    

      //  Match the time :: validation
      window['ASLmatchTime'] = function(field, rules, i, options) {};


      //  Copy the Monday time to rest of the days
      $('#asl-time-cp').bind('click', function(e) {
          var $monday    = $('.asl-p-cont .asl-time-details .asl-all-day-times').eq(0),
              $rest_days = $('.asl-p-cont .asl-time-details .asl-all-day-times:not(:first)');

          //  Clone Everyday
          $rest_days.each(function(e) {
            var day_index = parseInt(e) + 1;
            $(this).html($monday.children().clone());
            $(this).find('.a-swith').find('label').attr('for', 'cmn-toggle-' + day_index);
            $(this).find('.a-swith').find('input').attr('id', 'cmn-toggle-' + day_index);
          });
        
          //  Add the Picker
          $('.asl-p-cont .asl-time-details .asltimepicker').asltimepicker({
            showMeridian: (asl_configs && asl_configs.time_format == '1') ? false : true,
            appendWidgetTo: '.asl-p-cont',
          })
          .on('changeTime.asltimepicker', timeChangeEvent);
      });

      // Initialize the Google Maps
      window['asl_map_intialized'] = function() {
        if (_store)
          map_object.render_a_map(_store.lat, _store.lng);
        else
          map_object.render_a_map(parseFloat(asl_configs.default_lat), parseFloat(asl_configs.default_lng));
      };

      if (!(window['google'] && google.maps)) {
        map_object.intialize();
      } else
        asl_map_intialized();



      //  Category ddl
      $('#ddl_categories').chosen({
        width: "100%",
        placeholder_text_multiple: ASL_REMOTE.LANG.select_category,
        no_results_text: ASL_REMOTE.LANG.no_category
      });

      //  Form Submit
      $form.validationEngine({
        binded: true,
        scroll: false
      });

      //  To get Lat/lng
      $('#txt_city,#txt_state,#txt_postal_code').bind('blur', function(e) {

        if (!isEmpty($form[0].elements["data[city]"].value) && !isEmpty($form[0].elements["data[postal_code]"].value)) {

          var address = [$form[0].elements["data[street]"].value, $form[0].elements["data[city]"].value, $form[0].elements["data[postal_code]"].value, $form[0].elements["data[state]"].value];

          var q_address = [];

          for (var i = 0; i < address.length; i++) {

            if (address[i])
              q_address.push(address[i]);
          }

          var _country = jQuery('#txt_country option:selected').text();

          //Add country if available
          if (_country && _country != ASL_REMOTE.LANG.select_country) {
            q_address.push(_country);
          }

          address = q_address.join(', ');

          codeAddress(address, function(_geometry) {

            var s_location = [_geometry.location.lat(), _geometry.location.lng()];
            var loc = new google.maps.LatLng(s_location[0], s_location[1]);
            map_object.map_marker.setPosition(_geometry.location);
            map.panTo(_geometry.location);
            map.setZoom(14);
            app_engine.pages.store_changed(s_location);

          });
        }
      });


      //  Coordinates Fixes
      var _coords = {
        lat: '',
        lng: ''
      };

      //  Click the Edit Coordinates
      $('#lnk-edit-coord').bind('click', function(e) {

        _coords.lat = $('#asl_txt_lat').val();
        _coords.lng = $('#asl_txt_lng').val();

        $('#asl_txt_lat,#asl_txt_lng').val('').removeAttr('readonly');
      });


      //  Change Event Coordinates
      var $coord = $('#asl_txt_lat,#asl_txt_lng');
      $coord.bind('change', function(e) {

        if ($coord[0].value && $coord[1].value && !isNaN($coord[0].value) && !isNaN($coord[1].value)) {

          var loc = new google.maps.LatLng(parseFloat($('#asl_txt_lat').val()), parseFloat($('#asl_txt_lng').val()));
          map_object.map_marker.setPosition(loc);
          map.panTo(loc);
        }
      });

      // Get Working Hours
      function getOpenHours() {

        var open_hours = {};

        $('.asl-time-details .asl-all-day-times').each(function(e) {

          var $day = $(this),
            day_index = String($day.data('day'));
          open_hours[day_index] = null;

          if ($day.find('.form-group').length > 0) {

            open_hours[day_index] = [];
          } else {

            open_hours[day_index] = ($day.find('.asl-closed-lbl input')[0].checked) ? '1' : '0';
          }

          $day.find('.form-group').each(function() {

            var $hours = $(this).find('input');
            open_hours[day_index].push($hours.eq(0).val() + ' - ' + $hours.eq(1).val());
          });

        });

        return JSON.stringify(open_hours);
      }

      //  Add store button
      $('#btn-asl-add').bind('click', function(e) {

        if (!$form.validationEngine('validate')) return;

        var $btn = $(this),
          formData = $form.ASLSerializeObject();

        formData['action']    = (_is_edit) ? 'asl_update_a_store' : 'asl_add_store';
        formData['category']  = $('#ddl_categories').val();

       

        if (_is_edit) { formData['updateid'] = $('#update_id').val(); }

        //Ordering
        if (formData['ordr'] && isNaN(formData['ordr']))
          formData['ordr'] = '0';

        formData['data[open_hours]'] = getOpenHours();


        $btn.bootButton('loading');
        ServerCall(ASL_REMOTE.URL, formData, function(_response) {

          $btn.bootButton('reset');
          
          if (_response.success) {

            $form[0].reset();
            $btn.bootButton('completed');

            if (_is_edit) {
              _response.msg += " Redirect...";
              window.location.replace(ASL_REMOTE.URL.replace('-ajax', '') + "?page=manage-agile-store");
            }
   
            atoastr.success(_response.msg);
            return;
          } else if (_response.error) {
            atoastr.error(_response.error);
            return;
          } else {
            atoastr.error(ASL_REMOTE.LANG.error_try_again);
          }
        }, 'json');
      });

    },
    /**
     * [user_setting User Settings]
     * @param  {[type]} _configs [description]
     * @return {[type]}          [description]
     */
    user_setting: function(_configs) {

      var $form = $('#frm-usersetting');

      var _keys = Object.keys(_configs);


      var radio_fields = ['additional_info', 'distance_control', 'link_type', 'distance_unit', 'geo_button', 'time_format', 'week_hours', 'distance_control', 'single_cat_select', 'map_layout', 'infobox_layout', 'color_scheme', 'color_scheme_1', 'color_scheme_2', 'color_scheme_3', 'font_color_scheme'];

      for (var i in _keys) {

        if (!_keys.hasOwnProperty(i)) continue;

        if (radio_fields.indexOf(_keys[i]) != -1) {

          var $elem = $form.find('#asl-' + _keys[i] + '-' + _configs[_keys[i]]);
          
          if($elem && $elem[0])
            $elem[0].checked = true;
          
          continue;
        }


        var $elem = $form.find('#asl-' + _keys[i]);

        if($elem[0]) {

          if ($elem[0].type == 'checkbox')
            $elem[0].checked = (_configs[_keys[i]] == '0') ? false : true;
          else
            $elem.val(_configs[_keys[i]]);
        }
      }


      ///Make layout Active
      $('.asl-p-cont .layout-box img').eq($('#asl-template')[0].selectedIndex).addClass('active');

      $('#asl-template').bind('change', function(e) {

        $('.asl-p-cont .layout-box img.active').removeClass('active');
        $('.asl-p-cont .layout-box img').eq(this.selectedIndex).addClass('active');
      });

      /////*Validation Engine*/////
      $form.validationEngine({
        binded: true,
        scroll: false
      });


      $('#btn-asl-user_setting').bind('click', function(e) {

        if (!$form.validationEngine('validate')) return;

        var $btn = $(this);

        $btn.bootButton('loading');

        var all_data = {
          data: {
            show_categories: 0,
            advance_filter: 0,
            time_switch: 0,
            category_marker: 0,
            distance_slider: 0,
            analytics: 0,
            additional_info: 0,
            scroll_wheel: 0,
            target_blank: 0,
            user_center: 0,
            smooth_pan: 0,
            sort_by_bound: 0,
            full_width: 0,
            //filter_result:0,
            radius_circle: 0,
            remove_maps_script: 0,
            category_bound: 0,
            gdpr: 0,
            geo_marker: 0,
            sort_random: 0,
            and_filter: 0,
            fit_bound: 0,
            admin_notify: 0,
            cluster: 0,
            display_list: 0,
            cat_in_grid: 0,
            store_schema: 0,
            hide_hours: 0,
            slug_link: 0,
            hide_logo: 0,
            direction_btn: 0,
            additional_info: 0,
            print_btn: 0
          }
        };

        var data = $form.ASLSerializeObject();


        all_data = $.extend(all_data, data);

        //  Save the custom Map
        all_data['map_style'] = document.getElementById('asl-map_layout_custom').value;


        ServerCall(ASL_REMOTE.URL + '?action=asl_save_setting', all_data, function(_response) {

          $btn.bootButton('reset');

          if (_response.success) {
            atoastr.success(_response.msg);
            return;
          } else if (_response.error) {

            atoastr.error(_response.msg);
            return;
          } else {
            atoastr.success('Error Occurred.');
            return;

          }
        }, 'json');
      });

      if (isEmpty(_configs['template']))
        _configs['template'] = '0';

      //Show the option of right template
      $('.box_layout_' + _configs['template']).removeClass('hide');


      //  Bind Change Template
      $('.asl-p-cont #asl-template').bind('change', function(e) {

        var _value = this.value;
        $('.asl-p-cont .template-box').addClass('hide');
        $('.box_layout_' + _value).removeClass('hide');

        set_tmpl_image();

      });

      ////////////////////////////////////////
      // Code for the Additional attributes //
      ////////////////////////////////////////
      $('#btn-asl-add-field').on('click', function(e) {
        
        var $new_slot = $('<tr>\
                            <td colspan="1"><div class="form-group"><input type="text" class="asl-attr-label form-control validate[required,funcCall[ASLValidateLabel]]"></div></td>\
                            <td colspan="1"><div class="form-group"><input type="text" class="asl-attr-name form-control validate[required,funcCall[ASLValidateName]]"></div></td>\
                            <td colspan="1">\
                              <span class="add-k-delete glyp-trash">\
                                <svg width="16" height="16"><use xlink:href="#i-trash"></use></svg>\
                              </span>\
                            </td>\
                          </tr>');
        
        var $cur_slot = $('.asl-attr-manage tbody').append($new_slot);
      });

      //  Delete current field
      $('.asl-attr-manage tbody').on('click', '.add-k-delete', function(e) {

        var $this_tr = $(this).parent().parent().remove();
      });

      var custom_fields = {};

      var $field_form   = $('#frm-asl-custom-fields');
      
      $field_form.validationEngine({
        binded: true,
        scroll: false
      });



      //  Save Event for the Fields
      $('#btn-asl-save-schema').on('click', function(e) {

        if (!$field_form.validationEngine('validate')) return;

        var $btn = $(this);

        //  Capture fields data
        var $fields_tr = $('.asl-attr-manage tbody tr');
        $fields_tr.each(function(i) {

            var $tr           = $(this),
                field_label   = $tr.find('.asl-attr-label').val(), 
                field_name    = $tr.find('.asl-attr-name').val(); 

            custom_fields[field_name] = {name: field_name, label: field_label, type: 'text'};
        });

        //  Send an AJAX Request
        $btn.bootButton('loading');

        
        ServerCall(ASL_REMOTE.URL + '?action=asl_save_custom_fields', {fields: custom_fields}, function(_response) {

          $btn.bootButton('reset');

          if (_response.success) {
            atoastr.success(_response.msg);
            return;
          }
          else if (_response.error) {
            atoastr.error(_response.msg || _response.error);
            return;
          }
          else {
            atoastr.success('Error! request failed.');
            return;
          }

        }, 'json');
      });

      // Validate Label
      window['ASLValidateLabel'] = function(field, rules, i, options) {
      };

      // Validate Name
      var reg = new RegExp(/^[a-z\_]+$/);
      window['ASLValidateName'] = function(field, rules, i, options) {

        var _value = field.val();

        if(!reg.test(_value)) {
          return '* Invalid';
        }
      };



      //  The Cache Button
      var $asl_cache_btn    = $("#asl-cache-refresh"),
          $asl_cache_status = $("#asl-fast-cache");

      /**
       * [refreshCache Refresh the Cache]
       * @return {[type]} [description]
       */
      function refreshCache() {

        var sl_cache_params = {
          status: ($asl_cache_status[0].checked)? '1': '0',
          ver: $('#asl-cache-ver').val()
        };

        //  Only show refreshing when enabled
        if(sl_cache_params.status == '1')
          $asl_cache_btn.bootButton('loading');

        ServerCall(ASL_REMOTE.URL + '?action=asl_cache_status', sl_cache_params, function(_response) {

          $asl_cache_btn.bootButton('reset');

          if (_response.success) {

            atoastr.success(_response.msg);
          } else
            atoastr.error(_response.msg);

        }, 'json');
      };

      // JSON Cache Loading
      $asl_cache_status.prop("checked", (_configs['cache'] == '1')? true: false);
        
      //  Change the Cache Status
      $asl_cache_status.bind('change', refreshCache);

      // Add the Cache Version
      $('#asl-cache-ver').val(_configs['cache_ver'] || '0');

      //  Refresh the Cache
      $asl_cache_btn.bind('click', refreshCache);


      //  FAQ
      $('#accordionfaqs .btn.btn-link').bind('click', function(e) {

        var $faq_btn = $(this);

        $faq_btn.toggleClass('collapsed');
        $faq_btn.parent().parent().next().toggleClass('show');
      }); 


      //  View Pro Options
      $('.sl-pro-ctrls .pro-opt-switch').click(function() {

        $('.sl-pro-ctrls').toggleClass('sl-show');
      });
    },
  };

  //<p class="message alert alert-danger static" style="display: block;">Legal Location not found<button data-dismiss="alert" class="close" type="button"> ×</button><span class="block-arrow bottom"><span></span></span></p>
  //if jquery is defined
  if ($)
    $('.asl-p-cont').append('<div class="loading site hide">Working ...</div><div class="asl-dumper dump-message"></div>');

})(jQuery, asl_engine);