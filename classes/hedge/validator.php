<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Specification validator
 *
 * Validates aggregated specifications
 *
 * @package    Hedge
 * @category   Base
 * @author     Miodrag Tokić
 * @copyright  (c) 2012, Miodrag Tokić
 * @license    MIT
 */
class Hedge_Validator {

	/**
	 * @var  array  Collection of attached specifications
	 */
	private $_specifications = array();

	/**
	 * @var  string  Delimeter between alias and field name
	 */
	public static $delimeter = '.';

	/**
	 * Validates all attached specifications
	 *
	 * @throws  Kohana_Exception
	 * @throws  Specification_Exception
	 * @return  void
	 */
	public function execute()
	{
		if (empty($this->_specifications))
			throw new Kohana_Exception('At least one specification should be attached');

		$errors = array();

		foreach ($this->_specifications as $alias => $specification)
		{
			if ( ! $specification->is_valid())
			{
				foreach ($specification->errors() as $field => $error)
				{
					// Errors are prefixed with alias
					$key = $alias.Validator::$delimeter.$field;

					$errors[$key] = $error;
				}
			}
		}

		if ( ! empty($errors))
			throw new Specification_Exception($errors);
	}

	/**
	 * Adds a new specification
	 *
	 * @param   string  Specification alias
	 * @param   Specification
	 * @return  Validator
	 */
	public function add($alias, Specification $specification)
	{
		$this->_specifications[$alias] = $specification;

		return $this;
	}

	/**
	 * Remove attached specification
	 *
	 * @param   string  Specification alias
	 * @return  Validator
	 */
	public function remove($alias)
	{
		unset($this->_specifications[$alias]);

		return $this;
	}

	/**
	 * Removes all attached specifications
	 *
	 * @return  Validator
	 */
	public function clear()
	{
		$this->_specifications = array();

		return $this;
	}
}