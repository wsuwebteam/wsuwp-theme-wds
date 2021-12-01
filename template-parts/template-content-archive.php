<?php
if ( have_posts() ) {

	while ( have_posts() ) {

		the_post();

        get_template_part( 'template-component/component-post-index-card', 'reversed' );

	} // end while
}