<?php
/*
Plugin Name: Custom Post Widget
Plugin URI:  
Description: Widget where you can set your 3 favourite posts for your sidebar
Version:     1.0.0
Author:      Josemi Calvo
Author URI:  https://josemicalvo.com/
Text Domain: cpw
Domain Path: 
License:     GPL2
 
Custom Post Widget is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Custom Post Widget is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Custom Post Widget.

*/

class Custom_Post_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'custom_post_widget',
			__('Custom Post Widget', 'text_domain'),
			array(
				'customize_selective_refresh' => true,
			)
		)
	}

	public function form( $instance ) {
		$defaults = array(
			'title'
			'select_first'	=> '',
			'select_second'	=> '02',
			'select_third'	=> '03'
		);

		extract( wp_parse_args( ( array ) $instance, $defaults ) ); 

		// Widget Title

		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php _e( 'Widget Title', 'text_domain' ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<?php
	}
}

function reguster_custom_posts_in_widget() {
	register_widget( 'Custom_Post_Widget' );
}

add_action( 'widgets_init', 'register_custom_posts_in_widget' );
