<!-- CURSOS -->
<?php $i = 0; ?>
<?php $my_query = new WP_Query("post_type=curso&sessao=$sessao&order=ASC"); while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<?php if($i == 0){ ?>
		<?php if(!$no_title){ ?><h3 class="item_sessao grid_9 alpha">Cursos</h3><?php };?>
		<?php echo $cursos_text;?>
	<?php }; ?>
			<div class="grid_9 alpha curso_item">
				<a href="<?php the_permalink();?>"><?php the_post_thumbnail('mini_thumb');?></a>
				<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
				<p><?php the_excerpt();?></p>
			</div>
	<?php $i++; ?>
<?php endwhile; wp_reset_query(); ?>