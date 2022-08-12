<?php namespace WSUWP\Theme\WDS; 

?>
<?php if ( empty( get_theme_mod('wsu_wds_global_header_hide', false ) ) ) : ?>
<?php

	$apply_link_theme = get_theme_mod( 'wsu_wds_global_header_apply_link' );
	$give_link_theme  = get_theme_mod( 'wsu_wds_global_header_give_link' );
	$apply_link       = ( ! empty( $apply_link_theme ) ) ? $apply_link_theme : 'https://admission.wsu.edu/apply/as/find-your-application/';
	$give_link        = ( ! empty( $give_link_theme ) ) ? $give_link_theme : 'https://foundation.wsu.edu/';
?>
<header class="wsu-header-global <?php if ( ! empty( get_theme_mod('wsu_wds_global_header_style', false ) ) ) : ?>wsu-header-global--<?php echo esc_attr( get_theme_mod( 'wsu_wds_global_header_style', '' ) ); ?><?php endif; ?>">
	<div class="wsu-header-global__content">
		<?php Template::get_template_part( 'template-parts/global-header-title' ) ?>
		<nav class="wsu-header-global__navigation" aria-label="WSU header menu">
			<div class="wsu-header-global__quick-links">
				<button class="wsu-button-ui-more-horizontal wsu-menu-expand--toggle" aria-label="Open Header Menu"></button>
				<ul class="wsu-menu-admin wsu-menu-admin--tablet-dropdown" aria-label="WSU header menu">
					<?php 
					$global_menu = wp_nav_menu( 
						array( 
							'menu' => 'globalheadermenu', 
							'echo' => 0, 
							'fallback_cb' => false,
							'container' => '',
							'items_wrap' => '%3$s',
							'theme_location' => 'none', // Fake
						)
					);
					if ( $global_menu ) : ?><?php echo wp_kses_post( $global_menu ); ?><?php else : ?>
					<li>
						<a href="<?php echo esc_url( $give_link ); ?>">Give</a>
					</li>
					<li>
						<a href="<?php echo esc_url( $apply_link ); ?>">Apply</a>
					</li>
					<li>
						<a href="https://wsu.edu/about/statewide/">Locations</a>
					</li>
					<li>
						<a href="https://mywsu.wsu.edu/">My WSU</a>
					</li>
					<?php endif; ?>
				</ul>
			</div>
			<a href="<?php echo get_site_url(); ?>?s=" class="wsu-button-ui-search" title="Search WSU"></a>
		</nav>
	</div>
</header>
<?php endif; ?>