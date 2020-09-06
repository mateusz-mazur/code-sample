<?php
/**
 * Page Basic
 *
 * Template Name: Szablon zwykłej strony
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

class Page_Basic {

	/**
	 * Page_Contact constructor.
	 */
	public function __construct() {

		$this->init_hooks();
        add_filter( 'genesis_attr_entry', [ $this, 'add_class_to_content' ] );

	}

	/**
	 * Init Hooks.
	 */
	public function init_hooks() {

//		remove_all_actions( 'genesis_entry_header' );
		remove_all_actions( 'genesis_sidebar' );

        add_action( 'wp_enqueue_scripts', [ $this, 'load_cf7' ], 10, 0 );

        add_action( 'genesis_entry_content', [ $this, 'hero_section' ], 5 );

        add_action( 'genesis_before_loop', [ $this, 'container_start' ], 5 );
        add_action( 'genesis_after_loop', [ $this, 'container_end' ], 61 );

	}

	/*
	 * Load CF7 scripts and styles.
	 * */
    public function load_cf7() {
        if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
            wpcf7_enqueue_scripts();
        }

        if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
            wpcf7_enqueue_styles();
        }
    }

    /**
     * Add custom class.
     *
     * @param array $attributes attributes.
     *
     * @return mixed
     */
    public function add_class_to_content( $attributes ) {

        $attributes['class'] .= ' p-basic';
        return $attributes;

    }

    /**
     * Hero Section.
     */
    public function hero_section() {
        new Hero();
    }

    /**
     * Main Container start.
     */
    public function container_start() {

        new Div_Start(
            'l-container'
        );

    }

    /**
     * Container end.
     */
    public function container_end() {

        new Div_End();

    }

}

new Page_Basic();
genesis();
