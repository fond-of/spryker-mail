<?php

namespace FondOfSpryker\Zed\Mail;

use FondOfSpryker\Zed\AvailabilityAlert\Communication\Plugin\Mail\AvailabilityAlertMailTypePlugin;
use FondOfSpryker\Zed\Mail\Business\Model\Provider\MailProviderCollection;
use FondOfSpryker\Zed\Mail\Business\Model\Provider\MailProviderCollectionAddInterface;
use FondOfSpryker\Zed\Mail\Communication\Plugin\MailProviderPlugin;
use FondOfSpryker\Zed\Mail\Dependency\Mailer\MailToMailerBridge;
use FondOfSpryker\Zed\Oms\Communication\Plugin\Mail\OrderConfirmationMailTypePlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Mail\Business\Model\Mail\MailTypeCollectionAddInterface;
use Spryker\Zed\Mail\MailConfig;
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
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = $this->addMailProviderCollection($container);
        $container = $this->addMailCollection($container);
        $container = $this->addGlossaryFacade($container);
        $container = $this->addRenderer($container);
        $container = $this->addMailer($container);

        $container->extend(self::MAIL_TYPE_COLLECTION, function (MailTypeCollectionAddInterface $mailCollection) {
            $mailCollection
                ->add(new OrderConfirmationMailTypePlugin($this->getConfig()))
                ->add(new AvailabilityAlertMailTypePlugin());

            return $mailCollection;
        });

        $container->extend(self::MAIL_PROVIDER_COLLECTION, function (MailProviderCollectionAddInterface $mailProviderCollection) {
            $mailProviderCollection
                ->addProvider(new MailProviderPlugin(), [
                    MailConfig::MAIL_TYPE_ALL,
                ]);
            return $mailProviderCollection;
        });

        return $container;
    }

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
