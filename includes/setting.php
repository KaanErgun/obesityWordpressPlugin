<?php
// Register plugin settings
function ose_register_settings() {
    register_setting('ose-settings-group', 'ose_google_pixel_code');
    register_setting('ose-settings-group', 'ose_meta_pixel_code');
}
add_action('admin_init', 'ose_register_settings');

// Render the settings page
function ose_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php _e('Obesity Surgery Settings', 'obesity-surgery-calculator'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('ose-settings-group');
            do_settings_sections('ose-settings-group');
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php _e('Google Pixel Code', 'obesity-surgery-calculator'); ?></th>
                    <td><textarea name="ose_google_pixel_code" style="width:100%;height:100px;"><?php echo esc_textarea(get_option('ose_google_pixel_code')); ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php _e('Meta Pixel Code', 'obesity-surgery-calculator'); ?></th>
                    <td><textarea name="ose_meta_pixel_code" style="width:100%;height:100px;"><?php echo esc_textarea(get_option('ose_meta_pixel_code')); ?></textarea></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}


// Add settings page to the WordPress admin menu
function ose_add_admin_menu() {
    add_menu_page(
        __('Obesity Surgery Settings', 'obesity-surgery-calculator'),
        __('Obesity Surgery', 'obesity-surgery-calculator'),
        'manage_options',
        'ose-settings',
        'ose_settings_page'
    );
}
