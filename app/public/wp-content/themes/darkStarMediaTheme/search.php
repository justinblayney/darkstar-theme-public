<?php

/**
 * The template for displaying Search Results pages.
 *
 * @package darkStarMediaTheme
 */

get_header(); ?>
<div class="wrap-standard-page">
	<?php if (have_posts()) : ?>

		<div class="wrap-heading-outside">
			<div class="breadcrumbs">
				<?php if ((function_exists('rank_math_the_breadcrumbs')) && (!is_front_page()))
					custom_rank_math_breadcrumbs(); ?>
			</div>

			<div class="wrap-heading">
				<h1 class="page-title"><?php printf(__('Search Results for: %s', 'darkStarMediaTheme'), '<span>' . get_search_query() . '</span>'); ?></h1>
			</div>

		</div>

		<?php // start the loop. 
		?>
		<div class="blog-wrap">
			<?php while (have_posts()) : the_post(); ?>

				<?php get_template_part('content', 'search'); ?>

			<?php endwhile; ?>
		</div>

		<?php darkStarMediaTheme_content_nav('nav-below');
		?>

	<?php else : ?>

		<?php get_template_part('no-results', 'search'); ?>

	<?php endif; // end of loop. 
	?>
</div>

<?php get_footer(); ?>