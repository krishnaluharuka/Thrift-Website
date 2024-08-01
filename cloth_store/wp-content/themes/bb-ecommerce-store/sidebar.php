<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package BB Ecommerce Store
 */
?>

<div id="sidebar">    
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        <aside role="complementary" aria-label="firstsidebar" id="archives" class="widget">
            <h3 class="widget-title"><?php esc_html_e( 'Archives', 'bb-ecommerce-store' ); ?></h3>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        <aside role="complementary" aria-label="secondsidebar" id="meta" class="widget">
            <h3 class="widget-title"><?php esc_html_e( 'Meta', 'bb-ecommerce-store' ); ?></h3>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
        <aside id="search" class="widget" role="complementary" aria-label="thirdsidebar">
            <h3 class="widget-title"><?php esc_html_e( 'Search', 'bb-ecommerce-store' ); ?></h3>
            <?php get_search_form(); ?>
        </aside>
        <aside id="categories" class="widget" role="complementary" aria-label="forthsidebar">
            <h3 class="widget-title"><?php esc_html_e( 'Categories', 'bb-ecommerce-store' ); ?></h3>
            <ul>
                <?php wp_list_categories('title_li=');  ?>
            </ul>
        </aside>
    <?php endif; // end sidebar widget area ?>  
</div>