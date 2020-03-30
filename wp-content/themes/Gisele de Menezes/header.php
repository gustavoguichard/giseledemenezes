<?php
/**
 * @package WordPress
 * @subpackage Gisele de Menezes
 * @since Gisele de Menezes 3.0
 */
?><!DOCTYPE html>
<html class="no-js" lang="pt-BR">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '', true);?></title>
<link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,700|Tangerine&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="header_wrap">
	<div id="header" class="container_12">
		<div id="logo" class="grid_6 suffix_1">
			<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h3><?php bloginfo( 'description' ); ?></h3>
		</div>
		<?php wp_nav_menu( array( 'menu_class' => 'top_nav grid_5', 'theme_location' => 'top_menu', 'container' => 'ul') ); ?>
	</div>
	<div id="top_menu" class="clearfix">
		<div id="top_menu_wrap" class="container_12">
			<?php wp_nav_menu( array( 'menu_class' => 'nav grid_10 alpha', 'theme_location' => 'nav', 'container' => 'ul') ); ?>
			<ul class="social grid_2">
				<li><a href="<?php bloginfo('rss2_url');?>" class="rss" title="Assine o RSS">RSS</a></li>
				<li><a target="_blank" href="http://twitter.com/home?status=<?php the_title();?> - http://giseledemenezes.com/?p=<?php echo $post->ID; ?>" title="Clique para compartilhar esta página" class="twitter">Twitter</a></li>
				<li><a style="display:none" href="#" class="facebook" title="Curtir no Facebook">Facebook</a></li>
				<li><a style="display:none" href="#" class="skype" title="Adicione-me no Skype">Skype</a></li>
			</ul>
		</div>
	</div>
</div>
