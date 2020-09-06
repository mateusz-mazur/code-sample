<?php
/**
 * Header
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

/**
 * Page Header structure and content.
 */
class Header {

	/**
	 * PageHeader constructor.
	 */
	public function __construct() {

		$this->init_hooks();

	}

	/**
	 * Init Hooks.
	 */
	public function init_hooks() {

		remove_action( 'genesis_site_description', 'genesis_seo_site_description', 10 );
		remove_action( 'genesis_site_title', 'genesis_seo_site_title' );

		remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
		remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

		add_action( 'genesis_header', [ $this, 'page_header_start' ], 5 );

		add_action( 'genesis_header', [ $this, 'app_login_button' ], 15 );
		add_action( 'genesis_header', [ $this, 'wpml_languages_switcher' ], 16 );
		add_action( 'genesis_header', [ $this, 'social_media' ], 17 );
        add_action( 'genesis_header', [ $this, 'mburger' ], 20 );
		add_action( 'genesis_header', [ $this, 'page_header_end' ], 30 );
	}

    /**
     * Mobile Button.
     */
    public function mburger() {
	    ?>
        <a class="mburger js-mburger" href="#mobile-navigation">
            <b></b>
            <b></b>
            <b></b>
        </a>
        <?php
    }

	/**
	 * Add CSS class base on front/not-front page.
	 *
	 * @param string $attributes .
	 *
	 * @return mixed
	 */
	public function homepage_class( $attributes ) {
		$attributes['class'] .= ( is_front_page() ) ? ' front-page' : ' not-front-page';
		return $attributes;
	}

	/**
	 * Page Header wrapper start.
	 */
	public function page_header_start() {
		echo '<div class="l-container-full top-page js-top-page">';
		echo '<div class="l-container top-page__inner">';
	}

	/**
	 * Page Header wrapper end.
	 */
	public function page_header_end() {
		echo '</div>';
		echo '</div>';
	}

	/**
	 * Page Header Mobile Hamburger Button.
	 */
	public function page_header_mobile_button() {
		?>
		<button class="top-page__mobile-button c-mobile-btn">
			<span class="c-mobile-btn">
				<span class="c-mobile-btn__line"></span>
			</span>
		</button>
		<?php
	}


    /**
     * App Login Button.
     */
    public function app_login_button() {
        $button = get_field( 'top_page_app_button', 'option' );
        ?>
            <?php if ( $button ) : ?>
                <div class="top-page__app-button">
                    <a href="<?= $button['url']; ?>" <?= ( '_blank' === $button['target'] ) ? 'target="_blank" rel="noreferrer noopener"' : ''; ?>><?= $button['title']; ?></a>
                </div>
            <?php endif; ?>
        <?php
    }

    /**
     * Social Media.
     */
    public function social_media() {
        ?>
        <?php if ( have_rows( 'top_page_social_media', 'option' ) ) : ?>
            <div class="top-page__social-media">
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

        <?php
    }

    /**
     * Social Media.
     */
    public function languages_switcher() {
        $args_current = [
            'show_flags' => 1,
            'display_names_as' => 'slug'
        ];

        $args_dropdown = [
            'show_flags' => 1,
            'display_names_as' => 'slug'
        ];
        ?>
            <div class="top-page__languages-switcher">
                <div class="lang-switcher__current js-lang-switcher-trigger">
                    <span class="lang-switcher__current-flag"><?php echo pll_current_language(  'flag' ); ?></span>
                    <span class="lang-switcher__current-text"><?php echo pll_current_language(  'slug' ); ?></span>
                </div>

                <div class="lang-switcher__dropdown">
                    <ul class="lang-switcher__list">
                        <?php pll_the_languages( $args_dropdown );?>
                    </ul>
                </div>
            </div>
        <?php
    }

    /**
     * Top WPML Lang Switcher Widget.
     */
    public function wpml_languages_switcher() {
        if ( is_active_sidebar( 'wpml-languages-switcher' ) ) : ?>
            <?php dynamic_sidebar( 'wpml-languages-switcher' ); ?>
        <?php endif;
    }

}
