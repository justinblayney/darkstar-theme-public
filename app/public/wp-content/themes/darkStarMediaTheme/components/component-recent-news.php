<?php
// Fetch the blog category from the custom field within the layout
$category = get_sub_field('blog_category');

// Base query arguments
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 4,
    'orderby' => 'modified', // Sort by the last modified date
    'order' => 'DESC',
);

// Check if a category is selected
if (!empty($category)) {
    if ($category == 193) {
        // Include category 193 specifically
        $args['cat'] = $category;
    } else {
        // Include the selected category but exclude 192
        $args['cat'] = $category;
        $args['category__not_in'] = array(193);
    }
} else {
    // If no category is selected, exclude 192 globally
    $args['category__not_in'] = array(193);
}

// WP Query
$recent_posts = new WP_Query($args);
?>

<section class="recent-news" itemscope itemtype="https://schema.org/Blog">
    <h2>Recent Posts</h2>
    <div class="recent-news__cards">

        <?php
        // Loop through posts
        if ($recent_posts->have_posts()) :
            while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                <div class="recent-news__cards-card" itemscope itemtype="https://schema.org/BlogPosting">

                    <?php
                    if (has_post_thumbnail()) :
                        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    else :
                        $image_url = get_template_directory_uri() . '/images/darkstar-media-logo-1 copy.webp';
                    endif;
                    ?>
                    <img src="<?php echo esc_url($image_url); ?>"
                        alt="<?php echo esc_attr(get_the_title()); ?>"
                        width="400" height="300" itemprop="image" loading="lazy" />

                    <div class="content">
                        <div class="wrap-date">
                            <?php if (get_the_modified_date() != get_the_date()) : ?>
                                <span class="date" itemprop="dateModified">Updated on: <?php echo get_the_modified_date(); ?></span>
                                <meta itemprop="datePublished" content="<?php echo get_the_date('c'); ?>">
                            <?php else : ?>
                                <span class="date" itemprop="datePublished">Published on: <?php echo get_the_date(); ?></span>
                            <?php endif; ?>
                        </div>


                        <h3 itemprop="headline">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="content-btn title-desktop" itemprop="url">
                                <?php
                                $title = get_the_title();
                                echo (mb_strlen($title) > 60) ? mb_substr($title, 0, 60) . '...' : $title;
                                ?>
                            </a>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="content-btn title-mobile" itemprop="url"><?php the_title(); ?>
                            </a>
                        </h3>

                        <?php if (get_the_excerpt()) : ?>
                            <p itemprop="description"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                        <?php endif; ?>

                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="content-btn" itemprop="url">
                            Read More &#187;
                        </a>

                        <!-- Additional properties (Optional) -->
                        <meta itemprop="author" content="Darkstar Media">
                        <meta itemprop="publisher" content="Darkstar Media">
                        <meta itemprop="mainEntityOfPage" content="<?php the_permalink(); ?>">
                    </div>
                </div>
        <?php endwhile;
            wp_reset_postdata(); // Reset the global $post object
        endif;
        ?>
    </div>
</section>