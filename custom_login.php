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
	add_menu_page( 'Wordpress Custom Login', 'WP Custom Login', 'administrator', 'wcl-wp-login.php', 'wcl_main_dashboard', 'dashicons-admin-tools'  );
}

function wcl_main_dashboard(){
	if (isset($_POST['submit'])) {
		$color=$_POST['color'];
		if ($color) {
			if(change_color($color))
				echo "color changed";
			else
				echo "Color was not changed";
		}
	}else{
		echo "No hello";
	}
	echo "<div>";
	echo "<h1>Wordpress Custom Login Dashboard</h1>";
	echo "</div>";
	echo "<div class=\"wrap\">";
	echo "<form action=\"\" method=\"POST\">";
	echo "Background Color(use the hex)"."<input type=\"text\" name=\"color\" \/>";
	echo "<input type=\"submit\" name=\"submit\" value=\"Save\">";
	echo "</form>";
	echo "</div>";
	return true;
}


function change_color($color){
add_action( 'login_enqueue_scripts', 'wcl_login_css' );
return true;
}
function wcl_login_css($color){ 
    echo "<style type=\"text/css\">";
    echo "body .login {background-color:#ccc;}";   
    echo "</style>";
} 


// add_filter('login_errors','wcl_login_error_message');

// function wlc_login_error_message( $error ){
//     $error = "Incorrect login information, stay out!";
//     return $error;
// }

?>