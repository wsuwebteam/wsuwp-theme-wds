<?php namespace WSUWP\Theme\WDS; ?>

<div class="<?php echo implode( ' ', $wrapper_classes ); ?>" aria-expanded="true" aria-haspopup="true">
	<div class="wsu-navigation-site-vertical__overlay wsu-navigation-site-vertical--close">
	</div>
	<div class="wsu-button-ui-menu-animated">
		<span class="wsu-button-ui-menu-animated__icon"></span>
		<span class="wsu-button-ui-menu-animated__text">Menu</span>
		<button  class="wsu-button-ui-menu-animated__button wsu-navigation-site-vertical--open" aria-label="Open Site Navigation" aria-label="Open Site Navigation"></button>
	</div>
	<div class="wsu-navigation-site-vertical__panel">
		<button class="wsu-button-ui-close wsu-navigation-site-vertical--close">Close</button>
		<nav class="wsu-navigation-site-vertical__site-nav">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'site',
					'menu_class'     => 'wsu-menu-toggle',
					'container'      => '',
					'walker'         => new Walker_Nav_Menu_Toggle(),
				)
			);
			?>
		</nav>
		<button class="wsu-button-ui-close wsu-navigation-site-vertical--close">Close</button>
	</div>
</div>
