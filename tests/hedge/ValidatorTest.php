<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Validator test
 *
 * @group  hedge
 * @group  hedge.base
 *
 * @package    Hedge
 * @category   Tests
 * @author     Miodrag Tokić
 * @copyright  (c) 2012, Miodrag Tokić
 * @license    MIT
 */
class Hedge_ValidatorTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers  Validator::add
	 */
	public function test_it_adds_specification()
	{
		$specification = $this->getMock('Specification');

		$validator = new Validator;

		$this->assertAttributeEmpty('_specifications', $validator);

		$validator->add('foo', $specification);

		$this->assertAttributeContains($specification, '_specifications', $validator);
	}

	/**
	 * @covers  Validator::remove
	 */
	public function test_it_removes_specification()
	{
		$specification = $this->getMock('Specification');

		$validator = new Validator;

		$validator->add('foo', $specification);
		$validator->remove('foo');

		$this->assertAttributeNotContains($specification, '_specifications', $validator);
	}

	/**
	 * @covers  Validator::clear
	 */
	public function test_it_clears_specifications()
	{
		$foo = $this->getMock('Specification');
		$bar = $this->getMock('Specification');

		$validator = new Validator;

		$validator->add('foo', $foo);
		$validator->add('bar', $bar);

		$validator->clear();

		$this->assertAttributeEmpty('_specifications', $validator);
	}

	/**
	 * @covers  Validator::execute
	 *
	 * @expectedException  Specification_Exception
	 */
	public function test_it_validates_attached_specifications()
	{
		$specification = $this->getMock('Specification');

		$specification
			->expects($this->once())
			->method('is_valid')
			->will($this->returnValue(FALSE));

		$specification
			->expects($this->once())
			->method('errors')
			->will($this->returnValue(array('foo' => 'bar')));

		$validator = new Validator;

		$validator->add('baz', $specification);

		$validator->execute();
	}

	/**
	 * @covers  Validator::execute
	 *
	 * @expectedException         Kohana_Exception
	 * @expectedExceptionMessage  At least one specification should be attached
	 */
	public function test_it_does_not_validates_if_no_specification_attached()
	{
		$validator = new Validator;

		$validator->execute();
	}
}
