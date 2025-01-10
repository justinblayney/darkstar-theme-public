<?php

/**
 * The Template for displaying all single posts.
 *
 * @package darkStarMediaTheme
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



	<?php if (has_post_thumbnail()) : ?>
		<div class="featured-image">
			<?php the_post_thumbnail('large'); ?> <!-- You can specify the size you want -->
		</div>
	<?php endif; ?>

	<div class="wrap-single">
		<div class="wrap-date"><i>
				<?php if (get_the_modified_date() != get_the_date()) : ?>
					<span class="date" itemprop="dateModified">Updated on: <?php echo get_the_modified_date(); ?></span>
					<meta itemprop="datePublished" content="<?php echo get_the_date('c'); ?>">
				<?php else : ?>
					<span class="date" itemprop="datePublished">Published on: <?php echo get_the_date(); ?></span>
				<?php endif; ?>
			</i>
		</div>
		<?php the_content(); ?>
	</div>

	<?php include("components/acf-loop.php"); ?>

<?php endwhile; // end of the loop. 
?>

<?php get_footer(); ?>