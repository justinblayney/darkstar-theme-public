<?php
// Generate a unique ID using the ACF row index to ensure it remains consistent in the loop
$unique_id = 'banner-' . get_row_index();
?>
<section id="<?php echo esc_attr($unique_id); ?>">

	<div class="wrap-carousel container">
		<?php if (get_sub_field('heading')) : ?>
			<h2><?php echo esc_html(get_sub_field('heading')); ?></h2>
		<?php endif; ?>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Wrapper for slides -->
			<!-- data-ride="carousel"  starts slider automatically -->
			<div class="carousel-inner">
				<?php
				$write_active = "active";
				// Check rows existexists.
				if (have_rows('images')):

					// Loop through rows.
					while (have_rows('images')) : the_row();

						// Load sub field value.
						$title = get_sub_field('title');
						$description = get_sub_field('description');
						$image = get_sub_field('image');
						$link = get_sub_field('link');
						// Do something...
						echo '<div class="carousel-item ' . $write_active . ' ">';  // start item
						$write_active = "";
						echo '<img src="' . $image['url'] . '" class="banner_image_big" alt="' . $image['alt'] . '">';
						echo '<div class="carousel-caption">'; // start caption
						echo '<div>';
						echo '<h3 class="banner-header">' . $title . '</h3>';
						echo '<p class="banner-description">' . $description . '</p>';
						echo '</div>';

						echo '<div class="carousel-btn-wrap">';
						echo '<a href="' . $link['url'] . '" title="' . $link['title'] . '" class="carousel-btn"><img src="' . get_template_directory_uri() . '/images/arrow.svg" alt="Arrow"></a>';


						echo '</div>';
						echo '</div>'; // end caption
						echo '</div>';   // end item

					// End loop.
					endwhile;

				// No value.
				else :
				// Do something...
				endif; ?>
			</div>

			<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<a class="right carousel-control-next" href="#myCarousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</section>