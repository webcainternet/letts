<?php
if ( ! defined( 'ABSPATH' ) )
    exit;

if ( ! class_exists( '_WP_Editors' ) )
    require( ABSPATH . WPINC . '/class-wp-editor.php' );

function shortcode_fa_slider_translations() {
    $strings = array(
    	// editor menu button title
    	'button_title'		=> __('Insert new slider', 'fapro'),
        // edit shortcode window
    	'add_new_window_title' => __('Add new slider', 'fapro'),
    	'window_title' 		=> __('Edit slider properties', 'fapro'),
    	'label_slider'		=> __('Select slider', 'fapro'),
    	'label_title' 		=> __('Slider title (PRO)', 'fapro'),
    	'label_show_title' 	=> __('Show title (PRO)', 'fapro'),
    	'label_in_archive' 	=> __("Don't show in archive pages (PRO)", 'fapro'),
    	'label_width' 		=> __('Width (PRO)', 'fapro'),	
    	'label_height' 		=> __('Height  (PRO)', 'fapro'),
    	'label_font_size' 	=> __('Font size  (PRO)', 'fapro'),
    	'label_full_width' 	=> __('Allow full width (PRO)', 'fapro'),
    	'label_top' 		=> __('Distance top  (PRO)', 'fapro'),
    	'label_bottom' 		=> __('Distance bottom  (PRO)', 'fapro'),
    	'label_show_slide_title'=> __('Show slides titles (PRO)', 'fapro'),
    	'label_show_content' 	=> __('Show slides content (PRO)', 'fapro'),
    	'label_show_date' 		=> __('Show slides date (PRO)', 'fapro'),
    	'label_show_read_more' 	=> __('Show slides read more (PRO)', 'fapro'),
    	'label_show_play_video' => __('Show slides play video (PRO)', 'fapro'),
    	'label_img_click' 		=> __('Image clickable (PRO)', 'fapro'),
    	'label_auto_slide' 		=> __('Autoslide (PRO)', 'fapro'),    
    	// add shortcode window
    	'select_win_title' 	=> __('Select slider', 'fapro'),
    	'close_win'			=> __('Close', 'fapro') 
    );
    $locale = _WP_Editors::$mce_locale;
    $translated = 'tinyMCE.addI18n("' . $locale . '.fa_slider", ' . json_encode( $strings ) . ");\n";
    
    // output the sliders in variable
    $sliders = fa_get_sliders('publish');
    $output = array();
    foreach( $sliders as $slider ){
    	$output[] = array(
    		'value' => $slider->ID,
    		'text' 	=> empty( $slider->post_title ) ? '(' . __('no title', 'fapro') . ')' : esc_attr( $slider->post_title )
    	);
    }
    $translated.= 'var fa_sliders=' . json_encode( $output ) . ";\n";
    
    return $translated;
}
$strings = shortcode_fa_slider_translations();