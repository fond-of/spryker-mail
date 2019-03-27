<?php

namespace FondOfSpryker\Zed\Mail;

use FondOfSpryker\Zed\Mail\Business\Model\Provider\MailProviderCollection;
use FondOfSpryker\Zed\Mail\Dependency\Mailer\MailToMailerBridge;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Mail\MailDependencyProvider as SpykerMailDependencyProvider;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

/**
 * Class MailDependencyProvider
 * @package FondOfSpryker\Zed\Mail
 * @method \FondOfSpryker\Zed\Mail\MailConfig getConfig()
 */
class MailDependencyProvider extends SpykerMailDependencyProvider
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addMailProviderCollection(Container $container)
    {
        $container[static::MAIL_PROVIDER_COLLECTION] = function () {
            $mailProviderCollection = $this->getMailProviderCollection();

            return $mailProviderCollection;
        };

        return $container;
    }

    /**
     * @return \Pyz\Zed\Mail\Business\Model\Provider\MailProviderCollectionAddInterface
     */
    protected function getMailProviderCollection()
    {
        return new MailProviderCollection();
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addMailer(Container $container)
    {
        $container[static::MAILER] = function () {
            $message = Swift_Message::newInstance();
            $transport = (Swift_SmtpTransport::newInstance($this->getConfig()->getHost(), $this->getConfig()->getPort()))
                ->setUsername($this->getConfig()->getUser())
                ->setPassword($this->getConfig()->getPassword());

            $mailer = Swift_Mailer::newInstance($transport);

            $mailerBridge = new MailToMailerBridge($message, $mailer);

            return $mailerBridge;
        };

        return $container;
    }
}
