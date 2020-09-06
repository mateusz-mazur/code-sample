<?php
/**
 * Page Simple.
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

/**
 * Post Page Simple.
 */
class Page_Simple {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->init_hooks();
//        add_filter( 'genesis_attr_entry', [ $this, 'add_class_to_content' ] );
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

        add_action( 'genesis_before_loop', [ $this, 'page_submenu' ] );
        add_action( 'genesis_before_loop', [ $this, 'hero_section' ] );
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
	    new Hero();
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

        $attributes['class'] .= ' p-single';
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
     * Hero Section.
     */
    public function post_hero() {
        ?>
            <div class="p-single__hero">

                <div class="c-cols">
                    <div class="c-cols__col c-cols__col--description">

                        <header class="header-block">
                            <h1 class="header-block__header header-block__header--left"><?php the_title(); ?></h1>

                            <div class="header-block__meta">
                                <?php
                                $author_id          = 'user_' . get_the_author_meta('ID');
                                $author_first_name  = get_the_author_meta( 'user_firstname' );
                                $author_last_name   = get_the_author_meta( 'user_lastname' );
                                $author_avatar      = get_field( 'author_image', $author_id );
                                $author_position    = get_field( 'author_position', $author_id );
                                ?>

                                <?php if ( $author_avatar ) : ?>
                                    <div class="meta__image">
                                        <?= wp_get_attachment_image( $author_avatar['id'], '', "", array( "class" => "lazyload", "data-lazy"=>"true") ); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="meta__text <?= ( $author_avatar ) ? '' : 'meta__text--no-margin'; ?>">

                                    <?php if ( $author_first_name || $author_last_name ) : ?>
                                        <span class="header-block__author"><?= $author_first_name . ' ' . $author_last_name; ?><?= ( $author_position ) ? ', ' . $author_position : ''; ?></span>
                                    <?php endif; ?>

                                    <span class="header-block__date"><?= ( $author_avatar ) ? '' : '<i class="fas fa-calendar-alt"></i>'; ?><?= get_the_date('j F Y'); ?></span>
                                </div>
                            </div>

                        </header>
                    </div>

                    <div class="c-cols__col">

                        <?php
                        $image = get_the_post_thumbnail();
                        ?>
                        <?php if ( $image ) : ?>
                            <div class="item__image-wrapper">
                                <div class="item__image image-with-decor image-with-decor--right">
                                    <div class="item__hover-container">
                                        <?php echo get_the_post_thumbnail( $post_id, 'post-teaser', array( 'class' => 'lazyload' ) ); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="p-single__excerpt">

                    <?php the_excerpt(); ?>

                    <a href="#" class="js-button-scroll-to-content c-button c-button__full c-button__full--primary-color c-button__full--medium c-button__full--wide"><?php _e( 'Czytaj więcej', 'sense' ); ?> <span class="c-button__arrow"></span></a>
                </div>

            </div>
        <?php
    }


    /**
     * Post Author Box.
     */
    public function post_author_box() {
            $author_id          = 'user_' . get_the_author_meta('ID');
            $author_first_name  = get_the_author_meta( 'user_firstname' );
            $author_last_name   = get_the_author_meta( 'user_lastname' );
            $author_description = get_the_author_meta( 'user_description' );
            $author_avatar      = get_field( 'author_image', $author_id );
            $author_position    = get_field( 'author_position', $author_id );
            $author_linkedin    = get_field( 'author_linkedin', $author_id );
        ?>

        <div class="p-single__author-box l-cols">

            <?php if ( $author_avatar ) : ?>
                <div class="l-cols__col l-cols__col--image">
                    <div class="c-image">
                        <?= wp_get_attachment_image( $author_avatar['id'], '', "", array( "class" => "lazyload", "data-lazy"=>"true") ); ?>
                    </div>

                    <?php if ( $author_linkedin ) : ?>
                        <div class="c-social-media">
                            <a href="<?= $author_linkedin; ?>" target="_blank" rel="noreferrer noopener"><i class="fab fa-linkedin"></i></a>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            <div class="l-cols__col c-description">

                <header class="header-block">
                    <h3 class="header-block__header header-block__header--left"><?= _e( 'Autor', 'sense' ); ?></h3>
                </header>

                <div>
                    <?php if ( $author_avatar ) : ?>
                        <div class="l-cols__col c-image--mobile">
                            <?= wp_get_attachment_image( $author_avatar['id'], '', "", array( "class" => "lazyload", "data-lazy"=>"true") ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $author_first_name || $author_last_name ) : ?>
                        <span class="c-description__name"><?= $author_first_name . ' ' . $author_last_name; ?><?= ( $author_position ) ? ', ' . $author_position : ''; ?></span>
                    <?php endif; ?>

                    <?php if ( $author_description ) : ?>
                        <div>
                            <?= $author_description; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    }

}
