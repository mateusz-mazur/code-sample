<?php
/**
 * Enqueue Scripts and Styles.
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

add_action( 'wp_enqueue_scripts', 'sense_enqueue_scripts_styles' );
/**
 * Enqueues scripts and styles.
 *
 * @since 1.0.0
 */
function sense_enqueue_scripts_styles() {
	$appearance = genesis_get_config( 'appearance' );

	/*
	 * Styles.
	 *
	 */

	wp_enqueue_style(
		genesis_get_theme_handle() . '-fonts',
		$appearance['fonts-url'],
		[],
		genesis_get_theme_version()
	);

	// wp_enqueue_style( 'dashicons' );

	if ( genesis_is_amp() ) {
		wp_enqueue_style(
			genesis_get_theme_handle() . '-amp',
			get_stylesheet_directory_uri() . '/lib/amp/amp.css',
			[ genesis_get_theme_handle() ],
			genesis_get_theme_version()
		);
	}

	wp_enqueue_style(
		genesis_get_theme_handle() . '-main-fonts',
		'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Titillium+Web:wght@300;600;700&display=swap',
		array(),
		genesis_get_theme_version()
	);

    if ( is_page_template( 'page-templates/class-page-contact.php' ) ) {
        wp_enqueue_style(
            genesis_get_theme_handle() . '-contact-map',
            get_stylesheet_directory_uri() . '/dist/block_contact_maps.css',
            array(),
            genesis_get_theme_version()
        );
    }

	wp_enqueue_style(
		genesis_get_theme_handle() . '-main-styles',
		get_stylesheet_directory_uri() . '/dist/main.css',
		array(),
		genesis_get_theme_version()
	);

	/*
	 * Scripts.
	 *
	 */
    wp_deregister_script( 'jquery' );
    wp_enqueue_script(
        'jquery',
        get_stylesheet_directory_uri() . '/dist/jquery.min.js',
        array(),
        genesis_get_theme_version(),
        false
    );

    if ( is_page_template( 'page-templates/class-page-contact.php' ) || has_block( 'acf/contact-maps' ) ) {
        wp_enqueue_script(
            genesis_get_theme_handle() . '-google-maps-api',
            'https://maps.google.com/maps/api/js?key=XXX',
            array(),
            genesis_get_theme_version(),
            true
        );

        wp_enqueue_script(
            genesis_get_theme_handle() . '-contact-maps',
            get_stylesheet_directory_uri() . '/dist/component_contact_maps.bundle.js',
            array(),
            genesis_get_theme_version(),
            true
        );
    }

	wp_enqueue_script(
		genesis_get_theme_handle() . '-scripts',
		get_stylesheet_directory_uri() . '/dist/main.bundle.js',
		array(),
		genesis_get_theme_version(),
		true
	);
}
