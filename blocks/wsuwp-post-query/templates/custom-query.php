<?php
 
// The Query
$the_query = new WP_Query( $query_args );
 
// The Loop
if ( $the_query->have_posts() ) {

	while ( $the_query->have_posts() ) {

		$the_query->the_post();

		the_content();

		var_dump( $content );

		echo $content;

	}
} 

/* Restore original Post Data */
wp_reset_postdata();
