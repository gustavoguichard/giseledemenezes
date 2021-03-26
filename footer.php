<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>

	<div id="footer" class="container_12">
		<a href="<?php bloginfo('url'); ?>/?p=40"><img src="<?php bloginfo('template_url'); ?>/images/bandeira_paz.png" alt="Bandeira da Paz" class="paz" /></a>
		<h4><a href="<?php bloginfo('url'); ?>/especializacoes/sincronario-da-paz/">Onde há paz há cultura - Onde há cultura há paz</a></h4>
		<p class="copyright">© Gisele de menezes - Todos os direitos reservados<br />
			Web Design & Desenvolvimento por <a href="http://gustavoguichard.com/">Gustavo Guichard</a></p>
	</div>
<script src="<?php bloginfo('template_url') ?>/js/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php bloginfo('template_url') ?>/js/modernizr-1.7.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php bloginfo('template_url') ?>/js/jquery.lightbox-0.5.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php bloginfo('template_url') ?>/js/gisele.js" type="text/javascript" charset="utf-8"></script>
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>