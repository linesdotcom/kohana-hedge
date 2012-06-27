<?php defined('SYSPATH') or die('No direct script access.');
/**
 * General specification test
 *
 * @group  hedge
 * @group  hedge.specification
 *
 * @package    Hedge
 * @category   Tests
 * @author     Miodrag Tokić
 * @copyright  (c) 2012, Miodrag Tokić
 * @license    MIT
 */
class Hedge_Specification_GeneralTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers  Specification_General::__construct
	 * @covers  Specification_General::validation
	 */
	public function test_it_sets_and_gets_validation()
	{
		$validation = new Validation(array());

		$spec_foo = new Specification_General($validation);
		$spec_bar = new Specification_General($validation);

		$this->assertSame($validation, $spec_foo->validation());
		$this->assertSame($validation, $spec_bar->validation());
	}

	/**
	 * @covers  Specification_General::errors
	 */
	public function test_it_returns_validation_errors()
	{
		$validation = $this->getMockBuilder('Validation')
			->setMethods(array('errors'))
			->setConstructorArgs(array(array()))
			->getMock();

		$validation
			->expects($this->once())
			->method('errors');

		$spec = new Specification_General($validation);

		$spec->errors();
	}
}
