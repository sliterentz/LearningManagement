<?php

namespace Learning\Management\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
	protected $_postFactory;

	public function __construct(\Learning\Management\Model\PostFactory $postFactory)
	{
		$this->_postFactory = $postFactory;
	}

	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$data = [
			'title' => "Magento 2 Tutorial Video",
			'summary' => "In this article, we will find out how to install and upgrade sql script for module in Magento 2. When you install or upgrade a module, you may need to change the database structure or add some new data for current table. To do this, Magento 2 provide you some classes which you can do all of them.",
			'image' => "image1.png",
			'detail' => 'mp4',
			'status' => 1
		];
		$post = $this->_postFactory->create();
		$post->addData($data)->save();
	}
}
