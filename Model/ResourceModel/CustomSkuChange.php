<?php

declare(strict_types=1);

namespace Kdev\CustomSku\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CustomSkuChange extends AbstractDb
{
    protected function _construct(): void
    {
        $this->_init('custom_sku_change', 'change_id');
    }
}
