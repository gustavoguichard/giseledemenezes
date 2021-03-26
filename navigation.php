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
	<div class="grid_8 alpha">
		<div class="breadcrumb">
			Você está aqui: <?php if(function_exists('bcn_display') && !$is_terapeuta){ bcn_display(); } else { ?><a href="<?php bloginfo('url');?>">Home</a> &gt; Terapeutas &gt; <?php the_title(); } ?>
		</div>
	</div>
	<div class="grid_4 omega">
		<form role="search" method="get" id="searchform" action="<?php bloginfo('url');?>" >
			<label class="placeholder hidden" for="s">Procurar: </label>
			<input type="text" value="" name="s" id="s" class="input_text" />
			<input type="submit" id="searchsubmit" class="input_submit" value="Ir" />
		</form>
	</div>
</div>