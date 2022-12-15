<nav class="wsu-navigation-audience ">
	<div class="wsu-navigation-audience__label">Resources For:</div>
	<?php
		wp_nav_menu(
			array(
				'theme_location' => 'audience',
				'menu_class'     => 'wsu-navigation-audience__menu',
				'container'      => '',
			)
		);
	?>
</nav>