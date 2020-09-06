<?php
	/**
	 * Offer CTA Block Template.
	 *
	 * @param array $block The block settings and attributes.
	 * @param string $content The block inner HTML (empty).
	 * @param bool $is_preview True during AJAX preview.
	 * @param   (int|string) $post_id The post ID this block is saved to.
	 */

	// Create id attribute allowing for custom "anchor" value.
	$id = 'offer-cta-' . $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'block-offer-cta';
	if ( ! empty( $block['className'] ) ) {
		$className .= ' ' . $block['className'];
	}

	if ( ! empty( $block['align'] ) ) {
		$className .= ' align' . $block['align'];
	}

	// Load values and assing defaults.
    $block_header = get_field( 'block_offer_header' );
    $mail_icon    = get_field( 'block_offer_cta_mail_icon' );
    $mail_header  = get_field( 'block_offer_cta_mail_header' );
    $mail_form    = get_field( 'block_offer_cta_mail_form' );
    $phone_icon   = get_field( 'block_offer_cta_phone_icon' );
    $phone_header = get_field( 'block_offer_cta_phone_header' );
    $phone_number = get_field( 'block_offer_cta_phone_number' );

?>

<div id="<?= $id; ?>" class="<?= $className; ?>">

	<div class="l-container">

        <?php if ( $block_header ) : ?>
            <header class="header-block">
                <h2 class="header-block__header header-block__header--center"><?= $block_header; ?></h2>
            </header>
        <?php endif; ?>

		<div class="l-cols">

			<div class="l-cols__col <?= $className; ?>__item-wrapper">

				<div class="item__icon-wrapper">
					<div class="item__background">

                        <?php if ( $mail_icon ) : ?>
                            <img data-src="<?php echo esc_attr( $mail_icon['url'] ); ?>" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="<?php echo esc_attr( $mail_icon['alt'] ); ?>" class="lazyload item__icon" />
                        <?php endif; ?>

					</div>
				</div>

				<div class="item__content">

                    <?php if ( $mail_header ) : ?>
                        <div class="item__description">
                            <span><?= $mail_header; ?></span>
                        </div>
                    <?php endif; ?>

                    <?= do_shortcode( '[gravityform id="' . $mail_form . '" title="false" description="false" ajax="false"]' ); ?>
				</div>

			</div>

            <div class="l-cols__col <?= $className; ?>__item-wrapper">

                <div class="item__icon-wrapper">
                    <div class="item__background">

                        <?php if ( $phone_icon ) : ?>
                            <img data-src="<?php echo esc_attr( $phone_icon['url'] ); ?>" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="<?php echo esc_attr( $phone_icon['alt'] ); ?>" class="lazyload item__icon" />
                        <?php endif; ?>

                    </div>
                </div>

                <div class="item__content">

                    <?php if ( $phone_header ) : ?>
                        <div class="item__description">
                            <span><?= $phone_header; ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if ( $phone_number ) : ?>
                        <a href="tel:<?php echo filter_var( $phone_number, FILTER_SANITIZE_NUMBER_INT ); ?>" class="item__phone-number"><?= $phone_number; ?></a>
                    <?php endif; ?>
                </div>

            </div>
		</div>
	</div>
</div>
