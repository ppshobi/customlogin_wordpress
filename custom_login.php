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

//color picker for admin area
function color_picker_assets($hook_suffix) {
    // $hook_suffix to apply a check for admin page.
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('js/wcl-admin.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}
add_action( 'admin_enqueue_scripts', 'color_picker_assets' );



//Loading the custom css file for the login page

add_action( 'login_enqueue_scripts', 'wcl_login_css' );

function wcl_login_css(){ 
 	wp_register_style( 'wcl_login_css',  plugin_dir_url( __FILE__ ) . 'css/wcl-wp-login.css' );
   	wp_enqueue_style('wcl_login_css');
} 

/* end of loading custom files */

//adding menu item for the plugin page
add_action('admin_menu', 'wcl_dashboard_menu');

function wcl_dashboard_menu() {
	add_menu_page( 'Wordpress Custom Login', 'WP Custom Login', 'administrator', 'wcl-wp-login.php', 'wcl_main_dashboard', 'dashicons-admin-tools'  );
}

function wcl_main_dashboard(){
	if (isset($_POST['submit'])) {
		$bgcolor=$_POST['color'];
		if ($bgcolor) {
			echo $bgcolor;
		}
	}
	echo "<div>";
	echo "<h1>Wordpress Custom Login Dashboard</h1>";
	echo "</div>";
	echo "<div class=\"wrap\">";
	echo "<form action=\"\" method=\"POST\">";
	echo "<label for=\"background\">Background Color</label>:"."<input type=\"text\" class=\"wcl-bg-color\" value=\"#e9e9e9\" name=\"color\" \/>";
	echo "<input type=\"submit\" name=\"submit\" value=\"Save\">";
	echo "</form>";
	echo "</div>";
	return true;
}


function change_color($color){

	var_dump(add_option( 'backgroundcolor', $color));
}




// add_filter('login_errors','wcl_login_error_message');

// function wlc_login_error_message( $error ){
//     $error = "Incorrect login information, stay out!";
//     return $error;
// }

?>