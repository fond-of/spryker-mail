<?php

namespace FondOfSpryker\Zed\Mail\Business\Model\Mailer;

use FondOfSpryker\Zed\Mail\Business\Model\Provider\MailProviderCollectionGetInterface;
use Generated\Shared\Transfer\MailTransfer;
use Spryker\Zed\Mail\Business\Model\Mail\Builder\MailBuilderInterface;
use Spryker\Zed\Mail\Business\Model\Mail\MailTypeCollectionGetInterface;
use Spryker\Zed\Mail\Business\Model\Mailer\MailHandler as BaseMailHandler;

class MailHandler extends BaseMailHandler implements MailHandlerInterface
{
    /**
     * @var \FondOfSpryker\Zed\Mail\Business\Model\Provider\MailProviderCollectionGetInterface
     */
    protected $mailProviderCollection;
    
    /**
     * MailHandler constructor.
     *
     * @param \Spryker\Zed\Mail\Business\Model\Mail\Builder\MailBuilderInterface $mailBuilder
     * @param \Spryker\Zed\Mail\Business\Model\Mail\MailTypeCollectionGetInterface $mailCollection
     * @param \FondOfSpryker\Zed\Mail\Business\Model\Provider\MailProviderCollectionGetInterface $mailProviderCollection
     */
    public function __construct(
        MailBuilderInterface $mailBuilder,
        MailTypeCollectionGetInterface $mailCollection,
        MailProviderCollectionGetInterface $mailProviderCollection
    ) {
        $this->mailBuilder = $mailBuilder;
        $this->mailTypeCollection = $mailCollection;
        $this->mailProviderCollection = $mailProviderCollection;
    }

    /**
     * @param \Generated\Shared\Transfer\MailTransfer $mailTransfer
     * @param string|null $bcc
     *
     * @return mixed|void
     */
    public function handleMailWithBcc(MailTransfer $mailTransfer, ?string $bcc)
    {
        $mailTypeName = $this->getMailTypeNameFromTransfer($mailTransfer);

        if ($this->mailTypeCollection->has($mailTypeName)) {
            $mailTransfer = $this->buildMail($mailTransfer);
            $this->sendMailWithBcc($mailTransfer, $bcc);
        }
    }

    /**
     * @param \Generated\Shared\Transfer\MailTransfer $mailTransfer
     * @param string|null $bcc
     *
     * @return void
     */
    protected function sendMailWithBcc(MailTransfer $mailTransfer, ?string $bcc)
    {
        $mailProviders = $this->getMailProviderByMailType($mailTransfer);

        foreach ($mailProviders as $provider) {
            $provider->sendMailWithBcc($mailTransfer, $bcc);
        }
    }

    /**
     * @param \FondOfSpryker\Zed\Mail\Business\Model\Mailer\MailTransfer $mailTransfer
     *
     * @return \FondOfSpryker\Zed\Mail\Dependency\Plugin\MailProviderPluginInterface[]
     */
    protected function getMailProviderByMailType(MailTransfer $mailTransfer)
    {
        $mailTypeName = $this->getMailTypeNameFromTransfer($mailTransfer);

        $mailProviders = $this->mailProviderCollection->getProviderForMailType($mailTypeName);

        return $mailProviders;
    }
}
