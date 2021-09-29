<address class="<?php echo esc_attr( $wrapper_classes ); ?>">
	<span class="wsu-meta-byline__text">
		By
	</span>
	<span class="wsu-meta-byline__name">
		<?php echo wp_kses_post( $author_name ); ?><?php if ( ! empty( $author_title ) ) : ?>,<?php endif; ?>
	</span>
	<?php if ( ! empty( $author_title ) ) : ?>
	<span class="wsu-meta-byline__title">
		<?php echo wp_kses_post( $author_title ); ?>
	</span>
	<?php endif; ?>
</address>
