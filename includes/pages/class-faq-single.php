<?php
/**
 * Faq Simple.
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

/**
 * FAQ Page Simple.
 */
class Faq_Simple {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->init_hooks();
        add_filter( 'genesis_attr_entry', [ $this, 'add_class_to_content' ] );
        add_filter( 'genesis_attr_entry-content', [ $this, 'add_class_to_entry_content' ] );

	}

	/**
	 * Hooks for this page template.
	 */
	public function init_hooks() {
        remove_all_actions( 'genesis_entry_footer' );
        remove_all_actions( 'genesis_after_entry' );
        remove_all_actions( 'genesis_after_content' );

        remove_action( 'genesis_entry_header', 'genesis_do_post_title', 10 );
        remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

        add_action( 'genesis_before_loop', [ $this, 'container_start' ] );
        add_action( 'genesis_entry_header', [ $this, 'hero_section' ] );
        add_action( 'genesis_entry_footer', [ $this, 'all_faq' ] );
        add_action( 'genesis_after_loop', [ $this, 'container_end' ] );
	}


    /**
     * Page Submenu.
     */
    public function page_submenu() {
	    new Page_Submenu();
    }

    /**
     * Hero Section.
     */
    public function hero_section() {
	    ?>
        <div class="page-hero page-hero--simple-title">

            <header class="header-block">
                <h1 class="header-block__header header-block__header--left"><?php the_title(); ?></h1>
            </header>

        </div>
        <br />
        <?php
    }

    /**
     * Container start.
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

    /**
     * Add custom class.
     *
     * @param array $attributes attributes.
     *
     * @return mixed
     */
    public function add_class_to_content( $attributes ) {

        $attributes['class'] .= ' entry--with-bottom-margin';
        return $attributes;

    }

    /**
     * Add custom class.
     *
     * @param array $attributes attributes.
     *
     * @return mixed
     */
    public function add_class_to_entry_content( $attributes ) {

        $attributes['class'] .= ' box-to-scroll';
        return $attributes;

    }

    /**
     * All FAQ button.
     */
    public function all_faq() {
        ?>
            <a href="<?= get_post_type_archive_link( 'faq' ); ?>" class="c-button c-button__full c-button__full--primary-color c-button__full--medium c-button__full--wide"><?php _e( "Zobacz więcej FAQ's", 'sense' ); ?> <span class="c-button__arrow"></span></a>
        <?php
    }

}
