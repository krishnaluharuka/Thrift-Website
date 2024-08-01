<?php
/**
 * Theme Functions.
 */
/* Breadcrumb Begin */
function ecommerce_shop_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			echo "<span> ";
				the_title();
		}
	}
}
/* Theme Setup */
if ( ! function_exists( 'ecommerce_shop_setup' ) ) :

function ecommerce_shop_setup() {

	$GLOBALS['content_width'] = apply_filters( 'ecommerce_shop_content_width', 640 );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support('responsive-embeds');
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', bb_ecommerce_store_font_url() ) );
}
endif; // bb_ecommerce_store_setup
add_action( 'after_setup_theme', 'ecommerce_shop_setup' );

/* Theme Widgets Setup */
function ecommerce_shop_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'e-commerce-shop' ),
		'description'   => __( 'Appears on blog page sidebar', 'e-commerce-shop' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'e-commerce-shop' ),
		'description'   => __( 'Appears on posts and pages', 'e-commerce-shop' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'e-commerce-shop' ),
		'description'   => __( 'Appears on posts and pages', 'e-commerce-shop' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$bb_ecommerce_store_widget_areas = get_theme_mod('bb_ecommerce_store_footer_widget_areas', '4');
	for ($i=1; $i<=$bb_ecommerce_store_widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Nav ', 'e-commerce-shop' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	register_sidebar( array(
		'name'          => __( 'Home Page Sidebar', 'e-commerce-shop' ),
		'description'   => __( 'Appears on Home Page', 'e-commerce-shop' ),
		'id'            => 'homepage',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'e-commerce-shop' ),
		'description'   => __( 'Appears on shop page', 'e-commerce-shop' ),
		'id'            => 'woocommerce_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Single Product Page Sidebar', 'e-commerce-shop' ),
		'description'   => __( 'Appears on shop page', 'e-commerce-shop' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'ecommerce_shop_widgets_init' );

