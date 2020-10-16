<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\Mail\Dependency\Mailer;

use Spryker\Zed\Mail\Dependency\Mailer\MailToMailerBridge as SprykerMailToMailer;
use Swift_Attachment;

class MailToMailerBridge extends SprykerMailToMailer implements MailToMailerInterface
{
    /**
     * @param string $email
     * @param string|null $name
     *
     * @return void
     */
    public function addBcc(string $email, ?string $name = null): void
    {
        $this->message->addBcc($email, $name);
    }

    /**
     * @param string $attachment
     *
     * @return void
     */
    public function addAttachment(string $attachment): void
    {
        $this->message->attach(Swift_Attachment::fromPath($attachment));
    }
}
