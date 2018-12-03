<?php

namespace FondOfSpryker\Zed\Mail\Business;

use Generated\Shared\Transfer\MailTransfer;
use Spryker\Zed\Mail\Business\MailFacadeInterface as BaseMailFacadeInterface;

interface MailFacadeInterface extends BaseMailFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\MailTransfer $mailTransfer
     * @param string|null $bbc
     *
     * @return mixed
     */
    public function handleMailWithBcc(MailTransfer $mailTransfer, ?string $bbc);

    /**
     * @param \Generated\Shared\Transfer\MailTransfer $mailTransfer
     * @param string|null $bcc
     *
     * @return mixed
     */
    public function sendMailWithBcc(MailTransfer $mailTransfer, ?string $bcc);
}
