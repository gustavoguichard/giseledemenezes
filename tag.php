<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<div id="content" class="clearfix">
	<div id="content_wrap" class="container_12">
		<?php get_template_part( 'navigation', 'index' );?>
		<div class="grid_9">
			<h3><?php printf( __( 'Arquivos da Tag: %s', 'twentyten' ), '' . single_tag_title( '', false ) . '' );?></h3>

<?php
/* Run the loop for the tag archive to output the posts
 * If you want to overload this in a child theme then include a file
 * called loop-tag.php and that will be used instead.
 */
 get_template_part( 'loop', 'tag' );
?>

		</div>
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_template_part( 'cloud', 'tag' ); ?>
<?php get_footer(); ?>