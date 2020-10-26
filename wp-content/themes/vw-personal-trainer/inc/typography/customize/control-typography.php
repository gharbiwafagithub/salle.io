<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Personal_Trainer_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-personal-trainer' ),
				'family'      => esc_html__( 'Font Family', 'vw-personal-trainer' ),
				'size'        => esc_html__( 'Font Size',   'vw-personal-trainer' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-personal-trainer' ),
				'style'       => esc_html__( 'Font Style',  'vw-personal-trainer' ),
				'line_height' => esc_html__( 'Line Height', 'vw-personal-trainer' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-personal-trainer' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-personal-trainer-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-personal-trainer-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-personal-trainer' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-personal-trainer' ),
        'Acme' => __( 'Acme', 'vw-personal-trainer' ),
        'Anton' => __( 'Anton', 'vw-personal-trainer' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-personal-trainer' ),
        'Arimo' => __( 'Arimo', 'vw-personal-trainer' ),
        'Arsenal' => __( 'Arsenal', 'vw-personal-trainer' ),
        'Arvo' => __( 'Arvo', 'vw-personal-trainer' ),
        'Alegreya' => __( 'Alegreya', 'vw-personal-trainer' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-personal-trainer' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-personal-trainer' ),
        'Bangers' => __( 'Bangers', 'vw-personal-trainer' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-personal-trainer' ),
        'Bad Script' => __( 'Bad Script', 'vw-personal-trainer' ),
        'Bitter' => __( 'Bitter', 'vw-personal-trainer' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-personal-trainer' ),
        'BenchNine' => __( 'BenchNine', 'vw-personal-trainer' ),
        'Cabin' => __( 'Cabin', 'vw-personal-trainer' ),
        'Cardo' => __( 'Cardo', 'vw-personal-trainer' ),
        'Courgette' => __( 'Courgette', 'vw-personal-trainer' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-personal-trainer' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-personal-trainer' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-personal-trainer' ),
        'Cuprum' => __( 'Cuprum', 'vw-personal-trainer' ),
        'Cookie' => __( 'Cookie', 'vw-personal-trainer' ),
        'Chewy' => __( 'Chewy', 'vw-personal-trainer' ),
        'Days One' => __( 'Days One', 'vw-personal-trainer' ),
        'Dosis' => __( 'Dosis', 'vw-personal-trainer' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-personal-trainer' ),
        'Economica' => __( 'Economica', 'vw-personal-trainer' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-personal-trainer' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-personal-trainer' ),
        'Francois One' => __( 'Francois One', 'vw-personal-trainer' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-personal-trainer' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-personal-trainer' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-personal-trainer' ),
        'Handlee' => __( 'Handlee', 'vw-personal-trainer' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-personal-trainer' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-personal-trainer' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-personal-trainer' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-personal-trainer' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-personal-trainer' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-personal-trainer' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-personal-trainer' ),
        'Kanit' => __( 'Kanit', 'vw-personal-trainer' ),
        'Lobster' => __( 'Lobster', 'vw-personal-trainer' ),
        'Lato' => __( 'Lato', 'vw-personal-trainer' ),
        'Lora' => __( 'Lora', 'vw-personal-trainer' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-personal-trainer' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-personal-trainer' ),
        'Merriweather' => __( 'Merriweather', 'vw-personal-trainer' ),
        'Monda' => __( 'Monda', 'vw-personal-trainer' ),
        'Montserrat' => __( 'Montserrat', 'vw-personal-trainer' ),
        'Muli' => __( 'Muli', 'vw-personal-trainer' ),
        'Marck Script' => __( 'Marck Script', 'vw-personal-trainer' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-personal-trainer' ),
        'Open Sans' => __( 'Open Sans', 'vw-personal-trainer' ),
        'Overpass' => __( 'Overpass', 'vw-personal-trainer' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-personal-trainer' ),
        'Oxygen' => __( 'Oxygen', 'vw-personal-trainer' ),
        'Orbitron' => __( 'Orbitron', 'vw-personal-trainer' ),
        'Patua One' => __( 'Patua One', 'vw-personal-trainer' ),
        'Pacifico' => __( 'Pacifico', 'vw-personal-trainer' ),
        'Padauk' => __( 'Padauk', 'vw-personal-trainer' ),
        'Playball' => __( 'Playball', 'vw-personal-trainer' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-personal-trainer' ),
        'PT Sans' => __( 'PT Sans', 'vw-personal-trainer' ),
        'Philosopher' => __( 'Philosopher', 'vw-personal-trainer' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-personal-trainer' ),
        'Poiret One' => __( 'Poiret One', 'vw-personal-trainer' ),
        'Quicksand' => __( 'Quicksand', 'vw-personal-trainer' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-personal-trainer' ),
        'Raleway' => __( 'Raleway', 'vw-personal-trainer' ),
        'Rubik' => __( 'Rubik', 'vw-personal-trainer' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-personal-trainer' ),
        'Russo One' => __( 'Russo One', 'vw-personal-trainer' ),
        'Righteous' => __( 'Righteous', 'vw-personal-trainer' ),
        'Slabo' => __( 'Slabo', 'vw-personal-trainer' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-personal-trainer' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-personal-trainer'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-personal-trainer' ),
        'Sacramento' => __( 'Sacramento', 'vw-personal-trainer' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-personal-trainer' ),
        'Tangerine' => __( 'Tangerine', 'vw-personal-trainer' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-personal-trainer' ),
        'VT323' => __( 'VT323', 'vw-personal-trainer' ),
        'Varela Round' => __( 'Varela Round', 'vw-personal-trainer' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-personal-trainer' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-personal-trainer' ),
        'Volkhov' => __( 'Volkhov', 'vw-personal-trainer' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-personal-trainer' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-personal-trainer' ),
			'100' => esc_html__( 'Thin',       'vw-personal-trainer' ),
			'300' => esc_html__( 'Light',      'vw-personal-trainer' ),
			'400' => esc_html__( 'Normal',     'vw-personal-trainer' ),
			'500' => esc_html__( 'Medium',     'vw-personal-trainer' ),
			'700' => esc_html__( 'Bold',       'vw-personal-trainer' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-personal-trainer' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'vw-personal-trainer' ),
			'normal'  => esc_html__( 'Normal', 'vw-personal-trainer' ),
			'italic'  => esc_html__( 'Italic', 'vw-personal-trainer' ),
			'oblique' => esc_html__( 'Oblique', 'vw-personal-trainer' )
		);
	}
}
