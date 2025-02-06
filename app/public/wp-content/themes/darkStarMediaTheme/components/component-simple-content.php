<?php
// Generate a unique ID using the ACF row index to ensure it remains consistent in the loop
$unique_id = 'simple-content-' . get_row_index();

// Fetch the background color from ACF
$background_colour = get_sub_field('background_colour');
?>

<section class="simple-content" <?php echo $background_colour ? 'style="background-color: ' . esc_attr($background_colour) . ';"' : ''; ?> id="<?php echo esc_attr($unique_id); ?>">
    <?php if (get_sub_field('heading')) : ?>
        <h2><?php echo esc_html(get_sub_field('heading')); ?></h2>
    <?php endif; ?>

    <div class="simple-content__wrap">
        <?php echo get_sub_field('the_content'); ?>
    </div>
</section>


<?php

?>