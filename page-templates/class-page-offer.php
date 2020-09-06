<?php
/**
 * Page Offer
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

class Page_Offer {

	/**
	 * Page_Offer constructor.
	 */
	public function __construct() {

		$this->init_hooks();

	}

	/**
	 * Init Hooks.
	 */
	public function init_hooks() {

		remove_all_actions( 'genesis_entry_header' );
		remove_all_actions( 'genesis_sidebar' );

//		add_action( 'genesis_entry_content', [ $this, 'boxes' ] );

	}

	public function boxes() {

		new Box_Offer_CTA();
	}
}

new Page_Offer();
genesis();
