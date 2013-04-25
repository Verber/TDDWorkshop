<?php
namespace Lib;
/**
 * This class illustrates mocks and stubs usage
 *
 * @author Ivan Mosiev <i.k.mosev@gmail.com>
 */
interface IMailer {
    public function send();
    public function body($message);
    public function to($recipient);
    public function subj($subj);
}