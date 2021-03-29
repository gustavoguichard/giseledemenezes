<?php
/**
 *
 * @package WordPress
 * @subpackage Gisele de Menezes
 * @since Gisele de Menezes 4.0
 */

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php') ) . '</a></p></div>';
	});

	add_filter('template_include', function($template) {
		return get_stylesheet_directory() . '/static/no-timber.html';
	});

	return;
}

Timber::$dirname = ['templates', 'views'];

class StarterSite extends TimberSite {

	function __construct() {
		add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 220, 220, false );
    add_image_size('mini_thumb', 60, 55, true);
    add_image_size('med_thumb', 180, 180, true);
    add_image_size('email_thumb', 150, 150, false);

		add_theme_support( 'menus' );
    add_filter( 'use_default_gallery_style', '__return_false' );
    add_filter( 'tablepress_use_default_css', '__return_false' );
    add_filter( 'timber_context', [$this, 'add_to_context']);
    add_filter('the_content', [$this, 'wpex_fix_shortcodes']);
    add_filter( 'wp_default_scripts', [$this, 'dequeue_jquery_migrate']);
    add_action( 'init', [$this, 'register_post_types']);
    add_action( 'init', [$this, 'register_taxonomies']);
    add_action( 'admin_menu', [$this, 'remove_menus']);
    add_action( 'wp_enqueue_scripts', [$this, 'add_theme_styles']);
    add_action( 'wp_enqueue_scripts', [$this, 'add_theme_scripts']);

    add_shortcode('link', [$this, 'short_link']);
    add_shortcode('redirect', [$this, 'redirect_page']);

    register_nav_menus(array('nav' => 'Full Navigation'));
    add_action( 'widgets_init', [$this, 'theme_widgets_init']);

