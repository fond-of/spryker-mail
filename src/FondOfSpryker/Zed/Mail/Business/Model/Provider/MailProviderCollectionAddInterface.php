<?php

namespace FondOfSpryker\Zed\Mail\Business\Model\Provider;

use FondOfSpryker\Zed\Mail\Dependency\Plugin\MailProviderPluginInterface;

interface MailProviderCollectionAddInterface
{
    /**
     * @param \FondOfSpryker\Zed\Mail\Dependency\Plugin\MailProviderPluginInterface $mailProvider
     * @param array|string $acceptedMailTypes
     *
     * @return mixed
     */
    public function addProvider(MailProviderPluginInterface $mailProvider, $acceptedMailTypes);
}
