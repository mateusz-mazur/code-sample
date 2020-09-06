<?php
	/**
	 * Logos Block Template.
	 *
	 * @param array $block The block settings and attributes.
	 * @param string $content The block inner HTML (empty).
	 * @param bool $is_preview True during AJAX preview.
	 * @param   (int|string) $post_id The post ID this block is saved to.
	 */

	// Create id attribute allowing for custom "anchor" value.

    $id = 'logos-' . $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'block-logos';
	if ( ! empty( $block['className'] ) ) {
		$className .= ' ' . $block['className'];
	}

	if ( ! empty( $block['align'] ) ) {
		$className .= ' align' . $block['align'];
	}

    // Load values and assing defaults.
    $block_header = get_field( 'block_logos_header' );

?>

<div id="<?= $id; ?>" class="<?= $className; ?>">

    <div class="l-container">

        <?php if ( $block_header ) : ?>
            <header class="header-block" data-aos="fade-in">
                <h2 class="header-block__header header-block__header--center"><?= $block_header; ?></h2>
            </header>
        <?php endif; ?>

    </div>

    <?php if ( have_rows( 'block_logos' ) ) : ?>
        <div class="l-container">
            <div class="logos-slider">

            <?php while ( have_rows( 'block_logos' ) ) : the_row(); ?>

                <?php
                    $image = get_sub_field( 'logo' );
                    $url   = get_sub_field( 'url' );
                ?>

                <div class="logos-slider__item-wrapper">
                    <?php if ( $url ) : ?><a href="<?= $url['url']; ?>" <?= ( '_blank' === $url['target'] ) ? 'target="_blank" rel="nofollow noopener noreferrer"' : ''; ?>><?php endif; ?>

                        <img data-src="<?php echo esc_attr( $image['sizes']['video-slider'] ); ?>" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="logos-slider__item lazyload" />

                    <?php if ( $url ) : ?></a><?php endif; ?>
                </div>

            <?php endwhile; ?>,
            </div>
        </div>
    <?php endif; ?>

</div>
