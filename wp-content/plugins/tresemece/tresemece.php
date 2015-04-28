<?php

/**
 *
 * Plugin Name: Tresemece
 * Plugin URI: http://localhost
 * Description: Plugin demo
 * Version: 1.0
 * Author: Marco Montenegro
 * Author URI: http://localhost
 * License:  GPL2
 *
 **/

add_action( 'admin_menu', 'register_my_custom_menu_page' );
add_action( 'wp_head', 'add_ajax_library');
add_action('get_footer', 'mi_ajax');

function register_my_custom_menu_page() {
    add_menu_page( 'Tresemece', 'Tresemece', 'manage_options', 'tresemece/tresemece-admin.php', 'tresemece_settings_page', plugins_url( 'myplugin/images/icon.png' ), 98 );
    add_action( 'admin_init', 'register_mysettings' );
}

function register_mysettings() {
    register_setting( 'tresemece-settings-group', 'valor' );
}

function add_ajax_library() {
    $html = '<script type="text/javascript">';
    $html .= 'var ajaxurl = "' . admin_url( 'admin-ajax.php' ) . '"';
    $html .= '</script>';
    echo $html;
}

function mi_ajax() { 
    $pluginDirectory = plugins_url() .'/'. basename(dirname(__FILE__));
    wp_enqueue_script("tresemece-ajax", $pluginDirectory . '/tresemece-ajax.js');
}

add_action('wp_ajax_get_data', 'get_data');

function get_data() {
    global $wpdb; // this is how you get access to the database
    $cool_options = get_option('valor');
    echo $cool_options;
    die(); // this is required to return a proper result
}

function tresemece_settings_page() {
?>
<div class="wrap">
    <h2>Tresemece Plugin</h2>
    <form method="post" action="options.php">
        <?php settings_fields( 'tresemece-settings-group' ); ?>
        <?php do_settings_sections( 'tresemece-settings-group' ); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Valor</th>
                <td><input type="text" name="valor" value="<?php echo esc_attr( get_option('valor') ); ?>" /></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>
<?php } ?>