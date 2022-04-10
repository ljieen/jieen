<?php

$locality = trim(implode(', ', array($store_data->city, $store_data->state, $store_data->postal_code, $store_data->country)), ', ');
$address  = [$store_data->street, $locality];
$address  = urlencode(trim(implode(', ', $address)));


if(isset($atts['coords_direction'])) {

    $address = $store_data->lat.','.$store_data->lng;
    $address = urlencode(trim($address));
}

$direction_url = "https://www.google.com/maps/dir/?api=1&destination=".$address;
?>

<section class="asl-cont asl-store-pg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <?php if($store_data->path): ?>
                    <div class="col-md-3 col-sm-3">
                        <div class="img-box">
                            <img src="<?php echo ASL_UPLOAD_URL ?>Logo/<?php echo $store_data->path ?>" alt="<?php echo $store_data->title; ?>" class="sl-logo img-thumbnail">
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="<?php if(!$store_data->path):?> col-md-12 <?php endif; ?>col-md-9 col-sm-9">
                       <div class="asl-content-box">
                          <h2 class="sl-store-title mb-2"><?php echo $store_data->title; ?></h2>
                          <hr class="bottom-line">
                          <ul class="sl-address list-unstyled">
                                <li class="sl-store-info">
                                    <p><?php echo $store_data->street ?> <br> <?php echo $locality ?></p>
                                </li>
                                <?php if($store_data->phone): ?>
                                <li class="sl-store-info">
                                    <i class="icon-mobile-1"></i>
                                    <p><a href="tel:<?php echo $store_data->phone ?>"><?php echo $store_data->phone ?></a></p>
                                </li>
                                <?php endif; ?>
                                <?php if($store_data->email): ?>
                                <li class="sl-store-info">
                                    <i class="icon-mail"></i>
                                    <p><a href="mailto:<?php echo $store_data->email ?>"><?php echo $store_data->email ?></a></p>
                                </li>
                                <?php endif; ?>
                                <?php if($store_data->open_hours): ?>
                                <li class="sl-store-info">
                                    <i class="icon-clock"></i>
                                    <div class="sl-timings list-unstyled">
                                        <?php echo $store_data->open_hours ?>
                                    </div>
                                </li>
                                <?php endif; ?>
                          </ul>
                          <?php if($store_categories): ?>
                          <div class="asl-cat-tags">
                              <ul class="cat-tags-list list-unstyled d-flex">
                                <?php foreach ($store_categories as $c): ?>
                                    <li class="cat-tags mb-1"><?php echo $c; ?></li>
                                <?php endforeach; ?>
                              </ul>
                          </div>
                          <?php endif; ?>
                          <?php if($store_data->description): ?>
                                <p class="asl-short-decp"><?php echo $store_data->description ?></p>
                            <?php endif; ?>
                            <?php if($store_data->description_2): ?>
                                <p class="asl-short-decp"><?php echo $store_data->description_2 ?></p>
                            <?php endif; ?>
                           <div class="btn-box">
                              <div class="row">
                                 <div class="col-6">
                                    <a href="<?php echo $direction_url ?>" target="_blank" class="btn btn-info text-white"><?php echo __('Direction','asl_locator') ?></a>
                                 </div>
                                 <?php if($store_data->website): ?>
                                 <div class="col-6">
                                    <a target="_blank" href="<?php echo $store_data->website ?>" class="btn btn-success"><?php echo __('Website','asl_locator') ?></a>
                                 </div>
                                 <?php endif; ?>
                              </div>
                           </div>
                       </div>                
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div id="asl-map-cont"></div>
            </div>
        </div>
    </div>
</section>


<?php 
echo $google_schema;
?>