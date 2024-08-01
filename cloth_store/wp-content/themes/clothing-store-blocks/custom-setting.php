<?php 

function clothing_store_blocks_add_admin_menu() {
    add_menu_page(
        'Theme Settings', // Page title
        'Theme Settings', // Menu title
        'manage_options', // Capability
        'clothing-store-blocks-theme-settings', // Menu slug
        'clothing_store_blocks_settings_page' // Function to display the page
    );
}
add_action( 'admin_menu', 'clothing_store_blocks_add_admin_menu' );

function clothing_store_blocks_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Theme Settings', 'clothing-store-blocks' ); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'clothing_store_blocks_settings_group' );
            do_settings_sections( 'clothing-store-blocks-theme-settings' );
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function clothing_store_blocks_register_settings() {
    register_setting( 'clothing_store_blocks_settings_group', 'clothing_store_blocks_enable_animations' );

    add_settings_section(
        'clothing_store_blocks_settings_section',
        __( 'Animation Settings', 'clothing-store-blocks' ),
        null,
        'clothing-store-blocks-theme-settings'
    );

    add_settings_field(
        'clothing_store_blocks_enable_animations',
        __( 'Enable Animations', 'clothing-store-blocks' ),
        'clothing_store_blocks_enable_animations_callback',
        'clothing-store-blocks-theme-settings',
        'clothing_store_blocks_settings_section'
    );
}
add_action( 'admin_init', 'clothing_store_blocks_register_settings' );

function clothing_store_blocks_enable_animations_callback() {
    $checked = get_option( 'clothing_store_blocks_enable_animations', true );
    ?>
    <input type="checkbox" name="clothing_store_blocks_enable_animations" value="1" <?php checked( 1, $checked ); ?> />
    <?php
}

