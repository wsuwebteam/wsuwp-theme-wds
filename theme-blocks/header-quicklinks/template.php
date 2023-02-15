<nav id="wsu-quicklinks-panel" class="wsu-slide-in-panel wsu-quicklinks wsu-slide-in-panel--width-large wsu-has-background--dark wsu-slide-in-panel--style-crimson-mark" aria-expanded="false" aria-haspopup="true" aria-label="Quick Links menu">
	<button class="wsu-slide-in-panel__overlay wsu-slide-in-panel--close">Close Quick Links</button>
	<div class="wsu-slide-in-panel__panel wsu-quicklinks__panel wsu-background--gradient-dark">
		<div class="wsu-slide-in-panel__panel-inner">
			<div class="wsu-quicklinks__panel-content">
				<div class="wsu-quicklinks__close">
					<button class="wsu-button  wsu-slide-in-panel--close wsu-button--style-action">Close Search</button>
				</div>
				<div class=" wsu-quicklinks__search">
					<?php if ( ! empty( $args['local_search']) ) : ?>
					<form class="wsu-search wsu-has-background--dark wsu-search--style-underline" method="get" action="<?php echo get_site_url(); ?>">
						<div class="wsu-search__search-bar">
							<input class="wsu-search__input" type="text" aria-lable="Search input" placeholder="Search" name="s">
							<button class="wsu-search__submit" aria-lable="Submit Search"></button>
						</div>
					</form>
					<?php else: ?>
					<form class="wsu-search wsu-has-background--dark wsu-search--style-underline" method="get" action="https://search.wsu.edu">
						<div class="wsu-search__search-bar">
							<input type="hidden" name="sa" value="search">
							<input class="wsu-search__input" type="text" aria-lable="Search input" placeholder="Search" name="q">
							<button class="wsu-search__submit" aria-lable="Submit Search"></button>
						</div>
					</form>
					<?php endif; ?>
					<div class="wsu-decorator  wsu-decorator--style-lines-gray"></div>
				</div>
				<div class="wsu-quicklinks__content">
					<?php if ( has_nav_menu( 'quicklinks' ) ) : ?>
						<h2>Quick Links</h2>
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'quicklinks',
									'menu_class'     => 'wsu-list wsu-list--style-boxed wsu-list--columns-2 wsu-breakpoint--none wsu-list--underline-hover  wsu-has-background--dark',
									'container'      => '',
								)
							);
						?>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'wsu_wds_quicklinks' ) ) : ?>
						<div class="wsu-widget-area">
							<?php dynamic_sidebar( 'wsu_wds_quicklinks' ); ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="wsu-quicklinks__footer">
					<?php if ( is_active_sidebar( 'wsu_wds_quicklinks_footer' ) ) : ?>
						<div class="wsu-widget-area">
							<?php dynamic_sidebar( 'wsu_wds_quicklinks_footer' ); ?>
						</div>
					<?php endif; ?>
					<div class="wsu-quicklinks__footer-decorator">
						<div class="wsu-decorator wsu-decorator--style-lines-gray"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>