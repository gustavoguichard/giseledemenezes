<?php
/**
 * Template Name: About Page
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
		<?php $term = wp_get_post_terms($post->ID, 'sessao', 'name' ); $sessao = $term[0]->slug; ?>
		<?php $taxonomy = "&sessao=$sessao";?>
			<?php  $custom_fields = get_post_custom($post->ID); $agenda_text =  $custom_fields['agenda_text'][0]; $fotos_text =  $custom_fields['fotos_text'][0]; $videos_text =  $custom_fields['videos_text'][0]; $depoimentos_text =  $custom_fields['depoimentos_text'][0]; $cursos_text =  $custom_fields['cursos_text'][0]; ?>

<?php endwhile; // end of the loop. ?>

		<?php $is_apresentacao = true; ?>

		<?php require_once('loops/loop-agenda.php'); ?>
		<?php require_once('loops/loop-curso.php'); ?>
		<?php require_once('loops/loop-depoimentos.php'); ?>


		</div>
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
