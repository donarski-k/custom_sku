<?php

declare(strict_types=1);

namespace Kdev\CustomSku\Api;

use Kdev\CustomSku\Api\Data\CustomSkuChangeInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;

interface CustomSkuChangeRepositoryInterface
{
    public function save(CustomSkuChangeInterface $customSkuChange): CustomSkuChangeInterface;

    public function getList(SearchCriteriaInterface $searchCriteria): SearchResultsInterface;

    public function delete(CustomSkuChangeInterface $customSkuChange): bool;
}
