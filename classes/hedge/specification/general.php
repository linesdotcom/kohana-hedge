<?php defined('SYSPATH') or die('No direct script access.');
/**
 * General specification class
 *
 * @package    Hedge
 * @category   Specification
 * @author     Miodrag Tokić
 * @copyright  (c) 2012, Miodrag Tokić
 * @license    MIT
 */
abstract class Hedge_Specification_General {

	/**
	 * @var  Validation
	 */
	protected $_validation;

	/**
	 * @var  string  Error messages file
	 */
	protected $_error_file = 'validation';

	/**
	 * Sets Validation object if provided
	 *
	 * @param   Validation
	 * @return  void
	 */
	public function __construct(Validation $validation = NULL)
	{
		$this->_validation = $validation;
	}

	/**
	 * Validation object setter/getter
	 *
	 * @param   Validation
	 * @return  Validation
	 */
	public function validation(Validation $validation = NULL)
	{
		if ($validation !== NULL)
		{
			$this->_validation = $validation;
		}

		return $this->_validation;
	}

	/**
	 * Returns errors (broken rules)
	 *
	 * @return  array
	 */
	public function errors()
	{
		return $this->_validation->errors($this->_error_file);
	}
}
