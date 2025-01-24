<?php
/**
 * Plugin Name: Obesity Surgery Eligibility Calculator
 * Description: A WordPress plugin to calculate eligibility for obesity surgery.
 * Version: 1.0.0
 * Author: KaanErgun
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Include admin-specific functionality
if (is_admin()) {
    require_once plugin_dir_path(__FILE__) . 'includes/admin/settings.php';
    require_once plugin_dir_path(__FILE__) . 'includes/admin/admin-menu.php';
} else {
    // Include public-specific functionality
    require_once plugin_dir_path(__FILE__) . 'includes/public/shortcode.php';
    require_once plugin_dir_path(__FILE__) . 'includes/public/form-handler.php';
}

// Include common functions
require_once plugin_dir_path(__FILE__) . 'includes/common-functions.php';


// Load plugin textdomain for translations
function ose_load_textdomain() {
    load_plugin_textdomain('obesity-surgery-calculator', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'ose_load_textdomain');

// Enqueue necessary scripts and styles
function ose_enqueue_scripts() {
    wp_enqueue_style('ose-style', plugin_dir_url(__FILE__) . 'assets/css/style.css', array(), '1.0.0');
    wp_enqueue_script('ose-main-js', plugin_dir_url(__FILE__) . 'assets/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'ose_enqueue_scripts');

// Create the shortcode for the calculator
function ose_calculator_shortcode() {
    ob_start();
    ?>
    <div id="ose-calculator">
        <h2><?php _e('Obesity Surgery Eligibility Calculator', 'obesity-surgery-calculator'); ?></h2>
        <form id="ose-form">
            <label for="bmi"><?php _e('Body Mass Index (BMI):', 'obesity-surgery-calculator'); ?></label>
            <input type="number" step="0.1" id="bmi" name="bmi" required>

            <label for="age"><?php _e('Age:', 'obesity-surgery-calculator'); ?></label>
            <input type="number" id="age" name="age" required>

            <label for="health_conditions">
                <?php _e('Do you have any of the following health conditions? (e.g., Diabetes, Sleep Apnea)', 'obesity-surgery-calculator'); ?>
            </label>
            <select id="health_conditions" name="health_conditions" required>
                <option value="yes"><?php _e('Yes', 'obesity-surgery-calculator'); ?></option>
                <option value="no"><?php _e('No', 'obesity-surgery-calculator'); ?></option>
            </select>

            <button type="submit"><?php _e('Check Eligibility', 'obesity-surgery-calculator'); ?></button>
        </form>
        <div id="ose-result" style="margin-top: 20px;"></div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('ose_calculator', 'ose_calculator_shortcode');

// Register admin settings
add_action('admin_init', 'ose_register_settings');

// Add settings page to admin menu
add_action('admin_menu', 'ose_add_admin_menu');

// Inject Pixel codes into the website's head
function ose_inject_pixel_codes() {
    $google_pixel = ose_sanitize_pixel_code(get_option('ose_google_pixel_code'));
    $meta_pixel = ose_sanitize_pixel_code(get_option('ose_meta_pixel_code'));

    if ($google_pixel) {
        echo $google_pixel;
    }

    if ($meta_pixel) {
        echo $meta_pixel;
    }
}
add_action('wp_head', 'ose_inject_pixel_codes');

add_action('wp_enqueue_scripts', 'ose_localize_script');
function ose_localize_script() {
    wp_localize_script(
        'ose-main-js', 
        'ose_translations', 
        array(
            'eligible_message' => __('You are eligible for obesity surgery.', 'obesity-surgery-calculator'),
            'not_eligible_message' => __('You are not eligible for obesity surgery.', 'obesity-surgery-calculator')
        )
    );
}

