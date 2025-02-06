<?php
// Generate a unique ID using the ACF row index to ensure it remains consistent in the loop
$unique_id = 'cards-' . get_row_index();
?>

<section class="cards-wrap" id="<?php echo esc_attr($unique_id); ?>">
    <?php if (get_sub_field('heading')) : ?>
        <h2><?php echo esc_html(get_sub_field('heading')); ?></h2>
    <?php endif; ?>

    <div class="cards">
        <?php if (have_rows('cards')):  ?>
            <?php while (have_rows('cards')) : the_row();
                $image = get_sub_field('card_image');
                $link = get_sub_field('card_button');
            ?>
                <div class="cards__card">
                    <h3><?php echo get_sub_field('card_title');  ?></h3>
                    <?php if (!empty($image) && is_array($image)) : ?>
                        <img src="<?php echo esc_url($image['url']); ?>"
                            alt="<?php echo esc_attr($image['alt']); ?>"
                            width="<?php echo esc_attr($image['width']); ?>"
                            height="<?php echo esc_attr($image['height']); ?>" />
                    <?php endif; ?>

                    <?php if (! empty(get_sub_field('card_text'))) {  ?>
                        <p><?php echo get_sub_field('card_text');  ?></p>
                    <?php } ?>

                    <?php if (! empty($link)) {  ?>
                        <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" title="<?php echo $link['title']; ?>" class="cards__card-btn">
                            <?php echo $link['title'];  ?> &#187;
                        </a>
                    <?php } ?>


                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>