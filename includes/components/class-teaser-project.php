<?php
/**
 * Teaser Project.
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

/**
 * Teaser Project.
 */
class Teaser_Project {

    public $post_id;

    /**
     * Constructor.
     *
     * @param string $post_id
     */
    public function __construct( $post_id = '' ) {

        $this->post_id = $post_id;
        $this->teaser_project();

    }

    /**
     * Teaser Project.
     */
    public function teaser_project() {
        ?>
            <div class="teaser-project">

                <?php
                    $image = get_the_post_thumbnail( $this->post_id );
                ?>

                <?php if ( $image ) : ?>
                    <div class="item__image-wrapper teaser-project__image-wrapper">
                        <div class="item__image image-with-decor image-with-decor--right">
                            <div class="item__hover-container">
                                <a href="<?php the_permalink( $this->post_id ); ?>">
                                    <?php echo get_the_post_thumbnail( $this->post_id, 'project-teaser', array( 'class' => 'lazyload' ) ); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php
                    $sector   = get_field( 'project_sector' );
                    $user     = get_field_object( 'project_user', $this->post_id );
                    $building = get_field_object( 'project_building_name', $this->post_id );
                    $address  = get_field_object( 'project_address', $this->post_id );
                    $area     = get_field_object( 'project_area', $this->post_id );
                    $logo     = get_field( 'project_logo' );
                ?>

                <div class="teaser-project__description">

                    <div class="description-row">
                        <div class="description-row__label"><?= $user['label']; ?></div>
                        <div class="description-row__value"><?= $user['value']; ?></div>
                    </div>

                    <div class="description-row">
                        <div class="description-row__label"><?= $building['label']; ?></div>
                        <div class="description-row__value"><?= $building['value']; ?></div>
                    </div>

                    <div class="description-row">
                        <div class="description-row__label"><?= $address['label']; ?></div>
                        <div class="description-row__value"><?= $address['value']; ?></div>
                    </div>

                    <div class="description-row">
                        <div class="description-row__label"><?= $area['label']; ?></div>
                        <div class="description-row__value"><?= $area['value']; ?></div>
                    </div>
                </div>

                <div class="teaser-project__more">
                    <a href="<?php the_permalink( $this->post_id ); ?>" class="c-button c-button__full c-button__full--primary-color c-button__full--small"><?= _e( 'Czytaj więcej', 'sense' ); ?> <span class="c-button__arrow"></span></a>
                </div>

            </div>
        <?php
    }

}
