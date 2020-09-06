<?php
	/**
	 * Board Block Template.
	 *
	 * @param array $block The block settings and attributes.
	 * @param string $content The block inner HTML (empty).
	 * @param bool $is_preview True during AJAX preview.
	 * @param   (int|string) $post_id The post ID this block is saved to.
	 */

	// Create id attribute allowing for custom "anchor" value.
	$id = 'board-' . $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'block-board';
	if ( ! empty( $block['className'] ) ) {
		$className .= ' ' . $block['className'];
	}

	if ( ! empty( $block['align'] ) ) {
		$className .= ' align' . $block['align'];
	}

	// Load values and assing defaults.
    $header_main = get_field( 'block_board_header' );
    $board       = get_field( 'block_board_items' );
?>
<?php if ( $board ) : ?>
    <div id="<?= $id; ?>" class="<?= $className; ?>">

        <div class="l-container">

            <?php if ( $header_main ) : ?>
                <header class="header-block" data-aos="fade-in">
                    <h2 class="header-block__header header-block__header--center"><?= $header_main; ?></h2>
                </header>
            <?php endif; ?>

            <?php if ( have_rows( 'block_board_items' ) ) : ?>
                <div class="l-cols <?= $className; ?>__item-wrapper">
                    <?php while ( have_rows( 'block_board_items' ) ) : the_row(); ?>

                        <?php
                            $image = get_sub_field( 'image' );
                            $name = get_sub_field( 'name' );
                            $position = get_sub_field( 'position' );
                            $description = get_sub_field( 'description' );
                            $email = get_sub_field( 'email' );
                            $phone = get_sub_field( 'phone' );
                        ?>

                        <div class="l-cols__col <?= $className; ?>__item" data-aos="fade-in">

                            <?php if ( $image ) : ?>
                                <div class="item__image-wrapper">
                                    <div class="item__image image-with-decor image-with-decor--right">
                                        <img data-src="<?php echo esc_attr( $image['sizes']['project-teaser'] ); ?>" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="lazyload" />
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if ( $name) : ?>

                                <header class="header-block" data-aos="fade-in">
                                    <h3 class="header-block__header header-block__header--center"><?= $name; ?></h3>
                                    <span class="header-block__position"><?= $position; ?></span>
                                </header>

                            <?php endif; ?>

                            <div class="<?= $className; ?>__description">
                                <?= $description; ?>
                            </div>

                            <div class="<?= $className; ?>__contact">
                                <div class="item-contact item-contact-mail">
                                    <span class="item-contact-icon"></span>
                                    <span><a href="mailto:<?= esc_html( antispambot( $email ) ); ?>"><?= esc_html( antispambot( $email ) ); ?></a></span>
                                </div>

                                <div class="item-contact item-contact-phone">
                                    <span class="item-contact-icon"></span>
                                    <span class="item-phone-number">
                                <span class="show-phone-number">...</span>
                                <a href="tel:<?= filter_var( $phone, FILTER_SANITIZE_NUMBER_INT ); ?>" class="phone-number"><?= $phone; ?></a>
                            </span>
                                </div>
                            </div>

                        </div>

                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>
