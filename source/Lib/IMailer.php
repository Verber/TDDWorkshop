<?php
/**
 * This class illustrates mocks and stubs usage
 *
 * @author Ivan Mosiev <i.k.mosev@gmail.com>
 */
interface Lib_IMailer {
    public function send();
    public function body($message);
    public function to($recipient);
    public function subj($subj);
}