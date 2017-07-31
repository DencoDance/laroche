<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Twenty Seventeen only works in WordPress 4.7 or later.
 */


if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentyseventeen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentyseventeen' );

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

	add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );

	add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'twentyseventeen' ),
		'social' => __( 'Social Links Menu', 'twentyseventeen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
    register_default_headers( array(
        'laroche-logo' => array(
            'url'   => get_stylesheet_directory_uri() . 'assets/images/logo.svg',
            'thumbnail_url' => get_stylesheet_directory_uri() . 'assets/images/logo.svg',
            'description'   => __( 'Laroche Logo', 'default logo' )
        )
    ));
	add_theme_support( 'custom-logo', array(
        'default-image' => get_stylesheet_directory_uri().'assets/images/logo.svg',
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', twentyseventeen_fonts_url() ) );

	add_theme_support( 'starter-content', array(
		'widgets' => array(
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			'sidebar-2' => array(
				'text_business_info',
			),

			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/espresso.jpg',
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		'nav_menus' => array(
			'top' => array(
				'name' => __( 'Top Menu', 'twentyseventeen' ),
				'items' => array(
					'page_home',
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
			'social' => array(
				'name' => __( 'Social Links Menu', 'twentyseventeen' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	) );
}
add_action( 'after_setup_theme', 'twentyseventeen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentyseventeen_content_width() {

	$content_width = 700;

	if ( twentyseventeen_is_frontpage() ) {
		$content_width = 1120;
	}

	/**
	 * Filter Twenty Seventeen content width of the theme.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param $content_width integer
	 */
	$GLOBALS['content_width'] = apply_filters( 'twentyseventeen_content_width', $content_width );
}
add_action( 'after_setup_theme', 'twentyseventeen_content_width', 0 );

/**
 * Register custom fonts.
 */
function twentyseventeen_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function twentyseventeen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentyseventeen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentyseventeen_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentyseventeen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'twentyseventeen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'twentyseventeen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
        'name'          =>  __('Footer 3', 'laroche'),
        'id'            =>  'sidebar-4',
        'description'   => __('Add widgets here to appear in your footer.', 'laroche'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentyseventeen_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function twentyseventeen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyseventeen_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function twentyseventeen_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'twentyseventeen_pingback_header' );

/**
 * Display custom color CSS.
 */
function twentyseventeen_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo twentyseventeen_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'twentyseventeen_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function twentyseventeen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentyseventeen-fonts', twentyseventeen_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_uri() );

	// Load the dark colorscheme.
	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'twentyseventeen-style' ), '1.0' );
	}

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'twentyseventeen-style' ), '1.0' );
		wp_style_add_data( 'twentyseventeen-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentyseventeen-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'twentyseventeen-style' ), '1.0' );
	wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentyseventeen-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$twentyseventeen_l10n = array(
		'quote'          => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'twentyseventeen-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array(), '1.0', true );
		$twentyseventeen_l10n['expand']         = __( 'Expand child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['collapse']       = __( 'Collapse child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['icon']           = twentyseventeen_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}

	wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	wp_localize_script( 'twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );


/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentyseventeen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentyseventeen_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'twentyseventeen_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

function svg_circles_func( $atts ){

  return "
  <div id=\"circles-wrap\">
  <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 603 364\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"  height=\"360px\"  version=\"1.1\">
			 
		    <title>Group 12</title>
		    <desc>Created with Sketch.</desc>
		   	<defs></defs>
		    <g id=\"Desktop\" stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
		        <g id=\"Homepage\" transform=\"translate(0, 0)\">
		            <g id=\"Left-group\" class=\"group-1\" transform=\"translate(-100, 0)\">
		                <circle id=\"Oval\" cx=\"174.0\" cy=\"181.9\" r=\"171.0\"></circle>                
		                <path d=\"M140.33584,169.771289 L142.946191,169.771289 C144.358308,169.771289 145.376364,169.901659 146.000391,170.162402 C146.624417,170.423146 147.1166,170.845017 147.476953,171.428027 C147.837306,172.011038 148.01748,172.709762 148.01748,173.524219 C148.01748,174.426567 147.781643,175.17656 147.309961,175.774219 C146.838279,176.371878 146.198149,176.787889 145.389551,177.022266 C144.914939,177.157032 144.05069,177.224414 142.796777,177.224414 L142.796777,182.7 L140.33584,182.7 L140.33584,169.771289 Z M142.796777,174.825 L143.579004,174.825 C144.194241,174.825 144.621971,174.781055 144.862207,174.693164 C145.102443,174.605273 145.291406,174.460255 145.429102,174.258105 C145.566798,174.055956 145.635645,173.81133 145.635645,173.524219 C145.635645,173.026169 145.442287,172.662892 145.055566,172.434375 C144.774315,172.264452 144.252836,172.179492 143.491113,172.179492 L142.796777,172.179492 L142.796777,174.825 Z M149.599512,173.1375 L151.656152,173.1375 L151.656152,174.341602 C151.87881,173.86699 152.174705,173.506642 152.543848,173.260547 C152.91299,173.014452 153.317283,172.891406 153.756738,172.891406 C154.067287,172.891406 154.392479,172.973437 154.732324,173.1375 L153.985254,175.20293 C153.704003,175.062304 153.47256,174.991992 153.290918,174.991992 C152.921775,174.991992 152.609767,175.220506 152.354883,175.677539 C152.099999,176.134573 151.972559,177.031048 151.972559,178.366992 L151.981348,178.832813 L151.981348,182.7 L149.599512,182.7 L149.599512,173.1375 Z M160.410059,172.891406 C161.312407,172.891406 162.160543,173.11699 162.954492,173.568164 C163.748441,174.019338 164.368064,174.631637 164.813379,175.405078 C165.258694,176.178519 165.481348,177.013472 165.481348,177.909961 C165.481348,178.812309 165.257229,179.656051 164.808984,180.441211 C164.36074,181.226371 163.749906,181.840135 162.976465,182.28252 C162.203023,182.724905 161.350493,182.946094 160.418848,182.946094 C159.047747,182.946094 157.877349,182.458306 156.907617,181.482715 C155.937886,180.507124 155.453027,179.322077 155.453027,177.927539 C155.453027,176.433391 156.000873,175.188286 157.096582,174.192188 C158.057524,173.324996 159.162005,172.891406 160.410059,172.891406 Z M160.445215,175.150195 C159.70107,175.150195 159.081448,175.40947 158.586328,175.928027 C158.091208,176.446585 157.843652,177.110152 157.843652,177.91875 C157.843652,178.750785 158.088279,179.424607 158.577539,179.940234 C159.066799,180.455862 159.686422,180.713672 160.436426,180.713672 C161.18643,180.713672 161.810447,180.452932 162.308496,179.931445 C162.806545,179.409958 163.055566,178.739067 163.055566,177.91875 C163.055566,177.098433 162.81094,176.431936 162.32168,175.919238 C161.832419,175.40654 161.206937,175.150195 160.445215,175.150195 Z M174.507715,169.446094 L176.89834,169.446094 L176.89834,182.7 L174.507715,182.7 L174.507715,181.689258 C174.038963,182.134573 173.568752,182.45537 173.09707,182.65166 C172.625388,182.84795 172.114163,182.946094 171.563379,182.946094 C170.327045,182.946094 169.257719,182.467095 168.355371,181.509082 C167.453023,180.551069 167.001855,179.360163 167.001855,177.936328 C167.001855,176.459758 167.438375,175.249809 168.311426,174.306445 C169.184477,173.363081 170.245013,172.891406 171.493066,172.891406 C172.067288,172.891406 172.606345,172.999804 173.110254,173.216602 C173.614163,173.4334 174.079978,173.758592 174.507715,174.192188 L174.507715,169.446094 Z M171.985254,175.10625 C171.24111,175.10625 170.622952,175.368454 170.130762,175.892871 C169.638572,176.417288 169.39248,177.089644 169.39248,177.909961 C169.39248,178.736137 169.642966,179.415818 170.143945,179.949023 C170.644924,180.482229 171.261617,180.748828 171.994043,180.748828 C172.749906,180.748828 173.376853,180.486624 173.874902,179.962207 C174.372952,179.43779 174.621973,178.750785 174.621973,177.901172 C174.621973,177.069136 174.372952,176.395315 173.874902,175.879688 C173.376853,175.36406 172.746976,175.10625 171.985254,175.10625 Z M179.315332,173.1375 L181.741113,173.1375 L181.741113,177.742969 C181.741113,178.639458 181.802636,179.26201 181.925684,179.610645 C182.048731,179.959279 182.246483,180.230272 182.518945,180.423633 C182.791408,180.616993 183.126853,180.713672 183.525293,180.713672 C183.923732,180.713672 184.262108,180.618458 184.54043,180.428027 C184.818751,180.237597 185.025292,179.957814 185.160059,179.588672 C185.259668,179.31328 185.309473,178.724419 185.309473,177.82207 L185.309473,173.1375 L187.717676,173.1375 L187.717676,177.189258 C187.717676,178.859188 187.585841,180.001755 187.322168,180.616992 C186.999901,181.366996 186.525296,181.942674 185.89834,182.344043 C185.271384,182.745412 184.474517,182.946094 183.507715,182.946094 C182.458881,182.946094 181.610745,182.711721 180.963281,182.242969 C180.315817,181.774216 179.860255,181.120903 179.596582,180.283008 C179.409081,179.702927 179.315332,178.64825 179.315332,177.118945 L179.315332,173.1375 Z M199.48623,175.071094 L197.491113,176.169727 C197.116111,175.777146 196.74551,175.504688 196.379297,175.352344 C196.013084,175.199999 195.583889,175.123828 195.091699,175.123828 C194.19521,175.123828 193.47012,175.391892 192.916406,175.928027 C192.362693,176.464163 192.08584,177.151168 192.08584,177.989063 C192.08584,178.80352 192.352439,179.468552 192.885645,179.98418 C193.41885,180.499807 194.119039,180.757617 194.98623,180.757617 C196.058501,180.757617 196.893454,180.39141 197.491113,179.658984 L199.380762,180.950977 C198.355366,182.281061 196.908115,182.946094 195.038965,182.946094 C193.357316,182.946094 192.040434,182.448052 191.088281,181.451953 C190.136128,180.455854 189.660059,179.28985 189.660059,177.953906 C189.660059,177.02812 189.891502,176.17559 190.354395,175.396289 C190.817287,174.616988 191.463277,174.00469 192.292383,173.559375 C193.121489,173.11406 194.048725,172.891406 195.074121,172.891406 C196.023345,172.891406 196.875875,173.080369 197.631738,173.458301 C198.387601,173.836232 199.005759,174.373825 199.48623,175.071094 Z M201.938379,169.613086 L204.329004,169.613086 L204.329004,173.1375 L205.752832,173.1375 L205.752832,175.20293 L204.329004,175.20293 L204.329004,182.7 L201.938379,182.7 L201.938379,175.20293 L200.70791,175.20293 L200.70791,173.1375 L201.938379,173.1375 L201.938379,169.613086 Z\" id=\"Product\" fill=\"#000000\"></path>	
		                 
		            </g>
		            <g id=\"Right-group\" class=\"group-2\" transform=\"translate(100, 0)\">
		            	<circle id=\"Oval-Copy\" cx=\"426.0\" cy=\"181.9\" r=\"171.0\"></circle>
		            	<path d=\"M406.74375,182.7 L406.74375,169.771289 L408.774023,169.771289 C409.951764,169.771289 410.813083,169.84746 411.358008,169.999805 C412.131449,170.204884 412.746677,170.585739 413.203711,171.142383 C413.660744,171.699026 413.889258,172.35527 413.889258,173.111133 C413.889258,173.603323 413.785255,174.050096 413.577246,174.451465 C413.369237,174.852834 413.030862,175.229295 412.562109,175.580859 C413.34727,175.950002 413.921483,176.411423 414.284766,176.965137 C414.648049,177.51885 414.829688,178.173629 414.829688,178.929492 C414.829688,179.656058 414.642189,180.318161 414.267188,180.91582 C413.892186,181.51348 413.408792,181.960252 412.816992,182.256152 C412.225192,182.552052 411.407818,182.7 410.364844,182.7 L406.74375,182.7 Z M409.204688,172.117969 L409.204688,174.842578 L409.74082,174.842578 C410.33848,174.842578 410.782323,174.716603 411.072363,174.464648 C411.362404,174.212694 411.507422,173.869924 411.507422,173.436328 C411.507422,173.032029 411.369728,172.711232 411.094336,172.473926 C410.818944,172.23662 410.400003,172.117969 409.8375,172.117969 L409.204688,172.117969 Z M409.204688,177.039844 L409.204688,180.35332 L409.819922,180.35332 C410.839458,180.35332 411.526463,180.224415 411.880957,179.966602 C412.235451,179.708788 412.412695,179.333792 412.412695,178.841602 C412.412695,178.284958 412.20469,177.845509 411.788672,177.523242 C411.372654,177.200975 410.681255,177.039844 409.714453,177.039844 L409.204688,177.039844 Z M416.358984,173.1375 L418.415625,173.1375 L418.415625,174.341602 C418.638282,173.86699 418.934178,173.506642 419.30332,173.260547 C419.672463,173.014452 420.076756,172.891406 420.516211,172.891406 C420.826759,172.891406 421.151951,172.973437 421.491797,173.1375 L420.744727,175.20293 C420.463475,175.062304 420.232032,174.991992 420.050391,174.991992 C419.681248,174.991992 419.36924,175.220506 419.114355,175.677539 C418.859471,176.134573 418.732031,177.031048 418.732031,178.366992 L418.74082,178.832813 L418.74082,182.7 L416.358984,182.7 L416.358984,173.1375 Z M429.744727,173.1375 L432.135352,173.1375 L432.135352,182.7 L429.744727,182.7 L429.744727,181.689258 C429.275974,182.134573 428.805764,182.45537 428.334082,182.65166 C427.8624,182.84795 427.351175,182.946094 426.800391,182.946094 C425.564056,182.946094 424.494731,182.467095 423.592383,181.509082 C422.690035,180.551069 422.238867,179.360163 422.238867,177.936328 C422.238867,176.459758 422.675386,175.249809 423.548438,174.306445 C424.421489,173.363081 425.482025,172.891406 426.730078,172.891406 C427.3043,172.891406 427.843357,172.999804 428.347266,173.216602 C428.851174,173.4334 429.31699,173.758592 429.744727,174.192188 L429.744727,173.1375 Z M427.222266,175.10625 C426.478121,175.10625 425.859963,175.368454 425.367773,175.892871 C424.875583,176.417288 424.629492,177.089644 424.629492,177.909961 C424.629492,178.736137 424.879978,179.415818 425.380957,179.949023 C425.881936,180.482229 426.498629,180.748828 427.231055,180.748828 C427.986918,180.748828 428.613865,180.486624 429.111914,179.962207 C429.609963,179.43779 429.858984,178.750785 429.858984,177.901172 C429.858984,177.069136 429.609963,176.395315 429.111914,175.879688 C428.613865,175.36406 427.983988,175.10625 427.222266,175.10625 Z M434.561133,173.1375 L436.951758,173.1375 L436.951758,174.113086 C437.496682,173.656052 437.99033,173.338184 438.432715,173.159473 C438.8751,172.980761 439.327732,172.891406 439.790625,172.891406 C440.739848,172.891406 441.545505,173.222458 442.207617,173.88457 C442.764261,174.447073 443.042578,175.279096 443.042578,176.380664 L443.042578,182.7 L440.669531,182.7 L440.669531,178.507617 C440.669531,177.365033 440.618262,176.606252 440.515723,176.23125 C440.413183,175.856248 440.234474,175.570606 439.97959,175.374316 C439.724706,175.178026 439.409768,175.079883 439.034766,175.079883 C438.548435,175.079883 438.130959,175.242479 437.782324,175.567676 C437.43369,175.892873 437.191993,176.342575 437.057227,176.916797 C436.986914,177.215626 436.951758,177.863081 436.951758,178.85918 L436.951758,182.7 L434.561133,182.7 L434.561133,173.1375 Z M452.429297,169.446094 L454.819922,169.446094 L454.819922,182.7 L452.429297,182.7 L452.429297,181.689258 C451.960545,182.134573 451.490334,182.45537 451.018652,182.65166 C450.54697,182.84795 450.035745,182.946094 449.484961,182.946094 C448.248627,182.946094 447.179301,182.467095 446.276953,181.509082 C445.374605,180.551069 444.923438,179.360163 444.923438,177.936328 C444.923438,176.459758 445.359957,175.249809 446.233008,174.306445 C447.106059,173.363081 448.166595,172.891406 449.414648,172.891406 C449.98887,172.891406 450.527927,172.999804 451.031836,173.216602 C451.535745,173.4334 452.00156,173.758592 452.429297,174.192188 L452.429297,169.446094 Z M449.906836,175.10625 C449.162692,175.10625 448.544534,175.368454 448.052344,175.892871 C447.560154,176.417288 447.314063,177.089644 447.314063,177.909961 C447.314063,178.736137 447.564548,179.415818 448.065527,179.949023 C448.566506,180.482229 449.183199,180.748828 449.915625,180.748828 C450.671488,180.748828 451.298435,180.486624 451.796484,179.962207 C452.294534,179.43779 452.543555,178.750785 452.543555,177.901172 C452.543555,177.069136 452.294534,176.395315 451.796484,175.879688 C451.298435,175.36406 450.668558,175.10625 449.906836,175.10625 Z\" id=\"Brand\" fill=\"#000000\"></path></g>
		            <g id=\"Middle-group\" transform=\"translate(0, 10)\">
		            	<path d=\"M300.15,58.5 C326.762057,88.7711868 342.9,128.475421 342.9,171.948874 C342.9,215.422326 326.762057,255.126561 300.15,285.397747 C273.537943,255.126561 257.4,215.422326 257.4,171.948874 C257.4,128.475421 273.537943,88.7711868 300.15,58.5 Z\" id=\"Combined-Shape-Copy\" fill=\"#FE3939\"></path>

		        </g>
		    </g>
		</svg>
		</div>
  ";
}

add_shortcode('svg_circles', 'svg_circles_func');

function add_portfolio_posts($atts){
    $atts = shortcode_atts(array(
        'limit' => -1,
    ), $atts, 'add_portfolio_posts');
    $query = new WP_Query([
        'post_type' => 'case_study',
        'orderby' => 'date',
        'order' => 'ASC',
        'hide_empty' => 1,
        'depth' => 1,
        'posts_per_page' => $atts['limit']
    ]);
    wp_enqueue_script( 'jquery.visible', get_theme_file_uri( '/assets/js/jquery.visible.min.js' ), array( 'jquery' ), '2.1.2', true );
    wp_enqueue_script( 'portfolio-animation', get_theme_file_uri( '/assets/js/portfolio-animation.js' ), array( 'jquery' ), '2.1.2', true );
    echo '<div class="portfolio-posts" id="portfolio-posts">';
    while ($query->have_posts()) : $query->the_post();
        $count = count(get_the_category());
        $cats = '';
        $i = 1;
        foreach (get_the_category() as $k) {
            $cats .= $k->name ;
            if ($count != $i) {
                $cats .=  ', ';
            }
            $i++;
        }
        echo '<div class="portfolio-post" >'.
                        '<a href="'; the_permalink(); echo '">'.
                            '<div class="portfolio-post-img" style="background-color:'. get_post_meta(get_the_ID(), 'background_main', true) .'">';
                                the_post_thumbnail( 'twentyseventeen-featured-image' );
        echo                    '</div>';
                                the_title( '<div class="portfolio-post-title">', '</div>' );
        echo                '<div class="portfolio-post-cat">'.
                                $cats.
                            '</div>'.
                            '</a>'.
                    '</div>';
    endwhile;
    echo '</div><div class="clearfix"></div>';
}
add_shortcode('portfolio_posts', 'add_portfolio_posts');


function add_custom_styles_and_scripts() {

  global $wp_query;
  $path     = "/assets/css/custom/";
  $scr_path = "/wp-content/themes/laroche/assets/js/";

  // posts and croboxes
  if(is_single()){
    $post_type = get_post_type();
    $post_type_slug = null;
    if ($post_type) {
        $post_type_data = get_post_type_object($post_type);
        $post_type_slug = $post_type_data->rewrite['slug'];
    }
    if($post_type_slug == 'case_study'){
      wp_enqueue_style('crobox-3', get_theme_file_uri($path.'crobox-3.css'));
    }else{
      wp_enqueue_style('single', get_theme_file_uri($path.'single.css'));
    }
  }

  // other pages
  switch ($wp_query->queried_object->ID){

    case 169: //home

      wp_enqueue_style('home', get_theme_file_uri( $path.'home.css' ));
      break;

    case 178: //blog

      wp_enqueue_style('blog', get_theme_file_uri($path.'blog.css'));
      break;

    case 173: //portfolio

      wp_enqueue_style('portfolio', get_theme_file_uri($path.'portfolio.css'));
      break;

    case 175: //services page

      //Animation Library
      wp_enqueue_script('tween-max', $scr_path.'TweenMax.min.js', array(), false, true);
      wp_enqueue_script('custom-ease', $scr_path.'CustomEase.min.js', array(), false, true);
      //SVG animation Trigger
      wp_enqueue_script('svg-services-animation', $scr_path.'SvgServicesAnimation.js');
      //Services styles
      wp_enqueue_style('services', get_theme_file_uri($path.'services.css'));
      break;

    case 4: //contact-us

      wp_enqueue_style('contact-us', get_theme_file_uri($path.'contact-us.css'));
      break;

    case 295: //partnership

      wp_enqueue_style('partnership', get_theme_file_uri($path.'partnership.css'));
      break;
  }
}
add_action( 'get_footer', 'add_custom_styles_and_scripts' );
