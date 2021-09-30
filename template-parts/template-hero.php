<?php

$hero_style = apply_filters( 'wsu_wds_template_option', 'none', 'hero_style', 'single' );

switch ( $hero_style ) {

    case 'hero':
        get_template_part( 'template-component/component-hero', get_post_type() );
        break;
    
    case 'figure':
        get_template_part( 'template-component/component-hero-figure', get_post_type() );
        break;

}
