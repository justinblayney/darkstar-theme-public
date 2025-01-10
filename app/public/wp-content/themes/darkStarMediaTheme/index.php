<?php

/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package darkStarMediaTheme
 */

get_header(); ?>


<div class="wrap-heading-outside">
	<div class="breadcrumbs">
		<?php if ((function_exists('rank_math_the_breadcrumbs')) && (!is_front_page()))
			custom_rank_math_breadcrumbs(); ?>
	</div>
	<div class="wrap-heading">
		<h1 class="page-title">News & Updates</h1>
	</div>

</div>

<?php if (have_posts()) : ?>

	<div class="container">
		<div class="row blog-wrap">
			<?php /* Start the Loop */ ?>
			<?php while (have_posts()) : the_post(); ?>

				<?php
				/* Include the Post-Format-specific template for the content.
						* If you want to overload this in a child theme then include a file
						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
						*/
				get_template_part('content', get_post_format());
				?>

			<?php endwhile; ?>

		</div>
		<br clear="all" />
		<?php darkStarMediaTheme_content_nav('nav-below');
		?>
	</div>
<?php else : ?>

	<?php get_template_part('no-results', 'index'); ?>
	</div>
	</div>
<?php endif; ?>

<?php //get_sidebar(); 
?>
<?php get_footer(); ?>