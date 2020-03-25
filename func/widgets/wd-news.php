<?php 

if( function_exists( 'mc4wp_show_form' ) ) {
	function afcdesign_widget_news() { register_widget( 'afcwd_news' ); }
	class afcwd_news extends WP_Widget {

		function __construct() {
			$widget_ops = array( 'classname' => 'afcwd_news', 'description' => 'Assinaturas por e-mail' );
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'afcwd_news' );
			parent::__construct( 'afcwd_news', __('afc &hearts; Newsletter'), $widget_ops, $control_ops );
		}

		function widget( $args, $instance ) {
			extract( $args );

			$before_widget = str_replace( '<aside class="afcwd default ', '<aside class="afcwd ', $before_widget );
			
			echo $before_widget;
				get_template_part('inc/news');
			echo $after_widget;
		}


		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			return $instance;
		}


		function form( $instance ) {

			$defaults = array( 
			);
			$instance = wp_parse_args( (array) $instance, $defaults );

		?>
			<p>Só arrastar e ativar!</p>

		   	<?php
		}
	}
	add_action( 'widgets_init', 'afcdesign_widget_news' );
}
