# darkstar-theme-public

This repository contains a **sample only** of the `darkstar-theme` WordPress theme and build. 
You can set up using Local By Flywheel, or just grab the theme files.

---


## Features and Tools

### 1. **Build Tools**
- **Gulp**: Used for asset minification and optimization.
- **Local By Flywheel**: Utilized for local development environments.

### 2. **Dynamic Content with ACF**
- **Advanced Custom Fields (ACF)** for dynamic content management.
- **Components and ACF Loop**:
  - Found in `themes/darkStarMediaTheme/components`.
- **ACF JSON**:
  - Custom field configurations are stored in `themes/darkStarMediaTheme/acf-json`.

### 3. **Source Files**
- All source files are located in `themes/darkStarMediaTheme/src`.

---

## CSS and Layout Updates
- This theme was originally built using **Bootstrap**, but most Bootstrap code has been replaced with **CSS Grid**.
- Over time, all remaining Bootstrap code will be removed.
- A new **custom navigation walker** will be created to fully transition away from Bootstrap.

---

## wp-config.php
Ensure your `wp-config.php` file is configured correctly for local development. Here’s an example:

define('WP_DEBUG', true);  
define('WP_DEBUG_LOG', true);  
define('WP_DEBUG_DISPLAY', false);  
@ini_set('display_errors', 1);  

$table_prefix = 'wp_';  

---

## Notes
- This repository is a public sample and does not include sensitive data or configuration files.


Feel free to explore the code and adapt it for your own projects!
