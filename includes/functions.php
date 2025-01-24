<?php
// Sanitize and escape Pixel codes
function ose_sanitize_pixel_code($code) {
    return wp_kses_post($code); // Allow only safe HTML
}

// Validate BMI input
function ose_validate_bmi($bmi) {
    if (!is_numeric($bmi) || $bmi <= 0) {
        return false;
    }
    return true;
}

// Validate age input
function ose_validate_age($age) {
    if (!is_numeric($age) || $age <= 0 || $age > 120) {
        return false;
    }
    return true;
}
