<?php
/**
 * This class realize rectangle
 * 
 * @package Math
 * @subpackage Geometry
 */
namespace TDDWorkshop\Lib\Math;

class Rectangle
{
    private $width, $height;
    /**
     * Constructs rectangle
     * throws Exception\Argument when $width or $height negative
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
     * throws Exception\Argument when $width negative
     * 
     * @param float $width
     * @return void
     */
    public function setWidth ($width)
    {
        if (! is_float($width) || $width <= 0.0) {
            throw new Exception\Argument();
        }
        $this->width = $width;
    }
    /**
     * Set rectangle height
     * throws Exception\Argument when $height negative
     * 
     * @param float $height
     * @return void
     */
    public function setHeight ($height)
    {
        if (! is_float($height) || $height <= 0.0) {
            throw new Exception\Argument();
        }
        $this->height = $height;
    }
    /**
     * Set rectangle width
     * throws Exception\Property when width unknown
     * 
     * @return float
     */
    public function getWidth ()
    {
        return $this->width;
    }
    /**
     * Get rectangle height
     * throws Exception\Property when height unknown
     * 
     * @return float
     */
    public function getHeight ()
    {
        return $this->height;
    }
    /**
     * Returns square of rectangle
     * throws Exception\Property if width or height is not set
     * 
     * @return float
     */
    public function getSquare ()
    {
        return (float) $this->height * $this->width;
    }
    /**
     * Returns perimeter of rectangle
     * throws Exception\Property if width or height is not set
     * 
     * @return float
     */
    public function getPerimeter ()
    {
        return (float) (2.0 * $this->height + 2.0 * $this->width);
    }
}