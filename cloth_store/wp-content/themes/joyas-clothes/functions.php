<?php 
/* Child theme generated with WPS Child Theme Generator */
            
if ( !function_exists( 'joyas_clothes_parent_css' ) ):
    function joyas_clothes_parent_css() {

        wp_enqueue_style( 'joyas_clothes_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array('joyas-shop-google-fonts','bootstrap','bi-icons','icofont','bootstrap','scrollbar','joyas-shop-common','joyas-shop-style') );

        
       wp_enqueue_script( 'joyas-clothes', get_theme_file_uri( '/js/joyas-clothes.js'), array('jquery'), '1.0.0', true);
    }
endif;
add_action( 'wp_enqueue_scripts', 'joyas_clothes_parent_css', 10 );


if ( !function_exists( 'joyas_clothes_widgets_init' ) ):
    /**
     * Register widget area.
     *
     * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
     */
    function joyas_clothes_widgets_init() {
        register_sidebar( array(
            'name'          => esc_html__( 'Shop Page / WooCommerce', 'joyas-clothes' ),
            'id'            => 'shop-page',
            'description'   => esc_html__( 'Add widgets here.', 'joyas-clothes' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title"><span>',
            'after_title'   => '</span></h3>',
        ) );
    }
    add_action( 'widgets_init', 'joyas_clothes_widgets_init',99 );
endif;

if( !function_exists('joyas_clothes_disable_from_parent') ):

    add_action('init','joyas_clothes_disable_from_parent',10);
    function joyas_clothes_disable_from_parent(){
        
      global $joyas_shop_header_layout;
      remove_action('joyas_shop_site_header', array( $joyas_shop_header_layout, 'site_header_layout' ), 30 );

      remove_action('joyas_shop_site_header', array( $joyas_shop_header_layout, 'site_header_wrap_before' ), 10 );

      global $joyas_shop_post_related;
      remove_action('joyas_shop_site_content_type', array( $joyas_shop_post_related, 'site_loop_heading' ), 10 );

      global $joyas_shop_post_related;
      remove_action('joyas_shop_loop_navigation', array( $joyas_shop_post_related, 'site_loop_navigation' ), 10 );

      global $joyas_shop_body_layout;
      remove_action('joyas_shop_container_wrap_end', array( $joyas_shop_body_layout, 'get_sidebar' ), 10 );

      remove_action('joyas_shop_container_wrap_start', array( $joyas_shop_body_layout, 'container_wrap_column_start' ), 10 );

      remove_action( 'woocommerce_before_main_content', 'joyas_shop_woocommerce_wrapper_before' );
      remove_action( 'woocommerce_after_main_content', 'joyas_shop_woocommerce_wrapper_after' );
    }
    
endif;

if( !function_exists('joyas_clothes_wrap_before') ) : 
    function joyas_clothes_wrap_before(){
    ?>
    <header id="masthead" class="site-header style_4">
    <?php

   }
 add_action('joyas_shop_site_header', 'joyas_clothes_wrap_before', 10 );
endif;

if( !function_exists('joyas_clothes_header_layout') ) : 
    function joyas_clothes_header_layout(){
    ?>
   <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-sm-4 col-12 logo-wrap">
                    <?php do_action('joyas_shop_header_layout_1_branding');?>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-12 text-right d-flex justify-content-end reponsive-mode">
                    
                    <?php   
                    if( class_exists('APSW_Product_Search_Finale_Class_Pro') && class_exists( 'WooCommerce' ) ){
                        do_action('apsw_search_bar_preview');
                        
                    }else if( class_exists('APSW_Product_Search_Finale_Class') && class_exists( 'WooCommerce' ) ){
                        do_action('apsw_search_bar_preview');
                    }else{
                        get_search_form();
                    }
                    ?>
                    <ul class="header-icon d-flex justify-content-end">
                        <?php if ( class_exists( 'WooCommerce' ) ) :?>
                            
                        <li><a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php _e('My Account','joyas-clothes'); ?>"><i class="bi bi-lock"></i></a></li>
                        <li><?php joyas_shop_woocommerce_cart_link(); ?></li>
                        <?php endif;?>

                        <li class="toggle-list"><button class="joyas-shop-rd-navbar-toggle" tabindex="0" autofocus="true"><i class="icofont-navigation-menu"></i></button></li>
                        </ul>
                </div>
            </div>
        </div>
        <div id="nav_bar_wrap"> 
            <div class="container"> 
                <div class="d-flex align-items-stretch"> 
                    <?php if ( class_exists( 'WooCommerce' ) ) :?>
                    <?php do_action('joyas_clothes_woocommerce_product_category');?>
                    <?php endif;?>
                    <div class="nav_wrap">
                     <?php do_action('joyas_shop_header_layout_1_navigation'); ?>
                    </div>

                </div>
            </div>
        </div>
    <?php
    }
    add_action('joyas_shop_site_header', 'joyas_clothes_header_layout', 30 );
endif;


if ( ! function_exists( 'joyas_clothes_woocommerce_product_category' ) ) {
    /**
     * Before Content.
     *
     * @return void
     */
    function joyas_clothes_woocommerce_product_category() {
        //if(  s_get_option('woo_dispaly_all_category_inside_menu') != true ){ return false; }
        
                $args = array(
                    'orderby'    => 'title',
                    'order'      => 'ASC',
                    'parent' => 0,
                    'taxonomy' => 'type',
                );
                $product_categories = get_terms( 'product_cat', $args );
                
                $count = count($product_categories);
                if ( $count > 0 ) :

                echo '<div id="joyas-mega-menu" class="">
                          <div class="btn-mega"><span></span>'.esc_html( esc_html__('ALL CATEGORIES ','joyas-clothes') ).'</div>
                          <ul class="menu">';

                    foreach ( $product_categories as $product_category ) {
                        
                        $args = array(
                            'orderby'    => 'title',
                            'order'      => 'ASC',
                            'parent'   => $product_category->term_id
                        );
                        $product_sub_categories = get_terms( 'product_cat', $args );

                        if ( count($product_sub_categories) > 0 ) :
                        
                        echo '<li class="shopstore-cat-parent"> <a href="' . esc_attr(get_term_link( $product_category )) . '" title="'.esc_attr( $product_category->name ).'"><span class="menu-title">'.esc_html( $product_category->name ).'</span> </a> ';
                        echo "<ul class='children'>";
                        foreach ( $product_sub_categories as $term ) {
                            echo '<li> <a href="' . esc_url( get_term_link( $term ) ) . '" title="'.esc_attr( $term->name ).'" class="">'.esc_html( $term->name ).'</a> ';
                        }
                        echo "</ul>";
                        
                        else:
                            echo '<li> <a href="' . esc_url( get_term_link( $product_category ) ) . '" title="'.esc_attr( $product_category->name ).'" class="">'.esc_html( $product_category->name ).' </a> ';
                        
                        endif;
                        
                        echo '</li>';
                    }
                    echo '</ul>
                    </div>';
                endif;
                
                
                
                
    }
}

add_action( 'joyas_clothes_woocommerce_product_category', 'joyas_clothes_woocommerce_product_category' );


if ( ! function_exists( 'joyas_clothes_woocommerce_wrapper_before' ) ) {
    /**
     * Before Content.
     *
     * Wraps all WooCommerce content in wrappers which match the theme markup.
     *
     * @return void
     */
    function joyas_clothes_woocommerce_wrapper_before() {
        /**
        * Hook - joyas_shop_container_wrap_start    
        *
        * @hooked joyas_shop_container_wrap_start   - 5
        */
        if( is_product() ){
          do_action( 'joyas_shop_container_wrap_start', 'no-sidebar');
        }else{
          do_action( 'joyas_shop_container_wrap_start', 'sidebar-content');
        }
    }
   add_action( 'woocommerce_before_main_content', 'joyas_clothes_woocommerce_wrapper_before' );
}

if ( ! function_exists( 'joyas_clothes_woocommerce_wrapper_after' ) ) {
    /**
     * After Content.
     *
     * Closes the wrapping divs.
     *
     * @return void
     */
    function joyas_clothes_woocommerce_wrapper_after() {
        /**
        * Hook - joyas_shop_container_wrap_end  
        *
        * @hooked container_wrap_end - 999
        */
        if( is_product() ){
          do_action( 'joyas_shop_container_wrap_end', 'no-sidebar');
        }else{
          do_action( 'joyas_shop_container_wrap_end', 'sidebar-content');
        }
    }
add_action( 'woocommerce_after_main_content', 'joyas_clothes_woocommerce_wrapper_after' );
   
}


/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function joyas_clothes_loop_columns() {
    return 3;
}
add_filter( 'loop_shop_columns', 'joyas_clothes_loop_columns', 99);

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function joyas_clothes_related_products_args( $args ) {
    $defaults = array(
        'posts_per_page' => 3,
        'columns'        => 3,
    );

    $args = wp_parse_args( $defaults, $args );

    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'joyas_clothes_related_products_args', 99 );

add_filter( 'woocommerce_upsell_display_args', 'joyas_clothes_related_products_args', 99 );

add_filter( 'woocommerce_cross_sells_columns', 'joyas_clothes_related_products_args', 99 );


 function joyas_clothes_loop_heading() {
        if( is_page() ) return;

        if ( !is_singular() ) :

            the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" >', '</a></h3>' );
        endif;
        
        
    }
add_action('joyas_shop_site_content_type', 'joyas_clothes_loop_heading', 10 );   


function joyas_clothes_theme_setup(){

    // Make theme available for translation.
    load_theme_textdomain( 'joyas-clothes', get_stylesheet_directory_uri() . '/languages' );
    
    add_theme_support( 'custom-header', apply_filters( 'farm_store_custom_header_args', array(
        'default-image' => get_stylesheet_directory_uri() . '/image/custom-header.jpg',
        'default-text-color'     => '000000',
        'width'                  => 1000,
        'height'                 => 350,
        'flex-height'            => true,
        'wp-head-callback'       => 'joyas_shop_header_style',
    ) ) );
    
    register_default_headers( array(
        'default-image' => array(
        'url' => '%s/image/custom-header.jpg',
        'thumbnail_url' => '%s/image/custom-header.jpg',
        'description' => esc_html__( 'Default Header Image', 'joyas-clothes' ),
        ),
    ));

}
add_action( 'after_setup_theme', 'joyas_clothes_theme_setup' );


/**
 * Post Posts Loop Navigation
 * add_action( 'joyas_loop_navigation', $array( $this,'site_loop_navigation' ) ); 
 * @since 1.0.0
 */
function joyas_clothes_loop_navigation( $type = '' ) {
   
     echo '<div class="pagination-custom">';
        the_posts_pagination( array(
            'type' => 'list',
            'mid_size' => 2,
            'prev_text' => esc_html__( 'Previous', 'joyas-clothes' ),
            'next_text' => esc_html__( 'Next', 'joyas-clothes' ),
            'screen_reader_text' => esc_html__( '&nbsp;', 'joyas-clothes' ),
        ) );
    echo '</div>';

}

add_action('joyas_shop_loop_navigation', 'joyas_clothes_loop_navigation', 20 );


if( !function_exists('joyas_clothes_sidebar') ):
    function joyas_clothes_sidebar() {

        get_sidebar();
    }
    add_action('joyas_shop_container_wrap_end', 'joyas_clothes_sidebar', 10 );
endif;

if( !function_exists('joyas_clothes_container_wrap_column_start') ):
    function joyas_clothes_container_wrap_column_start() {
    ?>
<div class="col-xl-9 col-md-9 col-12 order-2">
                        <main id="main" class="site-main">
    <?php
    }
    add_action('joyas_shop_container_wrap_start', 'joyas_clothes_container_wrap_column_start', 10 );
endif;

