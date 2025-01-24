# Obesity Surgery Eligibility Calculator

A WordPress plugin to calculate eligibility for obesity surgery. The plugin provides an easy-to-use calculator for users to input their BMI, age, and health conditions, and determine whether they qualify for obesity surgery. It also includes Google and Meta Pixel integration for tracking user interactions.

---

## Features

- **Eligibility Calculator**: Users can input their BMI, age, and select health conditions to check eligibility for surgery.
- **Multilingual Support**: Supports multiple languages with `.po` and `.mo` files for translations.
- **Pixel Integration**:
  - Google Pixel: Tracks form submissions and user interactions.
  - Meta Pixel: Tracks form submissions with custom events.
- **Customizable Settings**: Admin panel for managing Google and Meta Pixel codes.
- **Responsive Design**: A clean and user-friendly interface.

---

## Installation

1. Download the ZIP file of the plugin.
2. Log in to your WordPress Admin Panel.
3. Navigate to **Plugins > Add New > Upload Plugin**.
4. Choose the ZIP file and click **Install Now**.
5. After installation, click **Activate Plugin**.

---

## Usage

1. Add the following shortcode to any WordPress post or page where you want the calculator to appear:
   ```
   [ose_calculator]
   ```
2. Enter the required details (BMI, age, and health conditions) to check eligibility.
3. Results will display dynamically after submission.

---

## Plugin Structure

```
/obesity-surgery-calculator/
|-- obesity-surgery-calculator.php
|-- assets/
|   |-- css/
|   |   |-- style.css
|   |-- js/
|       |-- main.js
|-- includes/
|   |-- functions.php
|   |-- settings.php
|-- languages/
|   |-- obesity-surgery-calculator-en_US.po
|   |-- obesity-surgery-calculator-en_US.mo
|-- readme.md
```

---

## Translation

To add translations:

1. Create a `.po` file for your language in the `languages/` folder (e.g., `obesity-surgery-calculator-tr_TR.po`).
2. Use tools like **Poedit** to create and save `.mo` files.
3. Update the WordPress site language in **Settings > General** to see the translations.

---

## Pixel Integration

### Google Pixel

1. Go to **Obesity Surgery > Settings** in the WordPress admin menu.
2. Paste your Google Pixel code into the provided field.

### Meta Pixel

1. Go to **Obesity Surgery > Settings** in the WordPress admin menu.
2. Paste your Meta Pixel code into the provided field.

---

## Support

For issues or feature requests, please contact the plugin developer at:
- **Author**: Kaan
- **Website**: [Your Website](https://yourwebsite.com)

---

## License

This plugin is licensed under the GPL2 License.
