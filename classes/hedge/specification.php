<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Specification interface
 *
 * All specifications must implement this interface
 *
 * @package    Hedge
 * @category   Specification
 * @author     Miodrag Tokić
 * @copyright  (c) 2012, Miodrag Tokić
 * @license    MIT
 */
interface Hedge_Specification {

	/**
	 * Validates specification
	 *
	 * @return  bool
	 */
	public function is_valid();

	/**
	 * Returns errors (broken rules)
	 *
	 * @return  array
	 */
	public function errors();
}
