<ul class="wsu-social-icons">
	<?php if ( empty( $attrs['hideTwitter]'] ) ) : ?>
	<li class="wsu-social-icons__twitter">
		<a href="https://twitter.com/icons?text=&url=<?php echo esc_url( $attrs['link'] ); ?>" title="icons on Twitter"></a>
	</li>
	<?php endif; ?>
	<?php if ( empty( $attrs['hideFacebook]'] ) ) : ?>
	<li class="wsu-social-icons__faceblook">
		<a href="https://www.facebook.com/iconsr/iconsr.php?u=<?php echo esc_url( $attrs['link'] ); ?>" title="icons on FaceBook"></a>
	</li>
	<?php endif; ?>
	<?php if ( empty( $attrs['hideLinkedin]'] ) ) : ?>
	<li class="wsu-social-icons__linkedin">
		<a href="https://www.linkedin.com/iconsArticle?mini=true&url=<?php echo esc_url( $attrs['link'] ); ?>" title="icons on Linkedin"></a>
	</li>
	<?php endif; ?>
	<?php if ( empty( $attrs['hidePintrest]'] ) ) : ?>
	<li class="wsu-social-icons__pintrest">
		<a href="https://pinterest.com/pin/create/button/?description=&media=&url=<?php echo esc_url( $attrs['link'] ); ?>" title="icons on Linkedin"></a>
	</li>
	<?php endif; ?>
	<?php if ( empty( $attrs['hideEmail]'] ) ) : ?>
	<li class="wsu-social-icons__email">
		<a href="mailto:?subject=[title]&body=Check out this: <?php echo esc_url( $attrs['link'] ); ?>" title="icons with email"></a>
	</li>
	<?php endif; ?>
</ul>