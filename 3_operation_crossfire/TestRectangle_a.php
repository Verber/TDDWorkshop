<?php 
require_once 'PHPUnit/Framework.php';
require_once 'Rectangle.php';
	
class TestRectangle_a extends PHPUnit_Framework_TestCase
{
	/**
	 * 
	 * Enter description here...
	 * @dataProvider invalidProvider
	 * @expectedException Argument_Exception
	 */
	public function testInvalidRectangleInitialization($width, $height)
	{
		$rectangle =  new Rectangle($width, $height);
	}
	
	public function invalidProvider()
	{
		return array(
					array(0.0, 0.0),
					array(0, 1),
					array('invalid', 1.0),
					array(1.0, 'invalid'),
					array(-1, 'invalid'),
					array(-1.0, -2.0),
					array(array(), array()),
		);
	}
	
	/**
	 * 
	 * Enter description here...
	 * @dataProvider validProvider
	 */
	public function testValidRectangleInitialization($width, $height)
	{
		$rectangle =  new Rectangle($width, $height);
        $this->assertEquals($width, $rectangle->getWidth());
        $this->assertEquals($height, $rectangle->getHeight());
	}
	
	public function validProvider()
	{
		return array(
					array(1.0, 1.0),
					array(1234567.123456, 123456.7890),
		);
	}
	
	/**
	 * 
	 * Enter description here...
	 * @dataProvider invalidWidthProvider
	 * @expectedException Argument_Exception
	 */
	public function testSetInvalidWidth($width)
	{
		$rectangle = new Rectangle(1.0, 1.0);
		$rectangle->setWidth($width);
	}
	
	public function invalidWidthProvider()
	{
		return array(
					array(-1.0),
					array(0.0),
					array(null),
		);
	}
	
	public function testSetValidWidth()
	{
		$rectangle = new Rectangle(1.0, 1.0);
		$rectangle->setWidth(3.0);
	}
	
	/**
	 * 
	 * Enter description here...
	 * @dataProvider invalidWidthProvider
	 * @expectedException Argument_Exception
	 */
	public function testSetInvalidHeight($height)
	{
		$rectangle = new Rectangle(1.0, 1.0);
		$rectangle->setHeight($height);
	}
	
	public function testSetValidHeight()
	{
		$rectangle = new Rectangle(1.0, 1.0);
		$rectangle->setHeight(4.0);
	}
	
	public function testSquare()
	{
		$rectangle = new Rectangle(10.0, 10.0);
		$this->assertEquals(100.0, $rectangle->getSquare());
	}
	
	public function testPerimeter()
	{
		$rectangle = new Rectangle(10.0, 10.0);
		$this->assertEquals(40.0, $rectangle->getPerimeter());
	}
}