<?php namespace WSUWP\Theme\WDS; ?>

<!-- wp:wsuwp/post-layout -->
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		Template::render( 'block-templates/article', get_post_type() );

	} // end while
} 
;?>
<!-- /wp:wsuwp/post-layout -->