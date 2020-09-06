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

// This file handles single entries, but only exists for the sake of child theme forward compatibility.
$current_post_type = get_post_type();

if ( 'post' === $current_post_type ) {
    new Post_Single();
} elseif ( 'faq' === $current_post_type ) {
    new Faq_Simple();
} elseif ( 'projekty' === $current_post_type ) {
    new Project_Single();
}

genesis();
