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
	 * @var  Validate
	 */
	protected $_validate;

	/**
	 * @var  string  Error messages file
	 */
	protected $_error_file = 'validate';

	/**
	 * Sets Validate object if provided
	 *
	 * @param   Validate
	 * @return  void
	 */
	public function __construct(Validate $validate = NULL)
	{
		$this->_validate = $validate;
	}

	/**
	 * Validate object setter/getter
	 *
	 * @param   Validate
	 * @return  Validate
	 */
	public function validate(Validate $validate = NULL)
	{
		if ($validate !== NULL)
		{
			$this->_validate = $validate;
		}

		return $this->_validate;
	}

	/**
	 * Returns errors (broken rules)
	 *
	 * @return  array
	 */
	public function errors()
	{
		return $this->_validate->errors($this->_error_file);
	}
}
