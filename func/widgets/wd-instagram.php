<?php
function afcdesign_widget_insta() { register_widget( 'afcwd_insta' ); }
class afcwd_insta extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'afcwd_insta', 'description' => 'Mostrar feed do insta' );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'afcwd_insta' );
		parent::__construct( 'afcwd_insta', __('afc &hearts; Instagram', 'afcwd_insta'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		$codigo = $instance['codigo'];
		$shortcode = $instance['shortcode'];
		$instagram = $instance['instagram'];
		
		echo $before_widget;
			if ($title) { echo $before_title . $title . $after_title; }

					echo '<div class="textwidget">';
					
						if ($codigo) { echo $codigo; } elseif($shortcode) { echo do_shortcode($shortcode); }

					echo '</div>';

					if($instagram) { echo '<div class="inscrever"><a href="https://instagram.com/'.$instagram.'">seguir <span>@'.$instagram.'</span></a></div>'; }

		echo $after_widget;
		
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['codigo'] = $new_instance['codigo'];
		$instance['shortcode'] = $new_instance['shortcode'];
		$instance['instagram'] = $new_instance['instagram'];
		return $instance;
	}
	function form( $instance ) {
		$defaults = array( 
			'title' => '',
			'codigo' => '',
			'shortcode' => '',
			'instagram' => ''
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>Dica: Construa o feed do seu instagram no <a href="https://snapwidget.com/" target="_blank" rel="nofollow">Snap Widget</a> e insira o código gerado no campo indicado, ou utilize um plugin e insira o seu shortcode.</p>

		<p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Titulo widget</label>
            <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
        </p>


		<p>
			<label for="<?php echo $this->get_field_id( 'codigo' ); ?>">Código incorporação de HTML</label>
			<textarea id="<?php echo $this->get_field_id( 'codigo' ); ?>" name="<?php echo $this->get_field_name( 'codigo' ); ?>" class="widefat" rows="6"><?php echo $instance['codigo']; ?></textarea>
		</p> 

		<p>ou</p>

		<p>
            <label for="<?php echo $this->get_field_id( 'shortcode' ); ?>">Shortcode de plugin</label>
            <input type="text" id="<?php echo $this->get_field_id( 'shortcode' ); ?>" name="<?php echo $this->get_field_name( 'shortcode' ); ?>" value="<?php echo $instance['shortcode']; ?>" class="widefat" />
        </p>       

        <p style="clear:both;">
            <label for="<?php echo $this->get_field_id( 'instagram' ); ?>">username do instagram</label>
            <input type="text" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" placeholder="seu @" value="<?php echo $instance['instagram']; ?>" class="widefat" /> <br>
            <small style="word-break: break-all;"><strong>Ex:</strong> instagram.com/<u><strong>username</strong></u></small>
        </p>


	<?php
	}
}
add_action( 'widgets_init', 'afcdesign_widget_insta' );