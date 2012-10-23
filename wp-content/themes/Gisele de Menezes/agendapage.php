<?php
/**
 * Template Name: Agenda Page
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
			<hr />
		<?php $term = wp_get_post_terms($post->ID, 'sessao', 'name' ); $sessao = $term[0]->slug; ?>		
		
		<?php $no_title = true; ?>
		<?php $taxonomy = '';?>
		<?php require_once('loops/loop-agenda.php'); ?>

		</div>
	<?php get_sidebar(); ?>	
	</div>
</div>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>