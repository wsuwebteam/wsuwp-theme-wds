<?php

$image_caption = wp_get_attachment_caption( get_post_thumbnail_id() );
?>
<figure class="wsu-article-hero">
	<div class="wsu-image-frame wsu-image--ratio-16-9">
        <?php get_template_part( 'template-component/component-post-image' ); ?>
	</div>
	<?php if ( ! empty( $image_caption )) : ?>
	<figcaption>
		<?php echo wp_kses_post( $image_caption ); ?>
	</figcaption>
	<?php endif; ?>
</figure>