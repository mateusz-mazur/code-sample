<?php
	/**
	 * Contact For More Block Template.
	 *
	 * @param array $block The block settings and attributes.
	 * @param string $content The block inner HTML (empty).
	 * @param bool $is_preview True during AJAX preview.
	 * @param   (int|string) $post_id The post ID this block is saved to.
	 */

	// Create id attribute allowing for custom "anchor" value.
	$id = 'contact-for-more-' . $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'block-contact-for-more';
	if ( ! empty( $block['className'] ) ) {
		$className .= ' ' . $block['className'];
	}

	if ( ! empty( $block['align'] ) ) {
		$className .= ' align' . $block['align'];
	}

	// Load values and assing defaults.
    $block_header = get_field( 'block_contact_for_more_header' );
    $content      = get_field( 'block_contact_for_more_content' );
    $mail_label   = get_field( 'block_contact_for_more_email_label' );
    $mail_address = get_field( 'block_contact_for_more_email_address' );
    $phone_label  = get_field( 'block_contact_for_more_call_label' );
    $phone_number = get_field( 'block_contact_for_more_call_number' );
?>

<div id="<?= $id; ?>" class="<?= $className; ?>">

	<div class="l-container">

        <?php if ( $block_header ) : ?>
            <header class="header-block" data-aos="fade-in">
                <h2 class="header-block__header header-block__header--center header-block__header--white"><?= $block_header; ?></h2>
            </header>
        <?php endif; ?>

        <?php if ( $content ) : ?>
            <div class="<?= $className; ?>__content" data-aos="fade-in">
                <?= $content; ?>
            </div>
        <?php endif; ?>

        <div class="<?= $className; ?>__cta" data-aos="fade-in">

            <?php if ( $phone_label ) : ?>
                <span><?= $phone_label; ?></span>
            <?php endif; ?>

            <?php if ( $phone_number ) : ?>
                <span><a href="tel:<?php echo filter_var( $phone_number, FILTER_SANITIZE_NUMBER_INT ); ?>"><?= $phone_number; ?></a></span>
            <?php endif; ?>

            <?php if ( $mail_label ) : ?>
                <span><?= $mail_label; ?></span>
            <?php endif; ?>

            <?php if ( $mail_address ) : ?>
                <span><a href="mailto:<?= $mail_address; ?>"><?= $mail_address; ?></a></span>
            <?php endif; ?>

        </div>

	</div>
</div>
