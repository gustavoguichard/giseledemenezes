<!-- CURSOS -->
<?php $term = wp_get_post_terms($post->ID, 'cursos', 'name' );
	$cursos = ""; $i = 0;
	foreach($term as $curso):
		if($i>0) $cursos .= ",";
		$cursos .= $curso->slug;
		$i++;
	endforeach;
	$term = wp_get_post_terms($post->ID, 'sessao', 'name' );
	$especializacoes = ""; $i = 0;
	foreach($term as $especializacao):
		if($i>0) $especializacoes .= ",";
		$especializacoes .= $especializacao->slug;
		$i++;
	endforeach; ?>
<?php $i = 0; ?>
<?php if($cursos != ""):?>
<?php $my_query = new WP_Query("post_type=curso&cursos=$cursos&order=ASC"); while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<?php if($i == 0){ ?>
		<?php if(!$no_title && get_post_type() != "post"){ ?><div class="learn_more"><h3>Saiba mais:</h3><?php };?>
	<?php }; ?>
			<div class="grid_9 alpha curso_item">
				<a href="<?php the_permalink();?>"><?php the_post_thumbnail('mini_thumb');?></a>
				<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
				<p><?php the_excerpt();?></p>
			</div>
	<?php $i++; ?>
<?php endwhile; wp_reset_query(); endif; ?>
<?php if($especializacoes != ""):?>
<?php $my_query = new WP_Query("post_type=apresentacao&sessao=$especializacoes&order=ASC"); while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<?php if($i == 0){ ?>
		<?php if(!$no_title && get_post_type() != "post"){ ?><div class="learn_more"><h3>Saiba mais:</h3><?php };?>
	<?php }; ?>
			<div class="grid_9 alpha curso_item">
				<a href="<?php the_permalink();?>"><?php the_post_thumbnail('mini_thumb');?></a>
				<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
			</div>
	<?php $i++; ?>
<?php endwhile; wp_reset_query(); endif; ?>
<?php if($i>0) echo "</div>";?>