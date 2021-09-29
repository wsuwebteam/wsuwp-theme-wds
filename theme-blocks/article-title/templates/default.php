<<?php echo esc_attr( $attrs['tag'] ); ?> 
	class="<?php echo esc_attr( implode( ' ', $wrapper_classes ) ); ?>"
	>
	<?php if ( empty( $attrs['removeLink'] ) ) : ?><a href="<?php the_permalink(); ?>"><?php endif; ?>
	<?php the_title(); ?>
	<?php if ( empty( $attrs['removeLink'] ) ) : ?></a><?php endif; ?>
</<?php echo esc_attr( $attrs['tag'] ); ?>>
