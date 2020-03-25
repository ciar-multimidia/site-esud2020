<?php

function afcdesign_widget_seguir() { register_widget( 'afcwd_seguir' ); }
class afcwd_seguir extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'seguir', 'description' => 'Caixas de seguir/curtir do Facebook' );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'afcwd_seguir' );
		parent::__construct( 'afcwd_seguir', __('afc &hearts; Seguir blog', 'afcwd_seguir'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$fanpage = $instance['fanpage'];
		$fanpagerostos = $instance['fanpagerostos'];
		$fanpagetimeline = $instance['fanpagetimeline'];
		$fanpageheader = $instance['fanpageheader'];
		$blovin = $instance['blovin'];
		$blovinct = $instance['blovinct'];

		$before_widget = str_replace( '<aside class="afcwd default ', '<aside class="afcwd ', $before_widget );
		
		echo $before_widget;
				if ($fanpage){
					echo '<div class="fb-page" data-href="https://www.facebook.com/'.$fanpage.'/"';
						if($fanpagerostos){ echo ' data-show-facepile="true"'; } else { echo ' data-show-facepile="false"'; }
						if($fanpagetimeline){ echo ' data-tabs="timeline"'; }
						if($fanpageheader){ echo ' data-small-header="true"'; } else { echo ' data-small-header="false"'; }
					echo ' data-adapt-container-width="true" data-hide-cover="false"></div>';
				}
				if ($blovin){
					echo '<div style="margin-top: 15px; text-align: center">';
						echo '<a class="blsdk-follow" href="'.$blovin.'" target="_blank" data-blsdk-type="button"';
						if( ! $blovinct) {echo ' data-blsdk-counter="false"'; }
						echo '>Follow me on Bloglovin</a><script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s);js.id = id;js.src = "https://www.bloglovin.com/widget/js/loader.js?v=1";fjs.parentNode.insertBefore(js, fjs);}(document, "script", "bloglovin-sdk"))</script>';
					echo '</div>';
				}

		echo $after_widget;
		
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['fanpage'] = strip_tags( $new_instance['fanpage'] );
		$instance['fanpagerostos'] = isset($new_instance['fanpagerostos']) ? 1 : 0;
		$instance['fanpagetimeline'] = isset($new_instance['fanpagetimeline']) ? 1 : 0;
		$instance['fanpageheader'] = isset($new_instance['fanpageheader']) ? 1 : 0;
		$instance['blovin'] = strip_tags( $new_instance['blovin'] );
		$instance['blovinct'] = isset($new_instance['blovinct']) ? 1 : 0;


		return $instance;
	}


	function form( $instance ) {

		$defaults = array( 
			'fanpage' => '',
			'fanpagerostos' => 0,
			'fanpagetimeline' => 0,
			'fanpageheader' => 0,
			'blovin' => '',
			'blovinct' => 0
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

	?>

		<h4>Facebook</h4>
		<p>
			<label for="<?php echo $this->get_field_id( 'fanpage' ); ?>">ID Página Facebook:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'fanpage' ); ?>" name="<?php echo $this->get_field_name( 'fanpage' ); ?>" value="<?php echo $instance['fanpage']; ?>" class="widefat" /> <br>
			<small><strong>Ex:</strong> Se sua página é <strong>facebook.com/<u>idfanpage</u></strong>, cadastre apenas <strong><u>idfanpage</u></strong> no campo acima</small>
		</p>

	    <p>
	        <input class="checkbox" id="<?php echo $this->get_field_id( 'fanpagerostos' ); ?>" name="<?php echo $this->get_field_name( 'fanpagerostos' ); ?>" type="checkbox" <?php checked( $instance['fanpagerostos'], 1 ); ?>> 
	        <label for="<?php echo $this->get_field_id( 'fanpagerostos' ); ?>">Mostrar rostos de amigos</label>
	    </p>	

	    <p>
	        <input class="checkbox" id="<?php echo $this->get_field_id( 'fanpagetimeline' ); ?>" name="<?php echo $this->get_field_name( 'fanpagetimeline' ); ?>" type="checkbox" <?php checked( $instance['fanpagetimeline'], 1 ); ?>> 
	        <label for="<?php echo $this->get_field_id( 'fanpagetimeline' ); ?>">Mostrar timeline</label>
	    </p>

	    <p>
	        <input class="checkbox" id="<?php echo $this->get_field_id( 'fanpageheader' ); ?>" name="<?php echo $this->get_field_name( 'fanpageheader' ); ?>" type="checkbox" <?php checked( $instance['fanpageheader'], 1 ); ?>> 
	        <label for="<?php echo $this->get_field_id( 'fanpageheader' ); ?>">Mostrar header menor</label>
	    </p>

	    <hr>

	    <h4>Bloglovin</h4>

	    <p>
			<label for="<?php echo $this->get_field_id( 'blovin' ); ?>">Perfil do blog no Bloglovin (url):</label>
			<input type="text" id="<?php echo $this->get_field_id( 'blovin' ); ?>" name="<?php echo $this->get_field_name( 'blovin' ); ?>" value="<?php echo $instance['blovin']; ?>" class="widefat" /> <br>
			<small><strong>Ex:</strong> <u>https://www.bloglovin.com/blogs/meublog</u></small>
		</p>

		<p>
	        <input class="checkbox" id="<?php echo $this->get_field_id( 'blovinct' ); ?>" name="<?php echo $this->get_field_name( 'blovinct' ); ?>" type="checkbox" <?php checked( $instance['blovinct'], 1 ); ?>> 
	        <label for="<?php echo $this->get_field_id( 'blovinct' ); ?>">Mostrar contador de seguidores</label>
	    </p>

	<?php
	}
}
add_action( 'widgets_init', 'afcdesign_widget_seguir' );
