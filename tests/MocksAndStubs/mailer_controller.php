<?php
require_once 'Mailbox.php';

class Mailer_controller
{   
    function showInbox($mailbox)
    {
        $emails = $mailbox->getInbox();
        $result = '<ul><li class="head"><ul><li>from</li><li>Subject</li></ul></li>';
        if (count($emails)){
            foreach ($emails as $email) {
                $result .= '<li><ul><li>' . $email['from'] . '</li><li>' . $email['subj'] . '</li></ul></li>';
            }
        } else {
            $result .= '<li><ul><li>You have no any messages</li></ul></li>';
        }
        $result .= '</ul>';
        return $result;
    }
}