<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html__( 'Search for:', 'prismatic' ) ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder', 'prismatic' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'prismatic' ) ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'prismatic' ) ?>" />
</form>
