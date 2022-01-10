<?php if ( 'vertical' === get_theme_mod( 'wsu_wds_site_navigation_style', 'vertical' ) ) : ?>
<nav class="wsu-navigation-site-vertical<?php if ( get_theme_mod( 'wsu_wds_site_navigation_color', false ) ) : ?> wsu-navigation-site-vertical--color-dark<?php endif; ?>" aria-expanded="true" aria-haspopup="true" aria-label="Site menu">
	<button class="wsu-navigation-site-vertical__overlay wsu-navigation-site-vertical--close" aria-label="Close site menu"></button>
	<button class="wsu-navigation-site-vertical__toggle-button wsu-navigation-site-vertical--toggle" aria-label="Open site menu">Menu</button>
	<button class="wsu-navigation-site-vertical__open-button wsu-navigation-site-vertical--open" aria-label="Open site menu">Menu</button>
	<div class="wsu-navigation-site-vertical__panel">
		<button class="wsu-button-ui-close wsu-navigation-site-vertical--close" aria-label="Close site menu">Close</button>
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'site',
					'menu_class'     => 'wsu-menu wsu-menu--primary-vertical',
					'container'      => '',
					'walker'         => new WSUWP\Theme\WDS\Walker_Nav_Menu_Toggle(),
				)
			);
			?>
		<button class="wsu-button-ui-close wsu-navigation-site-vertical--close" aria-label="Close site menu">Close</button>
	</div>
	<button tabindex="-1" class="wsu-navigation-site-vertical__overlay wsu-navigation-site-vertical--close" aria-label="Close site menu"></button>
</nav>
<?php endif; ?>