    update_option( 'link_manager_enabled', 0 );
    // flush_rewrite_rules();
    parent::__construct();
  }

  function remove_menus() {
  }

  function theme_widgets_init() {
    register_sidebar(array(
      'name' => 'Footer widget',
      'id' => 'footer-widget',
    ));
  }

  function wpex_fix_shortcodes($content){
    $array = array (
      '<p>[' => '[',
      ']</p>' => ']',
      ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
  }

  function short_link($atts, $content = null) {
    extract(shortcode_atts(array(
      "caminho" => '' // default URL
    ), $atts));
    return '<a href="' . get_bloginfo('url') . '/' . $caminho .'">'.$content.'</a>';
  }

  function redirect_page( $noOp, $url = '' ) {
    return "<meta http-equiv='refresh' content='0;URL=" . $url . "'>";
  }

  function add_theme_styles() {
    wp_enqueue_style( 'theme-styles', get_template_directory_uri().'/css/theme.css', [], 4);
  }

  function add_theme_scripts() {
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), null, true);
    wp_enqueue_script('theme-scripts', get_template_directory_uri().'/js/gisele.js', ['jquery'], null, true);
  }

  function dequeue_jquery_migrate(&$scripts) {
    if(!is_admin()){
      $scripts->remove( 'jquery');
    }
  }

  function is_dev() {
    $url = get_site_url();
    return (substr( $url, 0, 16 ) === "http://localhost");
  }

  function register_post_types() {
    $labelsDepoimentos = array(
      'name' => 'Depoimentos',
      'singular_name' => 'Depoimento',
      'add_new' => 'Novo Depoimento',
      'add_new_item' => 'Adicionar novo Depoimento',
      'edit_item' => 'Editar Depoimento',
      'new_item' => 'Novo Depoimento',
      'view_item' => 'Ver Depoimento',
      'menu_name' => 'Depoimentos'
    );
    $argsDepoimentos = array(
      'labels' => $labelsDepoimentos,
      'public' => true,
      'publicly_queryable' => false,
      'show_ui' => true,
      'exclude_from_search' => true,
      'menu_position' => 5,
      'show_in_menu' => true,
      'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'post',
      'has_archive' => true,
      'hierarchical' => false,
      'supports' => array('title','editor')
    );
    /* AGENDA */
    $labelsAgenda = array(
      'name' => 'Eventos',
      'singular_name' => 'Evento',
      'add_new' => 'Novo Evento',
      'add_new_item' => 'Adicionar novo Evento',
      'edit_item' => 'Editar Evento',
      'new_item' => 'Novo Evento',
      'view_item' => 'Ver Evento',
      'menu_name' => 'Agenda de Eventos'
    );
    $argsAgenda = array(
      'labels' => $labelsAgenda,
      'public' => true,
      'publicly_queryable' => false,
      'show_ui' => true,
      'exclude_from_search' => true,
      'menu_position' => 5,
      'menu_icon' => get_bloginfo('url') . '/wp-admin/images/date-button.gif',
      'show_in_menu' => true,
      'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'post',
      'has_archive' => true,
      'hierarchical' => false,
      'supports' => array('title','editor')
    );

    /* CURSOS */
    $labelsCurso = array(
      'name' => 'Cursos',
      'singular_name' => 'Curso',
      'add_new' => 'Novo Curso',
      'add_new_item' => 'Adicionar novo Curso',
      'edit_item' => 'Editar Curso',
      'new_item' => 'Novo Curso',
      'view_item' => 'Ver Curso',
      'menu_name' => 'Cursos'

    );
    $argsCurso = array(
      'labels' => $labelsCurso,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'exclude_from_search' => false,
      'menu_position' => 5,
      'show_in_menu' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'curso', 'with_front' => false),
      'capability_type' => 'page',
      'has_archive' => true,
      'hierarchical' => false,
      'supports' => array('title','editor', 'thumbnail', 'excerpt')
    );
  /* ESPECIALIZAÇÕES */
    $labelsApresentacao = array(
      'name' => 'Especializações',
      'singular_name' => 'Especialização',
      'add_new' => 'Nova Especialização',
      'add_new_item' => 'Adicionar nova Especialização',
      'edit_item' => 'Editar Especialização',
      'new_item' => 'Nova Especialização',
      'view_item' => 'Ver Especialização',
      'menu_name' => 'Especializações'

    );
    $argsApresentacao = array(
      'labels' => $labelsApresentacao,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'exclude_from_search' => false,
      'menu_position' => 5,
      'menu_icon' => get_bloginfo('url') . '/wp-admin/images/media-button-image.gif',
      'show_in_menu' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'especializacao', 'with_front' => false),
      'capability_type' => 'page',
      'has_archive' => true,
      'hierarchical' => false,
      'supports' => array('title','editor', 'thumbnail')
    );
    register_post_type('depoimento',$argsDepoimentos);
    register_post_type('evento',$argsAgenda);
    register_post_type('curso',$argsCurso);
    register_post_type('apresentacao',$argsApresentacao);
  }

  function register_taxonomies() {
    $args = [
      "label" => "Pertence a uma especialização?",
      "labels" => [
        "name" => "Pertence a uma especialização?",
        "singular_name" => "Especializações",
      ],
      "public" => true,
      "publicly_queryable" => true,
      "hierarchical" => false,
      "show_ui" => true,
      "show_in_menu" => true,
      "show_in_nav_menus" => true,
      "query_var" => true,
      "rewrite" => [ 'slug' => 'sessao', 'with_front' => true, ],
      "show_admin_column" => false,
      "show_in_rest" => false,
      "rest_base" => "sessao",
      "rest_controller_class" => "WP_REST_Terms_Controller",
      "show_in_quick_edit" => false,
    ];
    register_taxonomy("sessao", ["depoimento", "evento", "curso", "apresentacao"], $args);

    $args = [
      "label" => "Faz parte de um curso?",
      "labels" => [
        "name" => "Faz parte de um curso?",
        "singular_name" => "Cursos",
      ],
      "public" => true,
      "publicly_queryable" => true,
      "hierarchical" => false,
      "show_ui" => true,
      "show_in_menu" => true,
      "show_in_nav_menus" => true,
      "query_var" => true,
      "rewrite" => [ 'slug' => 'cursos', 'with_front' => true, ],
      "show_admin_column" => false,
      "show_in_rest" => false,
      "rest_base" => "cursos",
      "rest_controller_class" => "WP_REST_Terms_Controller",
      "show_in_quick_edit" => false,
    ];
    register_taxonomy( "cursos", [ "depoimento", "evento", "curso" ], $args );
  }

  function add_to_context( $context ) {
    $context['site'] = $this;
    $context['specializations'] = index_loop('apresentacao', 1, -1);
    $context['top_menu']  = new Timber\Menu('nav');
    return $context;
  }
}

function index_loop($post_type = 'post', $paged = 1, $numberposts = 10) {
  $args = array(
    'post_type' => $post_type,
    'numberposts' => $numberposts,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'paged' => $paged,
  );
  $posts = new Timber\PostQuery($args);
  return $posts;
}

// =========================================================================
// REMOVE JUNK FROM HEAD
remove_action('wp_head', 'rsd_link'); // remove rsd link
remove_action('wp_head', 'wp_generator'); // remove wordpress version
remove_action('wp_head', 'feed_links_extra', 3); // removes extra rss
// remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml
remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );

// Remove ob_end_flush() error
remove_action('shutdown', 'wp_ob_end_flush_all', 1);

// all actions related to emojis
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

new StarterSite();
