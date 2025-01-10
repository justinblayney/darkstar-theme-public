<?php
// Fetch the background color from ACF
$background_colour = get_sub_field('background_colour');
?>

<section class="simple-content" <?php echo $background_colour ? 'style="background-color: ' . esc_attr($background_colour) . ';"' : ''; ?>>
    <div class="simple-content__wrap">
        <?php echo get_sub_field('the_content'); ?>
    </div>
</section>