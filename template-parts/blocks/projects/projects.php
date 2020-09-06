<?php
	/**
	 * Projects Block Template.
	 *
	 * @param array $block The block settings and attributes.
	 * @param string $content The block inner HTML (empty).
	 * @param bool $is_preview True during AJAX preview.
	 * @param   (int|string) $post_id The post ID this block is saved to.
	 */

	// Create id attribute allowing for custom "anchor" value.

    $id = 'projects-' . $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'block-projects';
	if ( ! empty( $block['className'] ) ) {
		$className .= ' ' . $block['className'];
	}

	if ( ! empty( $block['align'] ) ) {
		$className .= ' align' . $block['align'];
	}

	// Load values and assing defaults.
    $block_header  = get_field( 'block_projects_header' );
    $projects      = get_field( 'block_projects_items' );
    $projects_more = get_field( 'block_projects_items_more' );
    $button        = get_field( 'block_projects_button' );
?>

<div id="<?= $id; ?>" class="<?= $className; ?>">

	<div class="l-container">

        <?php if ( $block_header ) : ?>
            <header class="header-block" data-aos="fade-in">
                <h2 class="header-block__header header-block__header--center"><?= $block_header; ?></h2>
            </header>
        <?php endif; ?>

        <?php
        $posts = get_field('block_projects_items');

        if ( $posts ) : ?>
            <div class="l-cols block-projects__items">
                <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                    <?php setup_postdata($post); ?>

                        <article class="l-cols__col block-projects__item">
                            <?php new \sense\Teaser_Project( $post->ID ); ?>
                        </article>

                <?php endforeach; ?>
            </div>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>

        <?php if ( $button && $projects_more ) : ?>
            <div class="block-projects__more">
                <a href="<?= $button['url']; ?>" class="c-button c-button__outline c-button__outline--primary-color c-button__outline--medium c-button__outline--wide"><?= $button['title']; ?> <span class="c-button__arrow"></span></a>
            </div>
        <?php endif; ?>

        <div class="project-container l-cols">
            <?php
                $is_more_related_projects = get_field( 'block_projects_items_more' );
            ?>
            <?php if ( $is_more_related_projects ) : ?>
                <input type="hidden" value="<?php the_field( 'block_projects_items_more' ); ?>" class="more-related-projects-id-list">
            <?php endif; ?>
        </div>

	</div>
</div>
