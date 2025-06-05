<?php

declare(strict_types=1);

namespace Kdev\CustomSku\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    private const PATH_CLEAN_TABLE_ENABLED = 'custom_sku/clean_table/enabled';
    private const PATH_CLEAN_TABLE_PERIOD = 'custom_sku/clean_table/period';

    public function __construct(
        private ScopeConfigInterface $scopeConfig
    ) {
    }

    public function getCleanTableEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::PATH_CLEAN_TABLE_ENABLED);
    }

    public function getCleanTablePeriod(): int
    {
        return (int)$this->scopeConfig->getValue(self::PATH_CLEAN_TABLE_PERIOD);
    }
}
