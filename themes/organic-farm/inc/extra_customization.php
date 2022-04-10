<?php

	$organic_farm_sticky_header = get_theme_mod('organic_farm_sticky_header');

	$organic_farm_custom_style= "";

	if($organic_farm_sticky_header != true){

		$organic_farm_custom_style .='.menu_header.fixed{';

			$organic_farm_custom_style .='position: static;';
			
		$organic_farm_custom_style .='}';
	}

	$organic_farm_logo_max_height = get_theme_mod('organic_farm_logo_max_height');

	if($organic_farm_logo_max_height != false){

		$organic_farm_custom_style .='.custom-logo-link img{';

			$organic_farm_custom_style .='max-height: '.esc_html($organic_farm_logo_max_height).'px;';
			
		$organic_farm_custom_style .='}';
	}

	/*---------------------------Width -------------------*/
	
	$organic_farm_theme_width = get_theme_mod( 'organic_farm_width_options','full_width');

    if($organic_farm_theme_width == 'full_width'){

		$organic_farm_custom_style .='body{';

			$organic_farm_custom_style .='max-width: 100%;';

		$organic_farm_custom_style .='}';

	}else if($organic_farm_theme_width == 'Container'){

		$organic_farm_custom_style .='body{';

			$organic_farm_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';

		$organic_farm_custom_style .='}';

	}else if($organic_farm_theme_width == 'container_fluid'){

		$organic_farm_custom_style .='body{';

			$organic_farm_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

		$organic_farm_custom_style .='}';
	}

	/*---------------------------Scroll-top-position -------------------*/
	
	$organic_farm_scroll_options = get_theme_mod( 'organic_farm_scroll_options','right_align');

    if($organic_farm_scroll_options == 'right_align'){

		$organic_farm_custom_style .='.scroll-top button{';

			$organic_farm_custom_style .='';

		$organic_farm_custom_style .='}';

	}else if($organic_farm_scroll_options == 'center_align'){

		$organic_farm_custom_style .='.scroll-top button{';

			$organic_farm_custom_style .='right: 0; left:0; margin: 0 auto; top:85% !important';

		$organic_farm_custom_style .='}';

	}else if($organic_farm_scroll_options == 'left_align'){

		$organic_farm_custom_style .='.scroll-top button{';

			$organic_farm_custom_style .='right: auto; left:5%; margin: 0 auto';

		$organic_farm_custom_style .='}';
	}