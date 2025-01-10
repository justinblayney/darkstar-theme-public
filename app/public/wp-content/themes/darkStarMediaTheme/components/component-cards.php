<section class="cards-wrap">
    <div class="cards">
        <?php if (have_rows('cards')):  ?>
            <?php while (have_rows('cards')) : the_row();
                $image = get_sub_field('card_image');
                $link = get_sub_field('card_button');
            ?>
                <div class="cards__card">
                    <h3><?php echo get_sub_field('card_title');  ?></h3>
                    <img src="<?php echo $image['url']; ?>"
                        alt="<?php echo $image['alt'];  ?>"
                        width="<?php echo $image['width'];  ?>"
                        height="<?php echo $image['height'];  ?>" />



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