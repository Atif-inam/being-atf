<?php

/*
 * Plugin Name: My custom admin page
 * Description: Adds a custom admin pages with sample styles and scripts.
 * Version: 1.0.0
 * Author: Artbees
 * Author URI: http://artbees.net
 * Text Domain: my-custom-admin-page
*/

function my_admin_menu() {
    add_menu_page(
        __( 'Sample page', 'my-textdomain' ),
        __( 'Sample menu', 'my-textdomain' ),
        'manage_options',
        'sample-page',
        'my_admin_page_contents',
        'dashicons-schedule',
        3
    );
}
add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_page_contents() {
    ?>
    <h1> <?php esc_html_e( 'Welcome to my custom admin page.', 'my-plugin-textdomain' ); ?> </h1>
    <form method="POST" action="options.php">
    <?php
    settings_fields( 'sample-page' );
    do_settings_sections( 'sample-page' );
    submit_button();
    ?>
    </form>
    <?php
}


add_action( 'admin_init', 'my_settings_init' );

function my_settings_init() {

    add_settings_section(
        'sample_page_setting_section',
        __( 'Custom settings', 'my-textdomain' ),
        'my_setting_section_callback_function',
        'sample-page'
    );

		add_settings_field(
		   'my_setting_field',
		   __( 'My custom setting field', 'my-textdomain' ),
		   'my_setting_markup',
		   'sample-page',
		   'sample_page_setting_section'
		);

		register_setting( 'sample-page', 'my_setting_field' );
}


function my_setting_section_callback_function() {
    echo '<p>Intro text for our settings section</p>';
}


function my_setting_markup() {
    ?>
    <label for="my-input"><?php _e( 'My Input' ); ?></label>
    <input type="text" id="my_setting_field" name="my_setting_field" value="<?php echo get_option( 'my_setting_field' ); ?>">
    <?php
}
