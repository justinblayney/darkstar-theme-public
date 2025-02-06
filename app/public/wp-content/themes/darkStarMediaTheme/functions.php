<?php

/**
 * darkStarMediaTheme functions and definitions
 *
 * @package darkStarMediaTheme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (! isset($content_width))
	$content_width = 750; /* pixels */

if (! function_exists('darkStarMediaTheme_setup')) :
	/**
	 * Set up theme defaults and register support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 */
	function darkStarMediaTheme_setup()
	{
		global $cap, $content_width;

		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();

		/**
		 * Add default posts and comments RSS feed links to head
		 */
		add_theme_support('automatic-feed-links');

		/**
		 * Enable support for Post Thumbnails on posts and pages
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support('post-thumbnails');

		/**
		 * Enable support for Post Formats
		 */
		add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

		/**
		 * Setup the WordPress core custom background feature.
		 */
		add_theme_support('custom-background', apply_filters('darkStarMediaTheme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 * If you're building a theme based on darkStarMediaTheme, use a find and replace
		 * to change 'darkStarMediaTheme' to the name of your theme in all the template files
		 */
		load_theme_textdomain('darkStarMediaTheme', get_template_directory() . '/languages');

		/**
		 * This theme uses wp_nav_menu() in one location.
		 */
		/*
	register_nav_menus( array(
		'primary'  => __( 'Header bottom menu', 'darkStarMediaTheme' ),
	) );
	*/
		register_nav_menus(array(
			'primary' => __('Primary Menu', 'darkStarMediaTheme'),
		));
	}
endif; // darkStarMediaTheme_setup
add_action('after_setup_theme', 'darkStarMediaTheme_setup');

/**
 * Register widgetized area and update sidebar with default widgets
 */
function darkStarMediaTheme_widgets_init()
{
	register_sidebar(array(
		'name'          => __('Sidebar', 'darkStarMediaTheme'),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name' => 'Footer Sidebar 1',
		'id' => 'footer-sidebar-1',
		'description' => 'Appears in the footer area',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
	));
}
add_action('widgets_init', 'darkStarMediaTheme_widgets_init');

/**
 * Enqueue scripts and styles
 */
function darkStarMediaTheme_scripts()
{

	// load bootstrap css
	wp_enqueue_style('darkStarMediaTheme-bootstrap', get_template_directory_uri() . '/includes/bootstrap/css/bootstrap.min.css');

	// load darkStarMediaTheme styles
	wp_enqueue_style('darkStarMediaTheme-style', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');

	//load JQuery js
	//wp_enqueue_script('darkStarMediaTheme-jquery', '/wp-includes/js/jquery/jquery.js');

	// load bootstrap js
	wp_enqueue_script('darkStarMediaTheme-bootstrapjs', get_template_directory_uri() . '/includes/bootstrap/js/bootstrap.min.js');


	add_filter('wc_stripe_hide_payment_request_on_product_page', '__return_true');


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	if (is_singular() && wp_attachment_is_image()) {
		wp_enqueue_script('darkStarMediaTheme-keyboard-image-navigation', get_template_directory_uri() . '/includes/js/keyboard-image-navigation.js', array('jquery'), '20120202');
	}

	function prefix_add_footer_styles()
	{
		wp_enqueue_style('non-critical-style', get_template_directory_uri() . '/non-critical-style.css', array(), '1.0.0', 'all');
	};
	add_action('get_footer', 'prefix_add_footer_styles');

	wp_enqueue_script('footerjs',  get_template_directory_uri() . '/js/footer.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'darkStarMediaTheme_scripts');

function smartwp_remove_wp_block_library_css()
{
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-blocks-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require_once  get_template_directory() . "/includes/class-wp-bootstrap-navwalker.php";


register_nav_menus(array(
	'primary' => __('Primary Menu', 'darkStarMediaTheme'),
));

register_nav_menus(array(
	'mainright' => __('Main right', 'darkStarMediaTheme'),
));


/**
 * Central location to create all shortcodes.
 */
function btnlink_shortcodes_init()
{
	add_shortcode('btnlink', 'btnlink_shortcode');
}

add_action('init', 'btnlink_shortcodes_init');



/**
 * /**
 * The [button link] shortcode.
 *
 * Accepts a title and will display a box.
 *
 * @param array  $atts    Shortcode attributes. Default empty.
 * @param string $content Shortcode content. Default null.
 * @param string $tag     Shortcode tag (name). Default empty.
 * @return string Shortcode output.
 */
function btnlink_shortcode($atts = [], $content = null, $tag = '')
{
	// normalize attribute keys, lowercase
	$atts = array_change_key_case((array) $atts, CASE_LOWER);

	// override default attributes with user attributes
	$btnlink_atts = shortcode_atts(
		array(
			'title' => 'Contact Us',
			'link' => '/contact',
			'size' => 'large',
		),
		$atts,
		$tag
	);

	// link
	$output = '<div class="wrap-shortcode"><a href="' . $btnlink_atts['link'] . '" class="btn-shortcode ' . $btnlink_atts['size'] . '" title="' . $btnlink_atts['title'] . '">' . $btnlink_atts['title'] . '</a></div>';

	// enclosing tags
	if (! is_null($content)) {
		// $content here holds everything in between the opening and the closing tags of your shortcode. eg.g [my-shortcode]content[/my-shortcode].
		// Depending on what your shortcode supports, you will parse and append the content to your output in different ways.
		// In this example, we just secure output by executing the_content filter hook on $content.
		//$o .= apply_filters( 'the_content', $content );
	}

	// return output
	return $output;
}


/**
 * Exclude from Search
 */
add_action('init', 'update_my_custom_type', 99);

function update_my_custom_type()
{
	global $wp_post_types;

	if (post_type_exists('testimonials')) {

		// exclude from search results
		$wp_post_types['testimonials']->exclude_from_search = true;
	}

	if (post_type_exists('home_callouts')) {

		// exclude from search results
		$wp_post_types['home_callouts']->exclude_from_search = true;
	}

	if (post_type_exists('home_banners')) {

		// exclude from search results
		$wp_post_types['home_banners']->exclude_from_search = true;
	}

	if (post_type_exists('portfolio')) {

		// exclude from search results
		$wp_post_types['portfolio']->exclude_from_search = true;
	}
}

add_action('init', 'remove_content_editor');

function remove_content_editor()
{
	// remove_post_type_support('post', 'editor');
	remove_post_type_support('page', 'editor');
}


/** remove parent pages form Rankmath Breadcrumbs */

function custom_rank_math_breadcrumbs()
{
	if (function_exists('rank_math_the_breadcrumbs') && !is_front_page()) {
		ob_start();
		rank_math_the_breadcrumbs();
		$breadcrumbs = ob_get_clean();

		$empty_parents = array('Web Design Services', 'Our Work');

		foreach ($empty_parents as $parent) {
			$breadcrumbs = preg_replace('/<a[^>]*>' . preg_quote($parent, '/') . '.*?<\/a><span[^>]*>[^<]*<\/span>/i', '', $breadcrumbs);
		}

		$blog_url = get_permalink(get_option('page_for_posts'));
		$blog_link = '<a href="' . esc_url($blog_url) . '">Blog</a>';

		if (is_single() || (is_home() && is_paged())) {
			$breadcrumbs = preg_replace('/(<span class="separator"> » <\/span>)?<span class="last">Blog<\/span>/', '', $breadcrumbs);
			$breadcrumbs = preg_replace('/(<span class="last">)/', $blog_link . '<span class="separator"> » </span>$1', $breadcrumbs, 1);
		} elseif (is_search()) {
			$search_url = home_url('/') . '?s=' . urlencode(get_search_query());
			$search_link = '<a href="' . esc_url($search_url) . '">Search Results</a>';
			$breadcrumbs = preg_replace('/<a[^>]*>\s*(You searched for|Search Results)\s*<\/a>/', $search_link, $breadcrumbs);
		}

		echo $breadcrumbs;
	}
}




/**
 * Limit the number of posts displayed per page on the blog roll and search results, 
 * but display all posts on archive pages.
 *
 * @param WP_Query $query The current query instance.
 */
function darkstar_media_custom_posts_per_page($query)
{
	// Ensure this runs only on the main query in the frontend
	if (!is_admin() && $query->is_main_query()) {
		if (is_home() || is_search()) {
			// Set limit to 9 posts for the blog roll and search results
			$query->set('posts_per_page', 9);

			// Exclude category 193 from the blog feed
			if (is_home()) {
				$query->set('category__not_in', array(193));
			}
		} elseif (is_archive()) {
			// Set unlimited posts for archive pages
			$query->set('posts_per_page', -1);
		}
	}
}
add_action('pre_get_posts', 'darkstar_media_custom_posts_per_page');


/**
 * Sort blog roll and search results by modified date if it is more recent than the posted date.
 *
 * @param WP_Query $query The current query instance.
 */
function darkstar_media_sort_by_modified_date($query)
{
	if (!is_admin() && $query->is_main_query() && (is_home() || is_search() || is_archive())) {
		$query->set('orderby', 'modified');
		$query->set('order', 'DESC');
	}
}
add_action('pre_get_posts', 'darkstar_media_sort_by_modified_date');


/**
 * Adds TOC schema to the header of the "Website Launching Checklist" page.
 *
 * This function injects structured data (JSON-LD) for an ItemList schema on 
 * the "Website Launching Checklist" page, helping search engines recognize the TOC.
 *
 * @return void
 */
add_action('wp_head', 'add_custom_schema_to_head');

function add_custom_schema_to_head()
{
	// Get the schema content from the custom field 'page_schema' on any page
	if (is_singular()) { // Ensures this only runs on singular pages (posts or pages)
		$schema = get_post_meta(get_the_ID(), 'page_schema', true);

		// If 'page_schema' contains content, output it in the <head>
		if ($schema) {
			echo '<script type="application/ld+json">' . $schema . '</script>';
		}
	}
}


// Disable REST API links in the head
remove_action('wp_head', 'rest_output_link_wp_head');
// Disable REST API link headers
remove_action('template_redirect', 'rest_output_link_header', 11);
// Disable oEmbed discovery links
remove_action('wp_head', 'wp_oembed_add_discovery_links');



/**
 * Register a Custom Post Type: Reviews
 *
 * This function registers a custom post type called "Reviews" with support for
 * title, editor, thumbnail, excerpt, and custom fields. It is publicly queryable,
 * has an archive, and is enabled for the WordPress REST API.
 *
 * @package darkStarMediaTheme
 * @since 1.0.0
 */

function custom_reviews_cpt()
{
	$labels = array(
		'name'               => _x('Reviews', 'post type general name', 'textdomain'),
		'singular_name'      => _x('Review', 'post type singular name', 'textdomain'),
		'menu_name'          => _x('Reviews', 'admin menu', 'textdomain'),
		'name_admin_bar'     => _x('Review', 'add new on admin bar', 'textdomain'),
		'add_new'            => __('Add New', 'textdomain'),
		'add_new_item'       => __('Add New Review', 'textdomain'),
		'new_item'           => __('New Review', 'textdomain'),
		'edit_item'          => __('Edit Review', 'textdomain'),
		'view_item'          => __('View Review', 'textdomain'),
		'all_items'          => __('All Reviews', 'textdomain'),
		'search_items'       => __('Search Reviews', 'textdomain'),
		'not_found'          => __('No reviews found.', 'textdomain'),
		'not_found_in_trash' => __('No reviews found in Trash.', 'textdomain')
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'reviews'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-star-filled',
		'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
		'show_in_rest'       => true, // Enables Gutenberg support
	);

	register_post_type('review', $args);
}
add_action('init', 'custom_reviews_cpt');
