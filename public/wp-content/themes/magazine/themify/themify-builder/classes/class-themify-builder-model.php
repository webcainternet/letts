<?php

final class Themify_Builder_model {
	/**
	 * Feature Image
	 * @var array
	 */
	static public $post_image = array();
	
	/**
	 * Feature Image Size
	 * @var array
	 */
	static public $featured_image_size = array();

	/**
	 * Image Width
	 * @var array
	 */
	static public $image_width = array();

	/**
	 * Image Height
	 * @var array
	 */
	static public $image_height = array();

	/**
	 * External Link
	 * @var array
	 */
	static public $external_link = array();

	/**
	 * Lightbox Link
	 * @var array
	 */
	static public $lightbox_link = array();

	static public $modules = array();

	static public $layouts_version_name = 'tbuilder_layouts_version';

	static public function register_module( $class, $settings ) {
		if ( class_exists( $class ) ) {

			$instance = new $class();

			self::$modules[ $instance->slug ] = $instance;

			if ( is_user_logged_in() ) {
				self::$modules[ $instance->slug ]->options = isset( $settings['options'] ) ? $settings['options'] : array();
				self::$modules[ $instance->slug ]->styling = isset( $settings['styling'] ) ? $settings['styling'] : array();
			}
			self::$modules[ $instance->slug ]->style_selectors = isset( $settings['styling_selector'] ) ? $settings['styling_selector'] : array();
		}
	}

