<div class="<?php echo esc_attr( $wrapper_classes ); ?>" aria-expanded="true" aria-haspopup="true">
	<div class="wsu-navigation-site__overlay wsu-navigation-site--close">
	</div>
	<div class="wsu-button-ui-menu-animated">
		<span class="wsu-button-ui-menu-animated__icon"></span>
		<span class="wsu-button-ui-menu-animated__text">Menu</span>
		<button  class="wsu-button-ui-menu-animated__button wsu-navigation-site--open" aria-label="Open Site Navigation" aria-label="Open Site Navigation"></button>
	</div>
	<div class="wsu-navigation-site__panel">
		<button class="wsu-button-ui-close wsu-navigation-site--close">Close</button>
		<nav class="wsu-navigation-site__site-nav">
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'site',
					'menu_class'     => 'wsu-menu-toggle',
					'container'      => '',
					'walker'         => new WSUWP\Theme\WDS\Walker_Nav_Menu_Toggle(),
				)
			);
			?>
		</nav>
		<button class="wsu-button-ui-close wsu-navigation-site--close">Close</button>
	</div>
</div>