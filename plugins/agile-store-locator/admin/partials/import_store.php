<!-- Container -->
<div class="asl-p-cont asl-new-bg">
<div class="hide">
  <svg xmlns="http://www.w3.org/2000/svg">
    <symbol id="i-export" viewBox="0 0 32 32" width="13" height="13" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M28 22 L28 30 4 30 4 22 M16 4 L16 24 M8 12 L16 4 24 12" />
    </symbol>
    <symbol id="i-import" viewBox="0 0 32 32" width="13" height="13" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M28 22 L28 30 4 30 4 22 M16 4 L16 24 M8 16 L16 24 24 16" />
    </symbol>
    <symbol id="i-trash" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
        <title><?php echo __('Trash','asl_admin') ?></title>
        <path d="M28 6 L6 6 8 30 24 30 26 6 4 6 M16 12 L16 24 M21 12 L20 24 M11 12 L12 24 M12 6 L13 2 19 2 20 6" />
    </symbol>
    <symbol id="i-edit" viewBox="0 0 32 32" width="13" height="13" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
        <title><?php echo __('Edit','asl_admin') ?></title>
        <path d="M30 7 L25 2 5 22 3 29 10 27 Z M21 6 L26 11 Z M5 22 L10 27 Z" />
    </symbol>
    <symbol id="i-info" viewBox="0 0 32 32" width="13" height="13" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
        <path d="M16 14 L16 23 M16 8 L16 10" />
        <circle cx="16" cy="16" r="14" />
    </symbol>
    <symbol id="i-upload" viewBox="0 0 32 32" width="13" height="13" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M9 22 C0 23 1 12 9 13 6 2 23 2 22 10 32 7 32 23 23 22 M11 18 L16 14 21 18 M16 14 L16 29" />
    </symbol>
    <symbol id="i-desktop" viewBox="0 0 32 32" width="13" height="13" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M10 29 C10 29 10 24 16 24 22 24 22 29 22 29 L10 29 Z M2 6 L2 23 30 23 30 6 2 6 Z" />
    </symbol>
    <symbol id="i-reload" viewBox="0 0 32 32" width="13" height="13" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
      <path d="M29 16 C29 22 24 29 16 29 8 29 3 22 3 16 3 10 8 3 16 3 21 3 25 6 27 9 M20 10 L27 9 28 2" />
    </symbol>
  </svg>
</div>
  <div class="container">
    <div class="row asl-inner-cont">
      <div class="col-md-12">
        <div class="card p-0 mb-4">
          <h3 class="card-title"><?php echo __('Import Stores','asl_admin') ?></h3>
          <div class="card-body">
          	<div class="dump-message asl-dumper"></div>
						<div class="row">
              <div class="col-12" id="message_complete"></div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card-title mb-3"><?php echo __('Server API Key','asl_admin') ?></div>
                <div class="card-text mb-3"><?php echo __('Please Validate the API Key before Import process, to make sure the coordinates will be fetched correctly through the Google Maps API, ASL is not responsible if Google API doesn\'t provide correct values, please save your Server Google API Key in ASL Settings.','asl_admin') ?></div>
                <div class="row">
                  <div class="col-6 form-group mb-3">
                    <label for="txt_server_key"><?php echo __('Google Geocoding API Key','asl_admin') ?></label>
                    <div class="input-group mb-3">
                      <input type="text" id="txt_server_key" readonly="readonly" value="<?php echo $api_key ?>" class="form-control">
                      <div class="input-group-append">
                        <a id="btn-validate-key" data-loading-text="<?php echo __('Validating...','asl_admin') ?>" class="btn disabled btn-sm btn-primary"><?php echo __('Validate Key','asl_admin') ?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-12">
                <div class="card-title mb-3"><?php echo __('Fetch Coordinates','asl_admin') ?></div>
                <div class="card-text mb-3"><?php echo __('Please use fetch coordinates button to fill your missing coordinates (Lat/Lng) through the Google Geocoding Service, please validate your API Key first.','asl_admin') ?></div>
                <a data-loading-text="<?php echo __('Fetching Coordinates...','asl_admin') ?>" id="btn-fetch-miss-coords" class="btn disabled btn-sm btn-primary"><i><svg width="13" height="13"><use xlink:href="#i-reload"></use></svg></i><?php echo __('Fetch Missing Coordinates','asl_admin') ?></a>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card-title mb-3"><?php echo __('Import Stores','asl_admin') ?></div>
                <div class="card-text mb-3"><?php echo __('Please upload your CSV file and then import it though the import button, please make sure to follow the given template and the columns should be in the right format as described in the documentation or simply use Template.xlsx format, please validate your API Key before import.','asl_admin') ?> <?php echo __('Guide article: ','asl_admin') ?> <a target="_blank" href="https://agilestorelocator.com/wiki/can-import-stores-using-excel-sheet/"><b><?php echo __('Import Stores Using Excel/CSV','asl_admin') ?></b></a>.</div>
                <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" checked="checked" class="custom-control-input" id="asl-create-category">
                    <label class="custom-control-label" for="asl-create-category"><?php echo __('Create Category If NOT Exist','asl_admin') ?></label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" checked="checked" class="custom-control-input" id="asl-use-key">
                    <label class="custom-control-label" for="asl-use-key"><?php echo __('USE API KEY','asl_admin') ?></label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="asl-export-ids">
                    <label class="custom-control-label" for="asl-export-ids"><?php echo __('Export with Store IDs (Only for Update)','asl_admin') ?></label>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="float-right">
                  <button type="button" class="btn disabled btn-success mr-2" data-toggle="smodal" data-target="#import_store_file_emodel"><i><svg width="13" height="13"><use xlink:href="#i-upload"></use></svg></i><?php echo __('Upload','asl_admin') ?></button>
                  <button type="button" class="btn disabled btn-success mr-2" id="export_store_file_"><i><svg width="13" height="13"><use xlink:href="#i-export"></use></svg></i><?php echo __('Export All','asl_admin') ?></button>
                  <button type="button" class="btn disabled btn-danger mr-2" data-loading-text="<?php echo __('Deleting...','asl_admin') ?>" id="asl-delete-stores"><i><svg width="13" height="13"><use xlink:href="#i-trash"></use></svg></i><?php echo __('Delete All Stores & Logo','asl_admin') ?></button>
                  <a target="_blank" class="btn disabled btn-dark" href="<?php echo ASL_URL_PATH.'public/export/template-import.xlsx' ?>">Template.xlsx</a>         
                </div>
              </div>
            </div>
                <table id="tbl_stores" class="table table-bordered">
                <thead>
                  <tr>        
                    <th align="center"><?php echo __('File Name','asl_admin') ?></th>
                    <th align="center"><?php echo __('Date','asl_admin') ?></th>
                    <th align="center"><?php echo __('View','asl_admin') ?></th>
                    <th align="center"><?php echo __('Import','asl_admin') ?></th>
                    <th align="center"><?php echo __('Delete','asl_admin') ?></th>
                  </tr>
                </thead>
                <tbody>
             
              </tbody>
            </table>
              </div>
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
		url: '<?php echo ASL_URL_PATH ?>'
	};

  window.addEventListener("load", function() {
     
	asl_engine.pages.import_store();
});
</script>