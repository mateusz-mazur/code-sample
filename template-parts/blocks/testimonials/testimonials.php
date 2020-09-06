<?php
	/**
	 * Testimonials Block Template.
	 *
	 * @param array $block The block settings and attributes.
	 * @param string $content The block inner HTML (empty).
	 * @param bool $is_preview True during AJAX preview.
	 * @param   (int|string) $post_id The post ID this block is saved to.
	 */

	// Create id attribute allowing for custom "anchor" value.
	$id = 'testimonials-' . $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'block-testimonials';
	if ( ! empty( $block['className'] ) ) {
		$className .= ' ' . $block['className'];
	}

	if ( ! empty( $block['align'] ) ) {
		$className .= ' align' . $block['align'];
	}

	// Load values and assing defaults.
    $header_main  = get_field( 'block_testimonials_header' );
    $testimonials = get_field( 'block_testimonials_items' );
?>
<?php if ( $testimonials ) : ?>
    <div id="<?= $id; ?>" class="<?= $className; ?>">

        <div class="l-container">

            <?php if ( $header_main ) : ?>
                <header class="header-block" data-aos="fade-in">
                    <h2 class="header-block__header header-block__header--center"><?= $header_main; ?></h2>
                </header>
            <?php endif; ?>

            <div class="l-cols">

                <div class="l-cols__col" data-aos="fade-in">

                    <?php if ( have_rows( 'block_testimonials_items' ) ) : ?>
                        <ul class="box-testimonials-logos">
                            <?php while ( have_rows( 'block_testimonials_items' ) ) : the_row(); ?>

                                <?php
                                    $row_index = get_row_index();
                                    $logo      = get_sub_field( 'logo' );
                                    $logo_ga   = get_sub_field( 'logo_ga' );
                                ?>

                                <?php if ( $logo ) : ?>

                                    <li class="item" id="item-<?= $row_index; ?>">
                                        <img data-src="<?php echo esc_attr( $logo['url'] ); ?>" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="<?php echo esc_attr( $logo['alt'] ); ?>" class="lazyload" <?= ( $logo_ga ) ? 'onclick="' . $logo_ga . '"': ''; ?> />
                                    </li>

                                <?php endif; ?>

                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>

                </div>

                <div class="l-cols__col" data-aos="fade-in">

                    <?php if ( have_rows( 'block_testimonials_items' ) ) : ?>
                        <div class="box-testimonials-desc">
                            <?php while ( have_rows( 'block_testimonials_items' ) ) : the_row(); ?>

                                <?php
                                    $row_index = get_row_index();
                                    $content   = get_sub_field( 'content' );
                                    $author    = get_sub_field( 'author' );
                                    $company   = get_sub_field( 'company' );
                                ?>

                                <div class="item item-<?= $row_index; ?>">
                                    <div class="testimonial-item-quote">
                                        <?= $content; ?>
                                        <span class="triangle"></span>
                                    </div>

                                    <div class="testimonial-item-byline">
                                        <span class="testimonial-item-name"><?= $author; ?></span>
                                        <span class="testimonial-item-company"><?= $company; ?></span>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                </div>

            </div>

        </div>
    </div>
<?php endif; ?>
