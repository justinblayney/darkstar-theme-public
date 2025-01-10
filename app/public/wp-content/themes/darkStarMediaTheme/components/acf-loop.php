<?php

// check if the flexible content field has rows of data
if (have_rows('page_content')):

    // loop through the rows of data
    while (have_rows('page_content')) : the_row();

        if (get_row_layout() == 'component-banner'):
            include("component-banner.php");
        endif;

        if (get_row_layout() == 'component-simple-content'):
            include("component-simple-content.php");
        endif;

        if (get_row_layout() == 'component-quote'):
            include("component-quote.php");
        endif;

        if (get_row_layout() == 'component-testimonial'):
            include("component-testimonial.php");
        endif;

        if (get_row_layout() == 'component-cards'):
            include("component-cards.php");
        endif;

        if (get_row_layout() == 'component-two-column-content'):
            include("component-two-column-content.php");
        endif;

        if (get_row_layout() == 'component-recent-news'):
            include("component-recent-news.php");
        endif;

        if (get_row_layout() == 'component-review'):
            include("component-review.php");
        endif;

    // Then we can check if get_row_layout() === other module and display its data
    endwhile;

else :
// no layouts found
endif;
