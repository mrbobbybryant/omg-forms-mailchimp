<?php
namespace OMGForms\Mailchimp\API;

use \DrewM\MailChimp\MailChimp;
use OMGForms\Mailchimp\Helpers;

function save_form_as_mailchimp( $args, $form ) {

	if ( $form[ 'form_type' ] === 'mailchimp' ) {
		$MailChimp = new MailChimp( get_option( 'mailchimp_api_key' ) );

		$data = Helpers\prepare_mailchimp_form_fields( $args );
		$data[ 'status' ] = 'subscribed';

		if ( isset( $form[ 'segment_id' ] ) ) {
			$data[ 'segments' ] = $form[ 'segment_id' ];
		}

		$result = $MailChimp->post( "lists/" . $form['list_id'] . "/members", $data );

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
