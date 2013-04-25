<?php
namespace TDDWorkshop\Lib\PHPUnitExt;

class MyConstraint extends PHPUnit_Framework_Constraint
{
    /**
     * @var MagicResource
     */
    protected $resource;

    /**
     * @param MagicResource $resource
     */
    public function __construct(MagicResource $resource)
    {
        $this->resource = $resource;
    }

    /**
     * Evaluates the constraint for parameter $other. Returns TRUE if the
     * constraint is met, FALSE otherwise.
     *
     * @param MagicUser $other Value or object to evaluate.
     * @return bool
     */
    protected function matches(MagicUser $other)
    {
        $result = $other->doSomeMagic($this->resource);
        return $result;
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'has access to the ' . PHPUnit_Util_Type::export
        ($this->resource);
    }

    /**
     * Returns the description of the failure
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
     * @param  mixed $other Evaluated value or object.
     * @return string
     */
    protected function failureDescription($other)
    {
        return 'an user ' . $this->toString();
    }
}
