<?php
/**
 * view_source functions and definitions
 *
 * @package view_source
 */

if ( ! function_exists( 'view_source_setup' ) ) :

function view_source_setup() {

  load_theme_textdomain( 'view_source', get_template_directory() . '/languages' );

  add_theme_support( 'automatic-feed-links' );

  add_theme_support( 'title-tag' );

  add_theme_support( 'post-thumbnails' );
  add_image_size( 'platinum-sponsor', 400 );
  add_image_size( 'gold-sponsor', 200 );
  add_image_size( 'silver-sponsor', 180 );
  add_image_size( 'sponsor', 150 );
  add_image_size( 'speaker-photo', 200 );


  register_nav_menus( array(
    'primary' => esc_html__( 'Primary Menu', 'view_source' ),
    'footer' => esc_html__( 'Footer Menu', 'view_source' ),
  ) );

  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );

}
endif; // view_source_setup
add_action( 'after_setup_theme', 'view_source_setup' );

function view_source_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'view_source_content_width', 810 );
}
add_action( 'after_setup_theme', 'view_source_content_width', 0 );

function view_source_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'view_source' ),
    'id'            => 'sidebar-1',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h1 class="widget-title">',
    'after_title'   => '</h1>',
  ) );
}
add_action( 'widgets_init', 'view_source_widgets_init' );

  function optimize_jquery() {
    if ( !is_admin() ) {
      wp_deregister_script ( 'jquery' );
      wp_deregister_script ( 'jquery-migrate.min' );
      wp_deregister_script ( 'comment-reply.min' );
    }
  }
  add_action('template_redirect', 'optimize_jquery');

function view_source_scripts() {
  wp_enqueue_style( 'view-source-style', get_stylesheet_uri() );
  //wp_enqueue_style( 'vsc-style', get_template_directory_uri() . '/style.min.css' );
  wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '1.9', true );
  wp_enqueue_script( 'sidr', get_template_directory_uri() . '/assets/js/sidr.min.js', array( 'jquery' ), '', true );
  wp_enqueue_script( 'konami', get_template_directory_uri() . '/assets/js/konami.min.js', array(), '', true );
  wp_enqueue_script( 'konami-init', get_template_directory_uri() . '/assets/js/konami-init.js', array( 'konami' ), '', true );
  wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/js/sticky.min.js', array(), '', true );
  wp_enqueue_script( 'vs-js', get_template_directory_uri() . '/assets/js/vs-functions.js', array( 'jquery', 'sticky', 'sidr' ), '1.0', true );


  if( is_front_page() ) :
    wp_enqueue_script( 'remodal', get_template_directory_uri() . '/assets/js/remodal.min.js', array(), '', true );
    wp_enqueue_script( 'lettering-js', get_template_directory_uri() . '/assets/js/lettering.min.js', array( 'jquery' ), '.7', true );
    wp_enqueue_script( 'lettering-init', get_template_directory_uri() . '/assets/js/lettering-init.js', array( 'jquery', 'lettering-js' ), '1.0', true);
  endif;
}
add_action( 'wp_enqueue_scripts', 'view_source_scripts' );

  require get_template_directory() . '/inc/post-types.php';
  require get_template_directory() . '/inc/template-tags.php';
  require get_template_directory() . '/inc/extras.php';
  require get_template_directory() . '/inc/customizer.php';
  require get_template_directory() . '/inc/admin.php';
  require get_template_directory() . '/inc/cmb.php';

  // Fixes Chrome Slim Paint Bug in WordPress Admin Panel
  function chromefix_inline_css() {
    wp_add_inline_style( 'wp-admin', '#adminmenu { transform: translateZ(0); }' );
  }
  add_action('admin_enqueue_scripts', 'chromefix_inline_css');
