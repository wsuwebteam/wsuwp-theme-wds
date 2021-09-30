<?php

$name     = WSUWP\Theme\WDS\WDS_Options::get( 'contact', 'name', '' );
$address1 = WSUWP\Theme\WDS\WDS_Options::get( 'contact', 'address1', '' );
$address2 = WSUWP\Theme\WDS\WDS_Options::get( 'contact', 'address2', '' );
$city     = WSUWP\Theme\WDS\WDS_Options::get( 'contact', 'city', '' );
$state    = WSUWP\Theme\WDS\WDS_Options::get( 'contact', 'state', '' );
$zip      = WSUWP\Theme\WDS\WDS_Options::get( 'contact', 'zip', '' );
$email    = WSUWP\Theme\WDS\WDS_Options::get( 'contact', 'email', '' );
$phone    = WSUWP\Theme\WDS\WDS_Options::get( 'contact', 'phone', '' );

$contact = '';

if ( ! empty( $name ) ) {

    $contact .= '<span class="wsu-meta-address__title">' . $name . '</span>';

}

if ( ! empty( $address1 || $address2 || $state ) ) {
    $contact .= ( ! empty( $contact ) ) ? ',' : ''; 
    $contact .= ' <span class="wsu-meta-address__address">';
    $contact .= ( ! empty( $address1 ) ) ? ' ' . $address1 : '';
    $contact .= ( ! empty( $address2 ) ) ? ' ' . $address2 : '';
    $contact .= ( ! empty( $city ) ) ? ' ' . $city : '';
    $contact .= '</span>';
}

if ( ! empty( $state || $zip ) ) {
    $contact .= ( ! empty( $contact ) ) ? ',' : '';
    $contact .= ' <span class="wsu-meta-address__city">';
    $contact .= ( ! empty( $state ) ) ? ' ' . $state : '';
    $contact .= ( ! empty( $zip ) ) ? ' ' . $zip : '';
    $contact .= '</span>';
}

if ( ! empty( $email || $phone  ) ) {
    $contact .= ( ! empty( $contact ) ) ? ',' : '';
    $contact .= ( ! empty( $phone ) ) ? ' <span class="wsu-meta-address__phone"><a href="tel:' . $phone . '">' . $phone . '</a></span>' : '';
    $contact .= ( ! empty( $email ) ) ? ' <span class="wsu-meta-address__email"><a href="mailto:' . $email . '">' . $email . '</a></span>' : '';
}

?>
<div class="wsu-meta-address">
        <?php echo wp_kses_post( $contact ); ?>
    </div>