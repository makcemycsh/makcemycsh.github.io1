<?php
/**
 * dag-stones functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dag-stones
 */

if ( ! function_exists( 'dag_stones_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dag_stones_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on dag-stones, use a find and replace
		 * to change 'dag-stones' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dag-stones', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'dag-stones' ),
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
		add_theme_support( 'custom-background', apply_filters( 'dag_stones_custom_background_args', array(
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
add_action( 'after_setup_theme', 'dag_stones_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dag_stones_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'dag_stones_content_width', 640 );
}
add_action( 'after_setup_theme', 'dag_stones_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dag_stones_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dag-stones' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'dag-stones' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'dag_stones_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dag_stones_scripts() {
	wp_enqueue_style( 'dag-stones-style', get_stylesheet_uri() );

	wp_enqueue_script( 'dag-stones-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'dag-stones-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true );
	wp_enqueue_script( 'slick.min', get_template_directory_uri() . '/js/slick.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'Swiper', get_template_directory_uri() . '/js/Swiper.js', array(), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}



add_action( 'wp_enqueue_scripts', 'dag_stones_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

remove_filter( 'the_content', 'wpautop' ); // Отключаем автоформатирование в полном посте
remove_filter( 'the_excerpt', 'wpautop' ); // Отключаем автоформатирование в кратком(анонсе) посте
remove_filter('comment_text', 'wpautop'); // Отключаем автоформатирование в комментариях
remove_filter('the_content','wptexturize'); // Отключаем автоформатирование в полном посте
remove_filter('the_excerpt','wptexturize'); // Отключаем автоформатирование в кратком(анонсе) посте
remove_filter('comment_text', 'wptexturize'); // Отключаем автоформатирование в комментариях


// фотогалерея-слайдер
add_shortcode('gallery', 'my_gallery');
function my_gallery($atts, $text=''){
	if ($atts['theme']=='main') {

	
    $img_src = explode(',', $atts['ids']);
    $html = '<div class="swiper-container main-slider loading">
    <div class="swiper-wrapper">';
    foreach ($img_src as $img) {
    	   $html .='
    	          <div class="swiper-slide">
                <figure class="slide-bgimg" style="background-image:url('. wp_get_attachment_image_url($img, $size = 'full') .')">
                    <img src="'. wp_get_attachment_image_url($img, $size = 'full').'" class="entity-img"  alt ="'.get_post_meta(  $img, '_wp_attachment_image_alt', true ) .'" title="'.get_the_title($img).'"/>
                </figure>
                <div class="content">
                    <p class="title">'.get_the_title($img).'</p>
                    <span class="caption">'.wp_get_attachment_caption($img).'</span>
                </div>
            </div>';

    }
     	   $html .='</div><div class="swiper-button-prev swiper-button-white"></div>
        <div class="swiper-button-next swiper-button-white"></div></div>';
      $html .='<div class="swiper-container nav-slider loading">
        <div class="swiper-wrapper">';
    foreach ($img_src as $img) {
       $html .='<div class="swiper-slide">
                <figure class="slide-bgimg" style="background-image:url('. wp_get_attachment_image_url($img).')">
                    <img src="'. wp_get_attachment_image_url($img).'" class="entity-img" />
                </figure>
                <div class="content">
                    <p class="title">'.get_the_title($img).'</p>
                </div>
            </div>';
    }
   $html .= '</div></div>';
    return $html;
    }
};


// Комментарии
add_shortcode( 'comments', 'comments_func' );
function comments_func($atts, $text=''){

query_posts('cat=6');
$html ="";
while (have_posts()) : the_post();
$html .= ' <div class="slide">
                        <p class="name">'.get_field("name").'</p>
                        <div class="chat">';

	if (get_field("comment_e0") != "" ) { $html .= ' <p class="executor">'.get_field("comment_e0").'</p>';}
	if (get_field("comment_c0") != "" ) { $html .= ' <p class="client">'.get_field("comment_c0").'</p>';}

	if (get_field("comment_e1") != "" ) { $html .= ' <p class="executor">'.get_field("comment_e1").'</p>';}
	if (get_field("comment_c1") != "" ) { $html .= ' <p class="client">'.get_field("comment_c1").'</p>';}

	if (get_field("comment_e2") != "" ) { $html .= ' <p class="executor">'.get_field("comment_e2").'</p>';}
	if (get_field("comment_c2") != "" ) { $html .= ' <p class="client">'.get_field("comment_c2").'</p>';}

$html .= '</div></div>';
	endwhile;
 	wp_reset_query();
	return $html;
}


// Раздел с товаром

add_shortcode( 'goods', 'goods_func' );
function goods_func($atts, $text=''){

query_posts('cat=7&order=ASC');
$html ="";
while (have_posts()) : the_post();
	$image = get_field('foto');
	$html .= '<div class="item-wrap">
              <div class="item">
              <img src='.$image['url'].' alt='.$image['alt'].' />              
                </div>
                <h3>'.get_the_title().'</h3>
                <p class="price">'.get_field("price").' <span class="span">руб/кв.м</span></p>                     
            </div>';
	endwhile;
 	wp_reset_query();
	return $html;
}