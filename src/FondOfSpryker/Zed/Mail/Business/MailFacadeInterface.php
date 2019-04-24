<?php

namespace FondOfSpryker\Zed\Mail\Business;

use Generated\Shared\Transfer\MailTransfer;
use Spryker\Zed\Mail\Business\MailFacadeInterface as BaseMailFacadeInterface;

interface MailFacadeInterface extends BaseMailFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\MailTransfer $mailTransfer
     * @param array|null $bbc
     *
     * @return void
     */
    public function handleMailWithBcc(MailTransfer $mailTransfer, ?array $bbc): void;

    /**
     * @param \Generated\Shared\Transfer\MailTransfer $mailTransfer
     * @param array|null $bcc
     *
     * @return void
     */
    public function sendMailWithBcc(MailTransfer $mailTransfer, ?array $bcc): void;
}
