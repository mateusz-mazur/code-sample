<?php
/**
 * Archive FAQ.
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

/**
 * Archive FAQ.
 */
class Archive_Faq {

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
            'p-archive-faq__wrapper'
        );

        new Div_Start(
            'l-container box-to-scroll p-archive-faq'
        );

    }

    /**
     * Container end.
     */
    public function container_end() {

        new Div_End();
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

        $attributes['class'] .= ' p-archive-faq__item';
        $attributes['data-aos'] .= 'fade-in';
        return $attributes;

    }

    /**
     * Post Blog Teaser.
     */
    public function post_teaser() {
        ?>
            <h2 class="p-archive-faq__question"><?php the_title(); ?></h2>

            <div class="p-archive-faq__answer">
                <?php the_content(); ?>
            </div>
        <?php
    }

    /**
     * Hero Section.
     */
    public function hero_section() {

        new Hero();

    }

}
