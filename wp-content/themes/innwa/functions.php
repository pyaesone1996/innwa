<?php

/**
 * digit7s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package digit7s
 */

require_once get_template_directory() . '/inc/glive/class-glive-api.php';
require_once get_template_directory() . '/inc/glive/class-glive-ajax.php';
new Glive_AJAX();

wp_enqueue_script('glive-main', get_template_directory_uri() . '/assets/js/glive-main.js', 'jquery', null, true);
wp_localize_script('glive-main', 'glive_ajax_object', [
	'ajax_url' => admin_url('admin-ajax.php'),
]);

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('digit7s_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function digit7s_setup()
	{
		/*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on digit7s, use a find and replace
         * to change 'digit7s' to the name of your theme in all the template files.
         */
		load_theme_textdomain('digit7s', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
		add_theme_support('title-tag');

		/*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
		add_theme_support('post-thumbnails');



		/*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			]
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'digit7s_custom_background_args',
				[
					'default-color' => 'ffffff',
					'default-image' => '',
				]
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			[
				'height' => 250,
				'width' => 250,
				'flex-width' => true,
				'flex-height' => true,
			]
		);
	}
endif;
add_action('after_setup_theme', 'digit7s_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function digit7s_content_width()
{
	$GLOBALS['content_width'] = apply_filters('digit7s_content_width', 640);
}
add_action('after_setup_theme', 'digit7s_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function digit7s_widgets_init()
{
	register_sidebar(
		[
			'name' => esc_html__('Sidebar', 'digit7s'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'digit7s'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		]
	);
}
add_action('widgets_init', 'digit7s_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function digit7s_scripts()
{
	wp_enqueue_style('digit7s-style', get_stylesheet_uri(), [], _S_VERSION);
	wp_style_add_data('digit7s-style', 'rtl', 'replace');
}
add_action('wp_enqueue_scripts', 'digit7s_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');
register_nav_menus([
	'primary' => __('Primary Menu', 'digit7s'),
]);


function get_taged()
{

	if ('post' === get_post_type()) {
		$tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'digit7s'));
		if ($tags_list) {
			printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'digit7s') . '</span>', $tags_list); // phpcs:ignore WordPress.Security.
		}
	}
}

function pagination_bar()
{
	global $wp_query;

	if ($wp_query->max_num_pages <= 1) return;

	$big = 999999999;

	$pages = paginate_links(array(
		'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
		'format' => '?paged=%#%',
		'current' => max(1, get_query_var('paged')),
		'total' => $wp_query->max_num_pages,
		'type'  => 'array',
		'prev_text' => __('<i class="icofont-rounded-left"></i>'),
		'next_text' => __('<i class="icofont-rounded-right"></i>'),
	));
	if (is_array($pages)) {
		$page = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
		echo '<ul class="justify-content-center">';
		foreach ($pages as $page) {
			echo "<li>$page</li>";
		}
		echo '</ul>';
	}
}

function get_excerpt($digit = 260)
{
	$excerpt = get_the_excerpt();
	$excerpt = substr($excerpt, 0, $digit);
	$result = substr($excerpt, 0, strrpos($excerpt, ' '));
	echo $result;
}

#comment function 
function pressfore_modify_comment_output($comment, $depth, $args)
{
	$tag = ('div' === $args['style']) ? 'div' : 'li';
?>
	<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>"
	<?php comment_class(empty($args['has_children']) ? '' : 'parent', $comment); ?>>
	<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
		<footer class="comment-meta">
			<div class="comment-author vcard d-flex justify-content-between align-items-center">

				<div class="">
					<?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
					<?php
					/* translators: %s: comment author link */
					printf(
						__('%s <span class="says">says:</span>'),
						sprintf('<b class="fn">%s</b>', get_comment_author_link($comment))
					);
					?>
					<a href="<?php echo esc_url(get_comment_link($comment, $args)); ?>">
						<time datetime="<?php comment_time('c'); ?>">
							<?php
							printf(_x('%s ago', '%s = human-readable time difference', 'your-text-domain'), human_time_diff(get_comment_time('U'), current_time('timestamp')));
							?>
						</time>
					</a>
				</div>
				<div class="">
					<?php edit_comment_link(__('[ Edit ]'), '<span class="edit-link">', '</span>'); ?>
				</div>

			</div><!-- .comment-author -->

			<div class="comment-metadata">


			</div><!-- .comment-metadata -->

			<?php if ('0' == $comment->comment_approved) : ?>
				<p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.'); ?></p>
			<?php endif; ?>
		</footer><!-- .comment-meta -->

		<div class="comment-content">
			<?php comment_text(); ?>
		</div><!-- .comment-content -->

	</article><!-- .comment-body -->
<?php
}


