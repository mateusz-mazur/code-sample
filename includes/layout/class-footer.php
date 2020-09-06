<?php
/**
 * Sense
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

/**
 * Page Footer.
 */
class Footer {

    /**
     * Page Footer constructor.
     */
    public function __construct() {

        $this->init_hooks();

    }

    /**
     * Hooks for this page template.
     */
    public function init_hooks() {

        remove_all_actions( 'genesis_footer' );

        add_action( 'genesis_footer', [ $this, 'ue_logos' ] );
        add_action( 'genesis_footer', [ $this, 'footer' ] );
        add_action( 'genesis_footer', [ $this, 'footer_bottom' ] );
        add_filter( 'genesis_footer', [ $this, 'mobile_navigation' ], 5 );

    }

    /*
     * UE Logos.
     * */
    public function ue_logos() {
        $url = get_field( 'ue_logos_link', 'option' );
        ?>
        <div class="ue-logos">
            <div class="l-container">

                <a href="<?= $url['url']; ?>" class="ue-logos__link" <?= ( '_blank' === $url['target'] ) ? 'target="_blank" rel="nofollow noopener noreferrer"' : ''; ?>>

                    <?php if ( have_rows( 'ue_logos_list', 'option' ) ) : ?>
                        <?= '<ul class="ue-logos__list">'; ?>
                            <?php while ( have_rows( 'ue_logos_list', 'option' ) ) : ?>
                                <?php the_row(); ?>

                                <?php
                                    $logo = get_sub_field( 'logo' );
                                ?>

                                <?php if ( $logo ) : ?>

                                    <?php if ( $link ) : ?>
                                        <a href="<?= $link['url']; ?>" class="c-item" <?= ( '_blank' === $link['target'] ) ? 'target="_blank" rel="nofollow noopener noreferrer"' : ''; ?>>
                                    <?php else : ?>
                                        <li class="c-item">
                                    <?php endif; ?>

                                        <img src="<?= $logo['url']; ?>" alt="logo" class="c-item__image">

                                    <?php if ( $link ) : ?>
                                        </a>
                                    <?php else : ?>
                                        </li>
                                    <?php endif; ?>

                                <?php endif; ?>

                            <?php endwhile; ?>
                        <?= '</ul>'; ?>
                    <?php endif; ?>

                </a>
            </div>
        </div>
        <?php
    }

