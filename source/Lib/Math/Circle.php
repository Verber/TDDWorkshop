<?php
/**
 * This class realize circle
 *
 * @package Math
 * @subpackage Geometry
 */
require_once 'Exceptions.php';

class Circle
{
	/**
	 *
	 * @var float
	 */
	private $_radius;

	/**
	 * Creates circle where radius is $r
	 *
	 * @param float $r
	 * @throws Argument_Exception if $r is not positive
	 */
	function __construct($r)
	{
		$this->setRadius($r);
	}

	/**
	 * Sets radius
	 *
	 * @param float $r
	 * @return void
	 * @throws Argument_Exception if $r is not positive
	 */
	function setRadius($r)
	{
		if (!is_float($r) || $r <= 0.0) {
			throw new Argument_Exception();
		}
		 
		$this->_radius = $r;
	}

	/**
	 * Returns radius
	 *
	 * @return float
	 */
	function getRadius()
	{
		return $this->_radius;
	}

	/**
	 * Returns square of circle
	 *
	 * @return float square of circle
	 */
	function getSquare()
	{
		$r = $this->getRadius();
		return $r * $r * pi();
	}
	 
	/**
	 * Returns length of circle
	 *
	 * @return float circle length
	 */
	function getLength()
	{
		$r = $this->getRadius();
		return 2.0 * $r * pi();
	}
}