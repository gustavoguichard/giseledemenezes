<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>

<div id="sidebar" class="grid_3">
	<h4>Especializações</h4>
	<ul class="sidebar_sessao_nav">
	<?php $sessao_query = new WP_Query('post_type=apresentacao&showposts=-1&orderby=menu_order&order=ASC'); while ($sessao_query->have_posts()) : $sessao_query->the_post(); ?>
		<li>
			<span><a href="<?php the_permalink();?>"><?php the_title(); ?></a></span>
			<a href="<?php the_permalink();?>"><?php the_post_thumbnail('mini_thumb'); ?></a>
		</li>
	<?php endwhile; wp_reset_query(); ?>
	</ul>
</div>
