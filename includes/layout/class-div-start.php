<?php
/**
 * Div Start
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

/**
 * Div Start.
 */
class Div_Start {

	/**
	 * Div Class.
	 *
	 * @var $div_class
	 */
	public $div_class;


	/**
	 * Construct.
	 *
	 * @param string $div_class - div class.
	 */
	public function __construct(

		$div_class = 'no-class'

	) {
		$this->div_class = $div_class;
		$this->div_start();
	}

	/**
	 * Div start.
	 */
	public function div_start() {
		?>
		<div class="<?php echo esc_attr( $this->div_class ); ?>">
		<?php
	}

}
