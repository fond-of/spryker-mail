<?php

namespace FondOfSpryker\Zed\Mail\Dependency\Mailer;

use Spryker\Zed\Mail\Dependency\Mailer\MailToMailerBridge as BaseMailToMailerBridge;

class MailToMailerBridge extends BaseMailToMailerBridge implements MailToMailerInterface
{
    /**
     * @param string $email
     * @param string $name
     *
     * @return void
     */
    public function addBcc($email, $name)
    {
        $this->message->addBcc($email, $name);
    }
}
