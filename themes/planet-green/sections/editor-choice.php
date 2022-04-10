<?php

add_action( 'bizberg_before_homepage_blog', 'planet_green_editor_choice' );
function planet_green_editor_choice(){ 

	$status = bizberg_get_theme_mod( 'editor_choice_status' );

	if( $status == false ){
		return;
	} 

	$args = array(
		'post_type'           => 'post',
		'posts_per_page'      => 5,
		'post_status'         => 'publish',
		'ignore_sticky_posts' => true
	); 

	$editor_choice_grid_category = bizberg_get_theme_mod( 'editor_choice_grid_category' );
	if( !empty( array_filter( $editor_choice_grid_category ) ) ){
        $args['category__in'] = $editor_choice_grid_category;
    }

	$editor_choice_query = new WP_Query( $args );
	$temp_posts = array();

	if( $editor_choice_query->have_posts() ):
		while( $editor_choice_query->have_posts() ): $editor_choice_query->the_post();
			global $post;
			$temp_posts[] = $post->ID;
		endwhile;
	endif;
	wp_reset_postdata();

	if( !empty( $temp_posts ) && is_array( $temp_posts ) ){ ?>

		<section class="post-start editor_section">
			<div class="container">
				<div class="row">
					<?php 
					planet_green_editor_choice_section_1( $temp_posts,0,2 ); 
					planet_green_editor_choice_section_2( $temp_posts ); 
					planet_green_editor_choice_section_1( $temp_posts,3,2 ); 
					?>
				</div>
			</div>
		</section>

		<?php

	}

}

function planet_green_editor_choice_section_2( $data ){

	if( count( $data ) < 3 ){
		return;
	}

	$temp      = array_slice( $data , 2 , 1 );
	$temp_post = $temp[0];

	$category_detail = get_the_category( $temp_post );
	$cat_name        = !empty( $category_detail[0]->name ) ? $category_detail[0]->name : '';

	$featured_image = has_post_thumbnail( $temp_post ) ? get_the_post_thumbnail_url( $temp_post, 'medium_large' ) : get_stylesheet_directory_uri() . '/images/placeholder.jpg'; ?>

	<div class="col-md-6">
		<div class="post_main middle_section">
			<div class="post_item">

				<div class="post_image">
					<a href="<?php echo esc_url( get_permalink( $temp_post ) ); ?>">
						<img src="<?php echo esc_url( $featured_image ); ?>">
					</a>
				</div>

             	<div class="post_description">

             		<?php 
	                if( !empty( $cat_name ) ){ ?>
	             		<a 
	             		class="tag" 
	             		href="<?php echo esc_url( get_category_link( $category_detail[0] ) ); ?>">
	             			<?php echo esc_html( $cat_name ); ?>
	             		</a>
	             		<?php 
	             	} ?>

	             	<h3 class="post_title">
                		<a href="<?php echo esc_url( get_permalink( $temp_post ) ); ?>">
                			<?php echo esc_html( get_the_title( $temp_post ) ); ?>
                		</a>
                	</h3>

                	<div class="post_meta">
                		<span class="post_date">
                			<i class="fa fa-clock-o"></i>
                			<?php echo esc_html( get_the_date() ); ?>
                		</span>
                	</div>

             	</div>

	        </div>
		</div>
	</div>

	<?php
}

function planet_green_editor_choice_section_1( $data, $offset, $length ){

	if( count( $data ) == 0 ){
		return;
	} 

	$temp = array_slice( $data , $offset , $length ); ?>

	<div class="col-md-3">

		<div class="post_main">

			<?php 
			foreach( $temp as $value ){

				$category_detail = get_the_category( $value );
	            $cat_name        = !empty( $category_detail[0]->name ) ? $category_detail[0]->name : ''; 

	            $featured_image = has_post_thumbnail( $value ) ? get_the_post_thumbnail_url( $value, 'medium_large' ) : get_stylesheet_directory_uri() . '/images/placeholder.jpg'; ?>

				<div class="post_item">

					<div 
					class="post_image">
						<a href="<?php echo esc_url( get_permalink( $value ) ); ?>">
							<img 
							src="<?php echo esc_url( $featured_image ); ?>">
						</a>
					</div>

	             	<div class="post_description">

	             		<?php 
		                if( !empty( $cat_name ) ){ ?>
		             		<a 
		             		class="tag " 
		             		href="<?php echo esc_url( get_category_link( $category_detail[0] ) ); ?>">
		             			<?php echo esc_html( $cat_name ); ?>
		             		</a>
		             		<?php 
		             	} ?>

	                	<h3 class="post_title">
	                		<a href="<?php echo esc_url( get_permalink( $value ) ); ?>">
	                			<?php echo esc_html( get_the_title( $value ) ); ?>
	                		</a>
	                	</h3>

	                	<div class="post_meta">
	                		<span class="post_date">
	                			<i class="fa fa-clock-o"></i>
	                			<?php echo esc_html( get_the_date() ); ?>
	                		</span>
	                	</div>

	             	</div>

	         	</div>

	         	<?php 
	        } ?>

		</div>

	</div>

	<?php
}