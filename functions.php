<?php
/**
 * Kafco Custom Theme 1 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kafco Custom Theme 1
 * @since Kafco Custom Theme 1 1.0
 */


 include get_parent_theme_file_path( 'inc/helpers/helpers.php' );

/**
 * Register block styles.
 */

if ( ! function_exists( 'kafco_custom_theme_1_block_styles' ) ) :
	/**
	 * Register custom block styles
	 *
	 * @since Kafco Custom Theme 1 1.0
	 * @return void
	 */
	function kafco_custom_theme_1_block_styles() {

		register_block_style(
			'core/details',
			array(
				'name'         => 'arrow-icon-details',
				'label'        => __( 'Arrow icon', 'kafco-custom-theme-1' ),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'         => 'pill',
				'label'        => __( 'Pill', 'kafco-custom-theme-1' ),
				/*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
				'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
			)
		);
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'kafco-custom-theme-1' ),
				/*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
		register_block_style(
			'core/navigation-link',
			array(
				'name'         => 'arrow-link',
				'label'        => __( 'With arrow', 'kafco-custom-theme-1' ),
				/*
				 * Styles for the custom arrow nav link block style
				 */
				'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'         => 'asterisk',
				'label'        => __( 'With asterisk', 'kafco-custom-theme-1' ),
				'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
			)
		);
	}
endif;

add_action( 'init', 'kafco_custom_theme_1_block_styles' );

/**
 * Enqueue block stylesheets.
 */

if ( ! function_exists( 'kafco_custom_theme_1_block_stylesheets' ) ) :
	/**
	 * Enqueue custom block stylesheets
	 *
	 * @since Kafco Custom Theme 1 1.0
	 * @return void
	 */
	function kafco_custom_theme_1_block_stylesheets() {
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
		 */
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'kafco-custom-theme-1-button-style-outline',
				'src'    => get_parent_theme_file_uri( 'assets/css/button-outline.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/button-outline.css' ),
			)
		);
	}
endif;

add_action( 'init', 'kafco_custom_theme_1_block_stylesheets' );

/**
 * Register pattern categories.
 */

if ( ! function_exists( 'kafco_custom_theme_1_pattern_categories' ) ) :
	/**
	 * Register pattern categories
	 *
	 * @since Kafco Custom Theme 1 1.0
	 * @return void
	 */
	function kafco_custom_theme_1_pattern_categories() {

		register_block_pattern_category(
			'kafco_custom_theme_1_page',
			array(
				'label'       => _x( 'Pages', 'Block pattern category', 'kafco-custom-theme-1' ),
				'description' => __( 'A collection of full page layouts.', 'kafco-custom-theme-1' ),
			)
		);
	}
endif;

add_action( 'init', 'kafco_custom_theme_1_pattern_categories' );




add_action( 'after_setup_theme', 'kafco_custom_theme_1_setup' );

function kafco_custom_theme_1_setup() {
	add_theme_support( 'wp-block-styles' );
	add_editor_style( array(
		get_stylesheet_uri(),
		get_parent_theme_file_uri( 'assets/css/primary.css' )
	) );
}




// Importing CSS and JS files

add_action( 'wp_enqueue_scripts', 'kafco_custom_theme_1_enqueue_styles' );

function kafco_custom_theme_1_enqueue_styles() {
	wp_enqueue_style( 
		'kafco-custom-theme-1-style', 
		get_stylesheet_uri()
	);
	wp_enqueue_style( 
		'kafco-custom-theme-1-primary',
		get_parent_theme_file_uri( 'assets/css/primary.css' )
	);
}


add_action( 'wp_enqueue_scripts', 'kafco_custom_theme_1_enqueue_scripts' );

function kafco_custom_theme_1_enqueue_scripts() {
wp_enqueue_script( 
	'kafco-custom-theme-1-example',
	get_parent_theme_file_uri( 'assets/js/app.js' ),
	array(),
	wp_get_theme()->get( 'Version' ),
	true
);
}


// Register Custom Blocks
class JSXBlock {
  function __construct($name, $renderCallback = null, $data = null) {
    $this->name = $name;
    $this->data = $data;
    $this->renderCallback = $renderCallback;
    add_action('init', [$this, 'onInit']);
  }

  function ourRenderCallback($attributes, $content) {
    ob_start();
    require get_theme_file_path("/our-blocks/{$this->name}.php");
    return ob_get_clean();
  }

  function onInit() {
    wp_register_script($this->name, get_stylesheet_directory_uri() . "/build/{$this->name}.js", array('wp-blocks', 'wp-editor'));
    
    if ($this->data) {
      wp_localize_script($this->name, $this->name, $this->data);
    }

    $ourArgs = array(
      'editor_script' => $this->name
    );

    if ($this->renderCallback) {
      $ourArgs['render_callback'] = [$this, 'ourRenderCallback'];
    }

    register_block_type("ourblocktheme/{$this->name}", $ourArgs);
  }
}
new JSXBlock('genericheading');
new JSXBlock('genericbutton');
new JSXBlock('kafcotext');
new JSXBlock('maincontainer', true);
new JSXBlock('iconbutton')