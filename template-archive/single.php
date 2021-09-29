<?php namespace WSUWP\Theme\WDS; ?>

<main class="wsu-wrapper-content">	
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		Template::render( 'block-templates/article', get_post_type() );

	} // end while
} 
;?>
</main>
