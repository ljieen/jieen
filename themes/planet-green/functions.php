<?php

add_action( 'after_setup_theme', 'planet_green_after_setup_theme' );
function planet_green_after_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
}

add_action( 'wp_enqueue_scripts', 'planet_green_chld_thm_parent_css' );
function planet_green_chld_thm_parent_css() {

    wp_enqueue_style( 
    	'planet_green_chld_css', 
    	trailingslashit( get_template_directory_uri() ) . 'style.css', 
    	array( 
    		'bootstrap',
    		'font-awesome-5',
    		'bizberg-main',
    		'bizberg-component',
    		'bizberg-style2',
    		'bizberg-responsive' 
    	) 
    );

    if ( is_rtl() ) {
        wp_enqueue_style( 
            'planet_green_parent_rtl', 
            trailingslashit( get_template_directory_uri() ) . 'rtl.css'
        );
    }
    
}

add_filter( 'bizberg_sidebar_settings', 'planet_green_sidebar_settings' );
function planet_green_sidebar_settings(){
	return '4';
}

add_filter( 'bizberg_theme_color', 'planet_green_change_theme_color' );
add_filter( 'bizberg_header_menu_color_hover_sticky_menu', 'planet_green_change_theme_color' );
add_filter( 'bizberg_header_button_color_sticky_menu', 'planet_green_change_theme_color' );
add_filter( 'bizberg_header_button_color_hover_sticky_menu', 'planet_green_change_theme_color' );
function planet_green_change_theme_color(){
    return '#6ab43e';
}

add_filter( 'bizberg_header_button_border_color', 'planet_green_btn_border_color' );
add_filter( 'bizberg_header_button_border_color_sticky_menu', 'planet_green_btn_border_color' );
function planet_green_btn_border_color(){
    return '#478a41';
}

add_filter( 'bizberg_header_menu_color_hover', 'planet_green_header_menu_color_hover' );
function planet_green_header_menu_color_hover(){
    return '#6ab43e';
}

add_filter( 'bizberg_header_button_color', 'planet_green_header_button_color' );
function planet_green_header_button_color(){
    return '#6ab43e';
}

add_filter( 'bizberg_header_button_color_hover', 'planet_green_header_button_color_hover' );
function planet_green_header_button_color_hover(){
    return '#6ab43e';
}

add_filter( 'bizberg_slider_title_box_highlight_color', 'planet_green_slider_title_box_highlight_color' );
function planet_green_slider_title_box_highlight_color(){
    return '#6ab43e';
}

add_filter( 'bizberg_slider_arrow_background_color', 'planet_green_slider_arrow_background_color' );
function planet_green_slider_arrow_background_color(){
    return '#6ab43e';
}

add_filter( 'bizberg_slider_dot_active_color', 'planet_green_slider_dot_active_color' );
function planet_green_slider_dot_active_color(){
    return '#6ab43e';
}

add_filter( 'bizberg_slider_gradient_primary_color', 'planet_green_slider_gradient_primary_color' );
function planet_green_slider_gradient_primary_color(){
    return 'rgba(106,180,62,0.65)';
}

add_filter( 'bizberg_read_more_background_color', 'planet_green_read_more_background_color' );
function planet_green_read_more_background_color(){
    return '#6ab43e';
}

add_filter( 'bizberg_read_more_background_color_2', 'planet_green_read_more_background_color_2' );
function planet_green_read_more_background_color_2(){
    return '#6ab43e';
}

add_filter( 'bizberg_link_color', 'planet_green_link_color' );
function planet_green_link_color(){
    return '#6ab43e';
}

add_filter( 'bizberg_link_color_hover', 'planet_green_link_color_hover' );
function planet_green_link_color_hover(){
    return '#6ab43e';
}

add_filter( 'bizberg_blog_listing_pagination_active_hover_color', 'planet_green_blog_listing_pagination_active_hover_color' );
function planet_green_blog_listing_pagination_active_hover_color(){
    return '#6ab43e';
}

add_filter( 'bizberg_sidebar_widget_link_color_hover', 'planet_green_sidebar_widget_link_color_hover' );
function planet_green_sidebar_widget_link_color_hover(){
    return '#6ab43e';
}

add_filter( 'bizberg_sidebar_widget_title_color', 'planet_green_widget_title_color' );
function planet_green_widget_title_color(){
    return '#6ab43e';
}

add_filter( 'bizberg_footer_social_icon_background', 'planet_green_footer_social_icon_background' );
function planet_green_footer_social_icon_background(){
    return '#6ab43e';
}

add_filter( 'bizberg_footer_social_icon_color', 'planet_green_footer_social_icon_color' );
function planet_green_footer_social_icon_color(){
    return '#fff';
}

add_filter( 'bizberg_sidebar_spacing_status', 'planet_green_sidebar_spacing_status' );
function planet_green_sidebar_spacing_status(){
    return '0px';
}

add_filter( 'bizberg_sidebar_widget_border_color', 'planet_green_sidebar_widget_background_color' );
add_filter( 'bizberg_sidebar_widget_background_color', 'planet_green_sidebar_widget_background_color' );
function planet_green_sidebar_widget_background_color(){
    return 'rgba(251,251,251,0)';
}

