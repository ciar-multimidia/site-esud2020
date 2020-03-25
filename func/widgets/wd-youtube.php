<?php
function afcdesign_widget_youtube() { register_widget( 'afcwd_youtube' ); }
class afcwd_youtube extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'afcwd_youtube', 'description' => 'Últimos vídeos publicados' );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'afcwd_youtube' );
		parent::__construct( 'afcwd_youtube', __('afc &hearts; Youtube', 'afcwd_youtube'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		$canal = $instance['canal'];
		$video1 = $instance['video1'];
		$video2 = $instance['video2'];
		
		echo $before_widget;
			if ($title) { echo $before_title . $title . $after_title; }

					echo '<div class="textwidget">';
					
					if ($video1) {
						echo '<div class="mostra-video" style="background-image: url(https://img.youtube.com/vi/'.$video1.'/mqdefault.jpg);">';
						  echo '<img src="' . $video1 . '" />';
						  echo '<a class="ver afczoom" href="https://www.youtube.com/watch?v=' . esc_attr($video1) . '" target="_blank"></a>';
						echo '</div>';
					} if ($video2) {
						echo '<div class="mostra-video" style="background-image: url(https://img.youtube.com/vi/'.$video2.'/mqdefault.jpg);">';
						  echo '<img src="' . $video2 . '" />';
						  echo '<a class="ver afczoom" href="https://www.youtube.com/watch?v=' . esc_attr($video2) . '" target="_blank"></a>';
						echo '</div>';	
					}

					echo '</div>';

					if($canal) { echo '<div class="inscrever"><script src="https://apis.google.com/js/platform.js"></script><div class="g-ytsubscribe" data-channelid="'.$canal.'" data-layout="default" data-count="default"></div></div>'; }

		echo $after_widget;
		
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['canal'] = $new_instance['canal'];
		$instance['video1'] = $new_instance['video1'];
		$instance['video2'] = $new_instance['video2'];
		return $instance;
	}
	function form( $instance ) {
		$defaults = array( 
			'title' => '',
			'canal' => '',
			'video1' => '',
			'video2' => ''
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Titulo widget</label>
            <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
        </p>

		<p style="width: 49%; float: left; margin-bottom: 0;">
            <label for="<?php echo $this->get_field_id( 'video1' ); ?>">ID Vídeo #1</label>
            <input type="text" id="<?php echo $this->get_field_id( 'video1' ); ?>" name="<?php echo $this->get_field_name( 'video1' ); ?>" value="<?php echo $instance['video1']; ?>" class="widefat" />
        </p>

        <p style="width: 49%; float: right; margin-bottom: 0;">
            <label for="<?php echo $this->get_field_id( 'video2' ); ?>">ID Vídeo #2</label>
            <input type="text" id="<?php echo $this->get_field_id( 'video2' ); ?>" name="<?php echo $this->get_field_name( 'video2' ); ?>" value="<?php echo $instance['video2']; ?>" class="widefat" />
        </p>

        <p style="margin-top: 0"><small>Ex: youtube.com/watch?v=<u><strong>HAy4IbyIzgE</strong></u></small></p>

        <p style="clear:both;">
            <label for="<?php echo $this->get_field_id( 'canal' ); ?>">ID do canal</label>
            <input type="text" id="<?php echo $this->get_field_id( 'canal' ); ?>" name="<?php echo $this->get_field_name( 'canal' ); ?>" value="<?php echo $instance['canal']; ?>" class="widefat" /> <br>
            <small style="word-break: break-all;"><strong>Ex:</strong> youtube.com/channel/<u><strong>ABCdefGhIjkLmnOpq123</strong></u></small>
        </p>


	<?php
	}
}
add_action( 'widgets_init', 'afcdesign_widget_youtube' );