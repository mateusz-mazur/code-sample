<?php
/**
 * Project Single.
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

/**
 * Project Single.
 */
class Project_Single {

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

//        remove_all_actions( 'genesis_entry_header' );
//        remove_all_actions( 'genesis_entry_header' );
        remove_all_actions( 'genesis_entry_content' );
        remove_all_actions( 'genesis_entry_footer' );
        remove_all_actions( 'genesis_after_entry' );
        remove_all_actions( 'genesis_after_content' );

        remove_action( 'genesis_entry_header', 'genesis_do_post_title', 10 );
        remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

        add_action( 'genesis_entry_header', [ $this, 'container_start' ], 10 );
        add_action( 'genesis_entry_header', [ $this, 'hero_section' ], 10 );
        add_action( 'genesis_entry_header', [ $this, 'container_end' ], 10 );

//        add_action( 'genesis_before_loop', [ $this, 'container_start' ] );
//        add_action( 'genesis_after_loop', [ $this, 'container_end' ] );

//        add_action( 'genesis_entry_header', [ $this, 'post_hero' ] );
//        add_action( 'genesis_entry_footer', [ $this, 'post_author_box' ] );
//

        add_action( 'genesis_entry_content', [ $this, 'container_start' ], 10 );
        add_action( 'genesis_entry_content', [ $this, 'project_content_top' ], 10 );
        add_action( 'genesis_entry_content', [ $this, 'project_content' ], 11 );
        add_action( 'genesis_entry_content', [ $this, 'projects_related' ], 11 );
        add_action( 'genesis_entry_content', [ $this, 'container_end' ], 12 );
//        add_filter( 'genesis_attr_entry', [ $this, 'add_class_to_entry' ] );

	}

	public function page_submenu() {
	    new Page_Submenu();
    }

    /**
     * Hero Section.
     */
    public function hero_section() {
	    ?>
        <div class="l-cols">

            <div class="l-cols__col l-cols__col--header">
                <h1 class="header-block__header header-block__header--center"><?php the_title(); ?></h1>
            </div>

            <div class="l-cols__col l-cols__col--project-logo">
                <?php
                    $logo = get_field( 'project_logo' );
                    if ( $logo ) :
                    ?>
                    <img data-src="<?php echo esc_attr( $logo['url'] ); ?>" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="<?php echo esc_attr( $logo['alt'] ); ?>" class="lazyload" />
                    <?php
                endif; ?>
            </div>

        </div>
        <?php
    }

    /**
     * Content Top.
     */
    public function project_content_top() {
        ?>
        <div class="p-project-single__content-top">

            <div class="l-cols">

                <div class="l-cols__col">

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

                    <?php
                        $gallery = get_field( 'project_gallery' );
                    ?>
                    <?php if ( $gallery ) : ?>
                        <div class="item__gallery-wrapper project-gallery">

                            <?php foreach ( $gallery as $image ) : ?>

                                <a href="<?php echo esc_url( $image['sizes']['large'] ); ?>" class="project-gallery__item glightbox" >
                                    <img
                                        data-src="<?php echo esc_attr( $image['sizes']['thumbnail'] ); ?>"
                                        src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png"
                                        alt="<?php echo esc_attr( $image['alt'] ); ?>"
                                        class="lazyload"
                                    />
                                </a>

                            <?php endforeach; ?>

                        </div>
                    <?php endif; ?>

                </div>

                <div class="l-cols__col">

                    <?php
                        $cats                   = get_the_terms( get_the_ID(), 'projects_sector' );
                        $project_user_label     = get_field_object( 'project_user' );
                        $project_user           = get_field( 'project_user' );
                        $project_building_label = get_field_object( 'project_building_name' );
                        $project_building_name  = get_field( 'project_building_name' );
                        $project_address_label  = get_field_object( 'project_address' );
                        $project_address        = get_field( 'project_address' );
                        $project_area_label     = get_field_object( 'project_area' );
                        $project_area           = get_field( 'project_area' );
                    ?>

                    <div class="project-single-info">
                        <table>
                            <?php if ( $cats ) : ?>
                            <tr>
                                <td class="icon">
                                    <img data-src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/ico-sektor.png" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="" class="lazyload" />
                                </td>
                                <td class="label">
                                    <?= _e( 'Sektor', 'sense' ); ?>
                                </td>
                                <td class="value">
                                    <?php
                                        $i = 1;

                                        foreach( $cats as $cat ) {
                                            $separator = ( $i < count( $cats ) ) ? ', ' : '';
                                            echo $cat->name . $separator;
                                            $i++;
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php endif; ?>

                            <?php if ( $project_user ) : ?>
                            <tr>
                                <td class="icon">
                                    <img data-src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/ico-user.png" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="" class="lazyload" />
                                </td>
                                <td class="label">
                                    <?= $project_user_label['label']; ?>
                                <td class="value">
                                    <?= $project_user; ?>
                                </td>
                            </tr>
                            <?php endif; ?>

                            <?php if ( $project_building_name ) : ?>
                            <tr>
                                <td class="icon">
                                    <img data-src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/ico-budynek.png" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="" class="lazyload" />
                                </td>
                                <td class="label">
                                    <?= $project_building_label['label']; ?>
                                </td>
                                <td class="value">
                                    <?= $project_building_name; ?>
                                </td>
                            </tr>
                            <?php endif; ?>

                            <?php if ( $project_address ) : ?>
                            <tr>
                                <td class="icon">
                                    <img data-src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/ico-adres.png" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="" class="lazyload" />
                                </td>
                                <td class="label">
                                    <?= $project_address_label['label']; ?>
                                </td>
                                <td class="value">
                                    <?= $project_address; ?>
                                </td>
                            </tr>
                            <?php endif; ?>

                            <?php if ( $project_area ) : ?>
                            <tr>
                                <td class="icon">
                                    <img data-src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/ico-powierzchnia.png" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="" class="lazyload" />
                                </td>
                                <td class="label">
                                    <?= $project_area_label['label']; ?>
                                </td>
                                <td class="value">
                                    <?= $project_area; ?>
                                </td>
                            </tr>
                            <?php endif; ?>

                        </table>

                    </div>

                </div>

            </div>

        </div>
        <?php
    }

    /**
     * Content.
     */
    public function project_content() {
        ?>
        <div class="p-project-single__content">
            <?php the_content(); ?>
        </div>
        <?php
    }

    /**
     * Project related.
     */
    public function projects_related() {
        $className    = 'block-projects block-projects--related';
        $block_header = get_field( 'project_related_header' );
        $posts        = get_field( 'project_related_items' );
        $button       = get_field( 'project_related_button' );
        ?>

        <div class="<?= $className; ?>">

            <div class="l-container">

                <?php if ( $block_header ) : ?>
                    <header class="header-block" data-aos="fade-in">
                        <h2 class="header-block__header header-block__header--center"><?= $block_header; ?></h2>
                    </header>
                <?php endif; ?>

                <?php if( $posts ): ?>
                    <div class="l-cols">
                        <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                            <?php setup_postdata($post); ?>

                            <article class="l-cols__col block-projects__item">
                                <?php new \sense\Teaser_Project( $post->ID ); ?>
                            </article>

                        <?php endforeach; ?>
                    </div>
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>

                <?php if ( $button ) : ?>
                    <div class="block-projects__more">
                        <a href="<?= $button['url']; ?>" class="c-button c-button__outline c-button__outline--primary-color c-button__outline--medium c-button__outline--wide"><?= $button['title']; ?> <span class="c-button__arrow"></span></a>
                    </div>
                <?php endif; ?>

            </div>
        </div>

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

        $attributes['class'] .= ' p-project-single';
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
