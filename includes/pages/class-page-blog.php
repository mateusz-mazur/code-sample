<?php
/**
 * Page Blog.
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

/**
 * Page Blog.
 */
class Page_Blog {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->init_hooks();

	}

	/**
	 * Hooks for this page template.
	 */
	public function init_hooks() {

        remove_all_actions( 'genesis_before_loop' );
        remove_all_actions( 'genesis_entry_header' );
        remove_all_actions( 'genesis_entry_content' );
        remove_all_actions( 'genesis_entry_footer' );
        remove_all_actions( 'genesis_after_content' );

        add_action( 'genesis_before_loop', [ $this, 'hero_section' ] );
        add_action( 'genesis_before_loop', [ $this, 'container_start' ] );
        add_action( 'genesis_after_loop', [ $this, 'container_end' ] );

        add_action( 'genesis_entry_content', [ $this, 'post_teaser' ], 10 );
        add_filter( 'genesis_attr_entry', [ $this, 'add_class_to_entry' ] );

	}

    /**
     * Container start.
     */
    public function container_start() {

        new Div_Start(
            'l-container box-to-scroll'
        );

    }

    /**
     * Container end.
     */
    public function container_end() {

        new Div_End();

    }

    /**
     * Add custom class.
     *
     * @param array $attributes attributes.
     *
     * @return mixed
     */
    public function add_class_to_entry( $attributes ) {

        $attributes['class'] .= ' post-teaser';
        $attributes['data-aos'] .= 'fade-in';
        return $attributes;

    }

    /**
     * Post Blog Teaser.
     */
    public function post_teaser() {

        new Teaser_Post();

    }

    /**
     * Hero Section.
     */
    public function hero_section() {

        new Hero();

    }

}
