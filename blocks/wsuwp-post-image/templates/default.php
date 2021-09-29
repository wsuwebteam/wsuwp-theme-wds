<?php if ( ! empty( $attrs['imageSrc'] ) ) : ?>
<div class="<?php echo esc_attr( $wrapper_classes ); ?>">
	<?php if ( ! empty( $attrs['link'] ) ) : ?><a href="<?php echo esc_url( $attrs['link'] ); ?>"><?php endif; ?>
	<img src="<?php echo esc_attr( $attrs['imageSrc'] ); ?>"
		srcset="<?php echo esc_attr( $attrs['imageSrcset'] ); ?>"
		sizes="<?php echo esc_attr( $attrs['imageSizes'] ); ?>"
		alt="<?php echo esc_attr( $attrs['imageAlt'] ); ?>" />
	<?php if ( ! empty( $attrs['link'] ) ) : ?></a><?php endif; ?>
</div>
<?php endif; ?>