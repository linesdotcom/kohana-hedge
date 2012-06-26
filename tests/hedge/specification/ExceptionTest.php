<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Specification exception test
 *
 * @group  hedge
 * @group  hedge.exception
 *
 * @package    Hedge
 * @category   Tests
 * @author     Miodrag Tokić
 * @copyright  (c) 2012, Miodrag Tokić
 * @license    MIT
 */
class Hedge_Specification_ExceptionTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers  Specification_Exception::__construct
	 * @covers  Specification_Exception::errors
	 */
	public function test_it_returns_errors()
	{
		$errors = array(
			'foo.bar' => 'Something wrong',
			'foo.baz' => 'Broken',
		);

		$e = new Specification_Exception($errors);

		$this->assertSame($errors, $e->errors());
	}
}
