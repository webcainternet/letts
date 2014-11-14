<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( current_user_can( 'manage_options' ) ) {
	remove_action( 'admin_init',   array( 'WP_Customize', 'admin_init' ) );
}

/**
 * Themify customizer controls and settings.
 */
class Themify_Customizer {

	/**
	 * Settings to build controls in Theme Customizer
	 * @var array
	 */
	var $settings = array();

	/**
	 * List of selector/property/property value to build CSS rules.
	 * @var array
	 */
	var $styles = array();

	/**
	 * Initialize class
	 */
	function __construct() {

		define( 'THEMIFY_CUSTOMIZER_URI', THEMIFY_URI . '/customizer' );
		define( 'THEMIFY_CUSTOMIZER_DIR', THEMIFY_DIR . '/customizer' );

		// Build list of settings for live preview and CSS generation
		add_action( 'customize_register', array( $this, 'build_settings_and_styles' ), 12 );
		add_action( 'after_setup_theme',  array( $this, 'build_settings_and_styles' ) );

		// Initialize Theme Customizer
		add_action( 'customize_register' , array( $this, 'customize_register' ), 14 );

		// Enqueue Javascript for Theme Customizer control
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'customize_control_scripts' ) );

		// Enqueue Javascript for Theme Customizer live preview
		add_action( 'customize_preview_init' , array( $this, 'live_preview_scripts' ) );

		add_action( 'wp_ajax_themify_customizer_save_option', array( $this, 'save_option' ) );
		add_action( 'wp_ajax_themify_customizer_get_option', array( $this, 'get_option' ) );

		// Output custom styling
		add_action( 'wp_head' , array( $this, 'generate_css' ), 11 );

	}

	/**
	 * Build list of styling settings with:
	 * - controls for live preview
	 * - selectors/properties for CSS rules generation
	 *
	 * @since 1.0.0
	 */
	function build_settings_and_styles() {
		////////////////////////
		// Build Controls
		////////////////////////
		$this->settings = apply_filters( 'themify_customizer_settings', array()	);

		////////////////////////
		// Build CSS Styling
		////////////////////////
		foreach ( $this->settings as $key => $setting ) {
			if ( isset( $setting['selector'] ) ) {
				$this->styles[$setting['selector']][] = array(
					'prop' => isset( $setting['prop'] ) ? $setting['prop'] : '',
					'key'  => isset( $key ) ? $key : '',
					'prefix' => isset( $setting['prefix'] ) ? $setting['prefix'] : '',
				);
			}
		}
	}

	/**
	 * Parameters for accordion start.
	 *
	 * @param string $label
	 * @param string $section
	 * @return array
	 */
	function accordion_start( $label = '', $section = 'themify_options' ) {
		return array(
			'control' => array(
				'type'    => 'Themify_Sub_Accordion_Start',
				'label'   => $label,
				'section' => $section,
			),
		);
	}

	/**
	 * Parameters for accordion end.
	 *
	 * @param string $label
	 * @param string $section
	 * @return array
	 */
	function accordion_end( $label = '', $section = 'themify_options' ) {
		return array(
			'control' => array(
				'type'    => 'Themify_Sub_Accordion_End',
				'label'   => $label,
				'section' => $section,
			),
		);
	}

	/**
	 * Enqueue script for custom control.
	 */
	function customize_control_scripts() {
		// Font Icon CSS
		wp_enqueue_style( 'themify-icons', THEMIFY_URI . '/themify-icons/themify-icons.css', array(), THEMIFY_VERSION );

		// Minicolors CSS
		wp_enqueue_style( 'themify-colorpicker', THEMIFY_URI . '/css/jquery.minicolors.css', array(), THEMIFY_VERSION );

		// Controls CSS
		wp_enqueue_style( 'themify-customize-control',	THEMIFY_CUSTOMIZER_URI . '/css/themify.customize-control.css', array(), THEMIFY_VERSION );

		// Minicolors JS
		wp_enqueue_script( 'themify-colorpicker-js', THEMIFY_URI . '/js/jquery.minicolors.js', array('jquery'), THEMIFY_VERSION );

		// Controls JS
		wp_enqueue_script( 'themify-customize-control',	THEMIFY_CUSTOMIZER_URI . '/js/themify.customize-control.js', array( 'jquery', 'customize-controls', 'underscore', 'backbone' ), THEMIFY_VERSION, true );
		$controls = array(
			'nonce' 		=> wp_create_nonce( 'ajax-nonce' ),
			'clearMessage'  => __( 'This will reset all styling and customization. Do you want to proceed?', 'themify' ),
		);
		// Pass JS variables to controls
		wp_localize_script( 'themify-customize-control', 'themifyCustomizerControls', $controls );
	}

	/**
	 * Enqueue script for live preview.
	 */
	function live_preview_scripts() {
		// Live preview JS
		wp_enqueue_script( 'themify-customize-preview',	THEMIFY_CUSTOMIZER_URI . '/js/themify.customize-preview.js', array( 'jquery', 'customize-preview', 'underscore', 'backbone' ), THEMIFY_VERSION, true );
		$controls = array(
			'nonce' 	=> wp_create_nonce( 'ajax-nonce' ),
			'ajaxurl' 	=> admin_url( 'admin-ajax.php' ),
			'isRTL'		=> is_rtl(),
		);
		foreach ( $this->settings as $key => $params ) {
			if ( ! isset( $params['selector'] ) ) {
				continue;
			}
			if ( false !== stripos( $key, '_font' ) ) {
				$controls['fontControls'][$key] = $params['selector'];
			}
			if ( false !== stripos( $key, '_background' ) ) {
				$controls['backgroundControls'][$key] = $params['selector'];
			}
			if ( false !== stripos( $key, '-logo_' ) ) {
				$controls['logoControls'][$key] = $params['selector'];
			}
			if ( false !== stripos( $key, '-tagline' ) ) {
				$controls['taglineControls'][$key] = $params['selector'];
			}
			if ( false !== stripos( $key, '_border' ) ) {
				$controls['borderControls'][$key] = $params['selector'];
			}
			if ( false !== stripos( $key, '_margin' ) ) {
				$controls['marginControls'][$key] = $params['selector'];
			}
			if ( false !== stripos( $key, '_padding' ) ) {
				$controls['paddingControls'][$key] = $params['selector'];
			}
			if ( false !== stripos( $key, '_width' ) ) {
				$controls['widthControls'][$key] = $params['selector'];
			}
			if ( false !== stripos( $key, '_height' ) ) {
				$controls['heightControls'][$key] = $params['selector'];
			}
			if ( false !== stripos( $key, '_position' ) ) {
				$controls['positionControls'][$key] = $params['selector'];
			}
			if ( false !== stripos( $key, '_color' ) ) {
				$controls['colorControls'][$key] = $params['selector'];
			}
			if ( false !== stripos( $key, 'customcss' ) ) {
				$controls['customcssControls'][$key] = $params['selector'];
			}
			if ( false !== stripos( $key, '_imageselect' ) ) {
				$controls['imageselectControls'][$key] = $params['selector'];
			}
		}

		// Pass JS variables to live preview scripts
		wp_localize_script( 'themify-customize-preview', 'themifyCustomizer', $controls );
	}

	/**
	 * Save a blog option.
	 *
	 * @since 1.0.0
	 */
	function save_option(){
		check_ajax_referer( 'ajax-nonce', 'nonce' );
		if ( isset( $_POST['option'] ) && isset( $_POST['value'] ) ) {
			update_option( $_POST['option'], stripslashes( $_POST['value'] ) );
			echo 'saved';
		} else {
			echo 'notsaved';
		}
		die();
	}

	/**
	 * Get a blog option.
	 *
	 * @since 1.0.0
	 */
	function get_option(){
		check_ajax_referer( 'ajax-nonce', 'nonce' );
		if ( isset( $_POST['option'] ) && '' != $_POST['option'] ) {
			switch( $_POST['option'] ) {
				case 'blogname':
					echo preg_replace_callback("/(&#[0-9]+;)/", array( $this, 'decode_entities' ), html_entity_decode( get_bloginfo( 'name' ) ) );
					break;
				case 'blogdescription':
					echo preg_replace_callback("/(&#[0-9]+;)/", array( $this, 'decode_entities' ), html_entity_decode( get_bloginfo( 'description' ) ) );
					break;
				default:
					echo get_option( $_POST['option'] );
					break;
			}
		} else {
			echo 'notfound';
		}
		die();
	}

	/**
	 * Converts encoding for HTML entities not catched by html_entity_decode.
	 * @param array $matches
	 * @return string
	 */
	function decode_entities( $matches ) {
		return mb_convert_encoding( $matches[1], 'UTF-8', 'HTML-ENTITIES' );
	}

	/**
	 * Add customizer controls.
	 * @param \WP_Customize_Manager $wp_customize
	 */
	function customize_register ( $wp_customize ) {

		foreach ( array(
			'themify-control',
			'fonts-control',
			'image-select-control',
			'text-decoration-control',
			'background-control',
			'border-control',
			'margin-control',
			'padding-control',
			'color-control',
			'color-transparent-control',
			'width-control',
			'height-control',
			'position-control',
			'customcss-control',
			'image-control',
			'logo-control',
			'tagline-control',
			'clear-control',
			'sub-accordion', ) as $control ) {
			require_once THEMIFY_CUSTOMIZER_DIR . "/class-$control.php";
		}

		$wp_customize->add_section( 'themify_options',
			array(
			     'title' => __( 'Themify Options', 'themify' ),
			)
		);
		$priority = 10;
		foreach ( $this->settings as $setting_id => $field ) {

			$setting = isset( $field['setting'] ) ? $field['setting'] : array( 'default' => '' );
			$wp_customize->add_setting(
				$setting_id, // serialized solo cuando type es 'option'
				array(
					'default'    => isset( $setting['default'] ) ? $setting['default'] : '',
					'type'       => isset( $setting['type'] ) ? $setting['type'] : 'theme_mod',
					'capability' => isset( $setting['capability'] ) ? $setting['capability'] : 'edit_theme_options',
					'transport'  => isset( $setting['transport'] ) ? $setting['transport'] : 'postMessage',
				)
			);

			if ( isset( $field['control'] ) ) {
				$control = $field['control'];
				$class = $control['type'];
				if ( class_exists( $class ) ) {
					$wp_customize->add_control( new $class(
						$wp_customize,
						$setting_id . '_ctrl',
						array(
							'label'    => isset( $control['label'] ) ? $control['label'] : '',
							'show_label' => isset( $control['show_label'] ) ? $control['show_label'] : true,
							'color_label' => isset( $control['color_label'] ) ? $control['color_label'] : __( 'Color', 'themify' ),
							'image_options' => isset( $control['image_options'] ) ? $control['image_options'] : array(),
							'section'  => isset( $control['section'] ) ? $control['section'] : 'themify_options',
							'settings' => isset( $control['settings'] ) ? $control['settings'] : $setting_id,
							'priority' => $priority,
						)
					));
				} elseif ( 'nav_menu' == $class ) {
					$this->add_nav_menu_control( $wp_customize, $control['location'], array(
						'priority' => $priority
					) );
				} else {
					$options = array(
						'label'    => isset( $control['label'] ) ? $control['label'] : '',
						'show_label' => isset( $control['show_label'] ) ? $control['show_label'] : true,
						'color_label' => isset( $control['color_label'] ) ? $control['color_label'] : __( 'Color', 'themify' ),
						'image_options' => isset( $control['image_options'] ) ? $control['image_options'] : array(),
						'section'  => isset( $control['section'] ) ? $control['section'] : 'themify_options',
						'settings' => isset( $control['settings'] ) ? $control['settings'] : $setting_id,
						'priority' => $priority,
						'type'     => $class,
					);
					if ( 'select' == $class ) {
						$options['choices'] = $control['choices'];
					}
					$wp_customize->add_control( $setting_id . '_ctrl', $options );
				}
			} elseif ( isset( $field['builtin'] ) ) {

			}
			$priority++;
		}

		// Remove Nav Menus Section
		$wp_customize->remove_section( 'nav' );

		// Remove title and tagline section
		$wp_customize->remove_setting( 'blogname' );
		$wp_customize->remove_setting( 'blogdescription' );
		$wp_customize->remove_control( 'blogname' );
		$wp_customize->remove_control( 'blogdescription' );
		$wp_customize->remove_section( 'title_tagline' );

		// Remove control for Posts Page in Static Front Page section
		$wp_customize->remove_control( 'page_for_posts' );
	}

	/**
	 * Add the control to render a navigation menu selector
	 *
	 * @param object $wp_customize Customizer instance.
	 * @param string $menu_location Location to add menu to.
	 * @param array $args Extra arguments to setup the control.
	 */
	function add_nav_menu_control( $wp_customize, $menu_location = '', $args = array() ) {
		$locations      = get_registered_nav_menus();
		$menus          = wp_get_nav_menus();

		if ( $menus ) {
			$choices = array( 0 => __( '&mdash; Select &mdash;', 'themify' ) );
			foreach ( $menus as $menu ) {
				$choices[ $menu->term_id ] = wp_html_excerpt( $menu->name, 40, '&hellip;' );
			}

			foreach ( $locations as $location => $description ) {
				if ( $location == $menu_location ) {
					$menu_setting_id = "nav_menu_locations[{$location}]";

					$wp_customize->add_setting( $menu_setting_id, array(
						'sanitize_callback' => 'absint',
						'theme_supports'    => 'menus',
					) );

					$wp_customize->add_control( $menu_setting_id, array(
						'label'   => $description,
						'section' => 'themify_options',
						'type'    => 'select',
						'choices' => $choices,
						'priority' => $args['priority'],
					) );
					break;
				}
			}
		}
	}

	/**
	 * Generate CSS rules and output them.
	 * @uses filter 'themify_theme_styling' over output.
	 */
	function generate_css() {
		// Styles are saved by selector to later output them all at once
		$css = array();
		$custom_css = '';

		foreach ( $this->styles as $selector => $style ) {
			if ( ! isset( $css[$selector] ) ) {
				$css[$selector] = '';
			}
			if ( 'customcss' == $selector ) {
				$custom_css = $this->custom_css();
				continue;
			}
			if ( isset( $style[0] ) ) {
				if ( is_array( $style[0] ) ) {
					foreach( $style as $mstyle ) {
						if ( 'logo' == $mstyle['prop'] || 'tagline' == $mstyle['prop'] ) {
							if ( $logo_props = $this->build_image_size_rule( $mstyle['key'] ) ) {
								$css[$selector . ' img'] = $logo_props;
							}
							if ( 'logo' == $mstyle['prop'] ) {
								$css[$selector . ' a'] = $this->build_color_rule( $mstyle['key'] );
							}
						}
						$css[$selector] .= $this->build_css_rule( $selector, $mstyle['prop'], $mstyle['key'],
							isset( $mstyle['prefix'] ) ? $mstyle['prefix'] : '',
							isset( $mstyle['suffix'] ) ? $mstyle['suffix'] : ''
						);
					}
				} else {
					if ( 'logo' == $style['prop'] || 'tagline' == $style['prop'] ) {
						if ( $logo_props = $this->build_image_size_rule( $style['key'] ) ) {
							$css[$selector . ' img'] = $logo_props;
						}
						if ( 'logo' == $style['prop'] ) {
							$css[$selector . ' a'] = $this->build_color_rule( $style['key'] );
						}
					}
					$css[$selector] .= $this->build_css_rule( $selector, $style['prop'], $style['key'],
						isset( $style['prefix'] ) ? $style['prefix'] : '',
						isset( $style['suffix'] ) ? $style['suffix'] : ''
					);
				}
			}
		}
		if ( ! empty( $css ) ) :
			$out = '';
			foreach ( $css as $selector => $properties ) {
				$out .= '' != $properties ? "\n$selector {\n $properties \n}\n" : '';
			}
			?>
			<!--Themify Styling-->
			<style type="text/css"><?php echo apply_filters( 'themify_customizer_styling', $out ); ?></style>
			<!--/Themify Styling-->
		<?php endif;

		if ( ! empty( $custom_css ) ) :
			?>
			<!--Themify Customize Custom CSS-->
			<style type="text/css"><?php echo "\n" . apply_filters( 'themify_customizer_custom_css', $custom_css ); ?></style>
			<!--/Themify Customize Custom CSS-->
		<?php endif;
	}

	/**
	 * Outputs image width and height for the logo/description image if they are available.
	 *
	 * @param string $mod_name
	 * @return string
	 */
	function build_image_size_rule( $mod_name ) {
		$element = json_decode( get_theme_mod( $mod_name ) );
		$element_props = '';
		if ( ! empty( $element->imgwidth ) ) {
			$element_props .= "\twidth: {$element->imgwidth}px;";
		}
		if ( ! empty( $element->imgheight ) ) {
			$element_props .= "\n\theight: {$element->imgheight}px;";
		}
		return $element_props;
	}

	/**
	 * Outputs color for the logo in text mode since it's needed for the <a>.
	 *
	 * @param string $mod_name
	 * @return string
	 */
	function build_color_rule( $mod_name ) {
		$element = json_decode( get_theme_mod( $mod_name ) );
		$element_props = '';
		if ( ! empty( $element->imgwidth ) ) {
			$element_props .= "\twidth: {$element->imgwidth}px;";
		}
		if ( isset( $element->color ) && '' != $element->color ) {
			$element_props .= "\n\tcolor: #$element->color;";
			$opacity = ( isset( $element->opacity ) && '' != $element->opacity ) ? $element->opacity : '1';
			$element_props .= "\n\tcolor: rgba(" . $this->hex2rgb( $element->color ) . ',' . $opacity . ');';
		}
		return $element_props;
	}

	/**
	 * Checks if there's a Custom CSS text stored, formats it and returns it to be output.
	 *
	 * @return string
	 */
	function custom_css() {
		$mod = get_theme_mod( 'customcss' );

		// Remove JSON stuff
		$mod = str_replace( '{"css":"', '', $mod );
		$mod = str_replace( '"}', '', $mod );

		// Escape double quotes
		$mod = str_replace( '"', '\"', $mod );
		$mod = str_replace( "'", '\"', $mod );

		// Rebuild JSON
		$mod = '{"css":"' . $mod . '"}';

		$customcss = json_decode( $mod );
		$out = '';
		if ( isset( $customcss->css ) && '' != $customcss->css ) {
			$out .= str_replace( array( '{', '}' ), array( "{\n\t", "\n}\n" ), trim( $customcss->css ) );
		}
		return $out;
	}

	/**
	 * Build a CSS rule.
	 *
	 * @param string $selector CSS selector.
	 * @param string $style CSS property to write.
	 * @param string $mod_name The 'theme_mod' option to fetch.
	 * @param string $prefix Prefix for CSS property value.
	 * @param string $suffix Suffix for CSS property value.
	 * @return string CSS rule: selector, property and property value. Empty if 'theme_mod' option specified is empty.
	 */
	function build_css_rule( $selector, $style, $mod_name, $prefix = '', $suffix = '' ) {
		$mod = get_theme_mod( $mod_name );
		$out = '';
		if ( ! empty( $mod ) ) {
			if ( 'font' == $style || 'logo' == $style || 'tagline' == $style || 'decoration' == $style ) {
				// Font Rule
				$font = json_decode( $mod );
				if ( isset( $font->family->name ) && '' != $font->family->name ) {
					if ( isset( $font->family->fonttype ) && 'google' == $font->family->fonttype ) {
						$user_subsets = themify_check( 'setting-webfonts_subsets' ) ? themify_get( 'setting-webfonts_subsets' ) : array('latin');
						wp_enqueue_style( 'custom-google-fonts' . md5($selector), themify_https_esc( 'http://fonts.googleapis.com/css' ) . '?family=' . str_replace( ' ', '+', $font->family->name ) . ':' . $font->family->variant . '&subset=' . implode(',', $user_subsets) );
					}
					$out .= sprintf("\n\tfont-family:%s;", $prefix . $font->family->name . $suffix );
				}
				if ( ! isset( $font->nostyle ) || '' == $font->nostyle ) {
					if ( isset( $font->italic ) && '' != $font->italic ) {
						$out .= sprintf("\tfont-style:%s;\n", $prefix . $font->italic . $suffix );
					}
					if ( isset( $font->bold ) && '' != $font->bold ) {
						$out .= sprintf("\tfont-weight:%s;\n", $prefix . $font->bold . $suffix );
					}
					if ( isset( $font->underline ) && '' != $font->underline ) {
						$out .= sprintf("\ttext-decoration:%s;\n", $prefix . $font->underline . $suffix );
					} elseif ( isset( $font->linethrough ) && '' != $font->linethrough ) {
						$out .= sprintf("\ttext-decoration:%s;\n", $prefix . $font->linethrough . $suffix );
					}
				} else {
					$out .= sprintf("\tfont-style:%s;\n", $prefix . 'normal' . $suffix );
					$out .= sprintf("\tfont-weight:%s;\n", $prefix . 'normal' . $suffix );
					$out .= sprintf("\ttext-decoration:%s;\n", $prefix . 'none' . $suffix );
				}
				if ( isset( $font->sizenum ) && '' != $font->sizenum ) {
					$unit = isset( $font->sizeunit ) && '' != $font->sizeunit ? $font->sizeunit : 'px';
					$out .= sprintf("\tfont-size:%s;\n", $prefix . $font->sizenum . $unit . $suffix );
				}
				if ( isset( $font->linenum ) && '' != $font->linenum ) {
					$unit = isset( $font->lineunit ) && '' != $font->lineunit ? $font->lineunit : 'px';
					$out .= sprintf("\tline-height:%s;\n", $prefix . $font->linenum . $unit . $suffix );
				}
				if ( ! isset( $font->nostyle ) || '' == $font->nostyle ) {
					if ( isset( $font->align ) && '' != $font->align ) {
						$out .= sprintf("\ttext-align:%s;", $prefix . $font->align . $suffix );
					}
				} else {
					if ( '' == is_rtl() ) {
						$out .= sprintf("\ttext-align:%s;", $prefix . 'left' . $suffix );
					} else {
						$out .= sprintf("\ttext-align:%s;", $prefix . 'right' . $suffix );
					}
				}
				if ( isset( $font->color ) && '' != $font->color ) {
					$out .= "\n\tcolor: #$font->color;";
					$opacity = ( isset( $font->opacity ) && '' != $font->opacity ) ? $font->opacity : '1';
					$out .= "\n\tcolor: rgba(" . $this->hex2rgb( $font->color ) . ',' . $opacity . ');';
				}
			}
			if ( 'logo' == $style || 'tagline' == $style ) {
				// Logo/description Rule
				$element = json_decode( $mod );
				if ( isset( $element->mode ) ) {
					if ( 'none' == $element->mode ) {
						$out .= 'display: none;';
					}
				}
			} elseif ( 'color' == $style ) {
				// Color Rule
				$color = json_decode( $mod );
				if ( isset( $color->color ) && '' != $color->color ) {
					$out .= "\n\tcolor: #$color->color;";
					$opacity = ( isset( $color->opacity ) && '' != $color->opacity ) ? $color->opacity : '1';
					$out .= "\n\tcolor: rgba(" . $this->hex2rgb( $color->color ) . ',' . $opacity . ');';
				}

			} elseif ( 'background' == $style ) {
				// Background Rule
				$bg = json_decode( $mod );

				if ( isset( $bg->noimage ) && 'noimage' == $bg->noimage ) {
					$out .= 'background-image: none;';
				} elseif ( isset( $bg->src ) && '' != $bg->src ) {
					$out .= sprintf("\n\tbackground-image: url(%s);", $prefix . $bg->src . $suffix );
				}
				if ( isset( $bg->style ) && '' != $bg->style ) {
					if ( 'fullcover' == $bg->style ) {
						$out .= "\n\tbackground-size: cover;";
					} else {
						$out .= "\n\tbackground-repeat: {$bg->style};";
					}
				}
				if ( isset( $bg->position ) && '' != $bg->position ) {
					$out .= "\n\tbackground-position: {$bg->position};";
				}
				if ( isset( $bg->transparent ) && '' != $bg->transparent ) {
					$out .= "\n\tbackground-color: $bg->transparent;";
				} elseif ( isset( $bg->color ) && '' != $bg->color ) {
					$out .= "\n\tbackground-color: #$bg->color;";
					$opacity = ( isset( $bg->opacity ) && '' != $bg->opacity ) ? $bg->opacity : '1';
					$out .= "\n\tbackground-color: rgba(" . $this->hex2rgb( $bg->color ) . ',' . $opacity . ');';
				}
			} elseif ( 'border' == $style ) {
				// Border Rule
				$border = json_decode( $mod );
				if ( isset( $border->disabled ) && 'disabled' == $border->disabled ) {
					$out .= 'border: none;';
				} else {
					$same = ( isset( $border->same ) && '' != $border->same ) ? 'same' : '';
					if ( '' == $same ) {
						foreach ( array( 'top', 'right', 'bottom', 'left' ) as $side ) {
							if ( isset( $border->{$side} ) ) {
								$border_side = $border->{$side};
								$out .= $this->setBorder( $border_side, 'border-' . $side );
							}
						}
					} else {
						$out .= $this->setBorder( $border );
					}
				}
			} elseif ( 'margin' == $style || 'padding' == $style ) {
				// Margin/Padding Rule
				$marginpadding = json_decode( $mod );

				$same = ( isset( $marginpadding->same ) && '' != $marginpadding->same ) ? 'same' : '';
				if ( '' == $same ) {
					foreach ( array( 'top', 'right', 'bottom', 'left' ) as $side ) {
						if ( isset( $marginpadding->{$side} ) ) {

							if ( 'margin' == $style && isset( $marginpadding->{$side}->auto ) && 'auto' == $marginpadding->{$side}->auto ) {
								$out .= $style . '-' . $side . ': auto;';
							} else {
								$this_side = $marginpadding->{$side};
								$out .= $this->setDimension( $this_side, $style . '-' . $side );
							}
						}
					}
				} else {
					if ( 'margin' == $style && isset( $marginpadding->auto ) && 'auto' == $marginpadding->auto ) {
						$out .= $style . ': auto;';
					} else {
						$out .= $this->setDimension( $marginpadding, $style );
					}
				}

			} elseif ( 'width' == $style || 'height' == $style ) {
				// Width/Height Rule
				$widthheight = json_decode( $mod );

				if ( isset( $widthheight->auto ) && 'auto' == $widthheight->auto ) {
					$out .= $style . ': auto;';
				} else {
					$out .= $this->setDimension( $widthheight, $style );
				}
			} elseif ( 'position' == $style ) {
				// Position Rule
				$position = json_decode( $mod );

				if ( isset( $position->position ) && '' != $position->position ) {
					$out .= sprintf("\tposition:%s;\n", $prefix . $position->position . $suffix );
				}

				foreach ( array( 'vertical', 'horizontal' ) as $axis ) {
					if ( isset( $position->{$axis} ) ) {
						$this_side = $position->{$axis};
						$side = 'top';
						if ( 'horizontal' == $position->{$axis} ) {
							$side = 'left';
						}
						if ( isset( $position->{$axis}->side ) && 'top' != $position->{$axis}->side && 'left' != $position->{$axis}->side ) {
							$side = $position->{$axis}->side;
						}
						$out .= $this->setDimension( $this_side, $side );
					}
				}

			} elseif ( 'image' == $style ) {
				// Image Rule does nothing because it's not styling by markup injected in a php function.
			}
		}
		// Build rule to return
		if ( '' != $out ) {
			$out = "\t$out";
		}
		return $out;
	}

	/**
	 * Generate border properties.
	 *
	 * @uses hex2rgb()
	 *
	 * @param object $border Object with all the necessary values.
	 * @param string $property Property to set, can be border or border-left for example
	 * @return string
	 */
	function setBorder( $border, $property = 'border' ) {
		$out = '';
		if ( isset( $border->style ) && 'none' != $border->style ) {
			if ( '' != $border->style ) {
				$out .= "\n\t$property-style: $border->style;";
			}
			if ( isset( $border->width ) && '' != $border->width ) {
				$out .= "\n\t$property-width: {$border->width}px;";
			}
			if ( isset( $border->color ) && '' != $border->color ) {
				$out .= "\n\t$property-color: #$border->color;";
				$opacity = ( isset( $border->opacity ) && '' != $border->opacity ) ? $border->opacity : '1';
				$out .= "\n\t$property-color: rgba(" . $this->hex2rgb( $border->color ) . ',' . $opacity . ');';
			}
		} else {
			$out .= "\n\t$property: none;";
		}
		return $out;
	}

	/**
	 * Generate dimension properties for cases like padding or margin.
	 *
	 * @param object $object Object with all the necessary values.
	 * @param string $property Property to set, can be margin or padding-left for example
	 * @return string
	 */
	function setDimension( $object, $property = 'margin' ) {
		$out = '';
		if ( isset( $object->unit ) && 'px' != $object->unit ) {
			$unit = $object->unit;
		} else {
			$unit = 'px';
		}
		if ( isset( $object->width ) && '' != $object->width ) {
			$out .= "\n\t$property: {$object->width}$unit;";
		}
		return $out;
	}

	/**
	 * Converts color in hexadecimal format to RGB format.
	 *
	 * @param string $hex Color in hexadecimal format.
	 * @return string Color in RGB components separated by comma.
	 */
	function hex2rgb( $hex ) {
		$hex = str_replace( "#", "", $hex );

		if ( strlen( $hex ) == 3 ) {
			$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		} else {
			$r = hexdec( substr( $hex, 0, 2 ) );
			$g = hexdec( substr( $hex, 2, 2 ) );
			$b = hexdec( substr( $hex, 4, 2 ) );
		}
		return implode( ',', array( $r, $g, $b ) );
	}

	/**
	 * Inserts logo image in site title or hides it.
	 *
	 * @param string $location
	 * @return string
	 */
	function site_logo( $location = '' ) {
		$site_name = get_bloginfo( 'name' );
		$logo = json_decode( get_theme_mod( $location . '_image' ) );
		$has_image_src = isset( $logo->src ) && '' != $logo->src;
		$is_image_mode = isset( $logo->mode ) && 'image' == $logo->mode;
		if ( $is_image_mode ) {
			$url = apply_filters( 'themify_customizer_logo_home_url', isset( $logo->link ) && ! empty( $logo->link ) ? $logo->link : home_url() );
		} else {
			$url = apply_filters( 'themify_customizer_logo_home_url', isset( $logo->link ) && ! empty( $logo->link ) ? $logo->link : home_url() );
		}
		$html = '<a href="' . $url . '" title="' . $site_name . '">';
		if ( isset( $this->settings[$location . '_image'] ) && $has_image_src && $is_image_mode ) {
			$html .= '<img src="' . $logo->src . '" alt="' . $site_name . '" title="' . $site_name . '" />';
			$html .= '<span style="display: none;">' . $site_name . '</span>';
		} else {
			$html .= '<span>' . $site_name . '</span>';
		}
		$html .= '</a>';
		return $html;
	}

	/**
	 * Inserts image in site description or hides it.
	 *
	 * @param string $location
	 * @return string
	 */
	function site_description( $site_desc = '', $location = 'site-tagline' ) {
		$desc = json_decode( get_theme_mod( $location ) );
		$has_image_src = isset( $desc->src ) && '' != $desc->src;
		$is_image_mode = isset( $desc->mode ) && 'image' == $desc->mode;
		$html = '';
		if ( isset( $this->settings[$location] ) && $has_image_src && $is_image_mode ) {
			$html .= '<img src="' . $desc->src . '" alt="' . $site_desc . '" title="' . $site_desc . '" />';
			$html .= '<span style="display: none;">' . $site_desc . '</span>';
		} else {
			$html .= '<span>' . $site_desc . '</span>';
		}
		return $html;
	}
}