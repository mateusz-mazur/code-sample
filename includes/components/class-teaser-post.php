<?php
/**
 * Teaser Post.
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

/**
 * Teaser Post.
 */
class Teaser_Post {

    /**
     * Constructor.
     *
     * @param string $post_id
     */
    public function __construct( $post_id = '' ) {

        $this->post_id = $post_id;
        $this->teaser_post();

    }

    /**
     * Teaser Post.
     */
    public function teaser_post() {
        ?>
            <div class="l-cols">

                <div class="l-cols__col l-cols__col--description">

                    <header class="header-block">
                        <<?= ( is_home() ) ? 'h2' : 'h3'; ?> class="header-block__header header-block__header--left"><a href="<?php the_permalink( $this->post_id ); ?>" class="no-link-decor"><?= get_the_title( $this->post_id ); ?></a></<?= ( is_home() ) ? 'h2' : 'h3'; ?>>
                    </header>

                    <div class="post-teaser__meta">
                        <span><?php _e( 'Data publikacji: ', 'sense' ); ?> <?= get_the_date('Y-m-d', $this->post_id ); ?></span>
                    </div>

                    <div class="post-teaser__excerpt">
                        <p><?= get_the_excerpt( $this->post_id ); ?></p>
                    </div>

                    <a href="<?php the_permalink( $this->post_id ); ?>" class="c-button c-button__full c-button__full--primary-color c-button__full--medium c-button__full--wide"><?php _e( 'Czytaj więcej', 'sense' ); ?> <span class="c-button__arrow"></span></a>

                </div>

                <div class="l-cols__col l-cols__col--image">

                    <?php
                    $image = get_the_post_thumbnail();
                    ?>
                    <?php if ( $image ) : ?>
                        <div class="item__image-wrapper">
                            <div class="item__image image-with-decor image-with-decor--right">
                                <div class="item__hover-container">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo get_the_post_thumbnail( $this->post_id, 'post-teaser', array( 'class' => 'lazyload' ) ); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        <?php
    }

}
