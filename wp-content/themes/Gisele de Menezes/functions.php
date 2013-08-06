<?php
/**
 *
 * @package WordPress
 * @subpackage Gisele de Menezes
 * @since Gisele de Menezes 3.0
 */


/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'twentyten_setup' );

if ( ! function_exists( 'twentyten_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override twentyten_setup() in a child theme, add your own twentyten_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Ten 1.0
 */
function shortLink($atts, $content = null) {
	extract(shortcode_atts(array(
		"caminho" => '' // default URL
	), $atts));
	return '<a href="' . get_bloginfo('url') . '/' . $caminho .'">'.$content.'</a>';
}
add_shortcode('link', 'shortLink'); 

function agendaLancamentos() {
	$html = '<ul class="open_banner">';
	$lancamentos_query = new WP_Query('post_type=lancamento&showposts=-1&orderby=menu_order&order=ASC'); while ($lancamentos_query->have_posts()) : $lancamentos_query->the_post();
		$html .= '<li><em>' . get_the_title();
		$html .= '</em> - ' . get_post_meta(get_the_ID(), 'data', true) . '<br />';
		$html .= get_post_meta(get_the_ID(), 'localizacao', true) . '<br />';
		$html .= 'Informações: ' . get_post_meta(get_the_ID(), 'contatos', true) . '</li>';
	endwhile;
	$html .= '</ul>';
	wp_reset_query();
	return $html;
}
add_shortcode('lancamentos', 'agendaLancamentos');

function formularioComprarLivro() {
	$html = '<div style="text-align: center;"><form id="pagseguro" class="open_banner" method="POST" action="https://pagseguro.uol.com.br/checkout/checkout.jhtml" target="pagseguro">
		<input type="hidden" name="email_cobranca" value="gi@giseledemenezes.com" />
		<input type="hidden" name="tipo" value="CBR" />
		<input type="hidden" name="moeda" value="BRL" />
		<input type="hidden" name="item_id" value="1" />
		<input type="hidden" name="item_descr" value="Livro: Uma viagem no tempo Uma expedicao no espaco - Outra India, Outro Jesus" />
		<input type="hidden" name="item_quant" value="1" />
		<input type="hidden" name="item_valor" value="4400" />
		<input type="hidden" name="frete" value="0" />
		<input type="hidden" name="peso" value="1000" />
		<input type="image" name="submit" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/205x30-comprar.gif" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
	</form></div>';
	return $html;
}
add_shortcode('comprar_livro', 'formularioComprarLivro');

function twentyten_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 220, 220, false );
	add_image_size('mini_thumb', 60, 55, true);
    add_image_size('med_thumb', 180, 180, true);
	add_image_size('email_thumb', 150, 150, false);


	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'twentyten', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'top_menu' => __( 'Main Navigation', 'twentyten' ),
		'nav' => __( 'Full Navigation', 'twentyten' ),
	) );

}
endif;

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since Twenty Ten 1.0
 * @return int
 */
