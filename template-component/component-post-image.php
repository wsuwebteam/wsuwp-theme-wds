<?php
$image_size = ( ! empty( $args['image_size'] ) ) ? $args['image_size'] : 'medium';
?>
<?php if ( has_post_thumbnail() ) : ?>
	<img src="<?php echo esc_attr( wp_get_attachment_image_src( get_post_thumbnail_id(), $image_size ) ); ?>"
		srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_post_thumbnail_id(), $image_size ) ); ?>"
		sizes="<?php echo esc_attr( wp_get_attachment_image_sizes( get_post_thumbnail_id(), $image_size ) ); ?>"
		alt="<?php echo esc_attr( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?>" />
<?php endif; ?>