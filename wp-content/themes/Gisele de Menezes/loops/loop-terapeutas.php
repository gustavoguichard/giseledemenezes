<!-- TERAPEUTAS PARCEIROS -->
<?php $i = 0; ?>
<?php if(!$taxonomy) $taxonomy = '&sessao=nenhuma';?>
<?php $my_query = new WP_Query("post_type=terapeuta_page&orderby=title&order=ASC". $taxonomy ."&showposts=-1"); while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<?php if($i == 0){ ?>
		<h3 class="item_sessao grid_9 alpha" id="terapeutas_indicados">Terapeutas que atendem com <?php echo $title_esp; ?></h3>
		<?php echo $parceiros_text;?>
		<ul class="terapeuta_min grid_9 alpha">
	<?php }; ?>
			<li><?php $terapeuta_email = get_post_meta($post->ID, 'terapeuta_email', true); ?>
				<?php $terapeuta_pagamento = get_post_meta($post->ID, 'terapeuta_pagamento', true); ?>
				<strong><?php the_title();?></strong><?php if($terapeuta_email != '') echo ' - '.$terapeuta_email;?><?php if($terapeuta_pagamento) echo ' - <a href="' . get_permalink() . '"><em>Ver mais...</em></a>';?>
			</li>
	<?php $i++; ?>
<?php endwhile; wp_reset_query(); ?>
<?php if($i>0){ ?>
		</ul>
<?php }; ?>