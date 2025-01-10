<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package darkStarMediaTheme
 */

global $wp_query;
$postid = $wp_query->post->ID;
wp_reset_query();

get_header();

?>

<?php while (have_posts()) : the_post(); ?>
	<div class="breadcrumbs">
		<?php if ((function_exists('custom_rank_math_breadcrumbs')) && (!is_front_page()))
			custom_rank_math_breadcrumbs(); ?>
	</div>
	<h1 class="page-title"><?php the_title(); ?></h1>

	<?php if (has_post_thumbnail()) : ?>
		<div class="featured-image">
			<?php the_post_thumbnail('large'); ?> <!-- You can specify the size you want -->
		</div>
	<?php endif; ?>

	<?php include("components/acf-loop.php"); ?>
<?php endwhile; // end of the loop. 
?>


<?php get_footer(); ?>