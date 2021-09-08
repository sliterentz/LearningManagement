<?php

namespace Learning\Management\Block\Adminhtml;

class Post extends \Magento\Backend\Block\Widget\Grid\Container
{
	/**
	 * constructor
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_controller = 'adminhtml_post';
		$this->_blockGroup = 'Learning_Management';
		$this->_headerText = __('Posts');
		$this->_addButtonLabel = __('Create New Post');
		parent::_construct();
	}
}
