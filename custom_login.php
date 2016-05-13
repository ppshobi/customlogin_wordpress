<?php
/**
 * Plugin Name: Wordpress Custom Logins
 * Plugin URI: https://github.com/ppshobi/customlogin_wordpress
 * Description: A wordpress plugin allows users to customize the login process and front end.
 * Version: 0.0.1
 * Author: Shobi P P
 * Author URI: https://github.com/ppshobi
 * License: GPL2
 */

add_action('admin_menu', 'wcl_dashboard_menu');

function wcl_dashboard_menu() {
	add_menu_page( 'Wordpress Custom Login', 'WP Custom Login', 'administrator', 'wcl-wp-login.php', 'wcl_blog_protection_dashboard', 'dashicons-admin-tools'  );
}

// add_filter('login_errors','wcl_login_error_message');

// function wlc_login_error_message( $error ){
//     $error = "Incorrect login information, stay out!";
//     return $error;
// }

?>