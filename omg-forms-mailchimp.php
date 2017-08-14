<?php

if ( !defined( 'OMG_FORMS_MAILCHIMP_DIR' ) ) {
	define( 'OMG_FORMS_MAILCHIMP_DIR', dirname( __FILE__ ) );
}

if ( !defined( 'OMG_FORMS_MAILCHIMP_FILE' ) ) {
	define( 'OMG_FORMS_MAILCHIMP_FILE', __FILE__ );
}

if ( file_exists( OMG_FORMS_MAILCHIMP_DIR . '/vendor' ) ) {
	require __DIR__ . '/vendor/autoload.php';
}

require_once OMG_FORMS_MAILCHIMP_DIR . '/includes/mailchimp.php';
require_once OMG_FORMS_MAILCHIMP_DIR . '/includes/validation.php';
require_once OMG_FORMS_MAILCHIMP_DIR . '/includes/helpers.php';