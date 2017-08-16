<?php
namespace OMGForms\Mailchimp\Settings;

function setup() {
	add_action( 'omg-form-settings-hook', __NAMESPACE__ . '\register_form_settings' );
	add_action( 'admin_init', __NAMESPACE__ . '\display_mailchimp_setting_fields' );
}

function display_mailchimp_setting_fields() {
	add_settings_section( 'section', esc_html__( 'Mailchimp Settings' ), null, 'mailchimp_options' );

	add_settings_field(
		'mailchimp_api_key',
		'Mailchimp API Key',
		__NAMESPACE__ . '\display_mailchimp_key_element',
		'mailchimp_options',
		'section'
	);

	register_setting( 'mailchimp-section', 'mailchimp_api_key' );

}

function display_mailchimp_key_element() {
	?>
	<input
		type="text"
		size="55"
		name="mailchimp_api_key"
		value="<?php echo get_option( 'mailchimp_api_key' ); ?>"
	/>
	<?php
}

function register_form_settings() {
	settings_fields( 'mailchimp-section' );
	do_settings_sections( 'mailchimp_options' );
}