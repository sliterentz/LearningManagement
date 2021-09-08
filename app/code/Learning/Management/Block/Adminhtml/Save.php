<?php

namespace Learning\Management\Controller\Index;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Learning\Management\Model\PostFactory;
use Magento\Framework\Filesystem;

class Save extends Action
{
    protected $_pageFactory;
    protected $_postFactory;
    protected $_filesystem;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        PostFactory $postFactory,
        Filesystem $filesystem
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        $this->_filesystem = $filesystem;
        return parent::__construct($context);
    }

    public function execute()
    {
        if ($this->getRequest()->isPost()) {
            $input = $this->getRequest()->getPostValue();
            $post = $this->_postFactory->create();

            if ($input['editRecordId']) {
                $post->load($input['editRecordId']);
                $post->addData($input);
                $post->setId($input['editRecordId']);
                $post->save();
            } else {
                $post->setData($input)->save();
            }

            return $this->_redirect('learning_management/post/index');
        }
    }
}
