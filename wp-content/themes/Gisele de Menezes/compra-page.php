<?php
/**
 * Template Name: Página de Compra
 *
 * @package WordPress
 * @subpackage Gisele de Menezes
 * @since Gisele de Menezes 3.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>
<?php $term = wp_get_post_terms($post->ID, 'sessao', 'name' ); $sessao = $term[0]->slug; ?>
<div id="content" class="clearfix">
	<div id="content_wrap" class="container_12">
		<?php $taxonomy = "&sessao=$sessao";?>
		<div id="depoimentos" class="grid_9">
			<?php require_once('loops/loop-depoimentos.php'); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>