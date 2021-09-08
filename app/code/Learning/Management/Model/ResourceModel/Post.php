<?php

namespace Learning\Management\Model\ResourceModel;


class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	) {
		parent::__construct($context);
	}

	protected function _construct()
	{
		$this->_init('learning_object_product_post', 'post_id');
	}
}
