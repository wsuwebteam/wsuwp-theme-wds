<nav id="wsu-navigation-mobile" class="wsu-slide-in-panel wsu-navigation-mobile wsu-slide-in-panel--style-crimson-mark" aria-expanded="false" aria-haspopup="true" aria-label="Site Navigation">
	<button class="wsu-slide-in-panel__overlay wsu-slide-in-panel--close">Close Demo</button>
	<div class="wsu-slide-in-panel__panel ">
		<div class="wsu-slide-in-panel__panel-inner">
			<div class="wsu-navigation-mobile__close">
				<button class="wsu-button wsu-button--style-action wsu-slide-in-panel--close">Close Menu</button>
			</div>
			<div class="wsu-navigation-mobile__search">
				<button data-panel="wsu-quicklinks-panel" class="wsu-navigation-mobile__search-button wsu-slide-in-panel--close-this wsu-slide-in-panel--open">Search/Quicklinks</button>
			</div>
			<div class="wsu-navigation-mobile__menu">
				<?php wp_nav_menu(
					array(
						'theme_location' => 'site',
						'menu_class'     => 'wsu-menu-collapse wsu-menu-collapse--style-mobile',
						'container'      => '',
						'walker'         => new WSUWP\Theme\WDS\Walker_Nav_Menu_Collapse(),
						'menu_id'        => 'wsu-site-menu',
					)
				); ?>
			</div>
			<?php if ( has_nav_menu( 'audience' ) ) : ?>
			<div class="wsu-navigation-mobile__audience">
				<nav class="wsu-navigation-audience wsu-navigation-audience--style-vertical">
					<div class="wsu-navigation-audience__label"><?php echo wp_get_nav_menu_name( 'audience' ); ?></div>
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
			</div>
			<?php endif; ?>
		</div>
	</div>
</nav>