<?php
// Generate a unique ID using the ACF row index to ensure it remains consistent in the loop
$unique_id = 'faqs-' . get_row_index();
?>

<section class="faqs" id="<?php echo esc_attr($unique_id); ?>">
    <div class="faqs__wrap">
        <?php if (get_sub_field('heading')) : ?>
            <h2><?php echo esc_html(get_sub_field('heading')); ?></h2>
        <?php endif; ?>
        <?php echo do_shortcode('[wp-faq-schema accordion=1]'); ?>
    </div>
</section>