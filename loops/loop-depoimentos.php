<!-- DEPOIMENTOS -->
<?php $i = 0; ?>
<?php if(!$taxonomy) $taxonomy = '&sessao=nenhuma';?>
<?php $my_query = new WP_Query("post_type=depoimento&showposts=-1". $taxonomy); while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<?php if($i == 0){ ?>
		<h3 class="item_sessao grid_9 alpha" id="area_depoimentos"><?php if($taxonomy == "&sessao=livro"):?>Comentários dos leitores<?php else:?>Depoimentos<?php endif;?></h3>
		<?php echo $depoimentos_text;?>
	<?php }; ?>
	<?php if(!get_the_terms($post->ID, 'pessoa') || get_the_terms($post->ID, 'sessao')){?>
	<blockquote class="depoimento <?php if($i>0) echo 'not_first';?>">
		<?php the_content(); ?>
		<span><?php the_title(); ?><br />
		<em><?php echo get_post_meta($post->ID, 'profissao', true);?></em></span>
	</blockquote>
	<?php };?>
	<?php $i++; ?>
<?php endwhile; wp_reset_query(); ?>