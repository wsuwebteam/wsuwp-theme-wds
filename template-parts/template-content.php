<?php the_content(); ?>
<?php
// This is a hack because a REST API call seems to set the Globals on the site 
wp_reset_postdata(); 
?>