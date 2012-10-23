<?php
/**
 *
 * @package WordPress
 * @subpackage Gisele de Menezes
 * @since Gisele de Menezes 3.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="content" class="clearfix">
	<div id="content_wrap" class="container_12">
		<?php $is_terapeuta = true; require_once('navigation.php');?>
		<div class="grid_9">
			<?php the_post_thumbnail(); ?>
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
			<?php $terapeuta_formacao = get_post_meta($post->ID, 'terapeuta_formacao', true); if($terapeuta_formacao != ''){ ?>
				<hr />
				<h3>Formação</h3>
				<?php echo $terapeuta_formacao;?>
			<?php }; ?>
			
			<?php $terapeuta_email = get_post_meta($post->ID, 'terapeuta_email', true); $terapeuta_endereco = get_post_meta($post->ID, 'terapeuta_endereco', true); $terapeuta_telefone = get_post_meta($post->ID, 'terapeuta_telefone', true); ?>
			<hr />
			<h3>Contato:</h3>
			<p>
				<strong>Email:</strong> <?php echo $terapeuta_email;?><br />
				<strong>Telefone:</strong> <?php echo $terapeuta_telefone;?><br />
				<strong>Endereço / Local de Atendimento:</strong> <?php echo $terapeuta_endereco;?>
			</p>

		<?php $term = wp_get_post_terms($post->ID, 'pessoa', 'name' ); $pessoa = $term[0]->slug; ?>
		
		<?php require_once('loops/terapeutas/loop-fotos.php'); ?>
		<?php require_once('loops/terapeutas/loop-videos.php'); ?>
		<?php require_once('loops/terapeutas/loop-links.php'); ?>
		<?php require_once('loops/terapeutas/loop-depoimentos.php'); ?>

		</div>
	</div>
</div>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>