<?php
/**
 * The Cloud that displays TAGS.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>

<?php // A second sidebar for widgets, just because.
if ( is_active_sidebar( 'first-footer-widget-area' )){?>
<div id="rodape_tags">
	<div id="rodape_wrap" class="container_12">	
		<?php dynamic_sidebar( 'first-footer-widget-area' );?>
	</div>
</div>
<?php } ?>