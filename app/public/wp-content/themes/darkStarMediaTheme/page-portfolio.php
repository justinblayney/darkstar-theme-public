<?php
/*
Template Name: Portfolio

 * @package WordPress
 * @subpackage Darkstar_Media
 * @since Darkstar Media1.0
 */

global $wp_query;
$postid = $wp_query->post->ID;
wp_reset_query();

$args = array(
    'post_type'      => 'portfolio',
    'posts_per_page' => 50,
    'orderby'        => 'portfolioorder',
    'order'          => 'DESC'
);

$loop = new WP_Query($args);
$two_columns = 0;

get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <div class="breadcrumbs">
        <?php if ((function_exists('rank_math_the_breadcrumbs')) && (!is_front_page()))
            rank_math_the_breadcrumbs(); ?>
    </div>
    <h1 class="page-title"><?php the_title(); ?></h1>

    <?php if (has_post_thumbnail()) : ?>
        <div class="featured-image">
            <?php the_post_thumbnail('large'); ?> <!-- You can specify the size you want -->
        </div>
    <?php endif; ?>

    <?php include("components/acf-loop.php"); ?>

    <div class="portfolio">
        <?php
        while ($loop->have_posts()) : $loop->the_post();
            $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
        ?>
            <div class="portfolio__item" style="background-image: url('<?php echo esc_url($featured_img_url); ?>');">
                <div class="portfolio__item-background">
                    <h2>
                        <a href="<?php echo esc_url($featured_img_url); ?>" rel="lightbox-0"><?php the_title(); ?></a>
                    </h2>
                    <div class="portfolio__item-caption">
                        <a href="<?php the_permalink(); ?>" class="btn-text">Learn More</a>

                        <div class="btn-wrap">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/images/arrow.svg'); ?>" alt="Arrow">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>
    </div>



<?php endwhile; // end of the loop. 
?>


<?php get_footer(); ?>