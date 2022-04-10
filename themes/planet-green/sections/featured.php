<?php

add_action( 'bizberg_before_homepage_blog', 'planet_green_featured_posts' );
function planet_green_featured_posts(){

	$status = bizberg_get_theme_mod( 'featured_post_status' ); 

	if( $status == false ){
		return;
	} 

	$args = array(
		'post_type'           => 'post',
		'posts_per_page'      => '4',
		'ignore_sticky_posts' => true
	);

	$featured_post_grid_category = bizberg_get_theme_mod( 'featured_post_grid_category' );
	if( !empty( array_filter( $featured_post_grid_category ) ) ){
        $args['category__in'] = $featured_post_grid_category;
    }

	$featured_posts_query = new WP_Query( $args );

	if( $featured_posts_query->have_posts() ):  ?>

		<section class="list-start">

			<div class="container-fluid">

				<div class="list-start-main">

					<div class="row">

						<?php 

						while( $featured_posts_query->have_posts() ): $featured_posts_query->the_post();

							global $post;

							$category_detail = get_the_category( $post->ID );
	            			$cat_name        = !empty( $category_detail[0]->name ) ? $category_detail[0]->name : ''; ?>

							<div class="col-md-3 col-sm-6 col-xs-6">
								<div class="list-item">
									<div class="row">
					                    <div class="col-md-4 col-sm-4 list-height">
					                       <div class="list-image">
					                            <a 
					                            href="<?php the_permalink(); ?>" 
					                            style="<?php echo ( has_post_thumbnail() ? 'background-image: url(' . get_the_post_thumbnail_url( $post, 'medium_large' ) . ')' : 'background-image: linear-gradient(to right, #ddd , #ddd);' ); ?>">
					                        	</a>
					                        </div> 
					                    </div>
					                    <div class="col-md-8 col-sm-8">
					                        <div class="content-info">

					                        	<?php 
		                            			if( !empty( $cat_name ) ){ ?>
								                    <div class="post-category">
								                    	<a href="<?php echo esc_url( get_category_link( $category_detail[0] ) ); ?>" class="planet_green_featured_cat_link">
								                    		<?php echo esc_html( $cat_name ); ?>
								                    	</a>
								                    </div>
								                    <?php 
		                            			} ?>

							                    <h4>
							                    	<a href="<?php the_permalink(); ?>">
							                    		<?php the_title(); ?>
							                    	</a>
							                    </h4>

							                </div>
					                    </div>
					                </div>
								</div>
							</div>

							<?php 

						endwhile; ?>

					</div>

				</div>

			</div>

		</section>

		<?php

	endif;

	wp_reset_postdata();
	
}