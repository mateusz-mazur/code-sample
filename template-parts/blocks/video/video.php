<?php
	/**
	 * video Block Template.
	 *
	 * @param array $block The block settings and attributes.
	 * @param string $content The block inner HTML (empty).
	 * @param bool $is_preview True during AJAX preview.
	 * @param   (int|string) $post_id The post ID this block is saved to.
	 */

	// Create id attribute allowing for custom "anchor" value.

    $id = 'video-' . $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'block-video';
	if ( ! empty( $block['className'] ) ) {
		$className .= ' ' . $block['className'];
	}

	if ( ! empty( $block['align'] ) ) {
		$className .= ' align' . $block['align'];
	}

?>

<div id="<?= $id; ?>" class="<?= $className; ?>">

    <?php if ( have_rows( 'block_video_items' ) ) : ?>
        <div class="l-container">
            <div class="video-slider" data-aos="fade-in">

            <?php while ( have_rows( 'block_video_items' ) ) : the_row(); ?>

                <?php
                    $video       = get_sub_field( 'video' );
                    $placeholder = get_sub_field( 'image' );
                ?>

                <div class="video-slider__item">
                    <div class="item__video single-video__placeholder">
                        <a href="<?= $video; ?>" class="single-video__icon-wrapper js-single-video glightbox">

                            <div class="item__image-wrapper">
                                <div class="item__image">
                                    <img data-src="<?php echo esc_attr( $placeholder['sizes']['video-slider'] ); ?>" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="lazyload" />
                                </div>

                                <div class="item__button-wrapper">
                                    <span class="item__button"></span>
                                </div>
                            </div>

                            <div class="item__play-icon-wrapper">
                                <div class="item__play-icon"></div>
                            </div>

                        </a>
                    </div>
                </div>

            <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>

</div>