function twentyten_excerpt_length( $length ) {
	return 200;
}
add_filter( 'excerpt_length', 'twentyten_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Twenty Ten 1.0
 * @return string "Continue Reading" link
 */
function twentyten_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Ver mais...', 'twentyten' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyten_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string An ellipsis
 */
function twentyten_auto_excerpt_more( $more ) {
	return ' &hellip;' . twentyten_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function twentyten_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentyten_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Twenty Ten's style.css.
 *
 * @since Twenty Ten 1.0
 * @return string The gallery style filter, with the styles themselves removed.
 */
function twentyten_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'twentyten_remove_gallery_css' );

if ( ! function_exists( 'twentyten_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<blockquote class="comment-body">
		<span class="comment-author vcard">
			<?php echo get_comment_author_link();?>: 
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em>Seu comentário está aguardando moderação</em>
		<?php endif; ?>
			
			<?php echo get_comment_time() . 'hs de ' . get_comment_date(); ?> <?php edit_comment_link( __( 'Editar', 'twentyten' ), ' ' );	?>
		</span><!-- .comment-meta .commentmetadata -->

		<?php comment_text(); ?>
		</blockquote>

		<span class="reply">
			<span class="tags"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
		</span>
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback: ', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Editar)', 'twentyten'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Twenty Ten 1.0
 * @uses register_sidebar
 */
function twentyten_widgets_init() {
	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'twentyten' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'twentyten_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );


/* CUSTOM POST TYPES */
add_action('init', 'my_cpt_init');
function my_cpt_init() 
{
/* DEPOIMENTOS */
  $labelsDepoimentos = array(
    'name' => _x('Depoimentos', 'post type general name'),
    'singular_name' => _x('Depoimento', 'post type singular name'),
    'add_new' => _x('Novo Depoimento', 'depoimento'),
    'add_new_item' => __('Adicionar novo Depoimento'),
    'edit_item' => __('Editar Depoimento'),
    'new_item' => __('Novo Depoimento'),
    'view_item' => __('Ver Depoimento'),
    'search_items' => __('Procurar Depoimentos'),
    'not_found' =>  __('Não foram encontrados Depoimentos'),
    'not_found_in_trash' => __('Não há Depoimentos no lixo'), 
    'parent_item_colon' => '',
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
    'name' => _x('Eventos', 'post type general name'),
    'singular_name' => _x('Evento', 'post type singular name'),
    'add_new' => _x('Novo Evento', 'evento'),
    'add_new_item' => __('Adicionar novo Evento'),
    'edit_item' => __('Editar Evento'),
    'new_item' => __('Novo Evento'),
    'view_item' => __('Ver Evento'),
    'search_items' => __('Procurar Eventos'),
    'not_found' =>  __('Não foram encontrados Eventos'),
    'not_found_in_trash' => __('Não há Eventos no lixo'), 
    'parent_item_colon' => '',
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
/* ÁLBUNS */
  $labelsAlbum = array(
    'name' => _x('Álbuns', 'post type general name'),
    'singular_name' => _x('Álbum', 'post type singular name'),
    'add_new' => _x('Novo Álbum', 'album'),
    'add_new_item' => __('Adicionar novo Álbum'),
    'edit_item' => __('Editar Álbum'),
    'new_item' => __('Novo Álbum'),
    'view_item' => __('Ver Álbum'),
    'search_items' => __('Procurar Álbum'),
    'not_found' =>  __('Não foram encontrados Álbuns'),
    'not_found_in_trash' => __('Não há Álbuns no lixo'), 
    'parent_item_colon' => '',
    'menu_name' => 'Álbuns'

  );
  $argsAlbum = array(
    'labels' => $labelsAlbum,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'exclude_from_search' => false,
    'menu_position' => 5,
    'menu_icon' => get_bloginfo('url') . '/wp-admin/images/media-button-image.gif',
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'album', 'with_front' => false),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'supports' => array('title','editor', 'thumbnail')
  );
/* VÍDEOS */
  $labelsVideo = array(
    'name' => _x('Vídeos', 'post type general name'),
    'singular_name' => _x('Vídeo', 'post type singular name'),
    'add_new' => _x('Novo Vídeo', 'video'),
    'add_new_item' => __('Adicionar novo Vídeo'),
    'edit_item' => __('Editar Vídeo'),
    'new_item' => __('Novo Vídeo'),
    'view_item' => __('Ver Vídeo'),
    'search_items' => __('Procurar Vídeos'),
    'not_found' =>  __('Não foram encontrados Vídeos'),
    'not_found_in_trash' => __('Não há Vídeos no lixo'), 
    'parent_item_colon' => '',
    'menu_name' => 'Vídeos'

  );
  $argsVideo = array(
    'labels' => $labelsVideo,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'exclude_from_search' => false,
    'menu_position' => 5,
    'menu_icon' => get_bloginfo('url') . '/wp-admin/images/media-button-video.gif',
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'video', 'with_front' => false),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'supports' => array('title','editor')
  );
/* CURSOS */
  $labelsCurso = array(
    'name' => _x('Cursos', 'post type general name'),
    'singular_name' => _x('Curso', 'post type singular name'),
    'add_new' => _x('Novo Curso', 'curso'),
    'add_new_item' => __('Adicionar novo Curso'),
    'edit_item' => __('Editar Curso'),
    'new_item' => __('Novo Curso'),
    'view_item' => __('Ver Curso'),
    'search_items' => __('Procurar Cursos'),
    'not_found' =>  __('Não foram encontrados Cursos'),
    'not_found_in_trash' => __('Não há Cursos no lixo'), 
    'parent_item_colon' => '',
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
/* TERAPEUTAS */
  $labelsTerapeuta = array(
    'name' => _x('Terapeutas', 'post type general name'),
    'singular_name' => _x('Terapeutas', 'post type singular name'),
    'add_new' => _x('Novo Terapeuta', 'terapeutas'),
    'add_new_item' => __('Adicionar novo Terapeuta'),
    'edit_item' => __('Editar Terapeuta'),
    'new_item' => __('Novo Terapeuta'),
    'view_item' => __('Ver Terapeuta'),
    'search_items' => __('Procurar Terapeutas'),
    'not_found' =>  __('Não foram encontrados Terapeutas'),
    'not_found_in_trash' => __('Não há Terapeutas no lixo'), 
    'parent_item_colon' => '',
    'menu_name' => 'Terapeutas'

  );
  $argsTerapeuta = array(
    'labels' => $labelsTerapeuta,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'exclude_from_search' => true,
    'menu_position' => 5,
    'menu_icon' => get_bloginfo('url') . '/wp-admin/images/media-button-other.gif',
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'page',
    'has_archive' => true, 
    'hierarchical' => false,
    'supports' => array('title','editor', 'thumbnail')
  );
/* ESPECIALIZAÇÕES */
  $labelsApresentacao = array(
    'name' => _x('Especializações', 'post type general name'),
    'singular_name' => _x('Especialização', 'post type singular name'),
    'add_new' => _x('Nova Especialização', 'apresentacao'),
    'add_new_item' => __('Adicionar nova Especialização'),
    'edit_item' => __('Editar Especialização'),
    'new_item' => __('Nova Especialização'),
    'view_item' => __('Ver Especialização'),
    'search_items' => __('Procurar Especialização'),
    'not_found' =>  __('Não foram encontradas Especializações'),
    'not_found_in_trash' => __('Não há Especializações no lixo'), 
    'parent_item_colon' => '',
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
/* LINKS RELACIONADOS */
  $labelsLink = array(
    'name' => _x('Links', 'post type general name'),
    'singular_name' => _x('Link', 'post type singular name'),
    'add_new' => _x('Novo Link', 'links_relacionados'),
    'add_new_item' => __('Adicionar novo Link'),
    'edit_item' => __('Editar Link'),
    'new_item' => __('Novo Link'),
    'view_item' => __('Ver Link'),
    'search_items' => __('Procurar Links'),
    'not_found' =>  __('Não foram encontrados Links'),
    'not_found_in_trash' => __('Não há Links no lixo'), 
    'parent_item_colon' => '',
    'menu_name' => 'Links Relacionados'

  );
  $argsLink = array(
    'labels' => $labelsLink,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'exclude_from_search' => true,
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title')
  );

/* BANNERS */
  $labelsBanner = array(
    'name' => _x('Banners', 'post type general name'),
    'singular_name' => _x('Banner', 'post type singular name'),
    'add_new' => _x('Novo Banner', 'banner'),
    'add_new_item' => __('Adicionar novo Banner'),
    'edit_item' => __('Editar Banner'),
    'new_item' => __('Novo Banner'),
    'view_item' => __('Ver Banner'),
    'search_items' => __('Procurar Banner'),
    'not_found' =>  __('Não foram encontrados Bannera'),
    'not_found_in_trash' => __('Não há Banners no lixo'), 
    'parent_item_colon' => '',
    'menu_name' => 'Banners'

  );
  $argsBanner = array(
    'labels' => $labelsBanner,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'exclude_from_search' => false,
    'show_in_menu' => true,
    'menu_icon' => get_bloginfo('url') . '/wp-admin/images/media-button-image.gif',
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'page',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 100,
    'supports' => array('title', 'editor')
  );
  register_post_type('depoimento',$argsDepoimentos);
  register_post_type('evento',$argsAgenda);
  register_post_type('album',$argsAlbum);
  register_post_type('video',$argsVideo);
  register_post_type('curso',$argsCurso);
  register_post_type('terapeuta_page',$argsTerapeuta);
  register_post_type('apresentacao',$argsApresentacao);
  register_post_type('links_relacionados',$argsLink);
  register_post_type('lancamento',$argsLancamento);
  register_post_type('banner',$argsBanner);
  
  flush_rewrite_rules();
}


function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog';
    $submenu['edit.php'][5][0] = 'Blog';
    $submenu['edit.php'][10][0] = 'Novo Post';
    echo '';
}

function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Blog';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );


add_action('admin_menu', 'add_gcf_interface');

function add_gcf_interface() {
	add_options_page('Opções do Site', 'Opções do Site', '8', 'functions', 'editglobalcustomfields');
}

function editglobalcustomfields() {
	?>
	<div class='wrap'>
	<h2>Opções do Site</h2>
	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options') ?>

	<p><strong>Código do Google Analytics:</strong></p>
	<p>
		<input type="text" name="google_analytics" id="google_analytics" value="<?php echo get_option('google_analytics');?>" />
	</p>
	<p><input type="submit" name="Submit" value="Salvar Alterações" /></p>
	
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="google_analytics" />

	</form>
	</div>
	<?php
}

// add google analytics to footer
function add_google_analytics() {
	echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
	echo '<script type="text/javascript">';
	echo 'var pageTracker = _gat._getTracker("UA-' . get_option('google_analytics') . '");';
	echo 'pageTracker._trackPageview();';
	echo '</script>';
}
add_action('wp_footer', 'add_google_analytics');