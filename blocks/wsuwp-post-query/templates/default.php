<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		echo do_blocks( $content );

	} // end while
} // end if
