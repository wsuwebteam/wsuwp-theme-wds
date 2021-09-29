<header class="<?php echo esc_attr( $wrapper_classes ); ?>">
	<div class="wsu-header-site__label">
		<?php if ( empty( $attrs['hide'] ) ) : ?>
		<div class="wsu-header-site__subtitle">
			<a class="wsu-header-site__subtitle-link" href="#"><?php echo esc_attr( get_bloginfo( 'description' ) ); ?></a>
		</div>
		<?php endif; ?>
		<div class="wsu-header-site__title">
			<a class="wsu-header-site__title-link" href="#"><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></a>
		</div>
	</div>
</header>
