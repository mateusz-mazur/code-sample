<?php
	/**
	 * Offer Block Template.
	 *
	 * @param array $block The block settings and attributes.
	 * @param string $content The block inner HTML (empty).
	 * @param bool $is_preview True during AJAX preview.
	 * @param   (int|string) $post_id The post ID this block is saved to.
	 */

	// Create id attribute allowing for custom "anchor" value.
	$id = 'offer-' . $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'block-offer';
	if ( ! empty( $block['className'] ) ) {
		$className .= ' ' . $block['className'];
	}

	if ( ! empty( $block['align'] ) ) {
		$className .= ' align' . $block['align'];
	}

	// Load values and assing defaults.
    $block_header = get_field( 'block_offer_header' );
    $offer        = get_field( 'block_offer_items' );
?>

<div id="<?= $id; ?>" class="<?= $className; ?>">

	<div class="l-container">

        <?php if ( $block_header ) : ?>
            <header class="header-block">
                <h2 class="header-block__header header-block__header--center"><?= $block_header; ?></h2>
            </header>
        <?php endif; ?>

        <?php if ( have_rows( 'block_offer_items' ) ) : ?>
            <div class="l-cols <?= $className; ?>__items-wrapper">
                <?php while ( have_rows( 'block_offer_items' ) ) : the_row(); ?>

                    <?php
                        $icon        = get_sub_field( 'icon' );
                        $icon_hover  = get_sub_field( 'icon_hover' );
                        $header      = get_sub_field( 'header' );
                        $description = get_sub_field( 'description' );
                        $button      = get_sub_field( 'link' );
                    ?>

                    <div class="l-cols__col" data-aos="fade-in">
                        <div class="offer-item">
                            <div class="offer-item__icon">
                                <?php if ( $icon ) : ?>
                                    <img data-src="<?php echo esc_attr( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" class="offer-icon offer-icon--basic lazyload" />
                                    <img data-src="<?php echo esc_attr( $icon_hover['url'] ); ?>" src="<?php echo esc_attr( $icon_hover['url'] ); ?>" alt="<?php echo esc_attr( $icon_hover['alt'] ); ?>" class="offer-icon offer-icon--hover lazyload" />

                                <?php endif; ?>
                            </div>

                            <?php if ( $header ) : ?>
                                <h3 class="offer-item__header"><?= $header; ?></h3>
                            <?php endif; ?>

                            <?php if ( $description ) : ?>
                                <div class="offer-item__description">
                                    <?= $description; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ( $button ) : ?>
                                <a href="<?= $button['url']; ?>" class="c-button c-button__full c-button__full--white-color c-button__full--medium"><?= $button['title']; ?><span class="c-button__arrow"></span></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

	</div>
</div>
