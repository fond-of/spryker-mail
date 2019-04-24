<?php

namespace FondOfSpryker\Zed\Mail\Business;

use Generated\Shared\Transfer\MailTransfer;
use Spryker\Zed\Mail\Business\MailFacade as BaseMailFacade;

/**
 * @method \FondOfSpryker\Zed\Mail\Business\MailFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\Mail\Business\MailBusinessFactory getFactory()
 */
class MailFacade extends BaseMailFacade implements MailFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\MailTransfer $mailTransfer
     * @param array|null $bcc
     *
     * @return void
     */
    public function handleMailWithBcc(MailTransfer $mailTransfer, ?array $bcc): void
    {
        $this->getFactory()->createMailHandler()->handleMailWithBcc($mailTransfer, $bcc);
    }

    /**
     * @param \Generated\Shared\Transfer\MailTransfer $mailTransfer
     * @param string|null|array $bcc
     *
     * @return void
     */
    public function sendMailWithBcc(MailTransfer $mailTransfer, ?array $bcc): void
    {
        $this->getFactory()->createMailer()->sendMailWithBcc($mailTransfer, $bcc);
    }
}
