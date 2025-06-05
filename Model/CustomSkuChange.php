<?php

declare(strict_types=1);

namespace Kdev\CustomSku\Model;

use Kdev\CustomSku\Api\Data\CustomSkuChangeInterface;
use Magento\Framework\Model\AbstractModel;

class CustomSkuChange extends AbstractModel implements CustomSkuChangeInterface
{
    public const string ENTITY = 'custom_sku_change';

    protected $_eventPrefix = self::ENTITY;

    protected function _construct(): void
    {
        $this->_init(ResourceModel\CustomSkuChange::class);
    }

    public function getChangeId(): int
    {
        return $this->getData(self::CHANGE_ID);
    }

    public function getProductId(): int
    {
        return $this->getData(self::PRODUCT_ID);
    }

    public function setProductId(int $productId): CustomSkuChangeInterface
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    public function getValue(): string
    {
        return $this->getData(self::VALUE);
    }

    public function setValue(string $value): CustomSkuChangeInterface
    {
        return $this->setData(self::VALUE, $value);
    }
}
