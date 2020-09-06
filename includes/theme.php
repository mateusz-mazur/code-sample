<?php
/**
 * Sense
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

add_action( 'after_setup_theme', 'sense_localization_setup' );
/**
 * Sets localization (do not remove).
 *
 * @since 1.0.0
 */
function sense_localization_setup() {

	load_child_theme_textdomain( genesis_get_theme_handle(), get_stylesheet_directory() . '/languages' );

}

// Adds helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Adds image upload and color select to Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

// Adds WooCommerce support.
//require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Adds the required WooCommerce styles and Customizer CSS.
//require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';

// Adds the Genesis Connect WooCommerce notice.
//require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';

add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 2.7.0
 */
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';
}

// Registers the responsive menus.
//if ( function_exists( 'genesis_register_responsive_menus' ) ) {
//	genesis_register_responsive_menus( genesis_get_config( 'responsive-menus' ) );
//}

add_action( 'after_setup_theme', 'sense_theme_support', 9 );
/**
 * Add desired theme supports.
 *
 * See config file at `config/theme-supports.php`.
 *
 * @since 3.0.0
 */
function sense_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}

add_action( 'after_setup_theme', 'sense_post_type_support', 9 );
/**
 * Add desired post type supports.
 *
 * See config file at `config/post-type-supports.php`.
 *
 * @since 3.0.0
 */
function sense_post_type_support() {

	$post_type_supports = genesis_get_config( 'post-type-supports' );

	foreach ( $post_type_supports as $post_type => $args ) {
		add_post_type_support( $post_type, $args );
	}

}

// Removes header right widget area.
unregister_sidebar( 'header-right' );

// Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );

add_filter( 'wp_nav_menu_args', 'sense_secondary_menu_args' );
/**
 * Reduces secondary navigation menu to one level depth.
 *
 * @since 2.2.3
 *
 * @param array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
function sense_secondary_menu_args( $args ) {

	if ( 'secondary' === $args['theme_location'] ) {
		$args['depth'] = 1;
	}

	return $args;

}

add_filter( 'genesis_author_box_gravatar_size', 'sense_author_box_gravatar' );
/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 2.2.3
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
function sense_author_box_gravatar( $size ) {

	return 90;

}

add_filter( 'genesis_comment_list_args', 'sense_comments_gravatar' );
/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 2.2.3
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
function sense_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;
	return $args;

}

// Remove superfish scripts.
add_action( 'wp_enqueue_scripts', 'dg_disable_superfish' );
/**
 * Hooks for this page template.
 */
function dg_disable_superfish() {
    wp_deregister_script( 'superfish' );
    wp_deregister_script( 'superfish-args' );
}

/**
 * Removed WP generator info.
 */
remove_action( 'wp_head', 'wp_generator' );

/**
 * Custom Pagination Text.
 */
add_filter( 'genesis_prev_link_text', 'modify_previous_link_text' );
function modify_previous_link_text($text) {
    $text = '«';
    return $text;
}

add_filter( 'genesis_next_link_text', 'modify_next_link_text' );
function modify_next_link_text($text) {
    $text = '»';
    return $text;
}

/*
 * Set 50 items on FAQ Archive page.
 * */
add_action( 'pre_get_posts', 'archive_page_post_count', 1 );
function archive_page_post_count( $query ) {
    if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'faq' ) ) {
        $query->set( 'posts_per_page', 50 );
        return;
    }
}

add_action( 'widgets_init', 'sense_widgets_init' );
/**
 * Register widget areas.
 *
 */
function sense_widgets_init() {

    register_sidebar( array(
        'name'          => 'TOP WPML Languages',
        'id'            => 'wpml-languages-switcher',
        'before_widget' => '<div class="top-page__languages-switcher">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => 'MOBILE WPML Languages',
        'id'            => 'mobile-wpml-languages-switcher',
        'before_widget' => '<div class="mobile-navigation__languages-switcher">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer Main Menu',
        'id'            => 'footer-main-menu',
        'before_widget' => '<div class="footer-main__menu l-cols__col">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-main__header">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer Info Menu',
        'id'            => 'footer-info-menu',
        'before_widget' => '<div class="footer-main-informations l-cols__col">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-main__header">',
        'after_title'   => '</h3>',
    ) );

}

/*
 * Remove Actions from all pages.
 * */
remove_all_actions( 'genesis_entry_footer' );
remove_all_actions( 'genesis_after_entry' );
//remove_all_actions( 'genesis_after_endwhile' );
remove_all_actions( 'genesis_after_content' );
//remove_all_actions( 'genesis_entry_header' );

/*
 * Add Fancybox attribute to WordPress Gallery.
 * */
add_filter( 'the_content', 'add_attributes_to_gallery' );

function add_attributes_to_gallery( $content ) {
    $pattern = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
    $replacement = '<a$1href=$2$3.$4$5 data-fancybox="group" class="glightbox"$6>';
    $content = preg_replace( $pattern, $replacement, $content );

    return $content;
}

/*
 * Disable scripts and styles on all pages. It is enable only on pages which contain forms.
 * */
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

/**
 * Changes the Default Gravity Forms AJAX Spinner to Transparent Image (The Spinner has styles in Gravity Form Styles)
 * @return {string} transparent image string
 * @filter gform_ajax_spinner_url
 */

function ns_io_custom_gforms_spinner( $src ) {
    return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
}
add_filter( 'gform_ajax_spinner_url', 'ns_io_custom_gforms_spinner' );


/**
 * Filters the next, previous and submit buttons.
 * Replaces the forms <input> buttons with <button> while maintaining attributes from original <input>.
 *
 * @param string $button Contains the <input> tag to be filtered.
 * @param object $form Contains all the properties of the current form.
 *
 * @return string The filtered button.
 */
add_filter( 'gform_next_button', 'input_to_button', 10, 2 );
add_filter( 'gform_previous_button', 'input_to_button', 10, 2 );
add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
function input_to_button( $button, $form ) {
    $dom = new DOMDocument();
    $dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $new_button = $dom->createElement( 'button' );
    $new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
    $input->removeAttribute( 'value' );
    foreach( $input->attributes as $attribute ) {
        $new_button->setAttribute( $attribute->name, $attribute->value );
    }
    $new_button->setAttribute("class","c-button c-button__full c-button__full--primary-color c-button__full--medium");
    $input->parentNode->replaceChild( $new_button, $input );

    return $dom->saveHtml( $new_button );
}

