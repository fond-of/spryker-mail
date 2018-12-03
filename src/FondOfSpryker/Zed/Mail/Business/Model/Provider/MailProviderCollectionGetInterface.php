<?php

namespace FondOfSpryker\Zed\Mail\Business\Model\Provider;

interface MailProviderCollectionGetInterface
{
    /**
     * @param string $mailType
     *
     * @return \FondOfSpryker\Zed\Mail\Dependency\Plugin\MailProviderPluginInterface[]
     */
    public function getProviderForMailType($mailType);
}
