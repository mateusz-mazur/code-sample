<?php
/**
 * Mime Types Support.
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

/**
 * Mime Types support.
 */
class Mime_Types {
	/**
	 * Constructor.
	 */
	public function __construct() {

		add_action( 'upload_mimes', [ $this, 'add_mime_types' ] );

	}

	/**
	 * Add svg MIME type support
	 *
	 * @param mixed $mimes .
	 * @return mixed
	 */
	public function add_mime_types( $mimes ) {
		$mimes['svg'] = 'image/svg+xml';

		return $mimes;
	}

}

new Mime_Types();
