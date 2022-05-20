<?php

$terms = ( taxonomy_exists( 'wsuwp_university_location' ) ) ? get_the_terms( get_the_ID(), 'wsuwp_university_location' ) : array();

?>
<?php if ( ! empty( $terms ) ) : ?>
<div class="wsu-meta-location wsu-meta--secondary">
	<span class="wsu-screen-reader-only">Location</span>
	<?php foreach ( $terms as $loc_term ) : ?>
		<a href="<?php echo esc_url( get_term_link( $loc_term ) ); ?>"><?php echo wp_kses_post( $loc_term->name ); ?></a>
	<?php endforeach; ?>
</div>
<?php endif; ?>
