<?php
// Generate a unique ID using the ACF row index to ensure it remains consistent in the loop
$unique_id = 'quote-' . get_row_index();
?>

<section class="quote" id="<?php echo esc_attr($unique_id); ?>">
    <?php if (get_sub_field('heading')) : ?>
        <h2><?php echo esc_html(get_sub_field('heading')); ?></h2>
    <?php endif; ?>

    <div class="quote__inner">
        <div class="quote-mark">
            <img src="<?php bloginfo('template_url'); ?>/images/quote-left.png" width="68" height="50" alt="quote mark left">
        </div>
        <div>
            <?php echo get_sub_field('the_quote'); ?>
            <p class="quote-name"><?php echo get_sub_field('person_quoted'); ?></p>
        </div>
        <div class="quote-mark">
            <img src="<?php bloginfo('template_url'); ?>/images/quote-right.png" width="68" height="50" alt="quote mark right">
        </div>
    </div>
</section>