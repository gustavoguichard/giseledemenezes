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
		<?php get_template_part( 'navigation', 'index' );?>
		<div class="grid_9">
			<h2><?php if(get_the_terms($post->ID, 'pessoa')){$term = wp_get_post_terms($post->ID, 'pessoa', 'name' ); $pessoa = $term[0]->name;}?>
			<?php if($pessoa != '') echo 'Vídeo de ' . $pessoa . ' - '; ?>
<?php the_title(); ?></h2>
			<?php $video_code = get_post_meta($post->ID, 'youtube', true); $relacionados = get_post_meta($post->ID, 'videos_relacionados', true); ?>
			<div class="aligncenter"><iframe title="YouTube video player" width="480" height="390" src="http://www.youtube.com/embed/<?php echo $video_code; if(!$relacionados) echo "?rel=0";?>" frameborder="0" allowfullscreen></iframe></div>
			<?php the_content(); ?>
			<?php comments_template( '', true ); ?>
		</div>
	<?php if(!get_the_terms($post->ID, 'pessoa') || get_the_terms($post->ID, 'sessao')){ get_sidebar(); }?>
	</div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
