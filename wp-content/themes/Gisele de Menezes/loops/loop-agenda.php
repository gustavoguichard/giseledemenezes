<!-- AGENDA -->
<?php $i = 0; ?>
<?php if(!isset($taxonomy)) $taxonomy = '&sessao=nenhuma';?>
<?php $my_query = new WP_Query("post_type=evento&showposts=-1&orderby=menu_order&order=ASC".$taxonomy); while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<?php if($i == 0){ ?>
		<?php if(!$no_title){ ?><h3 class="item_sessao grid_9 alpha">Confira a Agenda</h3><?php };?>
		<ul class="grid_9 alpha">
		<?php echo $agenda_text;?>
	<?php }; ?>
			<li class="itens_list agenda_link">
				<h4><?php the_title(); ?></h4>
				<?php $data_evento = get_post_meta($post->ID, 'data', true); if($data_evento != '') echo '<p><em>' . $data_evento . '</em></p>';?>
				<?php the_content(); ?>
				<p><?php $localiza = get_post_meta($post->ID, 'localizacao', true); if($localiza != '') echo $localiza . '<br />';?>
				<?php $informa = get_post_meta($post->ID, 'contatos', true); if($informa != '') echo '<strong>Informações: </strong>' . $informa;?></p>
				
				<p><?php $pagseguro = get_post_meta($post->ID, 'pagseguro_bt', true); if($pagseguro != '') echo $pagseguro;?></p>

				<?php $curso_term = null; $curso_term = wp_get_post_terms($post->ID, 'cursos', 'name' );
						$term = null; $term = wp_get_post_terms($post->ID, 'sessao', 'name' );
						if($curso_term != null && !$is_curso):?>
				<?php $curso = $curso_term[0]->slug;?>
				<?php $curso_query = new WP_Query("post_type=curso&cursos=$curso&showposts=1"); while ($curso_query->have_posts()) : $curso_query->the_post(); ?>
					<p><a href="<?php the_permalink(); ?>">Saiba mais: <?php the_title();?></a></p>
				<?php endwhile; endif;?>
				
				<?php if($term != null && !$is_apresentacao):?>
				<?php foreach($term as $sessao):?>
				<?php $sessao_query = new WP_Query("post_type=apresentacao&sessao=".$sessao->slug."&showposts=1"); while ($sessao_query->have_posts()) : $sessao_query->the_post(); ?>
				<p><a href="<?php the_permalink(); ?>"><?php the_title();?></a></p>
				<?php endwhile; endforeach; endif;?>
				
			</li>
	<?php $i++; ?>
<?php endwhile; wp_reset_query(); ?>
<?php if($i>0){ ?>
		</ul>
<?php }; ?>