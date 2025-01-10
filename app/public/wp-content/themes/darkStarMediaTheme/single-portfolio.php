<?php

/*
* Template Name: Portfolio
* Template Post Type: portfolio
*/

global $wp_query;
$postid = $wp_query->post->ID;
wp_reset_query();

get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <div class="breadcrumbs">
        <?php if ((function_exists('rank_math_the_breadcrumbs')) && (!is_front_page()))
            rank_math_the_breadcrumbs(); ?>
    </div>
    <h1 class="page-title"><?php the_title(); ?></h1>
    <div class="single-portfolio-wrap"><?php the_content(); ?></div>
    <?php if (has_post_thumbnail()) : ?>
        <div class="single-portfolio-wrap__image">
            <?php the_post_thumbnail('full', ['style' => 'width: auto; height: auto;']); ?>
        </div>

    <?php endif; ?>
    <?php include("components/acf-loop.php"); ?>

<?php endwhile; // end of the loop. 
?>

<?php get_footer(); ?>