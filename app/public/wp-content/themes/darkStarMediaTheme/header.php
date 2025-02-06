<?php

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package darkStarMediaTheme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php wp_title('|', true, 'right'); ?></title>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KTHQYS5BJS"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-KTHQYS5BJS');
    </script>
</head>


<body <?php body_class(); ?>>
    <?php do_action('before'); ?>

    <header id="masthead" class="site-header fixed-top">
        <?php // substitute the class "container-fluid" below if you want a wider content area 
        ?>
        <div class="wrap-content wrap-navigation">
            <nav class="navbar navbar-expand-lg navbar-light wrap-nav">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
                wp_nav_menu(array(
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'bs-example-navbar-collapse-1',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker()
                ));
                ?>
            </nav>

            <div class="header-logo">
                <a href="/">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Suzanna-Derewicz-logo.svg"
                        width="200" height="72" alt="Suzanna Derewicz, Registered Psychotherapist Logo" />
                </a>
            </div>

        </div>



    </header><!-- #masthead -->


    <div class="main-content">
        <?php // substitute the class "container-fluid" below if you want a wider content area 
        ?>
        <div id="content">