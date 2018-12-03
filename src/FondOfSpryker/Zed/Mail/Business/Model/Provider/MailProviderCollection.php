<?php

namespace FondOfSpryker\Zed\Mail\Business\Model\Provider;

use FondOfSpryker\Zed\Mail\Dependency\Plugin\MailProviderPluginInterface;
use Spryker\Zed\Mail\MailConfig;

class MailProviderCollection implements MailProviderCollectionAddInterface, MailProviderCollectionGetInterface
{
    public const ACCEPTED_MAIL_TYPES = 'accepted mail types';
    public const PROVIDER = 'provider';

    /**
     * @param \FondOfSpryker\Zed\Mail\Dependency\Plugin\MailProviderPluginInterface $mailProvider
     * @param array|string $acceptedMailTypes
     *
     * @return mixed
     */
    public function addProvider(MailProviderPluginInterface $mailProvider, $acceptedMailTypes)
    {
        if (!is_array($acceptedMailTypes)) {
            $acceptedMailTypes = [$acceptedMailTypes];
        }

        $this->mailProvider[] = [
            static::PROVIDER => $mailProvider,
            static::ACCEPTED_MAIL_TYPES => $acceptedMailTypes,
        ];

        return $this;
    }

    /**
     * @param string $mailType
     *
     * @return \FondOfSpryker\Zed\Mail\Dependency\Plugin\MailProviderPluginInterface[]
     */
    public function getProviderForMailType($mailType)
    {
        $mailProviderForMailType = [];
        foreach ($this->mailProvider as $provider) {
            if (in_array(MailConfig::MAIL_TYPE_ALL, $provider[static::ACCEPTED_MAIL_TYPES]) || in_array($mailType, $provider[static::ACCEPTED_MAIL_TYPES])) {
                $mailProviderForMailType[] = $provider[static::PROVIDER];
            }
        }

        return $mailProviderForMailType;
    }
}
