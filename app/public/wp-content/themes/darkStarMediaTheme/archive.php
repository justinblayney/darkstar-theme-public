<?php

/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package darkStarMediaTheme
 */

get_header();
?>

<?php // add the class "panel" below here to wrap the content-padder in Bootstrap style ;) 
?>
<div class="content-padder archive">

	<?php if (have_posts()) : ?>

		<header>
			<h1 class="page-title">
				<?php
				if (is_category()) :
					single_cat_title();

				elseif (is_tag()) :
					single_tag_title();

				elseif (is_author()) :
					/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
					the_post();
					printf(__('Author: %s', 'darkStarMediaTheme'), '<span class="vcard">' . get_the_author() . '</span>');
					/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
					rewind_posts();

				elseif (is_day()) :
					printf(__('Day: %s', 'darkStarMediaTheme'), '<span>' . get_the_date() . '</span>');

				elseif (is_month()) :
					printf(__('Month: %s', 'darkStarMediaTheme'), '<span>' . get_the_date('F Y') . '</span>');

				elseif (is_year()) :
					printf(__('Year: %s', 'darkStarMediaTheme'), '<span>' . get_the_date('Y') . '</span>');

				elseif (is_tax('post_format', 'post-format-aside')) :
					_e('Asides', 'darkStarMediaTheme');

				elseif (is_tax('post_format', 'post-format-image')) :
					_e('Images', 'darkStarMediaTheme');

				elseif (is_tax('post_format', 'post-format-video')) :
					_e('Videos', 'darkStarMediaTheme');

				elseif (is_tax('post_format', 'post-format-quote')) :
					_e('Quotes', 'darkStarMediaTheme');

				elseif (is_tax('post_format', 'post-format-link')) :
					_e('Links', 'darkStarMediaTheme');

				else :
					_e('Archives', 'darkStarMediaTheme');

				endif;
				?>
			</h1>
			<?php
			// Show an optional term description.
			$term_description = term_description();
			if (! empty($term_description)) :
				printf('<div class="taxonomy-description">%s</div>', $term_description);
			endif;
			?>
		</header><!-- .page-header -->


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
				<br clear="all" />
				<?php //darkStarMediaTheme_content_nav('nav-below'); 
				?>
				<br clear="all" />
			<?php else : ?>

				<?php get_template_part('no-results', 'archive'); ?>
				<br clear="all" />
			<?php endif; ?>

			</div><!-- .content-padder -->
			<br clear="all" /><br clear="all" />
			<?php //get_sidebar(); 
			?>
			<?php get_footer(); ?>