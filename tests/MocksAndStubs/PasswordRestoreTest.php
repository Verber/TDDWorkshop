<?php
/**
 * This class is example of mocks and stubs
 *
 * @author   Ivan Mosiev <i.k.mosev@gmail.com>
 */
class PasswordRestoreTest extends PHPUnit_Framework_TestCase
{

    function testSendRestoreEmailOk()
    {
        $_POST = array('email' => 'existing@example.com');
        $user = $this->getMock('\Model\User');
        $user->expects($this->once())
            ->method('load')
            ->with($this->equalTo($_POST))
            ->will($this->returnValue(TRUE));
        $user->expects($this->once())
            ->method('save');
        $user->expects($this->once())
            ->method('setFields')
            ->with($this->arrayHasKey('restore_key'));
        $mailer = $this->getMock('\Lib\IMailer');
        $mailer->expects($this->once())
            ->method('to')
            ->with($this->equalTo($_POST['email']));
        $mailer->expects($this->once())
            ->method('subj')
            ->with($this->equalTo('Password reset'));
        $mailer->expects($this->once())
            ->method('body')
            ->with($this->stringContains('To reset your password pls follow the link'));
        $mailer->expects($this->once())
            ->method('send');
        $controller = new \Controller\PasswordRestore($mailer, $user);
        $this->assertTrue($controller->sendRestoreEmail());
    }

    function testSendRestoreEmailUnknownEmail()
    {
        $_POST = array('email' => 'not_existing@example.com');
        $user = $this->getMock('\Model\User');
        $user->expects($this->once())
            ->method('load')
            ->with($this->equalTo($_POST))
            ->will($this->returnValue(FALSE));
        $user->expects($this->never())
            ->method('save');
        $user->expects($this->never())
            ->method('setFields');
        $mailer = $this->getMock('\Lib\IMailer');
        $mailer->expects($this->never())
            ->method('to');
        $mailer->expects($this->never())
            ->method('subj');
        $mailer->expects($this->never())
            ->method('body');
        $mailer->expects($this->never())
            ->method('send');
        $controller = new \Controller\PasswordRestore($mailer, $user);
        $this->assertFalse($controller->sendRestoreEmail());
    }
    
}
