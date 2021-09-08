<?php

namespace Learning\Management\Model;

class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'learning_object_product_post';

	protected $_cacheTag = 'learning_object_product_post';

	protected $_eventPrefix = 'learning_object_product_post';

	protected function _construct()
	{
		$this->_init('Learning\Management\Model\ResourceModel\Post');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}
