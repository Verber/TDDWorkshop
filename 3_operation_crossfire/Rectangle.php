<?php
/**
 * This class realize rectangle
 * 
 * @package Math
 * @subpackage Geometry
 */
require_once 'Exceptions.php';
class Rectangle
{
    private $width, $height;
    /**
     * Constructs rectangle
     * throws Argument_Exception when $width or $height negative
     * 
     * @param float $width
     * @param float $height
     * 
     * @return void
     */
    public function __construct ($width, $height)
    {
        $this->setWidth($width);
        $this->setHeight($height);
    }
    /**
     * Set rectangle width
     * throws Argument_Exception when $width negative
     * 
     * @param float $width
     * @return void
     */
    public function setWidth ($width)
    {
        if (! is_float($width) || $width <= 0.0) {
            throw new Argument_Exception();
        }
        $this->width = $width;
    }
    /**
     * Set rectangle height
     * throws Argument_Exception when $height negative
     * 
     * @param float $height
     * @return void
     */
    public function setHeight ($height)
    {
        if (! is_float($height) || $height <= 0.0) {
            throw new Argument_Exception();
        }
        $this->height = $height;
    }
    /**
     * Set rectangle width
     * throws Property_Exception when width unknown
     * 
     * @return float
     */
    public function getWidth ()
    {
        return $this->width;
    }
    /**
     * Get rectangle height
     * throws Property_Exception when height unknown
     * 
     * @return float
     */
    public function getHeight ()
    {
        return $this->height;
    }
    /**
     * Returns square of rectangle
     * throws Property_Exception if width or height is not set
     * 
     * @return float
     */
    public function getSquare ()
    {
        return (float) $this->height * $this->width;
    }
    /**
     * Returns perimeter of rectangle
     * throws Property_Exception if width or height is not set
     * 
     * @return float
     */
    public function getPerimeter ()
    {
        return (float) (2.0 * $this->height + 2.0 * $this->width);
    }
}