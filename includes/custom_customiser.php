<?php
	function custom_theme_customizer( $wp_customize ) {
		$section_args = array(
			'title'    => __( 'Header Styles', '18wdwu02theme' ),
			'priority' => 20,
		);

		$wp_customize->add_section( 'custom_theme_header_info', $section_args );

		$setting_args = array(
			'default'   => '#ffffff',
			'transport' => 'refresh',
		);

		$wp_customize->add_setting( 'header_background_colour_setting', $setting_args);

		$control_args = array(
			'label'    => __( 'Header Background Colour', '18wdwu02theme' ),
			'section'  => 'custom_theme_header_info',
			'settings' => 'header_background_colour_setting',
		);

		$control = new WP_Customize_Color_Control( $wp_customize, 'header_background_colour_control', $control_args );

		$wp_customize->add_control( $control );
	}

	add_action( 'customize_register', 'custom_theme_customizer' );

	function custom_theme_customizer_styles() {
		?>
		<style type="text/css">
			.header-bg {
				background-color: <?php echo get_theme_mod( 'header_background_colour_setting', '#343a40' ); ?> !important;
			}
		</style>
		<?php
	}

	add_action( 'wp_head', 'custom_theme_customizer_styles' );
