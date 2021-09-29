<?php

$hero_style = WSUWP\Theme\WDS\Template::get_option( 'hero_style', get_post_type(), 'single' );

switch ( $hero_style ) {

    case 'hero':
        get_template_part( 'template-component/component-hero', get_post_type() );
        break;
    
    case 'figure':
        get_template_part( 'template-component/component-hero-figure', get_post_type() );
        break;

}
