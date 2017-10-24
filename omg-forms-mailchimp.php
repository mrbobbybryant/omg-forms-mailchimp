<?php

if ( !defined( 'OMG_FORMS_MAILCHIMP_DIR' ) ) {
	define( 'OMG_FORMS_MAILCHIMP_DIR', dirname( __FILE__ ) );
}

if ( !defined( 'OMG_FORMS_MAILCHIMP_FILE' ) ) {
	define( 'OMG_FORMS_MAILCHIMP_FILE', __FILE__ );
}

require_once OMG_FORMS_MAILCHIMP_DIR . '/includes/mailchimp.php';
require_once OMG_FORMS_MAILCHIMP_DIR . '/includes/validation.php';
require_once OMG_FORMS_MAILCHIMP_DIR . '/includes/helpers.php';
require_once OMG_FORMS_MAILCHIMP_DIR . '/includes/settings.php';

\OMGForms\Mailchimp\Settings\setup();
