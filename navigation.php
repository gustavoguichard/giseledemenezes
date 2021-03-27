<?php
/**
 * The Navigation top Bar with search.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>
<div class="grid_12" id="navigation_bar">
	<div class="push_8 grid_4">
		<form role="search" method="get" id="searchform" action="<?php bloginfo('url');?>" >
			<label class="placeholder hidden" for="s">Procurar: </label>
			<input type="text" value="" name="s" id="s" class="input_text" />
			<input type="submit" id="searchsubmit" class="input_submit" value="Ir" />
		</form>
	</div>
</div>
