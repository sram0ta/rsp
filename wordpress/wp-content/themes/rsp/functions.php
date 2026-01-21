<?php
/**
 * rsp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rsp
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

function rsp_setup() {
	load_theme_textdomain( 'rsp', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'rsp' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-background',
		apply_filters(
			'rsp_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'rsp_setup' );

function rsp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rsp_content_width', 640 );
}
add_action( 'after_setup_theme', 'rsp_content_width', 0 );

function rsp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'rsp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'rsp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'rsp_widgets_init' );

function rsp_scripts() {
	wp_enqueue_style( 'rsp-style', get_stylesheet_uri(), array(), _S_VERSION );

    wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/src/index.css'  );
    wp_enqueue_style( 'swiper-css', get_stylesheet_directory_uri() . '/src/css/vendor/swiper-bundle.min.css'  );

    wp_enqueue_script( 'gsap-js', get_stylesheet_directory_uri() . '/src/js/vendor/gsap.min.js'  );
    wp_enqueue_script( 'gsap-scroll-trigger-js', get_stylesheet_directory_uri() . '/src/js/vendor/gsap-scroll-trigger.min.js'  );
    wp_enqueue_script( 'swiper-js', get_stylesheet_directory_uri() . '/src/js/vendor/swiper-bundle.min.js'  );
    wp_enqueue_script( 'fs-lightbox-js', get_stylesheet_directory_uri() . '/src/js/vendor/fslightbox.js'  );

    wp_enqueue_script( 'index-js', get_stylesheet_directory_uri() . '/src/index.js');
}
add_action( 'wp_enqueue_scripts', 'rsp_scripts' );

add_action("admin_menu", "remove_menus");
function remove_menus() {
    remove_menu_page("edit.php");                 # Записи
    remove_menu_page("edit-comments.php");        # Комментарии
}

add_filter('wpcf7_autop_or_not', '__return_false');

require_once get_template_directory() . '/inc/ajax/load-more-news.php';

add_action('wp_enqueue_scripts', function () {

    $news_query = new WP_Query([
        'post_type'      => 'news',
        'posts_per_page' => 6,
        'paged'          => 1,
    ]);

    wp_enqueue_script(
        'news-load-more',
        get_template_directory_uri() . '/src/js/ajax/load-more-news.js',
        [],
        '1.0.0',
        true
    );

    wp_localize_script('news-load-more', 'NewsLoadMore', [
        'ajaxUrl'  => admin_url('admin-ajax.php'),
        'maxPages' => (int) $news_query->max_num_pages,
    ]);
});
