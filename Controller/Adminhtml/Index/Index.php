<?php

declare(strict_types=1);

namespace Kdev\CustomSku\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action implements \Magento\Framework\App\Action\HttpGetActionInterface
{
    public const ADMIN_RESOURCE = 'Kdev_CustomSku::custom_sku';

    public function __construct(
        Context $context,
        private PageFactory $resultPageFactory,
    ) {
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Custom SKU Changes'));

        return $resultPage;
    }
}
