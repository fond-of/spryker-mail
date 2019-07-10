<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\Mail\Business\Model\Provider;

use Generated\Shared\Transfer\MailTransfer;
use Spryker\Zed\Mail\Business\Model\Provider\SwiftMailer as SprykerSwiftMailer;
use Spryker\Zed\Mail\Business\Model\Renderer\RendererInterface;
use FondOfSpryker\Zed\Mail\Dependency\Mailer\MailToMailerInterface;

use const FILTER_VALIDATE_EMAIL;

use function is_string;
use function filter_var;

class SwiftMailer extends SprykerSwiftMailer
{
    /**
     * @var \FondOfSpryker\Zed\Mail\Dependency\Mailer\MailToMailerInterface
     */
    protected $mailer;

    /**
     * @param \Spryker\Zed\Mail\Business\Model\Renderer\RendererInterface $renderer
     * @param \FondOfSpryker\Zed\Mail\Dependency\Mailer\MailToMailerInterface $mailer
     *
     */
    public function __construct(RendererInterface $renderer, MailToMailerInterface $mailer)
    {
        parent::__construct($renderer, $mailer);
    }

    /**
     * @param \Generated\Shared\Transfer\MailTransfer $mailTransfer
     *
     * @return void
     */
    public function sendMail(MailTransfer $mailTransfer): void
    {
        $this->addBcc($mailTransfer);
        parent::sendMail($mailTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\MailTransfer $mailTransfer
     *
     * @return \FondOfSpryker\Zed\Mail\Business\Model\Provider\SwiftMailer
     */
    protected function addBcc(MailTransfer $mailTransfer): SwiftMailer
    {
        foreach ($mailTransfer->getRecipientsBcc() as $recipientBccTransfer) {
            if (!is_string($recipientBccTransfer->getEmail())) {
                continue;
            }

            $validMailOrFalse = filter_var($recipientBccTransfer->getEmail(), FILTER_VALIDATE_EMAIL);
            if ($validMailOrFalse === false) {
                continue;
            }

            $this->mailer->addBcc($validMailOrFalse, $recipientBccTransfer->getName());
        }

        return $this;
    }
}
