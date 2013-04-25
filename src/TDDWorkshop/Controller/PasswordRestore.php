<?php
namespace TDDWorkshop\Controller;

use TDDWorkshop\Lib\IMailer;
use TDDWorkshop\Model\User;
/**
 * This class illustrates mocks and stubs usage
 *
 * @author Ivan Mosiev <i.k.mosev@gmail.com>
 */
class PasswordRestore {
    
    private $_mailer;
    private $_user;

    public function  __construct(IMailer $mailer, User $user) {
        $this->_mailer = $mailer;
        $this->_user = $user;
    }

    public function sendRestoreEmail()
    {
        if ($this->_user->load($_POST))
        {
            $restore_key = md5(uniqid());
            $this->_user->setFields(array('restore_key' => $restore_key));
            $this->_user->save();
            $this->_mailer->to($_POST['email']);
            $this->_mailer->subj('Password reset');
            $this->_mailer->body('To reset your password pls follow the link
                http://example.com/restore/' . $restore_key);
            $this->_mailer->send();
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
