<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Specification exception
 *
 * @package    Hedge
 * @category   Exception
 * @author     Miodrag Tokić
 * @copyright  (c) 2012, Miodrag Tokić
 * @license    MIT
 */
class Hedge_Specification_Exception extends Kohana_Exception {

	/**
	 * @var  array  Collected errors (broken rules)
	 */
	private $_errors;

	/**
	 * Creates a new specification exception
	 *
	 * @param   array   Broken rules
	 * @param   string  Validation message
	 * @param   array   Translation variables
	 * @param   int     The exception code
	 * @return  void
	 */
	public function __construct(array $errors, $message = 'Data validation failed', array $values = NULL, $code = 0)
	{
		$this->_errors = $errors;

		parent::__construct($message, $values, $code);
	}

	/**
	 * Returns errors (broken rules)
	 *
	 * @return  array
	 */
	public function errors()
	{
		return $this->_errors;
	}
}
