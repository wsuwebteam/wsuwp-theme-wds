<<?php echo esc_attr( $attrs['tag'] ); ?> class="<?php echo esc_attr( $wrapper_classes ); ?>" <?php if ( ! empty( $attrs['tab'] ) ) : ?>tabindex="0"<?php endif; ?>>
	<?php if ( ! empty( $attrs['linkTitle'] ) ) : ?><a href="<?php the_permalink(); ?>"><?php endif; ?>
	<?php the_title(); ?>
	<?php if ( ! empty( $attrs['linkTitle'] ) ) : ?></a><?php endif; ?>
</<?php echo esc_attr( $attrs['tag'] ); ?>>