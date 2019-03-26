<?php

namespace FondOfSpryker\Zed\Mail;

use FondOfSpryker\Shared\Mail\MailConstants;
use Spryker\Zed\Mail\MailConfig as SprykerMailConfig;

class MailConfig extends SprykerMailConfig
{
    /**
     * @return string
     */
    public function getSenderName(): string
    {
        return $this->get(MailConstants::MAIL_SENDER_NAME, 'mail.sender.name');
    }

    /**
     * @return string
     */
    public function getSenderEmail(): string
    {
        return $this->get(MailConstants::MAIL_SENDER_EMAIL, 'mail.sender.email');
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->get(MailConstants::MAILER_SMTP_HOST, 'localhost');
    }

    /**
     * @return int
     */
    public function getPort(): string
    {
        return $this->get(MailConstants::MAILER_SMTP_PORT, 25);
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->get(MailConstants::MAILER_SMTP_USER, 'JohnDoe');
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->get(MailConstants::MAILER_SMTP_PASSWORD, 'password');
    }

    /**
     * @return string
     */
    public function getEncryption(): string
    {
        return $this->get(MailConstants::MAILER_SMTP_ENCRYPTION, '');
    }
}
