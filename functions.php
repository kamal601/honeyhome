<?php
/**
 * honeyHome functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package honeyHome
 */

if ( ! function_exists( 'honeyhome_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function honeyhome_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on honeyHome, use a find and replace
		 * to change 'honeyhome' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'honeyhome', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'honeyhome' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'honeyhome_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'honeyhome_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function honeyhome_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'honeyhome_content_width', 640 );
}
add_action( 'after_setup_theme', 'honeyhome_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function honeyhome_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'honeyhome' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'honeyhome' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'honeyhome_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function honeyhome_scripts() {
	wp_enqueue_style( 'honeyhome-style', get_stylesheet_uri() );

	wp_enqueue_script( 'honeyhome-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'honeyhome-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'honeyhome_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/tgm.php';
require get_template_directory() . '/inc/style.php';
require get_template_directory() . '/inc/widget.php';
require get_template_directory() . '/inc/class.comment-walker.php';
require get_template_directory() . '/inc/class-comment-form.php';
require get_template_directory() . '/inc/nav_walker.php';
require get_template_directory() . '/inc/search-form.php';

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//menu
function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="mn-has-sub"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

function my_nav_menu_submenu_css_class( $classes ) {
    $classes[] = 'mn-sub to-left mn-has-multi';
    return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'my_nav_menu_submenu_css_class' );

//pagination code
if(function_exists('pagination')){
function pagination()
{


	if (is_singular())
		return;

	global $wp_query;


	if ($wp_query->max_num_pages <= 1)
		return;

	$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
	$max = intval($wp_query->max_num_pages);


	if ($paged >= 1)
		$links[] = $paged;


	if ($paged >= 3) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if (($paged + 2) <= $max) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="site-block-27"><ul>' . "\n";


	if (get_previous_posts_link())
		printf('<li>%s</li>' . "\n", get_previous_posts_link('<i class="fa fa-caret-right"></i>'));


	if (!in_array(1, $links)) {
		$class = 1 == $paged ? ' class="current"' : '';

		printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

		if (!in_array(2, $links))
			echo '<li>…</li>';
	}


	sort($links);
	foreach ((array) $links as $link) {
		$class = $paged == $link ? ' class="current"' : '';
		printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
	}


	if (!in_array($max, $links)) {
		if (!in_array($max - 1, $links))
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="current"' : '';
		printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
	}


	if (get_next_posts_link())
		printf('<li>%s</li>' . "\n", get_next_posts_link('<i class="fa fa-caret-right"></i>'));

	echo '</ul></div>' . "\n";
}
}
	
function se_add_search_box_to_menu( $items, $args ) {
    if ( $args->theme_location === 'menu-1' )
        return $items . honeyhome_get_search_form();
 
    return $items;
}
add_filter( 'wp_nav_menu_items', 'se_add_search_box_to_menu', 10, 2 );


//echo do_shortcode("short_code_name");