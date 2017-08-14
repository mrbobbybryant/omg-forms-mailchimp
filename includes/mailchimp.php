<?php
namespace OMGForms\Mailchimp\API;

function save_form_as_mailchimp( $args, $form ) {
	$test = 0;
}

add_action( 'omg_forms_save_data', __NAMESPACE__ .  '\save_form_as_mailchimp', 10, 2 );