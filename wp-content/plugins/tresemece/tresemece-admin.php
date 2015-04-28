<?php

print("asasasas");

//call register settings function
add_action( 'admin_init', 'register_mysettings' );

function register_mysettings() {
	//register our settings
	register_setting( 'baw-settings-group', 'new_option_name' );
	register_setting( 'baw-settings-group', 'some_other_option' );
	register_setting( 'baw-settings-group', 'option_etc' );
}

function baw_settings_page() {
    print("ioioioio");
}

?>
