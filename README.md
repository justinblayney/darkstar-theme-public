# darkstar-theme-public

This repository contains a **sample only** of the `darkstar-theme` WordPress theme and build. 
You can follow instrutions below to get the WordPress site running locally, or just grab the theme files.

---

## Getting Started with Lando

To get this site running in a local Lando environment, follow these steps:

### 1. **Set Up Lando**
Create a `lando.yml` file in the root of your project with the following configuration:

name: darkstar-theme  
recipe: wordpress  
config:  
  webroot: .  
  database: mariadb  
services:  
  appserver:  
    type: php:8.0  
  database:  
    type: mariadb  
proxy:  
  appserver:  
    - darkstar-theme.lndo.site  
tooling:  
  npm:  
    service: appserver  
  composer:  
    service: appserver  
  wp:  
    service: appserver  

### 2. **Start and Rebuild Lando**
Run the following commands to initialize your environment:

lando start  
lando rebuild -y  

### 3. **Database Import**
To import a WordPress database, use:

lando db-import backup.sql  

After importing, update URLs for your local environment:

lando wp search-replace 'https://www.live-site.com' 'http://darkstar-theme.lndo.site' --skip-columns=guid  

### 4. **Permalink Settings**
Once everything is set up, visit **Settings > Permalinks** in the WordPress admin area and click **Save Changes** to regenerate `.htaccess` rules.

### 5. **Accessing the Site**
Visit `http://darkstar-theme.lndo.site` in your browser to view the theme in your local environment.

---

## Features and Tools

### 1. **Build Tools**
- **Gulp**: Used for asset minification and optimization.
- **Lando**: Utilized for local development environments.

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
