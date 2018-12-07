<?php
/*
  Plugin Name: Gestió de Socis
  Plugin URI: https://github.com/pitulari/mascas_socis
  Description: Gestió dels socis de la Masia Castelló. Permet fer el pagament de les cuotes anuals.
  Author: Josep Pujol
  Version: 1.0.0
  Text Domain: mascas
  Domain Path: /languages/
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $mascasDbVersion;
$mascasDbVersion = '1.0';

mascas_includes();

register_activation_hook( __FILE__, 'mascasInstall' );

//Load javascript
add_action("wp_enqueue_scripts", "add_mascas_js", 11);
function add_mascas_js(){
    // nos aseguramos que no estamos en el area de administracion
    if( !is_admin() ){
        wp_register_script('mascas-script', get_stylesheet_directory_uri() . '/mascas_socis/web/js/mascas_functions.js', array('jquery'), '1', true );
        wp_enqueue_script('mascas-script');
        wp_enqueue_script('money-format-script');

        // Get the protocol of the current page
       /* $protocol = isset( $_SERVER['HTTPS'] ) ? 'https://' : 'http://';
        $params = [
            // Get the url to the admin-ajax.php file using admin_url()
            'ajaxurl' => admin_url( 'admin-ajax.php', $protocol ),
            'postAjaxNonce' => wp_create_nonce('tarificador-ajax-call')
        ];
        wp_localize_script( 'tarificador-script', 'tarif_params', $params );*/
    }
}

add_shortcode('form_subscribe_member', ['SocisShortcodes', 'subscriptionForm']);



function mascasInstall()
{
    global $wpdb;
    global $mascasDbVersion;

    $socisInitModule = new SocisInit($wpdb);
    $socisInitModule->createDatabaseTables();

    add_option( 'mascas_db_version', $mascasDbVersion );
}

function mascas_includes()
{
    require_once ('SocisInit.php');
    require_once ('web/mascas_shortcodes.php');
}