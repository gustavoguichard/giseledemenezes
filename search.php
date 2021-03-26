<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<div id="content" class="clearfix">
	<div id="content_wrap" class="container_12">
		<?php get_template_part( 'navigation', 'index' );?>
		<div class="grid_9">
		<?php if ( have_posts() ) : ?>
				<h3>Resultados da busca por: <?php echo get_search_query(); ?></h3>
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>
<?php else : ?>
				<div class="e404">
					<h3>Nada encontrado</h3>
					<p>Desculpe, mas esta página não existe ou não pode ser encontrada. Talvez uma busca no campo a direita possa ajudar...</p>
				</div>
<?php endif; ?>
		</div>
	<?php get_sidebar(); ?>	
	</div>
</div>
<?php get_template_part( 'cloud', 'tag' ); ?>
<?php get_footer(); ?>