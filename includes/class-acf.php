<?php
/**
 * Sense
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

/**
 * Handle all operation for ACF settings.
 */
class ACF {
	/**
	 * Constructor.
	 */
	public function __construct() {

		add_filter( 'acf/settings/save_json', [ $this, 'acf_json_save_point' ] );
		add_filter( 'acf/settings/load_json', [ $this, 'acf_json_load_point' ] );
		add_action( 'init', [ $this, 'acf_options_page' ] );

	}

	/**
	 * Automatic saving of the json file with configuration of acf fields on the plugin side.
	 *
	 * @param string $path .
	 *
	 * @return string
	 */
	public function acf_json_save_point( $path ) {
		// update path.
		$path = get_stylesheet_directory() . '/acf';

		return $path;
	}

	/**
	 * Loading changes from json file to sync.
	 *
	 * @param string $paths .
	 *
	 * @return string|array
	 */
	public function acf_json_load_point( $paths ) {
		// remove original path (optional).
		unset( $paths[0] );

		// append path.
		$paths[] = get_stylesheet_directory() . '/acf';

		return $paths;
	}

	/**
	 * ACF Options Pages.
	 */
	public function acf_options_page() {

		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_page(
				array(
					'page_title' => 'Opcje serwisu',
					'menu_title' => 'Opcje serwisu',
					'menu_slug'  => 'theme-general-settings',
					'capability' => 'edit_posts',
					'redirect'   => false,
				)
			);

			acf_add_options_sub_page(
				array(
					'page_title'  => 'Top strony',
					'menu_title'  => 'Top strony',
					'parent_slug' => 'theme-general-settings',
				)
			);

			acf_add_options_sub_page(
				array(
					'page_title'  => 'Stopka strony',
					'menu_title'  => 'Stopka strony',
					'parent_slug' => 'theme-general-settings',
				)
			);

			acf_add_options_sub_page(
				array(
					'page_title'  => 'Biura na mapach',
					'menu_title'  => 'Biura na mapach',
					'parent_slug' => 'theme-general-settings',
				)
			);

            acf_add_options_sub_page(
                array(
                    'page_title'  => 'Strona aktualności',
                    'menu_title'  => 'Strona aktualności',
                    'parent_slug' => 'theme-general-settings',
                )
            );

            acf_add_options_sub_page(
                array(
                    'page_title'  => 'Strona realizacje',
                    'menu_title'  => 'Strona realizacje',
                    'parent_slug' => 'theme-general-settings',
                )
            );

            acf_add_options_sub_page(
                array(
                    'page_title'  => 'Strona FAQ',
                    'menu_title'  => 'Strona FAQ',
                    'parent_slug' => 'theme-general-settings',
                )
            );

            acf_add_options_sub_page(
                array(
                    'page_title'  => 'Strona 404',
                    'menu_title'  => 'Strona 404',
                    'parent_slug' => 'theme-general-settings',
                )
            );

		}
	}

}

new ACF();
