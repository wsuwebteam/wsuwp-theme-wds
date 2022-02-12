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
		<a href="<?php echo esc_url( $twitter ); ?>"><span class="screen-reader-only">Go to wsu twitter</span></a>
	</li>
	<?php endif; ?>
	<?php if ( ! empty( $facebook  ) ) : ?>
	<li class="wsu-social-icons__faceblook">
    <a href="<?php echo esc_url( $facebook  ); ?>"><span class="screen-reader-only">Go to wsu facebook</span></a>
	</li>
	<?php endif; ?>
	<?php if ( ! empty( $linkedin ) ) : ?>
	<li class="wsu-social-icons__linkedin">
    <a href="<?php echo esc_url( $linkedin ); ?>"><span class="screen-reader-only">Go to wsu linkedin</span></a>
	</li>
	<?php endif; ?>
	<?php if ( ! empty( $instagram ) ) : ?>
	<li class="wsu-social-icons__instagram">
    <a href="<?php echo esc_url( $instagram ); ?>"><span class="screen-reader-only">Go to wsu instagram</span></a>
	</li>
	<?php endif; ?>
	<?php if ( ! empty( $youtube ) ) : ?>
	<li class="wsu-social-icons__youtube">
    <a href="<?php echo esc_url( $youtube ); ?>"><span class="screen-reader-only">Go to wsu youtube</span></a>
	</li>
	<?php endif; ?>
	<?php if ( ! empty( $email ) ) : ?>
	<li class="wsu-social-icons__email">
        <a href="mailto:?subject=Shared%20With%20You:%20<?php echo urldecode( get_bloginfo( 'name' ) ); ?>&body=<?php echo esc_url( get_bloginfo( 'url' ) ); ?>"><span class="screen-reader-only">share with email</span></a>
	</li>
	<?php endif; ?>
</ul>