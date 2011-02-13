<?php 
require_once 'PHPUnit/Framework.php';
require_once 'Circle.php';
	
class TestCircle extends PHPUnit_Framework_TestCase
{	
    /**
     * @expectedException Argument_Exception
     * @dataProvider circleDataProvider
     */
	function testConstructorBad($radius)
	{
		$c = new Circle($radius);	
	}
	
	function circleDataProvider()
	{
		return (array(
			array(0), 
			array(-1), 
			array("sreinf()"), 
			array(false),
			array(1),
			array(null),
			array(array(1)),
			array(new stdClass()),
			array(xA12)	
		));
	} 
	
	function testGetSet()
	{
		$c = new Circle(0.01);
		$this->assertTrue( $c->getRadius() == 0.01, "wrong radius");
		$c->setRadius(2.0);
		$this->assertTrue( $c->getRadius() == 2.0, "wrong radius");
	}
	
	function testSquare()
	{
		$c = new Circle(2.0);
		$this->assertTrue( $c->getSquare() == (float)pow(2,2) * pi());
	}
	
	function testLength()
	{
		$c = new Circle(2.0);
		$this->assertTrue( $c->getSquare() == (float) (2 * 2.0 * pi()));
	}
}

?>