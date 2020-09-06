<?php
	/**
	 * Blog Block Template.
	 *
	 * @param array $block The block settings and attributes.
	 * @param string $content The block inner HTML (empty).
	 * @param bool $is_preview True during AJAX preview.
	 * @param   (int|string) $post_id The post ID this block is saved to.
	 */

	// Create id attribute allowing for custom "anchor" value.
use sense\Teaser_Post;

$id = 'blog-' . $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$id = $block['anchor'];
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'block-blog';
	if ( ! empty( $block['className'] ) ) {
		$className .= ' ' . $block['className'];
	}

	if ( ! empty( $block['align'] ) ) {
		$className .= ' align' . $block['align'];
	}

	// Load values and assing defaults.
    $block_header = get_field( 'block_blog_header' );
    $button       = get_field( 'block_blog_button' );
?>

<div id="<?= $id; ?>" class="<?= $className; ?>">

	<div class="l-container">

        <?php if ( $block_header ) : ?>
            <header class="header-block" data-aos="fade-in">
                <h2 class="header-block__header header-block__header--center"><?= $block_header; ?></h2>
            </header>
        <?php endif; ?>

        <?php
        $blog_query_args = array(
            'orderby'        => 'rand',
            'order'          => 'DESC',
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => '4',
            'meta_query'     => array(array('key' => '_thumbnail_id')),
        );
        $blog_query      = new \WP_Query( $blog_query_args );

        if ( $blog_query->have_posts() ) :
            while ( $blog_query->have_posts() ) : $blog_query->the_post();
            ?>

                <article class="post-teaser" data-aos="fade-in">

                    <?php new Teaser_Post(); ?>

                </article>

            <?php
            endwhile;
        endif;
        wp_reset_postdata();
        ?>

	</div>

    <?php if ( $button ) : ?>
        <div class="block-blog__more">
            <a href="<?= $button['url']; ?>" class="c-button c-button__full c-button__full--primary-color c-button__full--medium c-button__full--wide"><?= $button['title']; ?> <span class="c-button__arrow"></span></a>
        </div>
    <?php endif; ?>

</div>
