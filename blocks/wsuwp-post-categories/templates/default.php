<div class="<?php echo esc_attr( $wrapper_classes ); ?>">
	<?php echo wp_kses_post( $attrs['prefix'] );?> <?php the_category( ', ' ); ?>
</div>
