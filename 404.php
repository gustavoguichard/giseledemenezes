<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>


<div id="content" class="clearfix">
	<div id="content_wrap" class="container_12">
		<?php get_template_part( 'navigation', 'index' );?>
		<div class="grid_9 e404">
			<h2>Nada encontrado</h1>
			<p>Desculpe, mas esta página não existe ou não pode ser encontrada. Talvez uma busca no campo a direita possa ajudar...</p>
		</div>
	<?php get_sidebar(); ?>	
	</div>
</div>
<?php get_template_part( 'cloud', 'tag' ); ?>
<?php get_footer(); ?>