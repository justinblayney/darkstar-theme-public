<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package darkStarMediaTheme
 */
?>
</div><!-- close .container -->
</div><!-- close .main-content -->

<div class="footer-call">
    <div class="footer-call__wrap">
        <span>Questions? Call Us At:</span>
        <a href="tel:1-416-450-5439" title="call 1-416-450-5439 for website help">1-416-450-5439</a>
    </div>
</div>

<footer id="colophon" class="site-footer">
    <?php // substitute the class "container-fluid" below if you want a wider content area 
    ?>
    <div class="white-stripe"></div>
    <div class="container">
        <div class="row">
            <div class="site-footer-inner col-sm-12">
                <div class="container">
                    <div class="row"></div>
                    <div class="row">
                        <div id="footer-sidebar1" class="col-12 ">
                            <?php
                            if (is_active_sidebar('footer-sidebar-1')) {
                                dynamic_sidebar('footer-sidebar-1');
                            }
                            ?>
                        </div>

                    </div>
                </div>

                <div class="site-info col-sm-12">
                    <a href="https://www.darkstarmedia.net/" title="Wordpress Theme Developed by Darkstar Media">Wordpress Theme Developed by Darkstar Media</a><br><br>
                </div><!-- close .site-info -->

            </div>
        </div>
    </div><!-- close .container -->
</footer><!-- close #colophon -->

<?php wp_footer(); ?>

</body>

</html>