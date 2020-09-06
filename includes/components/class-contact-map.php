<?php
/**
 * Contact Map.
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

/**
 * Contact Map.
 */
class Contact_Map {

    /**
     * Constructor.
     */
    public function __construct() {

        $this->contact_map();

    }

    /**
     * Contact Map.
     */
    public function contact_map() {
        $header = get_field( 'contact_maps_header', 'option' );
        ?>
        <section class="block-contact-maps">
            <?php
                $cities = [];
            ?>

            <?php if ( have_rows( 'contact_maps_offices', 'option' ) ) : ?>
                <?php while ( have_rows( 'contact_maps_offices', 'option' ) ) : the_row(); ?>
                    <?php
                        array_push( $cities, get_sub_field( 'city' ) );
                    ?>
                <?php endwhile; ?>
            <?php endif; ?>

            <div class="contact-maps-switcher-mobi row" data-aos="fade-in">
                <form class="contact-maps-switcher-mobi-form" action="" method="">
                    <select id="contact-maps-switcher-mobi" name="">
                        <option value="city-1"><?= $cities[1]; ?></option>
                        <option value="city-2"><?= $cities[0]; ?></option>
                        <option value="city-3"><?= $cities[2]; ?></option>
                    </select>
                </form>
            </div>

            <?php if ( have_rows( 'contact_maps_offices', 'option' ) ) : ?>
                <div class="contact-map-switcher" data-aos="fade-in">
                    <div class="contact-map-switcher-inner l-container">
                        <?php while ( have_rows( 'contact_maps_offices', 'option' ) ) : the_row(); ?>

                            <?php
                                $row_index      = get_row_index();
                                $city           = get_sub_field( 'city' );
                                $name           = get_sub_field( 'name' );
                                $address        = get_sub_field( 'address' );
                                $phone          = get_sub_field( 'phone' );
                                $image_inactive = get_sub_field( 'image_inactive' );
                                $image_active   = get_sub_field( 'image_active' );
                            ?>

                            <div id="map-item-<?= $row_index; ?>" class="item">
                                <div class="contact-map-switcher-map">

                                    <?php if ( $image_inactive ) : ?>
                                        <img data-src="<?php echo esc_attr( $image_inactive['url'] ); ?>"
                                             src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png"
                                             alt="<?php echo esc_attr( $image_inactive['alt'] ); ?>"
                                             class="lazyload inactive"
                                        />
                                    <?php endif; ?>

                                    <?php if ( $image_active ) : ?>
                                        <img data-src="<?php echo esc_attr( $image_active['url'] ); ?>"
                                             src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png"
                                             alt="<?php echo esc_attr( $image_active['alt'] ); ?>"
                                             class="lazyload active"
                                        />
                                    <?php endif; ?>

                                </div>

                                <div class="contact-map-switcher-desc">
                                    <header>
                                        <h3><?= $city; ?></h3>
                                        <p><?= $name; ?></p>
                                    </header>

                                    <p class="contact-map-switcher-desc-address">
                                        <?= $address; ?>
                                    </p>

                                    <p class="contact-map-switcher-desc-phone">
                                        <a href="tel:<?= filter_var( $phone, FILTER_SANITIZE_NUMBER_INT ); ?>">
                                            <?= $phone; ?>
                                        </a>
                                    </p>
                                </div>

                                <div class="contact-map-switcher-map-arrow"></div>
                            </div>

                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="contact-maps" data-aos="fade-in">
                <div class="map">
                    <div id="map1" class="map-item map-item-1"></div>

                    <div id="map2" class="map-item map-item-2"></div>

                    <div id="map3" class="map-item map-item-3"></div>
                </div>
            </div>

        </section>

        <?php
    }

}
