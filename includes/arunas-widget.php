<?php 
// valdiklio klasė
class Arunas_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
      		// Valdiklio ID.
			'arunas_widget', 
      		// Valdiklio pavadinimas, matomas WP Admin.
			__('Arūnas Widget', 'goodolstory'), 
      		// Valdiklio aprašymas.
			array( 
				'description' => __( 'Pavyzdinis valdiklis', 'goodolstory' ), 
				)
			);
	}

// Valdiklio išvestis - kas matoma lankytojui frontende. 
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$description = $instance['description'];
		$image = $instance['image'];
		echo $args['before_widget'];
		?>
		<a href="<?php echo $image; ?>" class="image">
			<img src="<?php echo $image; ?>" alt="" />
		</a>
		<div class="caption">
			<?php echo $args['before_title'] . $title . $args['after_title']; ?>
			<p><?php echo $description; ?></p>
			<ul class="actions">
				<li><span class="button small"><?php _e( 'Details', 'goodolstory' ); ?></span></li>
			</ul>
		</div>
		<?php
		echo $args['after_widget'];
	}

  // Valdiklio nustatymų forma.
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'New title', 'goodolstory' );
		}
		echo '<p>';
		echo '<label for="' . $this->get_field_id( 'title' ) . '">' . __( 'Title:', 'goodolstory' ) . '</label>';
		echo '<input class="widefat" id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" type="text" value="' . esc_attr( $title ) . '" />';
		echo '</p>';
		echo '<p>';

		if ( isset( $instance[ 'description' ] ) ) {
			$description = $instance[ 'description' ];
		} else {
			$description = __( 'New description', 'goodolstory' );
		}

		echo '<label for="' . $this->get_field_id( 'description' ) . '">' . __( 'Description:', 'goodolstory' ) . '</label>';
		echo '<input class="widefat" id="' . $this->get_field_id( 'description' ) . '" name="' . $this->get_field_name( 'description' ) . '" type="text" value="' . esc_attr( $description ) . '" />';
		echo '</p>';

		if ( isset( $instance[ 'image' ] ) ) {
			$image = $instance[ 'image' ];
		} else {
			$image = 'http://localhost/wp/wp-content/uploads/2017/12/spotlight03.jpg';
		}

		echo '<label for="' . $this->get_field_id( 'image' ) . '">' . __( 'Image:', 'goodolstory' ) . '</label>';
		echo '<input class="widefat" id="' . $this->get_field_id( 'image' ) . '" name="' . $this->get_field_name( 'image' ) . '" type="text" value="' . esc_attr( $image ) . '" />';
		echo '</p>';
	}

  // Valdiklio nustatymų išsaugojimas
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
		$instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
		return $instance;
	}
}