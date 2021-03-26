<?php
/**
 * Template Name: Home Livro
 *
 * @package WordPress
 * @subpackage Gisele de Menezes
 * @since Gisele de Menezes 3.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="content" class="clearfix">
	<div id="content_wrap" class="container_12">
			<div class="grid_3"><?php the_post_thumbnail(); ?></div>
			<div class="grid_9"><?php the_content(); ?></div>
	</div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>
