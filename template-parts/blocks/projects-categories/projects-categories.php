<?php
	/**
	 * Projects Categories Block Template.
	 *
	 * @param array $block The block settings and attributes.
	 * @param string $content The block inner HTML (empty).
	 * @param bool $is_preview True during AJAX preview.
	 * @param   (int|string) $post_id The post ID this block is saved to.
	 */

	// Create id attribute allowing for custom "anchor" value.
use sense\Teaser_Post;

$id = 'projects-categories-' . $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'block-projects-categories';
	if ( ! empty( $block['className'] ) ) {
		$className .= ' ' . $block['className'];
	}

	if ( ! empty( $block['align'] ) ) {
		$className .= ' align' . $block['align'];
	}

	// Load values and assing defaults.
    $block_header = get_field( 'block_projects_categories_naglowek' );
	$block_type   = get_field( 'block_projects_categories_type' );
?>

<div id="<?= $id; ?>" class="<?= $className; ?>">

	<div class="l-container">

        <?php if ( $block_header ) : ?>
            <header class="header-block" data-aos="fade-in">
                <h2 class="header-block__header header-block__header--center"><?= $block_header; ?></h2>
            </header>
        <?php endif; ?>

        <?php if ( have_rows( 'block_projects_categories_tabs' ) ) : ?>
            <?= '<ul class="c-tabs">'; ?>
                <?php while ( have_rows( 'block_projects_categories_tabs' ) ) : ?>
                    <?php the_row(); ?>

                    <?php
                        $row_index = get_row_index();
                        $label = get_sub_field( 'block_projects_categories_category_name' );
                        $icon = get_sub_field( 'block_projects_categories_category_icon' );
                    ?>

                    <li class="<?= ( 1 === $row_index ) ? 'active' : ''; ?>" data-target="#tab-<?= $row_index; ?>">
                        <a href="#tab-<?= $row_index; ?>" data-target="#tab-<?= $row_index; ?>" class="<?= $className; ?>__tab-inner">
                                <?php if ( $icon ) : ?>
                                    <img src="<?php echo esc_attr( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" class="lazyload <?= $className; ?>__tab-icon" data-target="#tab-<?= $row_index; ?>" />
                                <?php endif; ?>

                                <span class="<?= $className; ?>__tab-label" data-target="#tab-<?= $row_index; ?>"><?= $label; ?></span>
                        </a>
                    </li>

                <?php endwhile; ?>
            <?= '</ul>'; ?>
        <?php endif; ?>

        <?php if ( have_rows( 'block_projects_categories_tabs' ) ) : ?>
            <div class="c-tab-content">
                <?php while ( have_rows( 'block_projects_categories_tabs' ) ) : ?>
                    <?php the_row(); ?>

                    <?php
                        $row_index = get_row_index();
                        $header = get_sub_field( 'block_projects_categories_header' );
                        $description = get_sub_field( 'block_projects_categories_description' );
                        $image = get_sub_field( 'block_projects_categories_image' );
                        $projects = get_sub_field( 'block_projects_categories_projects' );
                        $button = get_sub_field( 'block_projects_categories_button' );
                    ?>

                    <div id="tab-<?= $row_index; ?>" class="c-tab-pane <?= ( 1 === $row_index ) ? 'active' : ''; ?>">
                        <?php if ( 'projects_categories_descriptions' === $block_type ) : ?>

                            <div class="<?= $className; ?>__categories-descriptions">
                                <div class="l-cols">

                                    <div class="l-cols__col category-description__content">
                                        <?php if ( $header ) : ?>
                                            <h3 class="category-description__header"><?= $header; ?></h3>
                                        <?php endif; ?>

                                        <?php if ( $description) : ?>
                                            <div>
                                                <?= $description; ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ( $button ) : ?>
                                            <div class="block-projects__more">
                                                <a href="<?= $button['url']; ?>" class="c-button c-button__full c-button__full--primary-color c-button__full--medium"><?= $button['title']; ?> <span class="c-button__arrow"></span></a>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if ( $image ) : ?>
                                        <div class="l-cols__col category-description__image">
                                            <div class="item__image-wrapper">
                                                <div class="item__image image-with-decor image-with-decor--right">
                                                    <img data-src="<?php echo esc_attr( $image['sizes']['video-slider'] ); ?>" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/img__empty.png" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="item__image-img lazyload" />
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>

                        <?php endif; ?>

                        <?php if ( 'projects_list' === $block_type ) : ?>
                            <div class="block-projects-categories__projects">
                                <?php
                                $posts = get_sub_field('block_projects_categories_projects');

                                if( $posts ): ?>
                                    <div class="l-cols">
                                        <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                                            <?php setup_postdata($post); ?>

                                            <article class="l-cols__col block-projects__item" data-aos="zoom-in" data-aos-once="false">
                                                <?php new \sense\Teaser_Project( $post->ID ); ?>
                                            </article>

                                        <?php endforeach; ?>
                                    </div>
                                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                <?php endif; ?>

                                <?php if ( $button ) : ?>
                                    <div class="block-projects__more">
                                        <a href="<?= $button['url']; ?>" class="c-button c-button__outline c-button__outline--primary-color c-button__outline--medium c-button__outline--wide"><?= $button['title']; ?> <span class="c-button__arrow"></span></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                    </div>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>
</div>
