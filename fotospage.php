<?php
/**
 * Template Name: Fotos Page
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
			<div class="fotos_galery grid_9 alpha">
			<?php $wp_query = new WP_Query("post_type=album&paged=$paged&showposts=9"); while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<?php if(!get_the_terms($post->ID, 'pessoa') || get_the_terms($post->ID, 'sessao')){?>
				<div class="fotos_item fotos_page">
					<h4><?php the_title(); ?></h4>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('med_thumb'); ?></a>
					<p>
						<?php $u = 0; if(get_the_terms($post->ID, 'sessao')){?>
						<?php $terms = null; $terms = wp_get_post_terms($post->ID, 'sessao', 'name' );
							foreach($terms as $term):?>
						<?php
							if($u > 0) echo " - ";
							echo $term->name;
							$u++;
						?>
						<?php endforeach;} elseif(get_the_terms($post->ID, 'cursos')){ ?>
						<?php $terms = null; $terms = wp_get_post_terms($post->ID, 'cursos', 'name' );
							foreach($terms as $term):?>
						<?php
							if($u > 0) echo " - ";
							echo $term->name;
							$u++;
						?>
						<?php endforeach;}?>
					</p>
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