<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\Mail\Business;

use FondOfSpryker\Zed\Mail\Business\Model\Provider\SwiftMailer;
use FondOfSpryker\Zed\Mail\Dependency\Mailer\MailToMailerInterface;
use FondOfSpryker\Zed\Mail\MailDependencyProvider;
use Spryker\Zed\Mail\Business\MailBusinessFactory as SprykerMailBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\Mail\MailConfig getConfig()
 */
class MailBusinessFactory extends SprykerMailBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\Mail\Business\Model\Provider\SwiftMailer
     */
    public function createMailer(): SwiftMailer
    {
        return new SwiftMailer(
            $this->createRenderer(),
            $this->getMailer()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\Mail\Dependency\Mailer\MailToMailerInterface
     */
    protected function getMailer(): MailToMailerInterface
    {
        return $this->getProvidedDependency(MailDependencyProvider::MAILER);
    }
}
