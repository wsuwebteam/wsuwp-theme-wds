<div class="wsu-wrapper-content">
	<div class="<?php echo esc_attr( $wrapper_classes ); ?>">
		<main class="wsu-layout-panel">
			<?php echo $content; ?>
		</main>
		<aside class="wsu-layout-panel">
			<?php WSUWP\Theme\WDS\Template::render( 'template-parts/sidebar', $context . get_post_type() ); ?>
		</aside>
	</div>
</div>


