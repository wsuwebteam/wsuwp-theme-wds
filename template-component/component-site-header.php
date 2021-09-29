<?php

$is_hiden = get_theme_mod('wsu_wds_site_header_hide', false );

if ( is_front_page() && ! get_theme_mod('wsu_wds_site_header_hide', false ) ) {

	$is_hiden = get_theme_mod('wsu_wds_site_header_home_hide', false );

}

?>
<?php do_action( 'wsu_wds_template_site_header_before' ); ?>
<?php if ( empty( $is_hiden ) ) : ?>
<header class="wsu-header-site<?php if ( ! empty( get_theme_mod('wsu_wds_site_header_style', false ) ) ) : ?> wsu-header-site--<?php echo esc_attr( get_theme_mod( 'wsu_wds_site_header_style', '' ) ); ?><?php endif; ?>">
	<div class="wsu-header-site__label">
		<?php if ( empty( get_theme_mod( 'wsu_wds_site_header_subtitle_hide', false ) ) ) : ?>
		<div class="wsu-header-site__subtitle">
			<a class="wsu-header-site__subtitle-link" href="#"><?php echo esc_attr( get_bloginfo( 'description' ) ); ?></a>
		</div>
		<?php endif; ?>
		<div class="wsu-header-site__title">
			<a class="wsu-header-site__title-link" href="#"><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></a>
		</div>
	</div>
</header>
<?php endif; ?>
<?php do_action( 'wsu_wds_template_site_header_after' ); ?>

