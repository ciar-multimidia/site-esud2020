<?php

function afcdesign_widget_categorias() { register_widget( 'afcwd_categorias' ); }
class afcwd_categorias extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'afcwd_categorias', 'description' => 'Liste suas categorias preferidas' );
		$control_ops = array( 'width' => 385, 'height' => 350, 'id_base' => 'afcwd_categorias' );
		parent::__construct( 'afcwd_categorias', __('afc &hearts; Categorias'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$categoriesList = maybe_unserialize($instance['categories']);

		echo $before_widget;
			if ($title) { echo $before_title . $title . $after_title; }

			echo '<div class="textwidget"><ul>';
				ciar_categorias_selecionadas($categoriesList);
			echo '</ul></div>';

		echo $after_widget;
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['categories'] = $new_instance['categories'];


		return $instance;
	}


	function form( $instance ) {

		$defaults = array( 
			'title' => ''
		);

		$catArgs = array(
			'type'                     => 'post',
			'child_of'                 => 0,
			'orderby'                  => 'name',
			'order'                    => 'ASC',
			'hide_empty'               => 1,
			'hierarchical'             => 1,
			'taxonomy'                 => 'category',
			'pad_counts'               => false 
		);
		$categories = get_categories($catArgs);
		$selectedCat = maybe_unserialize( $instance['categories'] );

		$instance = wp_parse_args( (array) $instance, $defaults );

	?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Título widget</label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
        </p>

		<p>
			<label for="<?php echo $this->get_field_id( 'categories' ); ?>">Escolha as categorias</label> <br>
			<?php
			echo '<ul class="cat-checklist category-checklist" style="padding:5px;">';
				foreach($categories as $category) {
					$checked = '';

					if( is_array($selectedCat) ) 
					if( in_array($category->term_id, $selectedCat) ) { $checked = 'checked="true"'; } else { $checked = ''; }
					echo '<li class="selectit">';
						echo '<input type="checkbox" name="'.$this->get_field_name( 'categories' ).'[]" id="cat-'.$category->term_id.'" value="'.$category->term_id.'" '.$checked.' />';
						echo '<label for="cat-'.$category->term_id.'">'.$category->name.'</label>';
					echo '</li>';
				}
			echo '</ul>';
			?> <br>
			<small><strong>Obs:</strong> Só são listadas categorias das quais já possuem conteúdo escrito.</small>
		</p>

	<?php
	}
}
add_action( 'widgets_init', 'afcdesign_widget_categorias' );

function ciar_categorias_selecionadas($categoriesList) {
	if( is_array($categoriesList) ) {
		$categoriesListString = implode(', ', $categoriesList);
		$catArgs = array(
			'orderby'            => 'count',
			'order'              => 'DESC',
			'style'              => 'list',
			'show_count'         => 0,
			'hide_empty'         => 1,
			'use_desc_for_title' => 1,
			'child_of'           => 0,
			'include'            => $categoriesListString,
			'hierarchical'       => 0,
			'title_li'           => ''
    );
	    wp_list_categories( $catArgs );
	} else { return; }
}