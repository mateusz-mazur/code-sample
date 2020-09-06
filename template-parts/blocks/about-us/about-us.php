<?php
	/**
	 * About Us Block Template.
	 *
	 * @param array $block The block settings and attributes.
	 * @param string $content The block inner HTML (empty).
	 * @param bool $is_preview True during AJAX preview.
	 * @param   (int|string) $post_id The post ID this block is saved to.
	 */

	// Create id attribute allowing for custom "anchor" value.
	$id = 'about-us-' . $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'block-about-us';
	if ( ! empty( $block['className'] ) ) {
		$className .= ' ' . $block['className'];
	}

	if ( ! empty( $block['align'] ) ) {
		$className .= ' align' . $block['align'];
	}

	// Load values and assing defaults.
    $header_main = get_field( 'block_about_us_header_main' );
    $image       = get_field( 'block_about_us_image' );
    $header      = get_field( 'block_about_us_header' );
    $content     = get_field( 'block_about_us_content' );
    $button      = get_field( 'block_about_us_button' );
?>

<div id="<?= $id; ?>" class="<?= $className; ?>">

    <div class="l-container">

        <?php if ( $header_main ) : ?>
            <header class="header-block" data-aos="fade-in">
                <h2 class="header-block__header header-block__header--center"><?= $header_main; ?></h2>
            </header>
        <?php endif; ?>

        <div class="l-cols <?= $className; ?>__item-wrapper">

            <?php if ( $image ) : ?>
                <div class="l-cols__col item__image-wrapper" data-aos="fade-in">
                    <div class="item__image image-with-decor image-with-decor--right">
                        <img data-src="<?php echo esc_attr( $image['url'] ); ?>" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="lazyload" />
                    </div>
                </div>
            <?php endif; ?>

            <div class="l-cols__col item__description-wrapper" data-aos="fade-in">

                <?php if ( $header ) : ?>
                    <h3 class="item__description-header"><?= $header; ?></h3>
                <?php endif; ?>

                <?php if ( $content ) : ?>
                    <div class="item__description-text">
                        <?= $content; ?>
                    </div>
                <?php endif; ?>

                <?php if ( $button ) : ?>
                    <a href="<?= $button['url']; ?>" class="c-button c-button__full c-button__full--primary-color c-button__full--medium" data-aos="fade-in"><?= $button['title']; ?> <span class="c-button__arrow"></span></a>
                <?php endif; ?>

            </div>

        </div>

    </div>
</div>

