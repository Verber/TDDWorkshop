<?php
require_once 'Rectangle.php';

class TestRectangle extends PHPUnit_Framework_TestCase {
	/**
	 *
	 * @dataProvider constructorProvider
	 * @expectedException Argument_Exception
	 */
	function testInvalidConstruction($width, $height) {
		new Rectangle($width, $height);
	}
	
	/**
	 * @group storage
	 * @dataProvider validLength
	 */
	function testStoringWidthWithConstructor($width) {
		$r = new Rectangle($width, 1.0);
		
		$this->assertEquals($width, $r->getWidth());
	}
	
	/**
	 * @group storage
	 * @dataProvider validLength
	 */
	function testStoringHeightWithConstructor($height) {
		$r = new Rectangle(1.0, $height);
		
		$this->assertEquals($height, $r->getHeight());
	}
	
	/**
	 * @group storage
	 * @dataProvider validLength
	 */
	function testStoringWidthWithSetter($width) {
		$r = new Rectangle(1.0, 1.0);
		
		$r->setWidth($width);
		$this->assertEquals($width, $r->getWidth());
	}
	
	/**
	 * @group storage
	 * @dataProvider validLength
	 */
	function testStoringHeightWithSetter($height) {
		$r = new Rectangle(1.0, 1.0);
		
		$r->setHeight($height);
		$this->assertEquals($height, $r->getHeight());
	}	

	/**
	 * 
	 * @dataProvider invalidLength
	 * @expectedException Argument_Exception
	 */
	function testSettingBadWidth($width) {
		$r = new Rectangle(1.0, 1.0);
		
		$r->setWidth($width);
	}
	
	/**
	 * 
	 * @dataProvider invalidLength
	 * @expectedException Argument_Exception
	 */
	function testSettingBadHeight($height) {
		$r = new Rectangle(1.0, 1.0);
		
		$r->setHeight($height);
	}
	
	/**
	 * 
	 * @dataProvider perimeterSamples
	 */	
	function testPerimeter($width, $height, $perimeter) {
		$r = new Rectangle($width, $height);
		
		$this->assertEquals($perimeter, $r->getPerimeter());
	}
	
	/**
	 * 
	 * @dataProvider squareSamples
	 */
	function testSquare($width, $height, $square) {
		$r = new Rectangle($width, $height);
		
		$this->assertEquals($square, $r->getSquare());
	}
	
	/* Data providers */
	function invalidLength() {
		return array(
		array(-1.0),
		array(0.0),
		array(1),
		array(null),
		array(true),
		array("string"),
		array(array(1.0))
		);
	}

	function validLength() {
		return array(
			array(1.0),
			array(2.0),
			array(pi())
		);
	}
	
	function constructorProvider() {
		$r = array();

		$invalidLength = $this->invalidLength();

		foreach ($invalidLength as $i) {
			foreach ($invalidLength as $j) {
				$r[] = array($i, $j);
			}
		}
		
		return $r;
	}

	function squareSamples() {
		return array(
			array(1.0, 2.0, 2.0),
			array(2.0, 2.0, 4.0),
			array(2.0, 1.0, 2.0)
		);
	}
	function perimeterSamples() {
		return array(
			array(1.0, 2.0, 6.0),
			array(2.0, 2.0, 8.0),
			array(2.0, 1.0, 6.0)
		);
	}
}