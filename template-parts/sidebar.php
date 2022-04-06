<?php namespace WSUWP\Theme\WDS; ?>
<?php
	$sidebar_id = ( ! empty( $args['sidebar_id'] ) ) ? $args['sidebar_id'] : 'sidebar_post';
	$context    = ( ! empty( $args['context'] ) ) ? $args['context'] : 'page';
?>
<?php if ( is_active_sidebar( $sidebar_id ) ) : ?>
<aside class="wsu-wrapper-sidebar">
	<?php dynamic_sidebar( apply_filters( 'wsu_wds_sidebar', $sidebar_id, $context ) ); ?>
</aside>
<?php endif; ?>
