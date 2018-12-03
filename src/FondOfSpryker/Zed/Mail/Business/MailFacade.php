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
     * @param string|null $bbc
     *
     * @return mixed|void
     */
    public function handleMailWithBcc(MailTransfer $mailTransfer, ?string $bcc)
    {
        $this->getFactory()->createMailHandler()->handleMailWithBcc($mailTransfer, $bcc);
    }

    /**
     * @param \Generated\Shared\Transfer\MailTransfer $mailTransfer
     * @param string|null $bcc
     *
     * @return mixed
     */
    public function sendMailWithBcc(MailTransfer $mailTransfer, ?string $bcc)
    {
        $this->getFactory()->createMailer()->sendMailWithBcc($mailTransfer, $bcc);
    }
}
