<?php
/**
 * Template Name: Videos Page
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
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
<?php endwhile; // end of the loop. ?>
			<div class="videos_galery grid_9 alpha">
			<?php $wp_query = new WP_Query("post_type=video&paged=$paged&showposts=9&orderby=menu_order&order=ASC"); while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<?php if(!get_the_terms($post->ID, 'pessoa') || get_the_terms($post->ID, 'sessao')){?>
				<div class="videos_item">
					<?php $video_code = get_post_meta($post->ID, 'youtube', true); ?>
					<a href="<?php the_permalink(); ?>"><img src="http://img.youtube.com/vi/<?=$video_code?>/0.jpg" width="180"/></a>
					<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
				</div>
				<?php }; ?>
			<?php endwhile; ?>
			<?php if(function_exists('wp_paginate')) { wp_paginate(); } ?>
		</div>
		</div>
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>