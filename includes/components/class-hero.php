<?php
/**
 * Hero.
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

/**
 * Hero.
 */
class Hero {

    /**
     * Constructor.
     */
    public function __construct() {

        $this->hero_section();

    }

    /**
     * Hero Section.
     */
    public function hero_section() {

        $current_post_type = get_post_type();

        // Set default field values.
        $field_prefix  = 'hero_';
        $is_option     = '';
        $hero_css_type = '';

        // Set ACF fields.
        if ( is_post_type_archive( 'faq' ) ) {
            $field_prefix  = 'hero_faq_';
            $is_option     = 'option';
        } elseif ( is_post_type_archive( 'projekty' ) ) {
            $field_prefix  = 'hero_projects_';
            $is_option     = 'option';
        } elseif ( is_home() ) {
            $field_prefix  = 'hero_blog_';
            $is_option     = 'option';
        } elseif ( is_page() ) {
            $field_prefix  = 'hero_page_';
            $is_option     = '';
        }

        // Set field id's.
        $field_type = $field_prefix . 'type';
        $field_header_simple = $field_prefix . 'header_simple';
        $field_description_simple = $field_prefix . 'description_simple';
        $field_header_1 = $field_prefix . 'header_1';
        $field_header_1_font_weight = $field_prefix . 'header_1_font_weight';
        $field_header_1_font_size = $field_prefix . 'header_1_font_size';
        $field_header_2 = $field_prefix . 'header_2';
        $field_header_2_font_weight = $field_prefix . 'header_2_font_weight';
        $field_header_2_font_size = $field_prefix . 'header_2_font_size';
        $field_header_description = $field_prefix . 'header_description';
        $field_header_button_type = $field_prefix . 'header_button_type';
        $field_header_image = $field_prefix . 'header_image';
        $field_header_button = $field_prefix . 'header_button';
        $field_header_button_scroll_label = $field_prefix . 'header_button_scroll_label';
        $field_header_banner_1 = $field_prefix . 'header_banner_1';
        $field_header_banner_1_font_weight = $field_prefix . 'header_banner_1_font_weight';
        $field_header_banner_2 = $field_prefix . 'header_banner_2';
        $field_header_banner_2_font_weight = $field_prefix . 'header_banner_2_font_weight';
        $field_header_banner_description = $field_prefix . 'header_banner_description';
        $field_header_banner_image = $field_prefix . 'header_banner_image';
        $field_header_banner_button_type = $field_prefix . 'header_banner_button_type';
        $field_header_banner_button = $field_prefix . 'header_banner_button';
        $field_header_banner_button_scroll_label = $field_prefix . 'header_banner_button_scroll_label';

        $field_header_slider_1 = $field_prefix . 'header_slider_1';
        $field_header_slider_1_font_weight = $field_prefix . 'header_slider_1_font_weight';
        $field_header_slider_2 = $field_prefix . 'header_slider_2';
        $field_header_slider_2_font_weight = $field_prefix . 'header_slider_2_font_weight';
        $field_header_slider_description = $field_prefix . 'header_slider_description';
        $field_header_slider_slides = $field_prefix . 'header_slider_items';

        // Get the fields.
        $type = get_field( $field_type, $is_option );
        $field_header_simple = get_field( $field_header_simple, $is_option );
        $field_description_simple = get_field( $field_description_simple, $is_option );
        $field_header_1 = get_field( $field_header_1, $is_option );
        $field_header_1_font_weight = get_field( $field_header_1_font_weight, $is_option );
        $field_header_1_font_size = get_field( $field_header_1_font_size, $is_option );
        $field_header_2 = get_field( $field_header_2, $is_option );
        $field_header_2_font_weight = get_field( $field_header_2_font_weight, $is_option );
        $field_header_2_font_size = get_field( $field_header_2_font_size, $is_option );
        $field_header_description = get_field( $field_header_description, $is_option );
        $field_header_image = get_field( $field_header_image, $is_option );
        $field_header_button_type = get_field( $field_header_button_type, $is_option );
        $field_header_button = get_field( $field_header_button, $is_option );
        $field_header_button_scroll_label = get_field( $field_header_button_scroll_label, $is_option );
        $field_header_banner_1 = get_field( $field_header_banner_1, $is_option );
        $field_header_banner_1_font_weight = get_field( $field_header_banner_1_font_weight, $is_option );
        $field_header_banner_2 = get_field( $field_header_banner_2, $is_option );
        $field_header_banner_2_font_weight = get_field( $field_header_banner_2_font_weight, $is_option );
        $field_header_banner_description = get_field( $field_header_banner_description, $is_option );
        $field_header_banner_image = get_field( $field_header_banner_image, $is_option );
        $field_header_banner_button_type = get_field( $field_header_banner_button_type, $is_option );
        $field_header_banner_button = get_field( $field_header_banner_button, $is_option );
        $field_header_banner_button_scroll_label = get_field( $field_header_banner_button_scroll_label, $is_option );

        $field_header_slider_1 = get_field( $field_header_slider_1, $is_option );
        $field_header_slider_1_font_weight = get_field( $field_header_slider_1_font_weight, $is_option );
        $field_header_slider_2 = get_field( $field_header_slider_2, $is_option );
        $field_header_slider_2_font_weight = get_field( $field_header_slider_2_font_weight, $is_option );
        $field_header_slider_description = get_field( $field_header_slider_description, $is_option );
        $field_header_slider_slides = get_field( $field_header_slider_slides, $is_option );

        // Set CSS class.
        if ( 'with-decors' ===  $type ) {
            $hero_css_type = 'page-hero--with-decors';
        } elseif ( 'simple-title' === $type ) {
            $hero_css_type = 'page-hero--simple-title';
        } elseif ( 'banner-image' === $type ) {
            $hero_css_type = 'page-hero--banner';
        } elseif ( 'slider' === $type ) {
            $hero_css_type = 'page-hero--slider';
        }

        ?>

        <?php if ( 'simple-title' === $type ) : ?>

            <div class="page-hero page-hero--simple-title">

                <?php if ( $field_header_simple ) : ?>
                    <header class="header-block">
                        <h1 class="header-block__header header-block__header--center"><?= $field_header_simple; ?></h1>
                    </header>
                <?php endif; ?>

                <div class="page-hero__description">
                    <?= $field_description_simple; ?>
                </div>

            </div>

        <?php endif; ?>


        <?php if ( 'with-decors' === $type ) : ?>

            <div class="page-hero <?= $hero_css_type; ?>">
                <div class="l-container">
                    <div class="l-cols">

                        <div class="l-cols__col js-col-match-height page-hero__description">
                            <header class="header-block">
                                <h1 class="header-block__header header-block__header--left">
                                    <?php if ( $field_header_1 ) : ?>
                                        <?php
                                            $classes = ( 'semi-bold' === $field_header_1_font_weight ) ? 'font-weight--semibold' : ' font-weight--regular';
                                            $classes .= ( 'big' === $field_header_1_font_size ) ? ' font-size--big' : ' font-size--normal';
                                        ?>
                                        <span class="<?= $classes; ?>"><?= $field_header_1; ?></span>
                                    <?php endif; ?>

                                    <?php if ( $field_header_2 ) : ?>
                                        <?php
                                        $classes = ( 'semi-bold' === $field_header_2_font_weight ) ? 'font-weight--semibold' : ' font-weight--regular';
                                        $classes .= ( 'big' === $field_header_2_font_size ) ? ' font-size--big' : ' font-size--normal';
                                        ?>
                                        <span class="<?= $classes; ?>"><?= $field_header_2; ?></span>
                                    <?php endif; ?>
                                </h1>
                            </header>

                            <?php
                                if ( is_post_type_archive() ) {
                                    echo $field_header_description;
                                } else {
                                    if ( has_excerpt() ) {
                                        the_excerpt();
                                    } else {
                                        echo $field_header_description;
                                    }
                                }
                            ?>

                            <?php if ( 'none' !== $field_header_button_type ) : ?>

                                <div class="page-hero__button page-hero__button--desktop">
                                    <a href="<?= ( 'link' === $field_header_button_type ) ? $field_header_button['url'] : '#'; ?>" class="c-button c-button__full c-button__full--primary-color c-button__full--medium c-button__full--wide <?= ( 'scroll' === $field_header_button_type ) ? 'js-button-scroll-to-content' : ''; ?>"><?= $field_header_button_scroll_label; ?> <span class="c-button__arrow"></span></a>
                                </div>

                            <?php endif; ?>
                        </div>

                        <div class="l-cols__col js-col-match-height page-hero__image">
                            <?php if ( $field_header_image ) : ?>
                                <?= wp_get_attachment_image( $field_header_image['id'], '', "", array( "class" => "object-fit-cover lazyload", "data-lazy"=>"true") ); ?>
                            <?php endif; ?>

                            <?php if ( 'none' !== $field_header_button_type ) : ?>

                                <div class="page-hero__button page-hero__button--mobile">
                                    <a href="<?= ( 'link' === $field_header_button_type ) ? $field_header_button['url'] : '#'; ?>" class="c-button c-button__full c-button__full--primary-color c-button__full--medium c-button__full--wide <?= ( 'scroll' === $field_header_button_type ) ? 'js-button-scroll-to-content' : ''; ?>"><?= $field_header_button_scroll_label; ?> <span class="c-button__arrow"></span></a>
                                </div>

                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <div class="page-hero__decor--left-bottom"></div>
            </div>

        <?php endif; ?>


        <?php if ( 'banner-image' === $type ) : ?>

            <div class="page-hero page-hero--banner">

                <div class="page-hero__image-wrapper">
                    <?php if ( $field_header_banner_image ) : ?>
                        <?= wp_get_attachment_image( $field_header_banner_image['id'], '', "", array( "class" => "page-hero__image object-fit-cover lazyload", "data-lazy"=>"true") ); ?>
                    <?php endif; ?>
                </div>

                <div class="page-hero__content">

                    <header class="header-block">
                        <h1 class="header-block__header header-block__header--center">

                            <?php if ( $field_header_banner_1 ) : ?>
                                <?php
                                $classes = ( 'semi-bold' === $field_header_banner_1_font_weight ) ? 'font-weight--semibold' : ' font-weight--regular';
                                ?>
                                <span class="<?= $classes; ?>"><?= $field_header_banner_1; ?></span>
                            <?php endif; ?>

                            <?php if ( $field_header_banner_2 ) : ?>
                                <?php
                                $classes = ( 'semi-bold' === $field_header_banner_2_font_weight ) ? 'font-weight--semibold' : ' font-weight--regular';
                                ?>
                                <span class="<?= $classes; ?>"><?= $field_header_banner_2; ?></span>
                            <?php endif; ?>

                        </h1>
                    </header>

                    <?php if ( $field_header_banner_description ) : ?>
                        <div class="page-hero__description">
                            <?= $field_header_banner_description; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( 'none' !== $field_header_banner_button_type ) : ?>

                        <div class="page-hero__button">
                            <a href="<?= ( 'link' === $field_header_banner_button_type ) ? $field_header_banner_button['url'] : '#'; ?>" class="c-button c-button__full c-button__full--primary-color c-button__full--medium c-button__full--wide <?= ( 'scroll' === $field_header_banner_button_type ) ? 'js-button-scroll-to-content' : ''; ?>"><?= $field_header_banner_button_scroll_label; ?> <span class="c-button__arrow"></span></a>
                        </div>

                    <?php endif;?>

                </div>

                <?php if ( 'scroll' === $field_header_banner_button_type ) : ?>
                    <div class="page-hero__arrow-down js-button-scroll-to-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20.157" height="23.388" viewBox="0 0 20.157 23.388" class="page-hero__arrow-icon">
                            <g id="prefix__arrows-scroll" transform="translate(.88 .888)">
                                <path id="prefix__Path_446" d="M18.4 9.11L9.2 0 0 9.11" data-name="Path 446" transform="rotate(180 9.199 4.555)" style="stroke:#3c3c3b;fill:none;stroke-miterlimit:10;stroke-width:2.5px;fill-rule:evenodd" />
                                <path id="prefix__Path_447" d="M18.4 9.11L9.2 0 0 9.11" data-name="Path 447" transform="rotate(180 9.199 10.37)" style="stroke:#ffcd00;fill:none;stroke-miterlimit:10;stroke-width:2.5px;fill-rule:evenodd" />
                            </g>
                        </svg>
                    </div>
                <?php endif; ?>

            </div>

        <?php endif; ?>


        <?php if ( 'slider' === $type ) : ?>

        <div class="page-hero <?= $hero_css_type; ?>">
            <div class="l-container">
                <div class="l-cols">

                    <div class="l-cols__col page-hero__description">
                        <header class="header-block">
                            <h1 class="header-block__header header-block__header--left">
                                <?php if ( $field_header_slider_1 ) : ?>
                                    <?php
                                    $classes = ( 'semi-bold' === $field_header_slider_1_font_weight ) ? 'font-weight--semibold' : ' font-weight--regular';
                                    $classes .= ( 'big' === $field_header_1_font_size ) ? ' font-size--big' : ' font-size--normal';
                                    ?>
                                    <span class="<?= $classes; ?>"><?= $field_header_slider_1; ?></span>
                                <?php endif; ?>

                                <?php if ( $field_header_slider_2 ) : ?>
                                    <?php
                                    $classes = ( 'semi-bold' === $field_header_slider_2_font_weight ) ? 'font-weight--semibold' : ' font-weight--regular';
                                    $classes .= ( 'big' === $field_header_2_font_size ) ? ' font-size--big' : ' font-size--normal';
                                    ?>
                                    <span class="<?= $classes; ?>"><?= $field_header_slider_2; ?></span>
                                <?php endif; ?>
                            </h1>
                        </header>

                        <div class="page-hero__description-text">
                            <?php echo $field_header_slider_description; ?>
                        </div>

                        <?php if ( 'none' !== $field_header_button_type ) : ?>

                            <div class="page-hero__button">
                                <a href="<?= ( 'link' === $field_header_button_type ) ? $field_header_button['url'] : '#'; ?>" class="c-button c-button__full c-button__full--primary-color c-button__full--medium c-button__full--wide <?= ( 'scroll' === $field_header_button_type ) ? 'js-button-scroll-to-content' : ''; ?>"><?= $field_header_button_scroll_label; ?> <span class="c-button__arrow"></span></a>
                            </div>

                        <?php endif; ?>
                    </div>

                    <div class="l-cols__col page-hero__slider">

                        <?php if ( $field_header_slider_slides ) : ?>

                            <?php if ( have_rows( 'hero_page_header_slider_items' ) ) : ?>
                                <div class="hero-slider">
                                    <?php while ( have_rows( 'hero_page_header_slider_items' ) ) : the_row(); ?>

                                        <?php
                                            $image = get_sub_field( 'image' );
                                            $text  = get_sub_field( 'text' );
                                            $position_x = get_sub_field( 'position_x' );
                                            $position_y = get_sub_field( 'position_y' );
                                        ?>

                                        <div class="hero-slider__item-wrapper">
                                            <?= wp_get_attachment_image( $image['id'], '', "", array( "class" => "page-hero__image object-fit-cover") ); ?>

                                            <div class="hero-slider__popover" style="top: <?= $position_y; ?>; left: <?= $position_x; ?>">
                                                <div class="popover__text">
                                                    <?= $text; ?>
                                                </div>

                                                <div class="hero-slider__pulsar-icon popover__pulsar-icon">
                                                     <div class="pulsar-icon__circle pulsar-icon__circle--1"></div>
                                                     <div class="pulsar-icon__circle pulsar-icon__circle--2"></div>
                                                     <div class="pulsar-icon__circle pulsar-icon__circle--3"></div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>

                        <?php endif; ?>

                    </div>

                </div>
            </div>

            <div class="page-hero__decor--left-bottom"></div>
        </div>

        <?php endif; ?>

        <?php
    }

}
