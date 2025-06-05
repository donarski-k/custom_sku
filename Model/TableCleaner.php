<?php

declare(strict_types=1);

namespace Kdev\CustomSku\Model;

use Kdev\CustomSku\Api\CustomSkuChangeRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

class TableCleaner
{
    public function __construct(
        private CustomSkuChangeRepositoryInterface $repository,
        private SearchCriteriaBuilder $searchCriteriaBuilder,
        private Config $config
    ) {}

    public function execute(): void
    {
        if (!$this->config->getCleanTableEnabled()) {
            return;
        }

        $criteria = $this->searchCriteriaBuilder
            ->addFilter('update_time', $this->calculateCutoffDate(), 'lt')
            ->create();

        foreach ($this->repository->getList($criteria)->getItems() as $customSkuChange) {
            $this->repository->delete($customSkuChange);
        }
    }

    private function calculateCutoffDate(): string
    {
        $modifier = sprintf('-%d days', $this->config->getCleanTablePeriod());

        return (new \DateTime())->modify($modifier)->format('Y-m-d H:i:s');
    }
}
