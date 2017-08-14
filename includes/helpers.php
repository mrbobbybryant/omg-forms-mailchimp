<?php
namespace OMGForms\Mailchimp\Helpers;

function get_email_address( $form ) {
	$field = array_values( array_filter( $form['fields'], function( $field ) {
		if ( 'email' === $field[ 'type' ] ) {
			return $field;
		}
	} ) );

	return ( ! empty( $field ) ) ? $field[0] : false;
}