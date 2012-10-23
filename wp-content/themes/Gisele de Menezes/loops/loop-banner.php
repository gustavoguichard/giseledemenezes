<!-- BANNERS -->
<?php if(!$taxonomy) $taxonomy = '&sessao=nenhuma';?>
<?php $my_query = new WP_Query("post_type=banner&showposts=1". $taxonomy); while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<div class="banner_topo">
		<?php the_content();?>
	</div>
<?php $have_banner = true;?>
<?php endwhile; wp_reset_query(); ?>