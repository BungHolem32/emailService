<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 28/11/16
 * Time: 23:56
 */


namespace Services;

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

require 'vendor/autoload.php';

class EmailService
{

    /**
     * @param $data
     */
    public function sendEmail($data)
    {
        /*1 - configure the base configurations */
        $mailer = $this->createMailTemplate($this->getTransport());
        /*2 - build message */
        $message = $this->createMessage($data);
        /*3 - send the message with the subject*/
        $mailer->send($message);
    }

    /**
     * @param  Swift_SmtpTransport $transport
     * @return Swift_Mailer
     */
    private function createMailTemplate($transport)
    {
        return Swift_Mailer::newInstance($transport);
    }

    /**
     * @return Swift_SmtpTransport
     */
    private function getTransport()
    {
        return Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl')
            ->setUsername('donotresponthismail@gmail.com')
            ->setPassword('1qaz@WSX1234');
    }

    /**
     * @param array $data
     * @return \Swift_Mime_Message|\Swift_Mime_MimePart
     */
    private function createMessage($data)
    {
        return Swift_Message::newInstance($data['subject'])
            ->setFrom(array($data['fromMail'] => $data['fromName']))
            ->setTo(array($data['toMail'] => $data['toName']))
            ->setBody($data['body']);
    }
}

return new EmailService();