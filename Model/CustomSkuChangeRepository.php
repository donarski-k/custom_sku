<?php

declare(strict_types=1);

namespace Kdev\CustomSku\Model;

use Kdev\CustomSku\Api\CustomSkuChangeRepositoryInterface;
use Kdev\CustomSku\Api\Data\CustomSkuChangeInterface;
use Kdev\CustomSku\Model\ResourceModel\CustomSkuChange\CollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsFactory;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;

class CustomSkuChangeRepository implements CustomSkuChangeRepositoryInterface
{
    public function __construct(
        private \Kdev\CustomSku\Model\ResourceModel\CustomSkuChange $resource,
        private CollectionFactory $collectionFactory,
        private CollectionProcessorInterface $collectionProcessor,
        private SearchResultsFactory $searchResultsFactory,
    ) {}

    /**
     * @throws CouldNotSaveException
     */
    public function save(CustomSkuChangeInterface $customSkuChange): CustomSkuChangeInterface
    {
        try {
            $this->resource->save($customSkuChange);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()), $exception);
        }
        return $customSkuChange;
    }

    public function getList(SearchCriteriaInterface $searchCriteria): SearchResultsInterface
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);

        return $this->searchResultsFactory->create()
            ->setSearchCriteria($searchCriteria)
            ->setItems($collection->getItems())
            ->setTotalCount($collection->getSize());
    }

    /**
     * @throws CouldNotDeleteException
     */
    public function delete(CustomSkuChangeInterface $customSkuChange): bool
    {
        try {
            $this->resource->delete($customSkuChange);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()), $exception);
        }
        return true;
    }
}
