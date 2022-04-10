<?php

add_action( 'init' , 'planet_green_featured_posts_settings' );
function planet_green_featured_posts_settings(){

	Kirki::add_section( 'planet_green_featured_post', array(
	    'title'          => esc_html__( 'Featured Posts', 'planet-green' ),
	    'section'        => 'homepage',
	    'priority'       => 1,
	) );

	Kirki::add_field( 'bizberg', [
		'type'        => 'checkbox',
		'settings'    => 'featured_post_status',
		'label'       => esc_html__( 'Enable Featured Posts', 'planet-green' ),
		'section'     => 'planet_green_featured_post',
		'default'     => false,
	] );

	Kirki::add_field( 'bizberg', array(
        'type'        => 'select',
        'settings'    => 'featured_post_grid_category',
        'label'       => esc_html__( 'Select Post Category', 'planet-green' ),
        'section'     => 'planet_green_featured_post',
        'multiple'    => 99,
        'choices'     => bizberg_get_post_categories(),
        'active_callback'    => array(
            array(
                'setting'  => 'featured_post_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
    ) );

    Kirki::add_field( 'bizberg', array(
	    'type'        => 'custom',
	    'settings'    => 'featured_post_category_settings',
	    'section'     => 'planet_green_featured_post',
	    'default'     => '<div class="bizberg_customizer_custom_heading">' . esc_html__( 'Category Settings', 'planet-green' ) . '</div>',
	    'active_callback'    => array(
            array(
                'setting'  => 'featured_post_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
	) );

    Kirki::add_field( 'bizberg', [
		'type'        => 'color',
		'settings'    => 'featured_category_background_color',
		'label'       => __( 'Category Background Color', 'planet-green' ),
		'section'     => 'planet_green_featured_post',
		'default'     => '#009688',
		'active_callback'    => array(
            array(
                'setting'  => 'featured_post_status',
                'operator' => '==',
                'value'    => true,
            ),
        ),
        'transport' => 'auto',
		'output' => array(
			array(
				'element'       => 'a.planet_green_featured_cat_link',
				'property'      => 'background'
			)
		),
	] );

	if( function_exists( 'bizberg_kirki_dtm_options' ) ){

	    bizberg_kirki_dtm_options( 
	        array(
	            'display' => array(
	                'desktop' => 'desktop',
	                'tablet'  => 'tablet',
	                'mobile'  => 'mobile'
	            ),
	            'field_id' => 'bizberg',
	            'section'  => 'planet_green_featured_post',
	            'settings' => 'featured_category_font_settings',
	            'global_active_callback'    => array(
	              	array(
	                	'setting'  => 'featured_post_status',
	                	'operator' => '==',
	                	'value'    => true
	            	),
	          	),
	            'fields'   => array(
	                'typography' => array(
	                    'desktop' => array(
	                        'label' => esc_html__( 'Category Font Settings', 'planet-green' ),
	                        'settings' => 'featured_category_font_settings',
	                        'default'     => [
	                        	'font-family'    => 'Poppins',
								'variant'        => '500',
				              	'font-size'      => '13px',
				              	'line-height'    => '1.8',
				              	'letter-spacing' => '0'
				            ],
	                        'transport' => 'auto',
	                        'output'      => [
				              	[
				                	'element' => '.planet_green_featured_cat_link'
				              	],
				            ],
	                    ),
	                    'tablet' => array(
	                        'label' => esc_html__( 'Category Font Settings', 'planet-green' ),
	                        'settings' => 'featured_category_font_settings',
	                        'default'     => [
				              	'font-size'      => '13px',
				              	'line-height'    => '1.8',
				              	'letter-spacing' => '0',
				            ],
	                        'transport' => 'auto',
	                        'output' => array(
	                            array(
	                                'media_query' => '@media (min-width: 481px) and (max-width: 1024px)',
	                                'element'     => '.planet_green_featured_cat_link'
	                            )
	                        ),
	                    ),
	                    'mobile' => array(
	                        'label' => esc_html__( 'Category Font Settings', 'planet-green' ),
	                        'settings' => 'featured_category_font_settings',
	                        'default'     => [
				              	'font-size'      => '13px',
				              	'line-height'    => '1.8',
				              	'letter-spacing' => '0'
				            ],
	                        'transport' => 'auto',
	                        'output' => array(
	                            array(
	                                'media_query' => '@media (min-width: 320px) and (max-width: 480px)',
	                                'element'     => '.planet_green_featured_cat_link'
	                            )
	                        ),
	                    )
	                ),
	            )
	            
	        ) 
	    );

	}

	Kirki::add_field( 'bizberg', array(
	    'type'        => 'custom',
	    'settings'    => 'featured_post_title_settings',
	    'section'     => 'planet_green_featured_post',
	    'default'     => '<div class="bizberg_customizer_custom_heading">' . esc_html__( 'Title Settings', 'planet-green' ) . '</div>',
	    'active_callback'    => array(
            array(
                'setting'  => 'featured_post_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
	) );

	Kirki::add_field( 'bizberg', [
		'type'        => 'color',
		'settings'    => 'featured_post_title_color',
		'label'       => __( 'Title Color', 'planet-green' ),
		'section'     => 'planet_green_featured_post',
		'default'     => '#6ab43e',
		'active_callback'    => array(
            array(
                'setting'  => 'featured_post_status',
                'operator' => '==',
                'value'    => true,
            ),
        ),
        'transport' => 'auto',
		'output' => array(
			array(
				'element'       => '.content-info h4 a',
				'property'      => 'color'
			)
		),
	] );

	if( function_exists( 'bizberg_kirki_dtm_options' ) ){

	    bizberg_kirki_dtm_options( 
	        array(
	            'display' => array(
	                'desktop' => 'desktop',
	                'tablet'  => 'tablet',
	                'mobile'  => 'mobile'
	            ),
	            'field_id' => 'bizberg',
	            'section'  => 'planet_green_featured_post',
	            'settings' => 'featured_title_font_settings',
	            'global_active_callback'    => array(
	              	array(
	                	'setting'  => 'featured_post_status',
	                	'operator' => '==',
	                	'value'    => true
	            	),
	          	),
	            'fields'   => array(
	                'typography' => array(
	                    'desktop' => array(
	                        'label' => esc_html__( 'Title Font Settings', 'planet-green' ),
	                        'settings' => 'featured_title_font_settings',
	                        'default'     => [
	                        	'font-family'    => 'Poppins',
								'variant'        => '500',
				              	'font-size'      => '18px',
				              	'line-height'    => '1.1',
				              	'letter-spacing' => '0'
				            ],
	                        'transport' => 'auto',
	                        'output'      => [
				              	[
				                	'element' => '.list-start .content-info h4'
				              	],
				            ],
	                    ),
	                    'tablet' => array(
	                        'label' => esc_html__( 'Title Font Settings', 'planet-green' ),
	                        'settings' => 'featured_title_font_settings',
	                        'default'     => [
				              	'font-size'      => '18px',
				              	'line-height'    => '1.1',
				              	'letter-spacing' => '0',
				            ],
	                        'transport' => 'auto',
	                        'output' => array(
	                            array(
	                                'media_query' => '@media (min-width: 481px) and (max-width: 1024px)',
	                                'element'     => '.list-start .content-info h4'
	                            )
	                        ),
	                    ),
	                    'mobile' => array(
	                        'label' => esc_html__( 'Title Font Settings', 'planet-green' ),
	                        'settings' => 'featured_title_font_settings',
	                        'default'     => [
				              	'font-size'      => '18px',
				              	'line-height'    => '1.1',
				              	'letter-spacing' => '0'
				            ],
	                        'transport' => 'auto',
	                        'output' => array(
	                            array(
	                                'media_query' => '@media (min-width: 320px) and (max-width: 480px)',
	                                'element'     => '.list-start .content-info h4'
	                            )
	                        ),
	                    )
	                ),
	            )
	            
	        ) 
	    );

	}

}