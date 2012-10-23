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
<div id="content" class="clearfix">
	<div id="content_wrap" class="container_12">
		<?php get_template_part( 'navigation', 'index' );?>
		<div class="grid_9">
			<?php the_post_thumbnail(); ?>
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
		<?php $term = wp_get_post_terms($post->ID, 'cursos', 'name' ); $curso = $term[0]->slug; ?>
			<?php  $custom_fields = get_post_custom($post->ID); $agenda_text =  $custom_fields['agenda_text'][0]; $fotos_text =  $custom_fields['fotos_text'][0]; $videos_text =  $custom_fields['videos_text'][0]; $parceiros_text =  $custom_fields['parceiros_text'][0]; $links_text =  $custom_fields['links_text'][0]; $depoimentos_text =  $custom_fields['depoimentos_text'][0];?>
			<?php $taxonomy = "&cursos=$curso";?>
			<?php $is_curso = true;?>
			
			<?php $curso_conteudo = get_post_meta($post->ID, 'curso_conteudo', true); if($curso_conteudo != ''){ ?>
				<hr />
				<h3>Conteúdo Programático</h3>
				<?php echo $curso_conteudo;?>
			<?php }; ?>
			<?php $curso_requisitos = get_post_meta($post->ID, 'curso_requisitos', true); if($curso_requisitos != ''){ ?>
				<hr />
				<h3>Requisitos</h3>
				<?php echo $curso_requisitos;?>
			<?php }; ?>

<?php endwhile; ?>
		
		<?php require_once('loops/loop-agenda.php'); ?>
		<?php require_once('loops/loop-fotos.php'); ?>
		<?php require_once('loops/loop-videos.php'); ?>
		<?php require_once('loops/loop-links.php'); ?>
		<?php require_once('loops/loop-depoimentos.php'); ?>

		
		</div>
	<?php get_sidebar(); ?>	
	</div>
</div>
<?php get_footer(); ?>