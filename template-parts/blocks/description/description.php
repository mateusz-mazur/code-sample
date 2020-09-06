<?php
	/**
	 * Description Block Template.
	 *
	 * @param array $block The block settings and attributes.
	 * @param string $content The block inner HTML (empty).
	 * @param bool $is_preview True during AJAX preview.
	 * @param   (int|string) $post_id The post ID this block is saved to.
	 */

	// Create id attribute allowing for custom "anchor" value.
	$id = 'description-' . $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'block-description';
	if ( ! empty( $block['className'] ) ) {
		$className .= ' ' . $block['className'];
	}

	if ( ! empty( $block['align'] ) ) {
		$className .= ' align' . $block['align'];
	}

	// Load values and assing defaults.
    $description_items = get_field( 'block_description_items' );
?>

<?php if ( $description_items ) : ?>
    <div id="<?= $id; ?>" class="<?= $className; ?>">

        <div class="l-container">

            <?php if ( have_rows( 'block_description_items' ) ) : ?>
            	<?php while ( have_rows( 'block_description_items' ) ) : the_row(); ?>

            		<?php
            			$header     = get_sub_field( 'header' );
            			$content    = get_sub_field( 'content' );
            			$image_type = get_sub_field( 'image_type' );
            			$image      = get_sub_field( 'image' );
            			$button     = get_sub_field( 'button' );

            			if ( 'video' === $image_type ) {
            			    $video       = get_sub_field( 'embed' );
            			    $placeholder = get_sub_field( 'placeholder' );

                            // Use preg_match to find iframe src.
                            preg_match('/src="(.+?)"/', $video, $matches);
                            $src = isset( $matches[1] ) ? $matches[1] : null;

                            // Add extra parameters to src and replcae HTML.
                            $params = array(
                                'controls'  => 0,
                                'hd'        => 1,
                                'autohide'  => 1
                            );

                            $new_src = add_query_arg($params, $src);
                            $video   = str_replace($src, $new_src, $video);
                        }
            		?>

                    <div class="<?= $className; ?>__item" data-aos="fade-in">
                        <div class="l-cols <?= $className; ?>__item-wrapper">

                            <div class="l-cols__col">

                                <?php if ( 'image' === $image_type ) : ?>

                                    <?php if ( $image ) : ?>
                                        <div class="item__image-wrapper">
                                            <div class="item__image image-with-decor">
                                                <div class="item__hover-container">
                                                    <img data-src="<?php echo esc_attr( $image['sizes']['post-teaser'] ); ?>" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="lazyload" />
                                                    <?php echo get_the_post_thumbnail( $image['id'], 'post-teaser', array( 'class' => 'lazyload' ) ); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                <?php endif; ?>

                                <?php if ( 'video' === $image_type ) : ?>

                                    <div class="item__video single-video__placeholder w-100 h-100 d-flex align-items-center justify-content-center overflow-hidden background-cover" role="img" aria-label="<?= $placeholder['alt']; ?>">

                                        <div data-vimeo-src="<?= $src; ?>" class="single-video__icon-wrapper single-transition js-single-video text-center position-relative z-index-1">

                                            <div class="item__image-wrapper">
                                                <div class="item__image image-with-decor">
                                                    <div class="item__hover-container">
                                                        <img data-src="<?php echo esc_attr( $placeholder['url'] ); ?>" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="lazyload" />
                                                        <?php echo get_the_post_thumbnail( $image['id'], 'post-teaser', array( 'class' => 'lazyload' ) ); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="item__play-icon-wrapper">
                                                <div class="item__play-icon"></div>
                                            </div>

                                        </div>
                                    </div>

                                <?php endif; ?>

                            </div>

                            <div class="l-cols__col item__description-wrapper">

                                <?php if ( $header ) : ?>
                                    <h3 class="item__description-header"><?= $header; ?></h3>
                                <?php endif; ?>

                                <?php if ( $content ) : ?>
                                    <div class="item__description-text">
                                        <?= $content; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ( $button ) : ?>
                                    <a href="<?= $button['url']; ?>" class="c-button c-button__full c-button__full--primary-color c-button__full--medium" data-aos="fade-in" <?= ( '_blank' === $button['target'] ) ? 'target="_blank" rel="noreferrer noopener"' : ''; ?>><?= $button['title']; ?> <span class="c-button__arrow"></span></a>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>

            	<?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>
