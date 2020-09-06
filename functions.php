<?php
/**
 * Sense.
 *
 * This file adds functions to the Sense Theme.
 *
 * @package Sense
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

require_once CHILD_DIR . '/includes/theme.php';
require_once CHILD_DIR . '/includes/helpers.php';
require_once CHILD_DIR . '/includes/enqueue-scripts.php';
require_once CHILD_DIR . '/includes/custom-image-sizes.php';
require_once CHILD_DIR . '/includes/class-acf.php';
require_once CHILD_DIR . '/includes/class-mime-types.php';
require_once CHILD_DIR . '/includes/block-categories.php';
require_once CHILD_DIR . '/includes/acf-full-width-blocks.php';

// Layout Classes.
require_once CHILD_DIR . '/includes/layout/class-header.php';
require_once CHILD_DIR . '/includes/layout/class-footer.php';
require_once CHILD_DIR . '/includes/layout/class-div-start.php';
require_once CHILD_DIR . '/includes/layout/class-div-end.php';

// Structure.
require_once CHILD_DIR . '/includes/structure/header.php';
require_once CHILD_DIR . '/includes/structure/footer.php';

// Components.
require_once CHILD_DIR . '/includes/components/class-hero.php';
require_once CHILD_DIR . '/includes/components/class-page-submenu.php';
require_once CHILD_DIR . '/includes/components/class-mobile-navigation.php';
require_once CHILD_DIR . '/includes/components/class-teaser-project.php';
require_once CHILD_DIR . '/includes/components/class-teaser-post.php';
require_once CHILD_DIR . '/includes/components/class-contact-map.php';
require_once CHILD_DIR . '/includes/components/class-ajax-more-projects.php';

// Pages.
require_once CHILD_DIR . '/includes/pages/class-page-blog.php';
require_once CHILD_DIR . '/includes/pages/class-post-single.php';
require_once CHILD_DIR . '/includes/pages/class-faq-single.php';
require_once CHILD_DIR . '/includes/pages/class-page-simple.php';
require_once CHILD_DIR . '/includes/pages/class-archive-faq.php';
require_once CHILD_DIR . '/includes/pages/class-archive-projects.php';
require_once CHILD_DIR . '/includes/pages/class-project-single.php';


// Boxes.
//require_once CHILD_DIR . '/includes/boxes/class-box-offer-cta.php';



function add_menu_special_labels( $items, $args ) {

    foreach( $items as &$item ) {

        $icon = get_field('page_submenu_icon', $item->ID);
//        var_dump($icon);


        if( $icon ) {
//            var_dump($item);
            $item->title .= '<span class="menu-item__icon"><img src="' . $icon['url'] . '" alt=""></span>';

        }
    }

    return $items;
}

add_filter( 'wp_nav_menu_objects', 'add_menu_special_labels', 10, 2 );
