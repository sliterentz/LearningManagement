<?php

namespace Learning\Management\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;

class Index extends Action implements HttpGetActionInterface
{
	protected $resultPageFactory;

	public function __construct(
		Context $context,
		PageFactory $resultPageFactory
	) {
		$this->resultPageFactory = $resultPageFactory;
		parent::__construct($context);
	}

	public function execute(): Page
	{
		$resultPage = $this->resultPageFactory->create();
		$resultPage->setActiveMenu('Learning_Management::management');
		$resultPage->getConfig()->getTitle()->prepend((__('Learning Object List')));

		return $resultPage;
	}
}
