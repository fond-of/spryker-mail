<?php

namespace FondOfSpryker\Zed\Mail\Business\Model\Mailer;

use Generated\Shared\Transfer\MailTransfer;
use Spryker\Zed\Mail\Business\Model\Mailer\MailHandlerInterface as BaseMailHandlerInterface;

interface MailHandlerInterface extends BaseMailHandlerInterface
{
    /**
     * @param \Generated\Shared\Transfer\MailTransfer $mailTransfer
     * @param array|null $bcc
     *
     * @return void
     */
    public function handleMailWithBcc(MailTransfer $mailTransfer, ?array $bcc): void;
}
