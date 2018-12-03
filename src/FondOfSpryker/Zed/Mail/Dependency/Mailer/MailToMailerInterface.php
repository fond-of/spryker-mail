<?php

namespace FondOfSpryker\Zed\Mail\Dependency\Mailer;

use Spryker\Zed\Mail\Dependency\Mailer\MailToMailerInterface as BaseMailToMailerInterface;

interface MailToMailerInterface extends BaseMailToMailerInterface
{
    /**
     * @param string $email
     * @param string $name
     *
     * @return void
     */
    public function addBcc($email, $name);
}
