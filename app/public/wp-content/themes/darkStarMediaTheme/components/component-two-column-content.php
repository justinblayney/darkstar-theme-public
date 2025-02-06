<?php
// Generate a unique ID using the ACF row index to ensure it remains consistent in the loop
$unique_id = 'two-column-content-' . get_row_index();
?>

<section class="two-column-content" id="<?php echo esc_attr($unique_id); ?>">
    <?php if (get_sub_field('heading')) : ?>
        <h2><?php echo esc_html(get_sub_field('heading')); ?></h2>
    <?php endif; ?>
    <div class="two-column-content__wrap">
        <div><?php echo get_sub_field('the_content'); ?></div>
        <div><?php echo get_sub_field('column_two_content'); ?></div>
    </div>

</section>