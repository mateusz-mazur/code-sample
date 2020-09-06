<?php
	/**
	 * History Block Template.
	 *
	 * @param array $block The block settings and attributes.
	 * @param string $content The block inner HTML (empty).
	 * @param bool $is_preview True during AJAX preview.
	 * @param   (int|string) $post_id The post ID this block is saved to.
	 */

	// Create id attribute allowing for custom "anchor" value.
	$id = 'history-' . $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'block-history';
	if ( ! empty( $block['className'] ) ) {
		$className .= ' ' . $block['className'];
	}

	if ( ! empty( $block['align'] ) ) {
		$className .= ' align' . $block['align'];
	}

	// Load values and assing defaults.
    $header_main = get_field( 'block_history_header' );
    $history     = get_field( 'block_history_history' );
?>
<?php if ( $history ) : ?>
    <div id="<?= $id; ?>" class="<?= $className; ?>">

        <div class="l-container">

            <?php if ( $header_main ) : ?>
                <header class="header-block" data-aos="fade-in">
                    <h2 class="header-block__header header-block__header--center"><?= $header_main; ?></h2>
                </header>
            <?php endif; ?>

            <?php if ( have_rows( 'block_history_history' ) ) : ?>
                <div class="box-history-timeline">
                    <?php while ( have_rows( 'block_history_history' ) ) : the_row(); ?>

                        <?php
                            $row_index   = get_row_index();
                            $year        = get_sub_field( 'year' );
                            $header      = get_sub_field( 'header' );
                            $description = get_sub_field( 'description' );
                            $image       = get_sub_field( 'image' );
                            $position    = get_sub_field( 'position' );
                            $logo        = get_sub_field( 'logo' );
                        ?>

                        <div class="item <?= ( ( $row_index % 2 ) ? 'item--right' : 'item--left' ); ?>" data-aos="fade-in">

                            <div class="item__description">
                                <header>
                                    <h3>
                                        <span><?= $year; ?>:</span> <?= $header; ?>
                                    </h3>
                                </header>

                                <div>
                                    <?= $description; ?>
                                </div>
                            </div>

                            <?php if ( $image ) : ?>
                                <div class="item__image">
                                    <div class="image">

                                        <img data-src="<?php echo esc_attr( $image['sizes']['video-slider'] ); ?>" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="lazyload" />

                                        <g:img src="content/page-about-us/about-us-history-3.jpg" alt=""/>

                                        <?php if ( $logo ) : ?>
                                            <div class="image__logo">
                                                <img data-src="<?php echo esc_attr( $logo['url'] ); ?>" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="<?php echo esc_attr( $logo['alt'] ); ?>" class="lazyload" />
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>

                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>
