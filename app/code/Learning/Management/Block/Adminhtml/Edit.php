<?php

namespace Learning\Management\Block\Adminhtml;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Registry;
use Learning\Management\Model\PostFactory;

class Edit extends Template
{
    protected $_pageFactory;
    protected $_coreRegistry;
    protected $_postLoader;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Registry $coreRegistry,
        PostFactory $postLoader,
        array $data = []
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_coreRegistry = $coreRegistry;
        $this->_postLoader = $postLoader;
        return parent::__construct($context, $data);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }

    public function getEditRecord()
    {
        $id = $this->_coreRegistry->registry('editRecordId');
        $post = $this->_postLoader->create();
        $result = $post->load($id);
        $result = $result->getData();
        return $result;
    }
}
