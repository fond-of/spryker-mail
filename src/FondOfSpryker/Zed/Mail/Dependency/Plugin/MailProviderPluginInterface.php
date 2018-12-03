<?php

namespace FondOfSpryker\Zed\Mail\Dependency\Plugin;

use Generated\Shared\Transfer\MailTransfer;
use Spryker\Zed\Mail\Dependency\Plugin\MailProviderPluginInterface as BaseMailProviderPluginInterface;

interface MailProviderPluginInterface extends BaseMailProviderPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\MailTransfer $mailTransfer
     * @param string|null $bcc
     *
     * @return mixed
     */
    public function sendMailWithBcc(MailTransfer $mailTransfer, ?string $bcc);
}
