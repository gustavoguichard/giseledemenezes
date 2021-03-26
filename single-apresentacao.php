<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<?php  $custom_fields = get_post_custom($post->ID); $agenda_text =  $custom_fields['agenda_text'][0]; $fotos_text =  $custom_fields['fotos_text'][0]; $videos_text =  $custom_fields['videos_text'][0]; $depoimentos_text =  $custom_fields['depoimentos_text'][0]; $cursos_text =  $custom_fields['cursos_text'][0];?>

<?php $term = wp_get_post_terms($post->ID, 'sessao', 'name' ); $sessao = $term[0]->slug; ?>
<?php $taxonomy = "&sessao=$sessao";?>
<div id="content" class="clearfix">
	<div id="content_wrap" class="container_12">
		<?php get_template_part( 'navigation', 'index' );?>

		<div class="grid_9">
			<?php if(!$have_banner):?>
			<?php the_post_thumbnail(); ?>
			<h2><?php the_title(); ?></h2><?php endif;?>
			<?php the_content(); ?>
<?php endwhile; // end of the loop. ?>

		<?php $is_apresentacao = true; ?>
		<?php $title_esp = get_the_title();?>

		<?php require_once('loops/loop-agenda.php'); ?>
		<?php require_once('loops/loop-curso.php'); ?>
		<?php require_once('loops/loop-fotos.php'); ?>
		<?php require_once('loops/loop-videos.php'); ?>
    <?php require_once('loops/loop-depoimentos.php'); ?>
		<?php require_once('loops/loop-links.php'); ?>
		<?php// require_once('loops/loop-terapeutas.php'); ?>


		</div>
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
