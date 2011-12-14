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
		
	}

	/**
	 * Returns radius
	 *
	 * @return float
	 */
	function getRadius()
	{
	}

	/**
	 * Returns square of circle
	 *
	 * @return float square of circle
	 */
	function getSquare()
	{
	}
	 
	/**
	 * Returns length of circle
	 *
	 * @return float circle length
	 */
	function getLength()
	{
	}
}