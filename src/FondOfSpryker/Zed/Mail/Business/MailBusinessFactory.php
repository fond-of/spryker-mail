<?php

namespace FondOfSpryker\Zed\Mail\Business;

use FondOfSpryker\Zed\Mail\Business\Model\Mailer\MailHandler;
use FondOfSpryker\Zed\Mail\Business\Model\Provider\SwiftMailer;
use Pyz\Zed\Mail\MailDependencyProvider;
use Spryker\Zed\Mail\Business\MailBusinessFactory as BaseMailBusinessFactory;

class MailBusinessFactory extends BaseMailBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\Mail\Business\Model\Mailer\MailHandlerInterface
     */
    public function createMailHandler()
    {
        return new MailHandler(
            $this->createMailBuilder(),
            $this->getMailTypeCollection(),
            $this->getMailProviderCollection()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\Mail\Business\Model\Provider\SwiftMailer
     */
    public function createMailer()
    {
        return new SwiftMailer(
            $this->createRenderer(),
            $this->getMailer()
        );
    }

    /**
     * @return mixed|\Spryker\Zed\Mail\Business\Model\Provider\MailProviderCollectionGetInterface
     */
    protected function getMailProviderCollection()
    {
        return $this->getProvidedDependency(MailDependencyProvider::MAIL_PROVIDER_COLLECTION);
    }

    /**
     * @return \FondOfSpryker\Zed\Mail\Dependency\Mailer\MailToMailerInterface
     */
    protected function getMailer()
    {
        return $this->getProvidedDependency(MailDependencyProvider::MAILER);
    }
}
