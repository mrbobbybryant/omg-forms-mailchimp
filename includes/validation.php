<?php
namespace OMGForms\Mailchimp\Validation;

use OMGForms\Mailchimp\Helpers;
function valid_mailchimp_forms( $args ) {
	if ( isset( $args[ 'form_type' ] ) && 'mailchimp' === $args[ 'form_type' ] ) {
		if ( ! isset( $args[ 'list_id' ] ) ) {
			throw new \Exception( 'Mailchimp forms must have a list_id set for this to be a valid form.' );
		}

		$email = Helpers\get_email_address( $args );

		if ( empty( $email ) ) {
			throw new \Exception( 'Mailchimp forms must have an email field to be a valid form.' );
		}
	}
}
add_action( 'omg_form_validation', __NAMESPACE__ . '\valid_mailchimp_forms' );