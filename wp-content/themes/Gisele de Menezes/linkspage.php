<?php
/**
 * Template Name: Links Page
 *
 * @package WordPress
 * @subpackage Gisele de Menezes
 * @since Gisele de Menezes 3.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="content" class="clearfix">
	<div id="content_wrap" class="container_12">
		<?php get_template_part( 'navigation', 'index' );?>
		<div class="grid_9">
			<?php the_post_thumbnail(); ?>
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
		<?php $tipo_link = get_post_meta($post->ID, 'tipo_link', true);?>
		<?php $taxonomy = "&recommend_link=$tipo_link"; ?>
		
		<?php $no_title = true; ?>
		<?php require_once('loops/loop-links.php'); ?>

		</div>
	<?php get_sidebar(); ?>	
	</div>
</div>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>