<?php
/**
 * Clothing Store Blocks: Customizer
 *
 * @subpackage Clothing Store Blocks
 * @since 1.0
 */

function clothing_store_blocks_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/inc/customizer/customizer.css');

	// Pro Section
 	$wp_customize->add_section('clothing_store_blocks_pro', array(
        'title'    => __('CLOTHING STORE BLOCKS PREMIUM ', 'clothing-store-blocks'),
        'priority' => 1,
    ));
    $wp_customize->add_setting('clothing_store_blocks_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Clothing_Store_Blocks_Pro_Control($wp_customize, 'clothing_store_blocks_pro', array(
        'label'    => __('CLOTHING STORE BLOCKS PREMIUM', 'clothing-store-blocks'),
        'section'  => 'clothing_store_blocks_pro',
        'settings' => 'clothing_store_blocks_pro',
        'priority' => 1,
    )));
}
add_action( 'customize_register', 'clothing_store_blocks_customize_register' );


define('CLOTHING_STORE_BLOCKS_PRO_LINK',__('https://www.ovationthemes.com/products/clothing-store-wordpress-theme/','clothing-store-blocks'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Clothing_Store_Blocks_Pro_Control')):
    class Clothing_Store_Blocks_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( CLOTHING_STORE_BLOCKS_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE CLOTHING STORE PREMIUM ','clothing-store-blocks');?> </a>
	        </div>
            <div class="col-md">
                <img class="clothing_store_blocks_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md">
                <ul style="padding-top:10px">
                    <li class="upsell-clothing_store_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'clothing-store-blocks');?> </li>                 
                    <li class="upsell-clothing_store_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'clothing-store-blocks');?> </li>
                    <li class="upsell-clothing_store_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'clothing-store-blocks');?> </li>
                    <li class="upsell-clothing_store_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'clothing-store-blocks');?> </li>
                    <li class="upsell-clothing_store_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'clothing-store-blocks');?> </li>
                    <li class="upsell-clothing_store_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'clothing-store-blocks');?> </li>
                    <li class="upsell-clothing_store_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'clothing-store-blocks');?> </li>
                    <li class="upsell-clothing_store_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'clothing-store-blocks');?> </li>
                    <li class="upsell-clothing_store_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'clothing-store-blocks');?> </li>
                    <li class="upsell-clothing_store_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'clothing-store-blocks');?> </li>
                    <li class="upsell-clothing_store_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'clothing-store-blocks');?> </li>
                    <li class="upsell-clothing_store_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'clothing-store-blocks');?> </li>
                    <li class="upsell-clothing_store_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'clothing-store-blocks');?> </li>
                    <li class="upsell-clothing_store_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'clothing-store-blocks');?> </li>
                </ul>
        	</div>
            <div class="col-md upsell-btn upsell-btn-bottom">
                <a href="<?php echo esc_url( CLOTHING_STORE_BLOCKS_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE CLOTHING STORE PREMIUM ','clothing-store-blocks');?> </a>
            </div>
        </label>
    <?php } }
endif;