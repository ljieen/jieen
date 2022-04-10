<?php

add_action( 'init' , 'planet_green_editor_choice_settings' );
function planet_green_editor_choice_settings(){

	Kirki::add_section( 'planet_green_editor_choice', array(
	    'title'          => esc_html__( 'Editor Choice', 'planet-green' ),
	    'section'        => 'homepage',
	    'priority'       => 1,
	) );

	Kirki::add_field( 'bizberg', [
		'type'        => 'checkbox',
		'settings'    => 'editor_choice_status',
		'label'       => esc_html__( 'Enable Editor Choice', 'planet-green' ),
		'section'     => 'planet_green_editor_choice',
		'default'     => false,
	] );

	Kirki::add_field( 'bizberg', array(
        'type'        => 'select',
        'settings'    => 'editor_choice_grid_category',
        'label'       => esc_html__( 'Select Post Category', 'planet-green' ),
        'section'     => 'planet_green_editor_choice',
        'multiple'    => 99,
        'choices'     => bizberg_get_post_categories(),
        'active_callback'    => array(
            array(
                'setting'  => 'editor_choice_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
    ) );

    Kirki::add_field( 'bizberg', [
		'type'        => 'color',
		'settings'    => 'editor_choice_section_background_color',
		'label'       => __( 'Background Color', 'planet-green' ),
		'section'     => 'planet_green_editor_choice',
		'default'     => '#fafafa82',
		'active_callback'    => array(
            array(
                'setting'  => 'editor_choice_status',
                'operator' => '==',
                'value'    => true,
            ),
        ),
        'transport' => 'auto',
		'output' => array(
			array(
				'element'       => '.editor_section',
				'property'      => 'background'
			)
		),
	] );

    Kirki::add_field( 'bizberg', array(
	    'type'        => 'custom',
	    'settings'    => 'editor_choice_category_settings',
	    'section'     => 'planet_green_editor_choice',
	    'default'     => '<div class="bizberg_customizer_custom_heading">' . esc_html__( 'Category Settings', 'planet-green' ) . '</div>',
	    'active_callback'    => array(
            array(
                'setting'  => 'editor_choice_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
	) );

	Kirki::add_field( 'bizberg', [
		'type'        => 'color',
		'settings'    => 'editor_choice_background_color',
		'label'       => __( 'Category Background Color', 'planet-green' ),
		'section'     => 'planet_green_editor_choice',
		'default'     => '#009688',
		'active_callback'    => array(
            array(
                'setting'  => 'editor_choice_status',
                'operator' => '==',
                'value'    => true,
            ),
        ),
        'transport' => 'auto',
		'output' => array(
			array(
				'element'       => '.editor_section .post_item .post_description a.tag',
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
	            'section'  => 'planet_green_editor_choice',
	            'settings' => 'editor_choice_category_font_settings',
	            'global_active_callback'    => array(
	              	array(
	                	'setting'  => 'editor_choice_status',
	                	'operator' => '==',
	                	'value'    => true
	            	),
	          	),
	            'fields'   => array(
	                'typography' => array(
	                    'desktop' => array(
	                        'label' => esc_html__( 'Category Font Settings', 'planet-green' ),
	                        'settings' => 'editor_choice_category_font_settings',
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
				                	'element' => '.editor_section .post_item .post_description a.tag'
				              	],
				            ],
	                    ),
	                    'tablet' => array(
	                        'label' => esc_html__( 'Category Font Settings', 'planet-green' ),
	                        'settings' => 'editor_choice_category_font_settings',
	                        'default'     => [
				              	'font-size'      => '13px',
				              	'line-height'    => '1.8',
				              	'letter-spacing' => '0',
				            ],
	                        'transport' => 'auto',
	                        'output' => array(
	                            array(
	                                'media_query' => '@media (min-width: 481px) and (max-width: 1024px)',
	                                'element'     => '.editor_section .post_item .post_description a.tag'
	                            )
	                        ),
	                    ),
	                    'mobile' => array(
	                        'label' => esc_html__( 'Category Font Settings', 'planet-green' ),
	                        'settings' => 'editor_choice_category_font_settings',
	                        'default'     => [
				              	'font-size'      => '13px',
				              	'line-height'    => '1.8',
				              	'letter-spacing' => '0'
				            ],
	                        'transport' => 'auto',
	                        'output' => array(
	                            array(
	                                'media_query' => '@media (min-width: 320px) and (max-width: 480px)',
	                                'element'     => '.editor_section .post_item .post_description a.tag'
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
	    'settings'    => 'editor_choice_title_settings',
	    'section'     => 'planet_green_editor_choice',
	    'default'     => '<div class="bizberg_customizer_custom_heading">' . esc_html__( 'Title Settings', 'planet-green' ) . '</div>',
	    'active_callback'    => array(
            array(
                'setting'  => 'editor_choice_status',
                'operator' => '==',
                'value'    => true
            ),
        ),
	) );

	if( function_exists( 'bizberg_kirki_dtm_options' ) ){

	    bizberg_kirki_dtm_options( 
	        array(
	            'display' => array(
	                'desktop' => 'desktop',
	                'tablet'  => 'tablet',
	                'mobile'  => 'mobile'
	            ),
	            'field_id' => 'bizberg',
	            'section'  => 'planet_green_editor_choice',
	            'settings' => 'editor_choice_title_font_settings',
	            'global_active_callback'    => array(
	              	array(
	                	'setting'  => 'editor_choice_status',
	                	'operator' => '==',
	                	'value'    => true
	            	),
	          	),
	            'fields'   => array(
	                'typography' => array(
	                    'desktop' => array(
	                        'label' => esc_html__( 'Title Font Settings', 'planet-green' ),
	                        'settings' => 'editor_choice_title_font_settings',
	                        'default'     => [
	                        	'font-family'    => 'Poppins',
								'variant'        => '500',
				              	'font-size'      => '25px',
				              	'line-height'    => '1.1',
				              	'letter-spacing' => '0'
				            ],
	                        'transport' => 'auto',
	                        'output'      => [
				              	[
				                	'element' => '.editor_section .post_item h3 a'
				              	],
				            ],
	                    ),
	                    'tablet' => array(
	                        'label' => esc_html__( 'Title Font Settings', 'planet-green' ),
	                        'settings' => 'editor_choice_title_font_settings',
	                        'default'     => [
				              	'font-size'      => '25px',
				              	'line-height'    => '1.1',
				              	'letter-spacing' => '0',
				            ],
	                        'transport' => 'auto',
	                        'output' => array(
	                            array(
	                                'media_query' => '@media (min-width: 481px) and (max-width: 1024px)',
	                                'element'     => '.editor_section .post_item h3 a'
	                            )
	                        ),
	                    ),
	                    'mobile' => array(
	                        'label' => esc_html__( 'Title Font Settings', 'planet-green' ),
	                        'settings' => 'editor_choice_title_font_settings',
	                        'default'     => [
				              	'font-size'      => '25px',
				              	'line-height'    => '1.1',
				              	'letter-spacing' => '0'
				            ],
	                        'transport' => 'auto',
	                        'output' => array(
	                            array(
	                                'media_query' => '@media (min-width: 320px) and (max-width: 480px)',
	                                'element'     => '.editor_section .post_item h3 a'
	                            )
	                        ),
	                    )
	                ),
	            )
	            
	        ) 
	    );

	}

}