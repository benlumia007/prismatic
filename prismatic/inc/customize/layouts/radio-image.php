<?php

add_action( 'customize_register', 'prismatic_radio_image_control' );

function prismatic_radio_image_control() {
	class Prismatic_Radio_Image_Control extends WP_Customize_Control {

		/**
		 * The type of customize control being rendered.
		 *
		 * @access public
		 * @since  1.0.0
		 * @var    string
		 */
		public $type = 'prismatic-radio-image';

		/**`
		 * Loads the template
		 *
		 * @return void
		 */
		protected function render_content() {
			if ( empty( $this->choices ) ) {
				return;
			}

			$name = '_customize-radio-' . $this->id;
			?>
			<span class="customize-control-title">
			<?php echo esc_attr( $this->label ); ?>
		</span>
			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>

			<div id="input_<?php echo esc_attr( $this->id ); ?>" class="image">
				<?php foreach ( $this->choices as $value => $label ) : ?>
					<label for="<?php echo esc_attr( $this->id . '_' . $value ); ?>">
						<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id . '_' . $value ); ?>" name="<?php echo esc_attr( $name ); ?>"
							<?php
							esc_attr( $this->link() );
							checked( $this->value(), esc_attr( $value ) );
							?>
						>
						<img src="<?php echo esc_url( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
					</label>
					</input>
				<?php endforeach; ?>
			</div>
			<?php
		}
	}
}
