<?php 

function afcdesign_widget_banner() { register_widget( 'afcwd_banner' ); }
class afcwd_banner extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'afcwd_banner', 'description' => 'Inserção de imagem ou html de anúncio' );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'afcwd_banner' );
		parent::__construct( 'afcwd_banner', __('afc &hearts; Banners / Imagens', 'afcwd_banner'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$imagem = $instance['imagem'];
		$url = $instance['url'];
		$alt = $instance['alt'];
		$tblank = $instance['tblank'];
		$nofollow = $instance['nofollow'];
		$bannerhtml = $instance['bannerhtml'];

		$before_widget = str_replace( '<aside class="afcwd default ', '<aside class="afcwd ', $before_widget );
		echo $before_widget;
			if (! $bannerhtml) {
				if($url) { 
					echo '<a href="'.$url.'"'; 
						if($tblank) { echo ' target="_blank"'; }
						if($nofollow) { echo ' rel="nofollow"'; }
					echo '>';
				}
				echo '<img src="'.esc_url($imagem).'"'; 
					if($alt) { echo ' alt="'.$alt.'"'; }
				echo '>';

				if($url) { echo '</a>'; }

			} else {
				echo $bannerhtml; 
			}
		echo $after_widget;
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['imagem'] = ( ! empty( $new_instance['imagem'] ) ) ? $new_instance['imagem'] : '';
		$instance['url'] = strip_tags( $new_instance['url'] );
		$instance['alt'] = strip_tags( $new_instance['alt'] );
		$instance['tblank'] = isset($new_instance['tblank']) ? 1 : 0;
		$instance['nofollow'] = isset($new_instance['nofollow']) ? 1 : 0;
		$instance['bannerhtml'] = $new_instance['bannerhtml'];


		return $instance;
	}


	function form( $instance ) {

		$defaults = array( 
			'url' => '',
			'alt' => '',
			'bannerhtml' => '',
			'tblank' => 0,
			'nofollow' => 0,
			'fixar' => 0
		);
		$imagem = ! empty( $instance['imagem'] ) ? $instance['imagem'] : '';
		$instance = wp_parse_args( (array) $instance, $defaults );

	?>

		<h4>Adicionar banner em HTML incorporado</h4>
		<p>
			<textarea id="<?php echo $this->get_field_id( 'bannerhtml' ); ?>" name="<?php echo $this->get_field_name( 'bannerhtml' ); ?>" class="widefat" rows="6"><?php echo $instance['bannerhtml']; ?></textarea> <br>
			<small>Ideal para Adsense e conteúdo em script.</small>
		</p>

		<hr>

		<h4>Ou banner em imagem</h4>
	   	<p>
	      <input type="text" id="<?php echo $this->get_field_id( 'imagem' ); ?>" name="<?php echo $this->get_field_name( 'imagem' ); ?>" type="text" value="<?php echo esc_url( $imagem ); ?>" style="width:calc(100% - 70px);" />
	      <button class="upload_image_button button button-primary" style="margin-top: 2px; width: 65px; display: block; float: right;">Upload</button><br>
	      <small></small>
	   	</p>

	    <?php
	        if ( $instance['imagem'] ) :
	        	echo '<p><img src="'.$instance['imagem'].'" style="margin:0;padding:0;max-width:250px; height: auto;display:block" /></p>';
	        endif;
	    ?>   

		<p>
			<label for="<?php echo $this->get_field_id( 'alt' ); ?>">Texto alternativo:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'alt' ); ?>" name="<?php echo $this->get_field_name( 'alt' ); ?>" value="<?php echo $instance['alt']; ?>" class="widefat" />
		</p>

	    <p>
			<label for="<?php echo $this->get_field_id( 'url' ); ?>">Link de destino:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" value="<?php echo $instance['url']; ?>" class="widefat" /> <br>
			<small><strong>Ex:</strong> <u>https://meulinkdedestino.com</u></small>
		</p>

		<p>
	        <input class="checkbox" id="<?php echo $this->get_field_id( 'tblank' ); ?>" name="<?php echo $this->get_field_name( 'tblank' ); ?>" type="checkbox" <?php checked( $instance['tblank'], 1 ); ?>> 
	        <label for="<?php echo $this->get_field_id( 'tblank' ); ?>">Abrir link em nova página</label>
	    </p>

	    <p>
	        <input class="checkbox" id="<?php echo $this->get_field_id( 'nofollow' ); ?>" name="<?php echo $this->get_field_name( 'nofollow' ); ?>" type="checkbox" <?php checked( $instance['nofollow'], 1 ); ?>> 
	        <label for="<?php echo $this->get_field_id( 'nofollow' ); ?>">Atribuir rel="nofollow"</label>
	    </p>

	   	<?php
	}
}
add_action( 'widgets_init', 'afcdesign_widget_banner' );