<?php
require_once 'PHPUnit/Framework.php';
require_once 'mailer_controller.php';

class test_Mailer_controller extends PHPUnit_Framework_TestCase
{
    function setUp()
    {
        $this->mc = new Mailer_controller;
    }
    
    function test_showInbox_not_empty()
    {
        $mailbox = $this->getMock('Mailbox');
        $mailbox->expects($this->once())
            ->method('getInbox')
            ->will($this->returnValue(array(array('from' => 'i.k.mosev@gmail.com', 'subj' => 'Test'))));
        $try = $this->mc->showInbox($mailbox);
        
        $this->assertContains('i.k.mosev@gmail.com', $try);
    }
    
    function test_showInbox_empty()
    {
        $mailbox = $this->getMock('Mailbox');
        $mailbox->expects($this->any())
            ->method('getInbox')
            ->will($this->returnValue(array()));
        $try = $this->mc->showInbox($mailbox);
        $this->assertContains('You have no any messages', $try);
    }
}