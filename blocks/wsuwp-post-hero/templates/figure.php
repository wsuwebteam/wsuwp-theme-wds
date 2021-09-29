<figure class="wsu-article-hero">
	<?php if ( ! empty( $attrs['imageRatio'] ) ) : ?><div class="wsu-image-frame wsu-ratio--<?php echo esc_attr( $attrs['imageRatio'] ); ?>"><?php endif; ?>
	<img src="<?php echo esc_attr( $attrs['imageSrc'] );?>"
		srcset="<?php echo esc_attr( $attrs['imageSrcset'] ); ?>"
		sizes="<?php echo esc_attr( $attrs['imageSizes'] );?>"
		alt="<?php echo esc_attr( $attrs['imageAlt'] );?>" />
	<?php if ( ! empty( $attrs['imageRatio'] ) ) : ?></div><?php endif; ?>
	<?php if ( ! empty( $attrs['imageCaption'] )) : ?>
	<figcaption>
		<?php echo wp_kses_post( $attrs['imageCaption'] ); ?>
	</figcaption>
	<?php endif; ?>
</figure>