    /**
     * Footer.
     */
    public function footer() {
        $logo                        = get_field( 'footer_logo', 'options' );
        $footer_address_header       = get_field( 'footer_address_header', 'options' );
        $footer_address              = get_field( 'footer_address', 'options' );
        $footer_phones               = get_field( 'footer_phones', 'options' );
        $footer_emails               = get_field( 'footer_emails', 'options' );
        $footer_menu_header          = get_field( 'footer_menu_header', 'options' );
        $footer_menu                 = get_field( 'footer_menu', 'options' );
        $footer_informations_header  = get_field( 'footer_informations_header', 'options' );
        $footer_informations_menu    = get_field( 'footer_informations_menu', 'options' );
        $footer_app_header           = get_field( 'footer_app_header', 'options' );
        $footer_app_button           = get_field( 'footer_app_button', 'options' );
        $footer_social_media_header  = get_field( 'footer_social_media_header', 'options' );
        $footer_social_media_buttons = get_field( 'footer_social_media_buttons', 'options' );
        ?>

        <footer class="footer-main">
            <div class="l-container l-cols">

                <div class="footer-main-contact l-cols__col">
                    <div class="footer-main-contact__logo" data-aos="fade-in">

                        <?php if ( $logo ) : ?>
                            <a href="<?php echo get_site_url(); ?>" class="no-link-decor">
                                <img data-src="<?php echo esc_attr( $logo['url'] ); ?>"
                                     src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png"
                                     alt="<?php echo esc_attr( $logo['alt'] ); ?>" class="lazyload"/>
                            </a>
                        <?php endif; ?>

                    </div>

                    <div class="desc" data-aos="fade-in">

                        <?php if ( $footer_address_header ) : ?>
                            <h3><?= $footer_address_header; ?></h3>
                        <?php endif; ?>

                        <?php if ( $footer_address_header ) : ?>
                        <span class="desc__address"><?= $footer_address; ?>
                            <?php endif; ?>

							<ul>
				            <?php
                            if ( $footer_phones ) {
                                $phones_count = count( $footer_phones );
                            }
                            ?>
                                <?php if ( have_rows( 'footer_phones', 'options' ) ) : ?>
                                    <li class="contact-item item--phone">
										<div class="contact-item__icon contact-item__icon--phones"></div>

									  <?php while ( have_rows( 'footer_phones', 'options' ) ) : the_row(); ?>
                                          <?php
                                          $row_index = get_row_index();
                                          $phone     = get_sub_field( 'phone' );
                                          $ga        = get_sub_field( 'google_analytics_code' );
                                          ?>

                                      <a class="contact-item__link contact-item__link--with-break"
                                         href="tel:<?= filter_var( $phone, FILTER_SANITIZE_NUMBER_INT ); ?>" <?= ( $ga ) ? $ga : ''; ?>>
                                          <?= $phone; ?>
                                          </a><?= ( $row_index === $phones_count ) ? '' : ' | '; ?>


                                      <?php endwhile; ?>
									</li>
                                <?php endif; ?>

                                <?php if ( have_rows( 'footer_emails', 'options' ) ) : ?>
                                    <?php while ( have_rows( 'footer_emails', 'options' ) ) : the_row(); ?>
                                        <?php
                                        $email = get_sub_field( 'email' );
                                        ?>

                                        <li class="contact-item item----mail">
											<div class="contact-item__icon contact-item__icon--mail"></div>

											<a class="contact-item__link"
                                               href="mailto:<?= esc_html( antispambot( $email ) ); ?>"><?= esc_html( antispambot( $email ) ); ?></a>
										</li>

                                    <?php endwhile; ?>
                                <?php endif; ?>

							</ul>

                    </div>
                </div>

                <?php if ( is_active_sidebar( 'footer-main-menu' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-main-menu' ); ?>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-info-menu' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-info-menu' ); ?>
                <?php endif; ?>

                <div class="footer-main-login l-cols__col">

                    <?php if ( $footer_app_header ) : ?>
                        <h3 class="footer-main__header" data-aos="fade-in"><?= $footer_app_header; ?></h3>
                    <?php endif; ?>

                    <?php if ( $footer_app_button ) : ?>
                        <a href="https://app.sense-monitoring.com/"
                           class="footer-main-login__button c-button c-button__full c-button__full--primary-color c-button__full--medium" <?= ( '_blank' === $footer_app_button['target'] ) ? 'target="_blank" rel="noreferrer noopener"' : ''; ?> data-aos="fade-in"><?= $footer_app_button['title']; ?> <span class="c-button__arrow"></span></a>
                    <?php endif; ?>

                    <div class="footer-main-sm">

                        <?php if ( $footer_social_media_header ) : ?>
                            <h3 class="footer-main__header" data-aos="fade-in"><?= $footer_social_media_header; ?></h3>
                        <?php endif; ?>

                        <?php if ( have_rows( 'footer_social_media_buttons', 'options' ) ) : ?>
                            <?= '<ul class="footer-sm">'; ?>
                            <?php while ( have_rows( 'footer_social_media_buttons', 'options' ) ) : the_row(); ?>

                                <?php
                                $link = get_sub_field( 'url' );
                                $icon = get_sub_field( 'icon' );
                                ?>

                                <li class="footer-icon" data-aos="fade-in">
                                    <a class="footer-icon__link footer-icon__link--<?= $icon; ?>"
                                       href="<?= $link; ?>"
                                       target="_blank"
                                       rel="noreferrer noopener"></a>
                                </li>

                            <?php endwhile; ?>
                            <?= '</ul>'; ?>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        </footer>

        <?php
    }

    /**
     * Footer Bottom.
     */
    public function footer_bottom() {
        ?>
        <div class="footer-bottom">
            <div class="l-container">
                <div class="l-cols">

                    <div class="l-cols__col l-cols__col--left">
                        <span>Copyright ©<?= date( 'Y' ); ?> <?php the_field( 'footer_bottom_left', 'option' ); ?></span>
                    </div>

                    <div class="l-cols__col l-cols__col--scroll">
                        <button class="footer-bottom__scroll-to-top js-scroll-to-top"></button>
                    </div>

                    <div class="l-cols__col l-cols__col--right">
                        <span><?php the_field( 'footer_bottom_right', 'option' ); ?></span>
                    </div>
                </div>

            </div>
        </div>
        <?php
    }

    /**
     * Mobile Navigation.
     */
    public function mobile_navigation() {
        new Mobile_Navigation();
    }

}
