<?php
$remove_schema = get_sub_field('remove_schema'); // Checks if checkbox is checked
?>

<section class="testimonial" <?php if (!$remove_schema) echo 'itemscope itemtype="https://schema.org/Review"'; ?>>
    <?php if (get_sub_field('testimonial_heading')) : ?>
        <h3><?php echo get_sub_field('testimonial_heading'); ?></h3>
    <?php endif; ?>

    <div class="testimonial__inner">

        <div class="testimonial__inner-testimonial" <?php if (!$remove_schema) echo 'itemprop="reviewBody"'; ?>>
            <?php echo get_sub_field('the_testimonial'); ?>
        </div>

        <div class="testimonial__inner-name" <?php if (!$remove_schema) echo 'itemprop="author" itemscope itemtype="https://schema.org/Person"'; ?>>
            <span <?php if (!$remove_schema) echo 'itemprop="name"'; ?>>
                <?php echo get_sub_field('person_testifying'); ?>
            </span><br />
            <i <?php if (!$remove_schema) echo 'itemprop="affiliation" itemscope itemtype="https://schema.org/Organization"'; ?>>
                <span <?php if (!$remove_schema) echo 'itemprop="name"'; ?>>
                    <?php echo get_sub_field('company'); ?>
                </span>
            </i>
        </div>

        <?php if (!$remove_schema) : ?>

            <div itemprop="itemReviewed" itemscope itemtype="https://schema.org/LocalBusiness">
                <meta itemprop="name" content="Darkstar Media">
                <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                    <meta itemprop="streetAddress" content="35 Viking Lane, Unit# 2339">
                    <meta itemprop="addressLocality" content="Toronto">
                    <meta itemprop="addressRegion" content="ON">
                    <meta itemprop="postalCode" content="M9B0A2">
                </div>
                <meta itemprop="telephone" content="+1-416-450-5439">
                <meta itemprop="url" content="<?php echo esc_url(home_url()); ?>">
            </div>

            <div itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
                <meta itemprop="ratingValue" content="5">
                <meta itemprop="bestRating" content="5">
                <meta itemprop="worstRating" content="1">
            </div>
        <?php endif; ?>

        <div class="testimonial__inner-image">
            <?php
            $logo = get_sub_field('logo');
            if ($logo) :
                $logo_url = $logo['url'];
                $logo_alt = $logo['alt'];
            ?>
                <img src="<?php echo esc_url($logo_url); ?>"
                    alt="<?php echo esc_attr($logo_alt); ?>"
                    width="150" height="150"
                    <?php if (!$remove_schema) echo 'itemprop="image"'; ?> />
            <?php endif; ?>
        </div>

    </div>
</section>