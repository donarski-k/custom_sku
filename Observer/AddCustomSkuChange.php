<?php

declare(strict_types=1);

namespace Kdev\CustomSku\Observer;

use Kdev\CustomSku\Api\CustomSkuChangeRepositoryInterface;
use Kdev\CustomSku\Model\CustomSkuChangeFactory;
use Magento\Catalog\Model\Product;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;

class AddCustomSkuChange implements ObserverInterface
{
    public function __construct(
        private CustomSkuChangeFactory $customSkuChangeFactory,
        private CustomSkuChangeRepositoryInterface $customSkuChangeRepository,
        private LoggerInterface $logger
    ) {}

    public function execute(Observer $observer): void
    {
        /** @var Product $product */
        $product = $observer->getEvent()->getData('product');

        if ($product->dataHasChangedFor('custom_sku')) {
            $this->saveCustomSkuChange((int)$product->getId(), $product->getData('custom_sku'));
        }
    }

    private function saveCustomSkuChange(int $productId, string $value): void
    {
        $customSkuChange = $this->customSkuChangeFactory->create();
        $customSkuChange->setProductId($productId);
        $customSkuChange->setValue($value);

        try {
            $this->customSkuChangeRepository->save($customSkuChange);
        } catch (CouldNotSaveException $exception) {
            $this->logger->critical($exception);
        }
    }
}
