<div id="search-box">
	<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
		<input type="text"  onfocus="this.placeholder='';" onblur="this.placeholder='Search...';" placeholder="Search..." value="<?php echo esc_html($s, 1); ?>" name="s" id="s" class="search_input" size="15" />
		<input type="submit" id="searchsubmit" value="Search" />
	</form>
</div><!-- search-box -->