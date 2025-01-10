<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package darkStarMediaTheme
 */

get_header(); ?>

	<div class="wrap-standard-page">

		<header>
			<h2 class="page-title">404: Page Not Found</h2>
		</header><!-- .page-header -->
		<p>Nothing could be found at this location. Maybe try a search?
		Sorry, but nothing matched your search terms. Please try again with some different keywords.<br><br>
		Désolé, mais rien ne correspond à vos termes de recherche. S'il vous plaît essayer de nouveau avec quelques mots-clés différents .<br><br>
		</p>

		<?php get_template_part( 'no-results', 'search' ); ?>
		
	</div>

<?php get_footer(); ?>