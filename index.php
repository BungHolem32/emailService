<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 28/11/16
 * Time: 23:55
 */

/*$m = ['subject' => 'Wonderful Subject',
    'fromMail' => 'john@doe.com',
    'fromName' => 'John Doe',
    'toMail' => 'ilanvac@gmail.com',
    'toOther' => 'other@domain.org',
    'toName' => 'A name',
    'body' => 'Here is the message itself'
];*/

/** @var \Services\EmailService $mailService */
$mailService = require 'EmailService.php';

if (is_array($_REQUEST['messageInfo'])) {

    $message = $_REQUEST['messageInfo'];

    if (0 === count(array_diff(['subject', 'fromMail', 'fromName', 'toMail', 'toOther', 'toName', 'body'], array_keys($message)))) {
        $mailService->sendEmail($message);
        echo 'email Sent';
    }
}
