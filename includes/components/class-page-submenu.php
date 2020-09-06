<?php
/**
 * Page Submenu.
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

/**
 * Page Submenu.
 */
class Page_Submenu {

    /**
     * Constructor.
     */
    public function __construct() {

        add_filter( 'nav_menu_css_class', [ $this, 'add_menu_classes' ], 1, 3);
        $this->page_submenu();

    }

    /**
     * Page Submenu.
     */
    public function page_submenu() {
        $menu_id = get_field( 'page_submenu' );
        if ( $menu_id ) :
            ?>
            <div class="page-submenu">

                <div class="l-container">
                    <?php
                        $args = array(
                            'menu' => $menu_id,
                            'container_class' => 'page-submenu__wrapper--desktop'
                        );
                        wp_nav_menu( $args );
                    ?>

                    <div class='js-dropdown-page-submenu dropdown'>
                        <div class='title'>Select an option</div>
                        <?php
                        $args = array(
                            'menu' => $menu_id,
                            'theme_location' => 'submenu',
                            'container' => '',
                            'items_wrap' => '<ul class="menu hide">%3$s</ul>',
                        );
                        wp_nav_menu( $args );
                        ?>

                    </div>

                </div>

            </div>

        <?php endif;
    }

    /**
     * Added class to menu items.
     *
     * @param $classes
     * @param $item
     * @param $args
     *
     * @return mixed
     */
    function add_menu_classes($classes, $item, $args) {
        if($args->theme_location == 'submenu') {
            $classes[] = 'option';
        }
        return $classes;
    }

}
