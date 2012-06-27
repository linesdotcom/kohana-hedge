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
		$validate = new Validate(array());

		$spec_foo = new Specification_General($validate);
		$spec_bar = new Specification_General($validate);

		$this->assertSame($validate, $spec_foo->validate());
		$this->assertSame($validate, $spec_bar->validate());
	}

	/**
	 * @covers  Specification_General::errors
	 */
	public function test_it_returns_validation_errors()
	{
		$validate = $this->getMockBuilder('Validate')
			->setMethods(array('errors'))
			->setConstructorArgs(array(array()))
			->getMock();

		$validate
			->expects($this->once())
			->method('errors');

		$spec = new Specification_General($validate);

		$spec->errors();
	}
}
