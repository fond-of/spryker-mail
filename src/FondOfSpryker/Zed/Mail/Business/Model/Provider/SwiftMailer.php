<?php

namespace FondOfSpryker\Zed\Mail\Business\Model\Provider;

use FondOfSpryker\Zed\Mail\Dependency\Mailer\MailToMailerInterface;
use FondOfSpryker\Zed\Mail\Dependency\Plugin\MailProviderPluginInterface;
use Generated\Shared\Transfer\MailTransfer;
use Spryker\Zed\Mail\Business\Model\Provider\SwiftMailer as BaseSwiftMailer;
use Spryker\Zed\Mail\Business\Model\Renderer\RendererInterface;

class SwiftMailer extends BaseSwiftMailer implements MailProviderPluginInterface
{
    /**
     * @param \Spryker\Zed\Mail\Business\Model\Renderer\RendererInterface $renderer
     * @param \FondOfSpryker\Zed\Mail\Dependency\Mailer\MailToMailerInterface $mailer
     */
    public function __construct(RendererInterface $renderer, MailToMailerInterface $mailer)
    {
        $this->renderer = $renderer;
        $this->mailer = $mailer;
    }

    /**
     * @param \Generated\Shared\Transfer\MailTransfer $mailTransfer
     * @param string|null|array $bcc
     *
     * @return mixed|void
     */
    public function sendMailWithBcc(MailTransfer $mailTransfer, ?array $bcc): void
    {
        $this
            ->addSubject($mailTransfer)
            ->addFrom($mailTransfer)
            ->addTo($mailTransfer)
            ->addContent($mailTransfer)
            ->addBcc($bcc);

        $this->mailer->send();
    }

    /**
     * @param string|array $bcc
     *
     * @return void
     */
    public function addBcc(array $bcc): void
    {
        foreach ($bcc as $address => $name) {
            if (filter_var($address, \FILTER_VALIDATE_EMAIL)) {
                $this->mailer->addBcc($address, $name);
            }
        }
    }
}
