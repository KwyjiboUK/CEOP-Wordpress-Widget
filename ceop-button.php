<?php
/*
Plugin Name: CEOP Safety Centre Button
Description: Add a CEOP Saftey Centre button via the [ceop-button] shortcode or as a widget
Version:     0.2
Author:      EiS Kent
Author URI:  http://www.eiskent.co.uk
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: ceop-button
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class Ceop_Button_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'ceop_widget', // Base ID
			__( 'CEOP Safety Centre', 'ceop-button' ), // Name
			array( 'description' => __( 'CEOP Button linking to the Safety Centre', 'ceop-button' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		
		echo __( '<a href="https://www.ceop.police.uk/safety-centre" title="Click to visit the CEOP Safety Centre" target="_blank"><img src="' . plugins_url( 'images/blue_large_final_click_ceop.gif', __FILE__ ) . '" alt="Click CEOP - CEOP&apos;s Safety Centre"/></a>', 'ceop-button' );
		
	}

} // class Ceop_Widget
 
// register Ceop_Widget widget
function register_ceop_button_widget() {
    register_widget( 'Ceop_Button_Widget' );
}

add_action( 'widgets_init', 'register_ceop_button_widget' );

// define short code action 
function ceop_button_shortcode() {
	return '<a href="https://www.ceop.police.uk/safety-centre" title="Click to visit the CEOP Safety Centre" target="_blank"><img src="' . plugins_url( 'images/blue_large_final_click_ceop.gif', __FILE__ ) . '" alt="Click CEOP - CEOP&apos;s Safety Centre"/></a>';
}

// register [ceop-button] shortcode
function ceop_button_register_shortcode() {
	add_shortcode('ceop-button', 'ceop_button_shortcode');
}

add_action('init', 'ceop_button_register_shortcode' );