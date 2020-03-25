<?php

function afcdesign_widget_perfil() { register_widget( 'afcwd_perfil' ); }
class afcwd_perfil extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'afcwd_perfil', 'description' => 'Sobre vocês' );
		$control_ops = array( 'width' => 385, 'height' => 350, 'id_base' => 'afcwd_perfil' );
		parent::__construct( 'afcwd_perfil', __('afc &hearts; Perfil'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$imagem = $instance['imagem'];
		$descricao = $instance['descricao'];
		$linksobre = $instance['linksobre'];
		$mostraredes = $instance['mostraredes'];

		$before_widget = str_replace( '<aside class="afcwd default ', '<aside itemscope itemprop="author" itemtype="http://schema.org/Person" class="afcwd ', $before_widget );

		echo $before_widget;

					echo '<div class="area-imagem">';
						echo '<h2 class="chamada" itemprop="name">' . $title . '</h2>'; 
						if ($linksobre) {
							echo '<a href="'.$linksobre.'" class="link">saiba <strong>. mais</strong> <i class="far fa-long-arrow-right"></i></a>';
						}
						echo '<figure style="background-image: url('.esc_url($imagem).');">';
							echo '<img itemprop="image" src="'.esc_url($imagem).'" data-pin-nopin="true">';
						echo '</figure>';
					echo '</div>';

					echo '<div class="descricao">';
						if($mostraredes) {  get_template_part('inc/redes-sociais'); } 
						if($descricao) { echo '<div class="textwidget" itemprop="disambiguatingDescription">' . wp_kses_post($descricao) . '</div>'; }
					echo '</div>';

		echo $after_widget;
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['imagem'] = ( ! empty( $new_instance['imagem'] ) ) ? $new_instance['imagem'] : '';
		$instance['descricao'] = $new_instance['descricao'];
		$instance['linksobre'] = $new_instance['linksobre'];
		$instance['mostraredes'] = isset($new_instance['mostraredes']) ? 1 : 0;

		return $instance;
	}


	function form( $instance ) {

		$defaults = array( 
			'title' => '', 
			'descricao' => '',
			'linksobre' => '',
			'mostraredes' => 0
		);

		$imagem = ! empty( $instance['imagem'] ) ? $instance['imagem'] : '';
		$instance = wp_parse_args( (array) $instance, $defaults );

	?>
		<p>Certifique-se de preencher todos os campos com <span style="color:red">*</span></p>

		<h4>Imagem de perfil <span style="color:red">*</span></h4>
	   	<p>
	      <input type="text" id="<?php echo $this->get_field_id( 'imagem' ); ?>" name="<?php echo $this->get_field_name( 'imagem' ); ?>" type="text" value="<?php echo esc_url( $imagem ); ?>" style="width:calc(100% - 70px);" />
	      <button class="upload_image_button button button-primary" style="margin-top: 2px; width: 65px; display: block; float: right;">Upload</button><br>
	      <small></small>
	   	</p>

	    <?php
	        if ( $instance['imagem'] == true ) :
	        	echo '<p><img src="'.$instance['imagem'].'" style="margin:0;padding:0;max-width:250px; height: auto;display:block" /></p>';
	        endif;
	    ?>   

		<p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Nomes <span style="color:red">*</span></label>
            <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
        </p>

		<p>
			<label for="<?php echo $this->get_field_id( 'descricao' ); ?>">Descrição <span style="color:red">*</span></label>
			<textarea id="<?php echo $this->get_field_id( 'descricao' ); ?>" name="<?php echo $this->get_field_name( 'descricao' ); ?>" class="widefat" rows="6"><?php echo $instance['descricao']; ?></textarea>
		</p>

	    <p style="line-height: 1.7">
	        <input id="<?php echo $this->get_field_id( 'mostraredes' ); ?>" name="<?php echo $this->get_field_name( 'mostraredes' ); ?>" type="checkbox" <?php checked( $instance['mostraredes'], 1 ); ?>> 
	        <label>Mostrar redes sociais</label>
	    </p>


	    <p>
            <label for="<?php echo $this->get_field_id( 'linksobre' ); ?>">Link de página "Sobre"</label>
            <input type="text" id="<?php echo $this->get_field_id( 'linksobre' ); ?>" name="<?php echo $this->get_field_name( 'linksobre' ); ?>" value="<?php echo $instance['linksobre']; ?>" class="widefat" />
        </p>


	<?php
	}
}
add_action( 'widgets_init', 'afcdesign_widget_perfil' );