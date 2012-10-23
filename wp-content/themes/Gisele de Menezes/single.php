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
			<p class="posted">Escrito em: <strong><?php the_time('j \d\e F \d\e Y');?></strong> por <strong><?php the_author();?></strong></p>
			<div class="post_content"><?php the_content(); ?></div>
			<div class="other_posts">
				<p class="previous_link"><?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'twentyten' ) . ' %title' ); ?></p>
				<p class="next_link"><?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '' ); ?></p>
			</div>
			<?php require_once('loops/loop-saiba.php'); ?>
			<?php
				$tags_list = get_the_tag_list( '', ' ' );
				if ( $tags_list ):
			?>
				<p class="tags tags_list"><?php printf( __( 'Tags: %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?></p>
			<?php endif; ?>
			<?php comments_template( '', true ); ?>
		</div>
	<?php get_sidebar(); ?>	
	</div>
</div>
<?php endwhile; // end of the loop. ?>
<?php get_template_part( 'cloud', 'tag' ); ?>
<?php get_footer(); ?>