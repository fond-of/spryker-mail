<?php

namespace FondOfSpryker\Zed\Mail\Communication\Plugin;

use FondOfSpryker\Zed\Mail\Dependency\Plugin\MailProviderPluginInterface;
use Generated\Shared\Transfer\MailTransfer;
use Spryker\Zed\Mail\Communication\Plugin\MailProviderPlugin as BaseMailProviderPlugin;

/**
 * @method \FondOfSpryker\Zed\Mail\Business\MailFacadeInterface getFacade()
 * @method \Spryker\Zed\Mail\Communication\MailCommunicationFactory getFactory()
 */
class MailProviderPlugin extends BaseMailProviderPlugin implements MailProviderPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\MailTransfer $mailTransfer
     * @param string|null $bcc
     *
     * @return mixed
     */
    public function sendMailWithBcc(MailTransfer $mailTransfer, ?string $bcc)
    {
        $this->getFacade()->sendMailWithBcc($mailTransfer, $bcc);
    }
}