add_filter( 'bizberg_three_col_listing_radius', 'planet_green_three_col_listing_radius' );
function planet_green_three_col_listing_radius(){
    return '0';
}

add_filter( 'bizberg_banner_opacity_primary_color', 'planet_green_banner_opacity_primary_color' );
function planet_green_banner_opacity_primary_color(){
    return 'rgba(0,0,0,0.3)';
}

add_filter( 'bizberg_banner_opacity_secondary_color', 'planet_green_banner_opacity_secondary_color' );
function planet_green_banner_opacity_secondary_color(){
    return 'rgba(0,0,0,0.3)';
}

add_filter( 'bizberg_transparent_header_homepage', 'planet_green_transparent_header_homepage' );
function planet_green_transparent_header_homepage(){
    return true;
}

add_filter( 'bizberg_transparent_navbar_background', 'planet_green_transparent_navbar_background' );
function planet_green_transparent_navbar_background(){
    return 'rgba(10,10,10,0)';
}

add_filter( 'bizberg_header_blur', 'planet_green_header_blur' );
function planet_green_header_blur(){
    return 0;
}

add_filter( 'bizberg_transparent_header_menu_sticky_background', 'planet_green_transparent_header_menu_sticky_background' );
function planet_green_transparent_header_menu_sticky_background(){
    return '#fff';
}

add_filter( 'bizberg_transparent_header_menu_color_hover', 'planet_green_transparent_header_menu_color_hover' );
function planet_green_transparent_header_menu_color_hover(){
    return '#6ab43e';
}

add_filter( 'bizberg_transparent_header_menu_sticky_text_color', 'planet_green_transparent_header_menu_sticky_text_color' );
function planet_green_transparent_header_menu_sticky_text_color(){
    return '#64686d';
}

add_filter( 'bizberg_transparent_header_menu_toggle_color_mobile', 'planet_green_transparent_header_menu_toggle_color_mobile' );
function planet_green_transparent_header_menu_toggle_color_mobile(){
    return '#fff';
}

add_filter( 'bizberg_banner_spacing', 'planet_green_consultant_banner_spacing' );
function planet_green_consultant_banner_spacing(){
    return [
        'padding-top'    => '300px',
        'padding-bottom' => '250px',
        'padding-left'   => '0px',
        'padding-right'  => '400px',
    ];
}

add_filter( 'bizberg_banner_image', 'planet_green_banner_image' );
function planet_green_banner_image(){
    return [
        'background-color'      => 'rgba(20,20,20,.8)',
        'background-image'      => get_stylesheet_directory_uri() . '/images/tree-grass-rope-sunlight-flower-green-6280-pxhere.com.jpg',
        'background-repeat'     => 'repeat',
        'background-position'   => 'center center',
        'background-size'       => 'cover',
        'background-attachment' => 'scroll'
    ];
}

add_filter( 'bizberg_banner_title', 'planet_green_banner_title' );
function planet_green_banner_title(){
    return current_user_can( 'edit_theme_options' ) ? esc_html__( 'WELCOME TO PLANET GREEN' , 'planet-green' ) : '';
}

add_filter( 'bizberg_banner_subtitle', 'planet_green_banner_subtitle' );
function planet_green_banner_subtitle(){
    return current_user_can( 'edit_theme_options' ) ? esc_html__( "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form by injected humour." , 'planet-green' ) : '';
}

add_filter( 'bizberg_banner_title_font_status' , 'planet_green_banner_title_font_status' );
function planet_green_banner_title_font_status(){
    return true;
}

add_filter( 'bizberg_banner_title_font_desktop' , 'planet_green_banner_title_font_desktop' );
function planet_green_banner_title_font_desktop(){
    return [
        'font-family'    => 'Poppins',
        'variant'        => '900',
        'font-size'      => '100px',
        'line-height'    => '1',
        'letter-spacing' => '0',
        'text-transform' => 'none'
    ];
}

add_filter( 'bizberg_banner_title_font_tablet' , 'planet_green_banner_title_font_tablet' );
function planet_green_banner_title_font_tablet(){
    return [
        'font-size'      => '70px',
        'line-height'    => '1',
        'letter-spacing' => '0'
    ];
}

add_filter( 'bizberg_banner_title_font_mobile' , 'planet_green_banner_title_font_mobile' );
function planet_green_banner_title_font_mobile(){
    return [
        'font-size'      => '55px',
        'line-height'    => '1',
        'letter-spacing' => '0'
    ];
}

add_filter( 'bizberg_banner_subtitle_font_status' , 'planet_green_banner_subtitle_font_status' );
function planet_green_banner_subtitle_font_status(){
    return true;
}

add_filter( 'bizberg_banner_subtitle_font_settings_desktop' , 'planet_green_banner_subtitle_font_settings_desktop' );
function planet_green_banner_subtitle_font_settings_desktop(){
    return [
        'font-family'    => 'Poppins',
        'variant'        => 'regular',
        'font-size'      => '20px',
        'line-height'    => '1.4',
        'letter-spacing' => '0',
        'text-transform' => 'none'
    ];
}

add_filter( 'bizberg_getting_started_screenshot', function(){
    return true;
});