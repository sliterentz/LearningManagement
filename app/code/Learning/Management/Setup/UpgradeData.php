<?php

namespace Learning\Management\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeData implements UpgradeDataInterface
{
	protected $_postFactory;

	public function __construct(\Learning\Management\Model\PostFactory $postFactory)
	{
		$this->_postFactory = $postFactory;
	}

	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		if (version_compare($context->getVersion(), '1.2.4', '<')) {

			$data = [
				[
					'title' => "Magento 2 Tutorial Video",
					'summary' => "In this article, we will find out how to install and upgrade sql script for module in Magento 2. When you install or upgrade a module, you may need to change the database structure or add some new data for current table. To do this, Magento 2 provide you some classes which you can do all of them.",
					'image' => "image1.png",
					'detail' => 'mp4',
					'status' => 1
				],
				[
					'title' => "Magento 2 Ebook",
					'summary' => "In this article, we will find out how to install and upgrade sql script for module in Magento 2. When you install or upgrade a module, you may need to change the database structure or add some new data for current table. To do this, Magento 2 provide you some classes which you can do all of them.",
					'image' => "image2.png",
					'detail' => 'pdf',
					'status' => 1
				]
			];
			// $post = $this->_postFactory->create();
			// $post->addData($data)->save();

			$tableName = $setup->getTable('learning_object_product_post');
			$setup
				->getConnection()
				->insertMultiple($tableName, $data);
		}
	}
}
