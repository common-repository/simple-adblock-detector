<?php
/*	
 * Plugin Name: Simple AdBlock Detector
 * Plugin URI: https://www.ajarouih.me/simple-adblock-detector
 * Description: This is an all types AdBlock detector plugin for WordPress websites. Start saving your ads money by informing users to whitelist your website.
 * Version: 1.0
 * Author: Aymen Jarouih
 * Author URI: https://www.ajarouih.me/
 * Requires PHP: 5.6
 * Requires at least: 3.0
 * Tested up to: 5.5
*/


	require 'sad_functions.php';
	require 'sad_options.php';

	function sad_footer() {	
		echo "<script>
		SadDetect('". str_replace("'", "\'",get_option( 'sad_post_title' ))."', '".str_replace("'", "\'",get_option( 'sad_post_description' ))."',' ".str_replace("'", "\'",get_option( 'sad_post_animation' ))."','".get_option( 'sad_post_devtools' )."')
		</script>";
	}
	add_action('wp_footer', 'sad_footer');


	function sad_head() {
		wp_register_script( 'sad-js', plugins_url( '/js/sad.min.js', __FILE__ ), '', '', false);
		wp_register_style('sad-style', plugins_url( '/css/sad.min.css', __FILE__ ), '', null, 'all' );
		wp_register_style('sad-animate', plugins_url( '/css/animate.min.css', __FILE__ ), '', null, 'all' );
		wp_enqueue_style( 'sad-style' );
		wp_enqueue_style('sad-animate');
		wp_enqueue_script( 'sad-js' );
		
	}
	add_action('wp_enqueue_scripts', 'sad_head');
?>