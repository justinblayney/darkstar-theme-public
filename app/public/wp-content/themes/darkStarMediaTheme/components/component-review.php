<section class="reviews">

    <div class="reviews__wrap">

        <!-- Table of Contents with Logo -->

        <div class="reviews__toc">
            <div class="toc-logo">
                <?php
                $company_logo = get_sub_field('company_logo');
                if ($company_logo) :
                    $logo_url = $company_logo['url'];
                    $logo_alt = $company_logo['alt'];
                ?>
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($logo_alt); ?>" width="150" class="reviews__logo">
                <?php endif; ?>
            </div>
            <div class="toc-content">
                <h2>Table of Contents</h2>
                <ul>
                    <li><a href="#review-section">Review</a></li>
                    <li><a href="#pricing-section">Pricing</a></li>
                    <li><a href="#rating-section">Rating</a></li>
                    <li><a href="#pros-cons-section">Pros & Cons</a></li>
                    <li><a href="#summary-section">Summary</a></li>
                </ul>
            </div>

        </div>

        <!-- Review Section -->
        <h2 id="review-section">Review</h2>
        <div class="reviews__body">
            <?php echo apply_filters('the_content', get_sub_field('review_body')); ?>
        </div>

        <!-- Pricing Section -->
        <h2 id="pricing-section">Pricing</h2>
        <div class="reviews__pricing">
            <?php echo apply_filters('the_content', get_sub_field('pricing')); ?>
        </div>

        <!-- Rating Section -->
        <h2 id="rating-section">Rating</h2>
        <div class="reviews__stars">
            <div class="star-rating">
                <!-- Grey Stars -->
                <img src="<?php echo get_template_directory_uri(); ?>/images/grey.svg" alt="Grey Stars" class="stars-bg" />

                <!-- Yellow Stars -->
                <div class="stars-overlay" style="clip-path: inset(0 <?php echo 100 - esc_attr(get_sub_field('star_rating') * 20); ?>% 0 0);">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/orange.svg" alt="Yellow Stars" />
                </div>
            </div>
            <strong>We give <?php echo get_sub_field('company_reviewed'); ?> a rating of <?php echo get_sub_field('star_rating'); ?> / 5</strong>
        </div>

        <!-- Pros & Cons Section -->
        <h2 id="pros-cons-section">Pros & Cons</h2>
        <div class="reviews__pros-cons">
            <?php if (have_rows('review_pros')) : ?>
                <div class="wrap">
                    <div class="heading">Pros</div>
                    <ul>
                        <?php while (have_rows('review_pros')) : the_row(); ?>
                            <li><?php echo esc_html(get_sub_field('pro')); ?></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (have_rows('review_cons')) : ?>
                <div class="wrap">
                    <div class="heading">Cons</div>
                    <ul>
                        <?php while (have_rows('review_cons')) : the_row(); ?>
                            <li><?php echo esc_html(get_sub_field('cons')); ?></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

        <!-- Summary Section -->
        <h2 id="summary-section">Summary</h2>
        <div class="reviews__summary">
            <?php echo apply_filters('the_content', get_sub_field('summary_text')); ?>
        </div>
    </div>

    <!-- Embedded Review and ToC Schema -->
    <?php
    $company_reviewed = get_sub_field('company_reviewed');
    $company_logo = get_sub_field('company_logo');
    $company_url = get_sub_field('company_url');
    $star_rating = get_sub_field('star_rating');
    $review_body = get_sub_field('review_body');

    // Prepare Pros and Cons
    $positive_notes = [];
    if (have_rows('review_pros')) {
        while (have_rows('review_pros')) {
            the_row();
            $positive_notes[] = get_sub_field('pro');
        }
    }

    $negative_notes = [];
    if (have_rows('review_cons')) {
        while (have_rows('review_cons')) {
            the_row();
            $negative_notes[] = get_sub_field('cons');
        }
    }

    if ($company_reviewed && $company_url && $star_rating) :
        $review_schema = [
            "@context" => "https://schema.org",
            "@type" => "Review",
            "itemReviewed" => [
                "@type" => "Organization",
                "name" => $company_reviewed,
                "url" => esc_url($company_url),
                "logo" => $company_logo ? esc_url($company_logo['url']) : null,
            ],
            "reviewBody" => $review_body,
            "author" => [
                "@type" => "Person",
                "name" => "Justin Blayney",
            ],
            "reviewRating" => [
                "@type" => "Rating",
                "ratingValue" => $star_rating,
                "bestRating" => "5",
                "worstRating" => "1",
            ],
            "positiveNotes" => $positive_notes,
            "negativeNotes" => $negative_notes,
        ];

        $toc_schema = [
            "@context" => "https://schema.org",
            "@type" => "ItemList",
            "itemListElement" => [
                [
                    "@type" => "ListItem",
                    "position" => 1,
                    "name" => "Review",
                    "url" => "#review-section",
                ],
                [
                    "@type" => "ListItem",
                    "position" => 2,
                    "name" => "Rating",
                    "url" => "#rating-section",
                ],
                [
                    "@type" => "ListItem",
                    "position" => 3,
                    "name" => "Pros & Cons",
                    "url" => "#pros-cons-section",
                ],
                [
                    "@type" => "ListItem",
                    "position" => 4,
                    "name" => "Summary",
                    "url" => "#summary-section",
                ],
            ],
        ];

        echo '<script type="application/ld+json">' . json_encode($review_schema) . '</script>';
        echo '<script type="application/ld+json">' . json_encode($toc_schema) . '</script>';
    endif;
    ?>

</section>