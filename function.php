if ( ! function_exists( 'faith_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function faith_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Faith, use a find and replace
	 * to change 'faith' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'faith', get_template_directory() . '/languages' );

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

	set_post_thumbnail_size( 240, 150, true );
	
	// Featured Post Main Thumbnail on the front page & single page template
	add_image_size( 'faith-large-thumbnail', 1600, 500, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'	=> esc_html__( 'Primary Menu', 'faith' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );

    add_theme_support( 'custom-logo', array(
	   'height'      => 50,
	   'width'       => 300,
	   'flex-width'  => true,
	   'flex-height' => true,
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', faith_fonts_url() ) );

}
endif; // faith_setup
add_action( 'after_setup_theme', 'faith_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function faith_content_width() {
	
	$GLOBALS['content_width'] = apply_filters( 'faith_content_width', 780 );

}
add_action( 'after_setup_theme', 'faith_content_width', 0 );

/* Custom Excerpt Length
==================================== */

add_filter( 'excerpt_length', 'faith_new_excerpt_length' );

function faith_new_excerpt_length( $length ) {
	return is_admin() ? $length : 30;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function faith_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'faith' ),
		'id'            => 'sidebar-main',
		'description'   => esc_html__( 'This is the main sidebar area that appears on all pages.', 'faith' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Homepage: Left Column', 'faith' ),
		'id'            => 'home-col-1',
		'description'   => esc_html__( 'Works best with a standard Text Widget. The widget title will be wrapped in a <h1></h1> tag.', 'faith' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="site-home-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Homepage: Right Column', 'faith' ),
		'id'            => 'home-col-2',
		'description'   => esc_html__( 'Works best with a widget like Recent Posts.', 'faith' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Site Header', 'faith' ),
		'id'            => 'site-header',
		'description'   => esc_html__( 'Works best with a search widget.', 'faith' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 1', 'faith' ),
		'id'            => 'sidebar-footer-1',
		'description'   => esc_html__( 'This is displayed in the footer of the website. By default has a width of 275px.', 'faith' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 2', 'faith' ),
		'id'            => 'sidebar-footer-2',
		'description'   => esc_html__( 'This is displayed in the footer of the website. By default has a width of 275px.', 'faith' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 3', 'faith' ),
		'id'            => 'sidebar-footer-3',
		'description'   => esc_html__( 'This is displayed in the footer of the website. By default has a width of 275px.', 'faith' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 4', 'faith' ),
		'id'            => 'sidebar-footer-4',
		'description'   => esc_html__( 'This is displayed in the footer of the website. By default has a width of 275px.', 'faith' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer: Column 5', 'faith' ),
		'id'            => 'sidebar-footer-5',
		'description'   => esc_html__( 'This is displayed in the footer of the website. By default has a width of 275px.', 'faith' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );

}
add_action( 'widgets_init', 'faith_widgets_init' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function faith_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'faith_pingback_header' );


if ( ! function_exists( 'faith_fonts_url' ) ) :
/**
 * Register Google fonts for Faith.
 *
 * Create your own faith_fonts_url() function to override in a child theme.
 *
 * @since Faith 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function faith_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'faith' ) ) {
		$fonts[] = 'Roboto:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'faith' ) ) {
		$fonts[] = 'Lato:400,400i,700,700i';
	}

	/* translators: If there are characters in your language that are not supported by Lora, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lora font: on or off', 'faith' ) ) {
		$fonts[] = 'Lora:400,400i,700,700i';
	}

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'faith' ) ) {
		$fonts[] = 'Open Sans:400,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function faith_scripts() {

	wp_enqueue_style( 'faith-style', get_stylesheet_uri() );

	// Add Dashicons font.
	wp_enqueue_style( 'dashicons' );

	// Add Genericons font.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.3.1' );

	wp_enqueue_script(
		'jquery-slicknav',
		get_template_directory_uri() . '/js/jquery.slicknav.min.js',
		array('jquery'),
		true
	);

	wp_enqueue_script(
		'jquery-superfish',
		get_template_directory_uri() . '/js/superfish.min.js',
		array('jquery'),
		true
	);

	wp_enqueue_script(
		'jquery-flexslider',
		get_template_directory_uri() . '/js/jquery.flexslider.js',
		array('jquery'),
		true
	);

	// wp_enqueue_script( 'faith-scripts', get_template_directory_uri() . '/js/faith.js', array( 'jquery' ), '20160820', true );
	wp_register_script( 'faith-scripts', get_template_directory_uri() . '/js/faith.js', array( 'jquery' ), '20160820', true );

	/* Contains the strings used in our JavaScript file */
	$faithStrings = array (
		'slicknav_menu_home' => _x( 'HOME', 'The main label for the expandable mobile menu', 'faith' )
	);

	wp_localize_script( 'faith-scripts', 'faithStrings', $faithStrings );

	wp_enqueue_script( 'faith-scripts' );

	// Loads our default Google Webfont
	wp_enqueue_style( 'faith-webfonts', faith_fonts_url(), array(), null, null );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'faith_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_parent_theme_file_path() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_parent_theme_file_path() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_parent_theme_file_path() . '/inc/jetpack.php';

/**
 * Load plugin enhancement file to display admin notices.
 */
require get_parent_theme_file_path() . '/inc/plugin-enhancements.php';

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Faith 1.0
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function faith_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'faith_widget_tag_cloud_args' );