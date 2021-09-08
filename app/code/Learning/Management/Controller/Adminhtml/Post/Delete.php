<?php

namespace Learning\Management\Controller\Adminhtml\Post;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Request\Http;
use Learning\Management\Model\PostFactory;

class Delete extends Action
{
    protected $_pageFactory;
    protected $_request;
    protected $_postFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Http $request,
        PostFactory $postFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_request = $request;
        $this->_postFactory = $postFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->_request->getParam('post_id');
        $post = $this->_postFactory->create();
        $result = $post->setId($id);
        $result = $result->delete();
        return $this->_redirect('learning_management/post/index');
    }
}
