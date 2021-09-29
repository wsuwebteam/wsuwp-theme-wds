<?php

$twitter   = WSUWP\Theme\WDS\WDS_Options::get( 'social', 'twitter', '' );
$facebook  = WSUWP\Theme\WDS\WDS_Options::get( 'social', 'facebook', '' );
$instagram = WSUWP\Theme\WDS\WDS_Options::get( 'social', 'instagram', '' );
$linkedin  = WSUWP\Theme\WDS\WDS_Options::get( 'social', 'linkedin', '' );
$youtube   = WSUWP\Theme\WDS\WDS_Options::get( 'social', 'youtube', '' );
$vimeo     = WSUWP\Theme\WDS\WDS_Options::get( 'social', 'vimeo', '' );

?>
<ul class="wsu-social-icons">
	<?php if ( ! empty( $twitter  ) ) : ?>
	<li class="wsu-social-icons__twitter">
		<a href="<?php echo esc_url( $twitter ); ?>" title="twitter"></a>
	</li>
	<?php endif; ?>
	<?php if ( ! empty( $facebook  ) ) : ?>
	<li class="wsu-social-icons__faceblook">
    <a href="<?php echo esc_url( $facebook  ); ?>" title="facebook"></a>
	</li>
	<?php endif; ?>
	<?php if ( ! empty( $linkedin ) ) : ?>
	<li class="wsu-social-icons__linkedin">
    <a href="<?php echo esc_url( $linkedin ); ?>" title="linkedin"></a>
	</li>
	<?php endif; ?>
	<?php if ( ! empty( $email ) ) : ?>
	<li class="wsu-social-icons__email">
        <a href="mailto:?subject=Shared%20With%20You:%20<?php echo urldecode( get_bloginfo( 'name' ) ); ?>&body=<?php echo esc_url( get_bloginfo( 'url' ) ); ?>" title="share with email"></a>
	</li>
	<?php endif; ?>
</ul>