<?php
/**
 * Post Single Blog.
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

/**
 * Post Single Blog.
 */
class Post_Single {

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
//        remove_all_actions( 'genesis_entry_content' );
        remove_all_actions( 'genesis_entry_footer' );
        remove_all_actions( 'genesis_after_entry' );
        remove_all_actions( 'genesis_after_content' );

        remove_action( 'genesis_entry_header', 'genesis_do_post_title', 10 );
        remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

//
//        add_action( 'genesis_before_loop', [ $this, 'hero' ] );
        add_action( 'genesis_before_loop', [ $this, 'container_start' ] );
        add_action( 'genesis_after_loop', [ $this, 'container_end' ] );

        add_action( 'genesis_entry_header', [ $this, 'post_hero' ] );
        add_action( 'genesis_entry_footer', [ $this, 'post_author_box' ] );
        add_action( 'genesis_after_entry', [ $this, 'post_related' ] );
//
//        add_action( 'genesis_entry_content', [ $this, 'post_teaser' ], 10 );
//        add_filter( 'genesis_attr_entry', [ $this, 'add_class_to_entry' ] );

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

                                    <span class="header-block__date"><?= ( $author_avatar ) ? '' : '<i class="header-block__date-icon fas fa-calendar-alt"></i>'; ?><?= get_the_date('j F Y'); ?></span>
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

        <?php if ( $author_first_name ) : ?>
            <div class="p-single__author-box l-cols">

                <?php if ( $author_avatar ) : ?>
                    <div class="l-cols__col l-cols__col--image">
                        <div class="c-image">
                            <?= wp_get_attachment_image( $author_avatar['id'], '', "", array( "class" => "lazyload", "data-lazy"=>"true") ); ?>
                        </div>

                        <?php if ( $author_linkedin ) : ?>
                            <div class="c-social-media">
                                <a href="<?= $author_linkedin; ?>" target="_blank" rel="noreferrer noopener"><span class="c-social-media__icon c-social-media__icon--linkedin"></span></a>
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

        <?php endif; ?>

        <?php
    }


    public function post_related() {
        $className      = 'p-single__related-posts';
        $header_default = get_field( 'related_posts_header', 'option' );
        $header_custom  = get_field( 'related_posts_header' );
        $button_default = get_field( 'related_posts_button', 'option' );
        $button_custom  = get_field( 'related_posts_button' );
        $posts          = get_field( 'related_posts_items' );
        ?>

        <section class="<?= $className; ?>">

            <div class="l-container">

                <?php if ( $header_default || $header_custom ) : ?>
                    <header class="header-block" data-aos="fade-in">
                        <h2 class="header-block__header header-block__header--center"><?= ( $header_custom ? $header_custom : $header_default ); ?></h2>
                    </header>
                <?php endif; ?>

                <?php if ( $posts ) : ?>
                    <?php foreach( $posts as $post ): // variable must be called $post (IMPORTANT) ?>
                        <?php setup_postdata( $post ); ?>

                        <article class="post-teaser" data-aos="fade-in">
                            <?php new \sense\Teaser_Post( $post->ID ); ?>
                        </article>

                    <?php endforeach; ?>
                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

                <?php else : ?>

                    <?php
                    $blog_query_args = array(
                        'orderby'        => 'rand',
                        'order'          => 'DESC',
                        'post_type'      => 'post',
                        'post_status'    => 'publish',
                        'posts_per_page' => '4',
                        'meta_query'     => array(array('key' => '_thumbnail_id')),
                    );
                    $blog_query      = new \WP_Query( $blog_query_args );

                    if ( $blog_query->have_posts() ) :
                        while ( $blog_query->have_posts() ) : $blog_query->the_post();
                            ?>

                            <article class="post-teaser" data-aos="fade-in">

                                <?php new Teaser_Post(); ?>

                            </article>

                        <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>

                <?php endif; ?>

                <?php
                    $button = ( $button_custom ) ? $button_custom : $button_default;
                ?>
                <?php if ( $button ) : ?>
                    <div class="blog__more">
                        <a href="<?= $button['url']; ?>" class="c-button c-button__full c-button__full--primary-color c-button__full--medium c-button__full--wide"><?= $button['title']; ?> <span class="c-button__arrow"></span></a>
                    </div>
                <?php endif; ?>

            </div>

        </section>

        <?php
    }

}
