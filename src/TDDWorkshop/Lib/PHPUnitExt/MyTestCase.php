<?php
namespace TDDWorkshop\Lib\PHPUnitExt;

class MyTestCase extends PHPUnit_Framework_TestCase
{
    /**
     * Verifies that user has access to the resource
     * @param MagicUser $user
     * @param MagicResource $resource
     * @param string $message
     * @throws PHPUnit_Framework_AssertionFailedError
     */
    public function assertUserHasAccess($user, $resource, $message='')
    {
        if (!($user instanceof MagicUser)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
              1, 'MagicUser'
            );
        }
        if (!($resource instanceof MagicResource)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
              1, 'MagicResource'
            );
        }
        $constraint = new MyConstraint($resource);
        self::assertThat($user, $constraint, $message);
    }
}
