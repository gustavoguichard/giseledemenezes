<!-- DEPOIMENTOS -->
<?php $i = 0; ?>
<?php $my_query = new WP_Query("post_type=depoimento&pessoa=$pessoa"); while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<?php if($i == 0){ ?>
		<h3 class="item_sessao grid_9 alpha">Depoimentos</h3>
		<?php echo $depoimentos_text;?>
	<?php }; ?>
	<blockquote class="depoimento <?php if($i>0) echo 'not_first';?>">
		<?php the_content(); ?>
		<span><?php the_title(); ?><br />
		<em><?php echo get_post_meta($post->ID, 'profissao', true);?></em></span>
	</blockquote>
	<?php $i++; ?>
<?php endwhile; wp_reset_query(); ?>