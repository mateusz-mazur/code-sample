<?php
	/**
	 * Page Submenu Block Template.
	 *
	 * @param array $block The block settings and attributes.
	 * @param string $content The block inner HTML (empty).
	 * @param bool $is_preview True during AJAX preview.
	 * @param   (int|string) $post_id The post ID this block is saved to.
	 */

	// Create id attribute allowing for custom "anchor" value.


    $id = 'page-submenu-' . $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'block-page-submenu';
	if ( ! empty( $block['className'] ) ) {
		$className .= ' ' . $block['className'];
	}

	if ( ! empty( $block['align'] ) ) {
		$className .= ' align' . $block['align'];
	}

	$menu_id = get_field( 'block_page_submenu' );
?>

<?php if ( $menu_id ) : ?>
    <div id="<?= $id; ?>" class="<?= $className; ?>">

        <div class="l-container">
            <?php
                $args = array(
                    'menu' => $menu_id
                );
                wp_nav_menu( $args );
            ?>
        </div>

    </div>
<?php endif; ?>
