<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
		<div class="e404">
			<h2>Nada encontrado</h1>
			<p>Desculpe, mas esta página não existe ou não pode ser encontrada. Talvez uma busca no campo a direita pode ajudar...</p>
		</div>
<?php endif; ?>

<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>
<?php while ( have_posts() ) : the_post(); ?>

		<div <?php post_class('grid_9 alpha'); ?>>
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php if(has_post_thumbnail($post->ID)) the_post_thumbnail('med_thumb');?></a>
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php if ( is_archive() || is_search() || is_home() ):?>
			<p class="posted">Escrito em: <strong><?php the_time('j \d\e F \d\e Y');?></strong> por <strong><?php the_author();?></strong></p>
			<?php endif;?>
			
			<div class="post_content divided"><?php the_excerpt(); ?></div>
			
			<?php if ( is_home() ):?>
			<p class="tags">
				Participe do Blog: <?php comments_popup_link( __( 'Deixe um comentário', 'twentyten' ), __( '1 Comentário', 'twentyten' ), __( '% Comentários', 'twentyten' ) ); ?>
				<?php edit_post_link( __( 'Editar', 'twentyten' ), '| ', '' ); ?>
			</p>
			<?php
				$tags_list = get_the_tag_list( '', ' ' );
				if ( $tags_list ):
			?>
				<p class="tags tags_list"><?php printf( __( 'Tags: %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?></p>
			<?php endif; ?>
			<?php endif; ?>

		</div>

<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if(function_exists('wp_paginate')) { wp_paginate(); } ?>