<?php

declare(strict_types=1);

namespace Kdev\CustomSku\Model\ResourceModel\CustomSkuChange;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct(): void
    {
        $this->_init(
            \Kdev\CustomSku\Model\CustomSkuChange::class,
            \Kdev\CustomSku\Model\ResourceModel\CustomSkuChange::class
        );
    }
}
