<!-- VÍDEOS -->
<?php $i = 0; ?>
<?php $my_query = new WP_Query("post_type=video&pessoa=$pessoa"); while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<?php if($i == 0){ ?>
		<?php if(!$no_title){ ?><h3 class="item_sessao grid_9 alpha">Vídeos</h3><?php };?>
		<?php echo $videos_text;?>
		<div class="videos_galery grid_9 alpha">
	<?php }; ?>
	<div class="videos_item">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('med_thumb'); ?></a>
		<h4><?php the_title(); ?></h4>
	</div>
	<?php $i++; ?>
<?php endwhile; wp_reset_query(); ?>
<?php if($i>0){ ?>
		</div>
<?php }; ?>