add_action( 'wp_enqueue_scripts', 'ecommerce_shop_enqueue_styles' );
function ecommerce_shop_enqueue_styles() {
	$parent_style = 'bb-ecommerce-store-style'; // Style handle of parent theme.
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'ecommerce_shop-style', get_stylesheet_uri(), array( $parent_style ) );
	require get_parent_theme_file_path( '/inc/ts-color-pallete.php' );
	wp_add_inline_style( 'ecommerce_shop-style',$bb_ecommerce_store_custom_css );
	require get_theme_file_path( '/ts-color-pallete.php' );
	wp_add_inline_style( 'ecommerce_shop-style',$bb_ecommerce_store_custom_css );
	wp_enqueue_style( 'e-commerce-shop-block-patterns-style-frontend', get_theme_file_uri() . '/theme-block-pattern/css/block-pattern-frontend.css' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function ecommerce_shop_customize_register() {     
	global $wp_customize;
	$wp_customize->remove_section( 'bb_ecommerce_store_theme_color_option' );  //Modify this line as needed  

	$wp_customize->remove_setting( 'bb_ecommerce_store_slider_premium_info' );
	$wp_customize->remove_control( 'bb_ecommerce_store_slider_premium_info' );

	$wp_customize->remove_setting( 'bb_ecommerce_store_product_sec_premium_info' );
	$wp_customize->remove_control( 'bb_ecommerce_store_product_sec_premium_info' );
} 
add_action( 'customize_register', 'ecommerce_shop_customize_register', 11 );

define('ECOMMERCE_SHOP_CREDIT',__('https://www.themeshopy.com/themes/wp-ecommerce-store-wordpress-theme/','e-commerce-shop'));
	if ( ! function_exists( 'ecommerce_shop_credit' ) ) {
	function ecommerce_shop_credit(){
		echo "<a href=".esc_url(ECOMMERCE_SHOP_CREDIT)." target='_blank'>". esc_html__('By Themeshopy','e-commerce-shop')."</a>";
	}
}

function ecommerce_shop_customizer ( $wp_customize ) {
	//OUR services
	$wp_customize->add_section('ecommerce_shop_shopnow',array(
		'title'	=> __('Shop Now Section','e-commerce-shop'),
		'description'=> __('This section will appear below the slider.','e-commerce-shop'),
		'panel' => 'bb_ecommerce_store_panel_id',
	));

	$wp_customize->add_setting('ecommerce_shop_sec_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_shop_sec_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','e-commerce-shop'),
		'description' => "<ul><li>". esc_html('Includes settings to set section title.','e-commerce-shop') ."</li><li>". esc_html('Contains settings for the background colour.','e-commerce-shop') ."</li><li>". esc_html('Contains options for background images.','e-commerce-shop') ."</li><li>". esc_html('You can change the font family and colours of heading.','e-commerce-shop') ."</li><li>". esc_html('And so on...','e-commerce-shop') ."</li></ul><a target='_blank' href='". esc_url('https://www.themeshopy.com/themes/ecommerce-store-wordpress-theme/') ." '>". esc_html('Upgrade to Pro','e-commerce-shop') ."</a>",
		'section'=> 'ecommerce_shop_shopnow'
	));

	$wp_customize->add_setting('ecommerce_shop_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'ecommerce_shop_image',array(
        'label' => __('Background image (1440x700)','e-commerce-shop'),
        'section' => 'ecommerce_shop_shopnow',
        'settings' => 'ecommerce_shop_image'
	)));

	$wp_customize->add_setting('ecommerce_shop_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_shop_title',array(
		'label'	=> __('Title','e-commerce-shop'),
		'section'	=> 'ecommerce_shop_shopnow',
		'setting'	=> 'ecommerce_shop_title',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('ecommerce_shop_linkname',array(
		'default'	=> 'Shop now',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_shop_linkname',array(
		'label'	=> __('Lable','e-commerce-shop'),
		'section'	=> 'ecommerce_shop_shopnow',
		'setting'	=> 'ecommerce_shop_linkname',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('ecommerce_shop_link',array(
		'default'	=> '#link',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control('ecommerce_shop_link',array(
		'label'	=> __('Shop now link','e-commerce-shop'),
		'section'	=> 'ecommerce_shop_shopnow',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('ecommerce_shop_slider_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_shop_slider_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','e-commerce-shop'),
		'description' => "<ul><li>". esc_html('You can change how many slides there are.','e-commerce-shop') ."</li><li>". esc_html('You can change the font family and the colours of headings and subheadings.','e-commerce-shop') ."</li><li>". esc_html('And so on...','e-commerce-shop') ."</li></ul><a target='_blank' href='". esc_url('https://www.themeshopy.com/themes/ecommerce-store-wordpress-theme/') ." '>". esc_html('Upgrade to Pro','e-commerce-shop') ."</a>",
		'section'=> 'bb_ecommerce_store_slidersettings'
	));
}

add_action( 'customize_register', 'ecommerce_shop_customizer' );

/**
	 * Enqueue block editor style
	 */
	function ecommerce_shop_block_editor_styles() {
		wp_enqueue_style( 'e-commerce-shop-font', bb_ecommerce_store_font_url(), array() );
	    wp_enqueue_style( 'e-commerce-shop-block-patterns-style-editor', get_theme_file_uri( '/theme-block-pattern/css/block-pattern-editor.css' ), false, '1.0', 'all' );
	}
	add_action( 'enqueue_block_editor_assets', 'ecommerce_shop_block_editor_styles' );

/*------------------------------section-pro.php part----------------------------------------*/
require_once( ABSPATH . WPINC . '/class-wp-customize-section.php' );

class Ecommerce_Shop_Customize_Section_Pro extends WP_Customize_Section {

	/**
	 * Outputs the Underscore.js template.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	protected function render_template() { ?>

		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{ data.title }}

				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}

/*---------------customizer.php part--------------------------*/
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Ecommerce_Shop_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Register custom section types.
		$manager->register_section_type( 'Ecommerce_Shop_Customize_Section_Pro' );

	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */

	public function enqueue_control_scripts() {
		wp_enqueue_style( 'ecommerce_shop-customize-controls', get_stylesheet_directory_uri() . '/css/customize-controls-child.css' );
	}
}

// Doing this customizer thang!
Ecommerce_Shop_Customize::get_instance();

/* Block Pattern */
require get_theme_file_path('/theme-block-pattern/theme-block-pattern.php');