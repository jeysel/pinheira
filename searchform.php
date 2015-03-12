

<form method="get" action="<?php bloginfo('url'); ?>/">
	<div id="searchform">
		<input type="text" value="<?php the_search_query(); ?>" name="s" class="input-medium search-query" />
		<input type="submit" class="btn btn-sm btn-default" value="<?php _e("Buscar", "notesblog");?>" />
	</div>
</form>

