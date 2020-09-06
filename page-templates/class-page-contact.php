<?php
/**
 * Page Contact
 *
 * Template Name: Szablon strony Kontakt
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

class Page_Contact {

	/**
	 * Page_Contact constructor.
	 */
	public function __construct() {

		$this->init_hooks();
        add_filter( 'genesis_attr_entry', [ $this, 'add_class_to_content' ] );

	}

	/**
	 * Init Hooks.
	 */
	public function init_hooks() {

		remove_all_actions( 'genesis_entry_header' );
		remove_all_actions( 'genesis_sidebar' );

        add_action( 'wp_enqueue_scripts', [ $this, 'load_cf7' ], 10, 0 );

        add_action( 'genesis_entry_content', [ $this, 'hero_section' ], 5 );
        add_action( 'genesis_entry_content', [ $this, 'container_start' ], 10 );

        // Left Column.
        add_action( 'genesis_entry_content', [ $this, 'container_column_start' ], 10 );
        add_action( 'genesis_entry_content', [ $this, 'contact_data' ], 20 );
        add_action( 'genesis_entry_content', [ $this, 'contact_social_media' ], 30 );
        add_action( 'genesis_entry_content', [ $this, 'container_end' ], 30 );

        // Right Column.
        add_action( 'genesis_entry_content', [ $this, 'container_form_column_start' ], 40 );
        add_action( 'genesis_entry_content', [ $this, 'contact_form' ], 40 );
        add_action( 'genesis_entry_content', [ $this, 'container_end' ], 40 );

        add_action( 'genesis_entry_content', [ $this, 'container_end' ], 60 );
        add_action( 'genesis_entry_content', [ $this, 'container_end' ], 61 );
        add_action( 'genesis_entry_content', [ $this, 'container_end' ], 61 );

        add_action( 'genesis_after_content', [ $this, 'contact_map' ], 60 );


	}

	/*
	 * Load CF7 scripts and styles.
	 * */
    public function load_cf7() {
        if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
            wpcf7_enqueue_scripts();
        }

        if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
            wpcf7_enqueue_styles();
        }
    }

    public function load_gravity_form() {

    }

    /**
     * Add custom class.
     *
     * @param array $attributes attributes.
     *
     * @return mixed
     */
    public function add_class_to_content( $attributes ) {

        $attributes['class'] .= ' p-contact';
        return $attributes;

    }

    /**
     * Hero Section.
     */
    public function hero_section() {
        new Hero();
    }

    /**
     * Main Container start.
     */
    public function container_start() {

        new Div_Start(
            'content-decors-wrapper'
        );

        new Div_Start(
            'l-container'
        );

        new Div_Start(
            'l-cols'
        );

    }

    /**
     * Column Container start.
     */
    public function container_column_start() {

        new Div_Start(
            'l-cols__col l-cols__col--info box-to-scroll'
        );

    }

    /**
     * Form Column Container start.
     */
    public function container_form_column_start() {

        new Div_Start(
            'l-cols__col l-cols__col--form'
        );

    }

    /**
     * Container end.
     */
    public function container_end() {

        new Div_End();

    }

	public function contact_data() {
        $header  = get_field( 'page_contact_date_header' );
        $mail    = get_field( 'page_contact_date_mail' );
        $phone   = get_field( 'page_contact_date_phone' );
        $content = get_field( 'page_contact_date_content' );
        ?>
        <section>
            <?php if ( $header ) : ?>
                <header class="header-block">
                    <h2 class="header-block__header header-block__header--left"><?= $header; ?></h2>
                </header>
            <?php endif; ?>

            <?php if ( $mail ) : ?>
                <div class="p-contact__contact-item">
                    <img
                        data-src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/icon__contact--mail.svg"
                        src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png"
                        alt="" class="lazyload"/>

                    <a class="contact-item__link"
                       href="mailto:<?= esc_html( antispambot( $mail ) ); ?>"><?= esc_html( antispambot( $mail ) ); ?></a>
                </div>
            <?php endif; ?>

            <?php if ( $phone ) : ?>
                <div class="p-contact__contact-item">
                    <img
                        data-src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/icon__contact--phone.svg"
                        src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png"
                        alt="" class="lazyload"/>

                    <a href="tel:<?= filter_var( $phone, FILTER_SANITIZE_NUMBER_INT ); ?>">
                        <?= $phone; ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php if ( have_rows( 'page_contact_date_content' ) ) : ?>
                <div class="p-contact__contact-info">
                    <?php while ( have_rows( 'page_contact_date_content' ) ) : the_row(); ?>

                        <?php
                            $header     = get_sub_field( 'header' );
                            $header_big = get_sub_field( 'header_big' );
                            $content    = get_sub_field( 'content' );
                        ?>

                        <div class="contact-info">
                            <?php if ( $header ) : ?>
                                <h3 class="contact-info__header"><?= $header; ?></h3>
                            <?php endif; ?>

                            <?php if ( $header_big ) : ?>
                                <span class="contact-info__big-text"><?= $header_big; ?></span>
                            <?php endif; ?>

                            <?php if ( $content ) : ?>
                                <?= $content; ?>
                            <?php endif; ?>
                        </div>

                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </section>
        <?php
	}

    public function contact_social_media() {
        ?>
        <div class="p-contact__sm-wrapper">
            <b><?php the_field( 'page_contact_sm_header' ); ?></b>

            <?php if ( have_rows( 'page_sm_buttons' ) ) : ?>
                <?= '<ul class="p-contact__sm">'; ?>
                <?php while ( have_rows( 'page_sm_buttons' ) ) : the_row(); ?>

                    <?php
                    $link = get_sub_field( 'url' );
                    $icon = get_sub_field( 'icon' );
                    ?>

                    <li class="contact-icon">
                        <a class="contact-icon__link contact-icon__link--<?= $icon; ?> no-link-decor"
                           href="<?= $link; ?>"
                           target="_blank"
                           rel="nofollow"></a>
                    </li>

                <?php endwhile; ?>
                <?= '</ul>'; ?>
            <?php endif; ?>
        </div>
        <?php
    }

    /**
     * Contact Form.
     */
    public function contact_form() {
        $header             = get_field( 'page_contact_form_header' );
        $header_description = get_field( 'page_contact_form_description' );
        $form_id            = get_field( 'page_contact_form_id_form' );
        $form_ajax          = get_field( 'page_contact_form_ajax' );
        ?>
        <section class="p-contact__contact-form">
            <?php if ( $header ) : ?>
                <header class="header-block">
                    <h2 class="header-block__header header-block__header--left"><?= $header; ?></h2>
                </header>
            <?php endif; ?>

            <div class="p-contact__form-wrapper">
                <?php if ( $header_description ) : ?>
                    <span class="contact-form__description"><?= $header_description; ?></span>
                <?php endif; ?>

                <?= do_shortcode( '[gravityform id="' . $form_id . '" title="false" description="false" ajax="false"]' ); ?>
            </div>
        </section>
        <?php
    }

    public function contact_map() {
        new Contact_Map();
    }

}

new Page_Contact();
genesis();
