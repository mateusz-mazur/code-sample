<?php
	/**
	 * Benefits Block Template.
	 *
	 * @param array $block The block settings and attributes.
	 * @param string $content The block inner HTML (empty).
	 * @param bool $is_preview True during AJAX preview.
	 * @param   (int|string) $post_id The post ID this block is saved to.
	 */

	// Create id attribute allowing for custom "anchor" value.
	$id = 'benefits-' . $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'block-benefits';
	if ( ! empty( $block['className'] ) ) {
		$className .= ' ' . $block['className'];
	}

	if ( ! empty( $block['align'] ) ) {
		$className .= ' align' . $block['align'];
	}

	// Load values and assing defaults.
    $type         = get_field( 'block_benefits_type' );
    $block_header = get_field( 'block_benefits_header' );
    $benefits     = get_field( 'block_benefits_items' );
?>

<div id="<?= $id; ?>" class="<?= $className; ?>">

	<div class="l-container">

        <?php if ( $block_header ) : ?>
            <header class="header-block" data-aos="fade-in">
                <h2 class="header-block__header header-block__header--center"><?= $block_header; ?></h2>
            </header>
        <?php endif; ?>

        <?php if ( have_rows( 'block_benefits_items' ) ) : ?>
            <div class="l-cols <?= $className; ?>__items-wrapper">
                <?php while ( have_rows( 'block_benefits_items' ) ) : the_row(); ?>

                    <?php
                        $icon        = get_sub_field( 'icon' );
                        $header      = get_sub_field( 'header' );
                        $description = get_sub_field( 'description' );
                    ?>

                    <div class="l-cols__col <?= $className; ?>__item <?= ( 'circles' === $type ) ? $className . '__item--circle' : $className . '__item--square'; ?>" data-aos="fade-in">
                        <div class="<?= $className; ?>__item-wrapper">

                            <div class="item__icon">
                                <?php if ( $icon ) : ?>
                                    <img data-src="<?php echo esc_attr( $icon['url'] ); ?>" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="<?php echo esc_attr( $icon['alt'] ); ?>" class="lazyload" />
                                <?php endif; ?>
                            </div>

                            <div class="item__description">

                                <?php if ( $header ) : ?>
                                    <h3 class="item__description-header"><?= $header; ?></h3>
                                <?php endif; ?>

                                <?php if ( $description ) : ?>
                                    <div class="item__description-text">
                                        <?= $description; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>

	</div>
</div>
