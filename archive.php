<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package Genesis\Templates
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://my.studiopress.com/themes/genesis/
 */

namespace sense;

    $current_post_type = get_post_type();

    if ( 'projekty' === $current_post_type ) {
        new Archive_Projects();
    } elseif ( 'faq' === $current_post_type ) {
        new Archive_Faq();
    }

    // Initialize Genesis.
    genesis();