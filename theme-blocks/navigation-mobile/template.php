<div id="wsu-navigation-mobile" class="wsu-slide-in-panel wsu-navigation-mobile wsu-slide-in-panel--style-crimson-mark" aria-expanded="false" aria-haspopup="true" aria-label="Site Navigation">
	<button class="wsu-slide-in-panel__overlay wsu-slide-in-panel--close">Close Site Navigation</button>
	<div class="wsu-slide-in-panel__panel ">
		<div class="wsu-slide-in-panel__panel-inner">
			<div class="wsu-navigation-mobile__close">
				<button class="wsu-button wsu-button--style-action wsu-slide-in-panel--close">Close Menu</button>
			</div>


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
	</div>
</div>