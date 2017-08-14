<?php
namespace OMGForms\Mailchimp\API;

use \DrewM\MailChimp\MailChimp;
use OMGForms\Mailchimp\Helpers;

function save_form_as_mailchimp( $args, $form ) {

	if ( $form[ 'form_type' ] === 'mailchimp' ) {
		$MailChimp = new MailChimp('19600dbbc49817244068df5866c84daf-us16');

		$email = Helpers\get_email_address( $form );

		if ( empty( $email ) ) {
			return new \WP_Error(
				'omg_form_validation_fail',
				'Mailchimp forms must have an email field.',
				array( 'status' => 400 )
			);
		}

		$email_address = $args[ sprintf( 'omg-forms-%s', $email[ 'slug' ]  ) ];

		$result = $MailChimp->post("lists/" . $form['list_id'] . "/members", [
			'email_address' => $email_address,
			'status'        => 'subscribed',
		]);

		if ( isset( $result[ 'status' ] ) && 'subscribed' === $result[ 'status' ] ) {
			return true;
		} else {
			return new \WP_Error(
				'omg_form_mailchimp_fail',
				'Mailchimp submission Failed.',
				array( 'status' => 400, 'erorr' => $result )
			);
		}
	}
}

add_action( 'omg_forms_save_data', __NAMESPACE__ .  '\save_form_as_mailchimp', 10, 2 );
