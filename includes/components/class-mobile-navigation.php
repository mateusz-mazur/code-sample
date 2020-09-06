<?php
/**
 * Mobile Navigation.
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

/**
 * Mobile Navigation.
 */
class Mobile_Navigation {

    /**
     * Constructor.
     */
    public function __construct() {

        $this->mobile_navigation();

    }

    /**
     * Mobile Navigation.
     */
    public function mobile_navigation() {
        ?>

        <nav id="mobile-navigation" class="js-mobile-navigation mobile-navigation">
            <div id="subpanel" class="panel">

                <?php $logo = get_custom_logo(); ?>
                <?php if ( $logo ) : ?>

                    <div class="mobile-navigation__logo-wrapper">
                        <?= $logo; ?>
                    </div>

                <?php endif; ?>

                <?php
                    wp_nav_menu(
                        array(
                            'container' => false,
                            'menu_id' => false,
                            'menu_class' => 'mobile-navigation',
                            'menu' => 'Mobile Navigation'
                        )
                    );
                ?>

                <?php if ( is_active_sidebar( 'mobile-wpml-languages-switcher' ) ) : ?>
                    <?php dynamic_sidebar( 'mobile-wpml-languages-switcher' ); ?>
                <?php endif; ?>

                <?php
                    $button = get_field( 'top_page_app_button', 'option' );
                ?>
                <?php if ( $button ) : ?>
                    <div class="mobile-navigation__app-button">
                        <a href="<?= $button['url']; ?>" <?= ( '_blank' === $button['target'] ) ? 'target="_blank" rel="nofollow"' : ''; ?>><?= $button['title']; ?></a>
                    </div>
                <?php endif; ?>

                <?php if ( have_rows( 'top_page_social_media', 'option' ) ) : ?>
                    <div class="mobile-navigation__social-media">
                        <ul class="social-media-icons">
                            <?php while ( have_rows( 'top_page_social_media', 'option' ) ) : the_row(); ?>

                                <?php
                                $link = get_sub_field( 'link' );
                                $icon = get_sub_field( 'icon' );
                                ?>

                                <li class="social-media-icons__icon">
                                    <a href="<?= $link; ?>">
                                        <img src="<?= get_stylesheet_directory_uri(); ?>/images/icon__<?= $icon; ?>--yellow.svg" alt="facebook" class="social-media-icons__icon-image">
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                <?php endif; ?>

            </div>
        </nav>

        <?php
    }

}