	/**
	 * Check whether builder is active or not
	 * @return bool
	 */
	static public function builder_check() {
		$enable_builder = apply_filters( 'themify_enable_builder', themify_get('setting-page_builder_is_active') );
		if ( 'disable' == $enable_builder ) {
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Check whether module is active
	 * @param $name
	 * @return boolean
	 */
	static public function check_module_active( $name ) {
		if ( isset( self::$modules[ $name ] ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Check is frontend editor page
	 */
	static public function is_frontend_editor_page() {
		global $post;
		if ( is_user_logged_in() && current_user_can( 'edit_page', $post->ID ) ) {
			return true;
		} else{
			return false;
		}
	}

	/**
	 * Load general metabox fields
	 */
	static public function load_general_metabox() {
		// Feature Image
		self::$post_image = apply_filters( 'themify_builder_metabox_post_image', array(
			'name' 		=> 'post_image',	
			'title' 	=> __('Featured Image', 'themify'),
			'description' => '', 				
			'type' 		=> 'image',			
			'meta'		=> array()
		) );
		// Featured Image Size
		self::$featured_image_size = apply_filters( 'themify_builder_metabox_featured_image_size', array(
			'name'	=>	'feature_size',
			'title'	=>	__('Image Size', 'themify'),
			'description' => __('Image sizes can be set at <a href="options-media.php">Media Settings</a> and <a href="admin.php?page=themify_regenerate-thumbnails">Regenerated</a>', 'themify'),
			'type'		 =>	'featimgdropdown'
		) );
		// Image Width
		self::$image_width = apply_filters( 'themify_builder_metabox_image_width', array(
			'name' 		=> 'image_width',
			'title' 	=> __('Image Width', 'themify'),
			'description' => '',			
			'type' 		=> 'textbox',
			'meta'		=> array('size'=>'small')
		) );
		// Image Height
		self::$image_height = apply_filters( 'themify_builder_metabox_image_height', array(
			'name' 		=> 'image_height',
			'title' 	=> __('Image Height', 'themify'),
			'description' => '',
			'type' 		=> 'textbox',
			'meta'		=> array('size'=>'small')
		) );
		// External Link
		self::$external_link = apply_filters( 'themify_builder_metabox_external_link', array(
			'name' 		=> 'external_link',
			'title' 	=> __('External Link', 'themify'),
			'description' => __('Link Featured Image to external URL', 'themify'),
			'type' 		=> 'textbox',
			'meta'		=> array()
		) );
		// Lightbox Link
		self::$lightbox_link = apply_filters( 'themify_builder_metabox_lightbox_link', array(
			'name' 		=> 'lightbox_link',
			'title' 	=> __('Lightbox Link', 'themify'),
			'description' => __('Link Featured Image to lightbox image, video or external iframe', 'themify'),
			'type' 		=> 'textbox',
			'meta'		=> array()
		) );
	}

	/**
	 * Get module name by slug
	 * @param string $slug 
	 * @return string
	 */
	static public function get_module_name( $slug ) {
		if ( is_object( self::$modules[ $slug ] ) ) {
			return self::$modules[ $slug ]->name;
		} else {
			return $slug;
		}
	}

	/**
	 * Set Pre-built Layout version
	 */
	static public function set_current_layouts_version( $version ) {
		return set_transient( self::$layouts_version_name, $version );
	}

	/**
	 * Get current Pre-built Layout version
	 */
	static public function get_current_layouts_version() {
		$current_layouts_version = get_transient( self::$layouts_version_name );
		if ( false === $current_layouts_version ) {
			self::set_current_layouts_version( '0' );
			$current_layouts_version = '0';
		}
		return $current_layouts_version;
	}

	/**
	 * Check if there Pre-built Layout updates
	 */
	static public function find_layout_updates() {
		if ( version_compare( THEMIFY_BUILDER_LAYOUTS_VERSION, self::get_current_layouts_version(), '>' ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Check whether layout is pre-built layout or custom
	 */
	static public function is_prebuilt_layout( $id ) {
		$protected = get_post_meta( $id, '_themify_builder_prebuilt_layout', true );

		if ( ! empty( $protected ) && 'yes' == $protected ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Return animation presets
	 */
	static public function get_preset_animation() {
		$animation = array(
			array( 'group_label' => __( 'Attention Seekers', 'themify' ), 'options' => array(
				array( 'value' => 'bounce', 'name' => __( 'bounce', 'themify' ) ),
				array( 'value' => 'flash', 'name' => __( 'flash', 'themify' ) ),
				array( 'value' => 'pulse', 'name' => __( 'pulse', 'themify' ) ),
				array( 'value' => 'rubberBand', 'name' => __( 'rubberBand', 'themify' ) ),
				array( 'value' => 'shake', 'name' => __( 'shake', 'themify' ) ),
				array( 'value' => 'swing', 'name' => __( 'swing', 'themify' ) ),
				array( 'value' => 'tada', 'name' => __( 'tada', 'themify' ) ),
				array( 'value' => 'wobble', 'name' => __( 'wobble', 'themify' ) ),
			)),

			array( 'group_label' => __( 'Bouncing Entrances', 'themify' ), 'options' => array(
				array( 'value' => 'bounceIn', 'name' => __( 'bounceIn', 'themify' ) ),
				array( 'value' => 'bounceInDown', 'name' => __( 'bounceInDown', 'themify' ) ),
				array( 'value' => 'bounceInLeft', 'name' => __( 'bounceInLeft', 'themify' ) ),
				array( 'value' => 'bounceInRight', 'name' => __( 'bounceInRight', 'themify' ) ),
				array( 'value' => 'bounceInUp', 'name' => __( 'bounceInUp', 'themify' ) ),
			)),

			array( 'group_label' => __( 'Bouncing Exits', 'themify' ), 'options' => array(
				array( 'value' => 'bounceOut', 'name' => __( 'bounceOut', 'themify' ) ),
				array( 'value' => 'bounceOutDown', 'name' => __( 'bounceOutDown', 'themify' ) ),
				array( 'value' => 'bounceOutLeft', 'name' => __( 'bounceOutLeft', 'themify' ) ),
				array( 'value' => 'bounceOutRight', 'name' => __( 'bounceOutRight', 'themify' ) ),
				array( 'value' => 'bounceOutUp', 'name' => __( 'bounceOutUp', 'themify' ) ),
			)),

			array( 'group_label' => __( 'Fading Entrances', 'themify' ), 'options' => array(
				array( 'value' => 'fadeIn', 'name' => __( 'fadeIn', 'themify' ) ),
				array( 'value' => 'fadeInDown', 'name' => __( 'fadeInDown', 'themify' ) ),
				array( 'value' => 'fadeInDownBig', 'name' => __( 'fadeInDownBig', 'themify' ) ),
				array( 'value' => 'fadeInLeft', 'name' => __( 'fadeInLeft', 'themify' ) ),
				array( 'value' => 'fadeInLeftBig', 'name' => __( 'fadeInLeftBig', 'themify' ) ),
				array( 'value' => 'fadeInRight', 'name' => __( 'fadeInRight', 'themify' ) ),
				array( 'value' => 'fadeInRightBig', 'name' => __( 'fadeInRightBig', 'themify' ) ),
				array( 'value' => 'fadeInUp', 'name' => __( 'fadeInUp', 'themify' ) ),
				array( 'value' => 'fadeInUpBig', 'name' => __( 'fadeInUpBig', 'themify' ) ),
			)),

			array( 'group_label' => __( 'Fading Exits', 'themify' ), 'options' => array(
				array( 'value' => 'fadeOut', 'name' => __( 'fadeOut', 'themify' ) ),
				array( 'value' => 'fadeOutDown', 'name' => __( 'fadeOutDown', 'themify' ) ),
				array( 'value' => 'fadeOutDownBig', 'name' => __( 'fadeOutDownBig', 'themify' ) ),
				array( 'value' => 'fadeOutLeft', 'name' => __( 'fadeOutLeft', 'themify' ) ),
				array( 'value' => 'fadeOutLeftBig', 'name' => __( 'fadeOutLeftBig', 'themify' ) ),
				array( 'value' => 'fadeOutRight', 'name' => __( 'fadeOutRight', 'themify' ) ),
				array( 'value' => 'fadeOutRightBig', 'name' => __( 'fadeOutRightBig', 'themify' ) ),
				array( 'value' => 'fadeOutUp', 'name' => __( 'fadeOutUp', 'themify' ) ),
				array( 'value' => 'fadeOutUpBig', 'name' => __( 'fadeOutUpBig', 'themify' ) ),
			)),

			array( 'group_label' => __( 'Flippers', 'themify' ), 'options' => array(
				array('value' => 'flip',   'name' => __('flip', 'themify')),
				array('value' => 'flipInX', 'name' => __('flipInX', 'themify')),
				array('value' => 'flipInY',  'name' => __('flipInY', 'themify')),
				array('value' => 'flipOutX',  'name' => __('flipOutX', 'themify')),
				array('value' => 'flipOutY',  'name' => __('flipOutY', 'themify'))
			)),

			array( 'group_label' => __( 'Lightspeed', 'themify' ), 'options' => array(
				array('value' => 'lightSpeedIn',   'name' => __('lightSpeedIn', 'themify')),
				array('value' => 'lightSpeedOut', 'name' => __('lightSpeedOut', 'themify')),
			)),

			array( 'group_label' => __( 'Rotating Entrances', 'themify' ), 'options' => array(
				array('value' => 'rotateIn',   'name' => __('rotateIn', 'themify')),
				array('value' => 'rotateInDownLeft', 'name' => __('rotateInDownLeft', 'themify')),
				array('value' => 'rotateInDownRight',  'name' => __('rotateInDownRight', 'themify')),
				array('value' => 'rotateInUpLeft',  'name' => __('rotateInUpLeft', 'themify')),
				array('value' => 'rotateInUpRight',  'name' => __('rotateInUpRight', 'themify'))
			)),

			array( 'group_label' => __( 'Rotating Exits', 'themify' ), 'options' => array(
				array('value' => 'rotateOut',   'name' => __('rotateOut', 'themify')),
				array('value' => 'rotateOutDownLeft', 'name' => __('rotateOutDownLeft', 'themify')),
				array('value' => 'rotateOutDownRight',  'name' => __('rotateOutDownRight', 'themify')),
				array('value' => 'rotateOutUpLeft',  'name' => __('rotateOutUpLeft', 'themify')),
				array('value' => 'rotateOutUpRight',  'name' => __('rotateOutUpRight', 'themify'))
			)),

			array( 'group_label' => __( 'Specials', 'themify' ), 'options' => array(
				array('value' => 'hinge',   'name' => __('hinge', 'themify')),
				array('value' => 'rollIn', 'name' => __('rollIn', 'themify')),
				array('value' => 'rollOut',  'name' => __('rollOut', 'themify')),
			)),

			array( 'group_label' => __( 'Zoom Entrances', 'themify' ), 'options' => array(
				array('value' => 'zoomIn',   'name' => __('zoomIn', 'themify')),
				array('value' => 'zoomInDown', 'name' => __('zoomInDown', 'themify')),
				array('value' => 'zoomInLeft',  'name' => __('zoomInLeft', 'themify')),
				array('value' => 'zoomInRight',  'name' => __('zoomInRight', 'themify')),
				array('value' => 'zoomInUp',  'name' => __('zoomInUp', 'themify'))
			)),

			array( 'group_label' => __( 'Zoom Exits', 'themify' ), 'options' => array(
				array('value' => 'zoomOut',   'name' => __('zoomOut', 'themify')),
				array('value' => 'zoomOutDown', 'name' => __('zoomOutDown', 'themify')),
				array('value' => 'zoomOutLeft',  'name' => __('zoomOutLeft', 'themify')),
				array('value' => 'zoomOutRight',  'name' => __('zoomOutRight', 'themify')),
				array('value' => 'zoomOutUp',  'name' => __('zoomOutUp', 'themify'))
			)),

			array( 'group_label' => __( 'Customs', 'themify' ), 'options' => array(
				array('value' => 'fly-in',   'name' => __('Fly In', 'themify')),
				array('value' => 'fade-in', 'name' => __('Fade In', 'themify')),
				array('value' => 'slide-up',  'name' => __('Slide Up', 'themify'))
			)),

		);
		return $animation;
	}
}