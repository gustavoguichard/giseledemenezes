<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="content" class="clearfix">
	<div id="content_wrap" class="container_12">
		<?php if(get_the_terms($post->ID, 'pessoa'))$is_terapeuta = true;?>
		<?php require_once('navigation.php');?>
		<div class="grid_9">
			<h2><?php if($pessoa != '') {echo 'Álbum de ' . $pessoa;} else{ ?>
			<?php the_title();} ?></h2>
			<?php the_content(); ?>
		</div>
	<?php if(!get_the_terms($post->ID, 'pessoa') || get_the_terms($post->ID, 'sessao')){ get_sidebar(); }?>
	</div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
