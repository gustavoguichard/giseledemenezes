<?php
/**
 * Template Name: Home Livro
 *
 * @package WordPress
 * @subpackage Gisele de Menezes
 * @since Gisele de Menezes 3.0
 */

get_header(); ?>

<script src="<?php bloginfo('template_url') ?>/js/banner.js" type="text/javascript" charset="utf-8"></script>
<?php $banner_query = new WP_Query('posts_per_page=1&post_type=banner'); while ($banner_query->have_posts()) : $banner_query->the_post(); ?>
<?php the_content(); ?>
<?php endwhile; wp_reset_query(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="content" class="clearfix">
	<div id="content_wrap" class="container_12">
			<div class="grid_3"><?php the_post_thumbnail(); ?></div>
			<div class="grid_9"><?php the_content(); ?></div>
	</div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>