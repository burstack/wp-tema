<?php
// CUSTOM SECTION partner
//require get_template_directory() . '/inc/customizer.php';
function myspartner( $wp_customize ) {

// add new section partners
	// for the header boxes
		// add arrow icon shortcut
		$wp_customize->selective_refresh->add_partial( 'partners_box', array(
			'selector' => 'div .partners',
		));
		// add section
		$wp_customize->add_section( 'partner_box' , array(
			'title' => 'Partners Carousel',
			'priority' => 30,
		));
		// add setting
		$wp_customize->add_setting('partners_box' , array(
			'default' =>''
		));
		// add control 
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
			'partners_text',
			array(
				'type' => 'text',
				'label' => 'Enter shortcode',
				'section' => 'partner_box',
				'settings' => 'partners_box',
			)
		));
	// for the header boxes end
// add new section partners end
}

add_action( 'customize_register', 'myspartner' );
// CUSTOM SECTION partner end
