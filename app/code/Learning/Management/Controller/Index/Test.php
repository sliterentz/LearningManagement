<?php

namespace Learning\Management\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{

	public function execute()
	{
		$textDisplay = new \Magento\Framework\DataObject(array('text' => 'Learning'));
		$this->_eventManager->dispatch('learning_management_display_text', ['mp_text' => $textDisplay]);
		echo $textDisplay->getText();
		exit;
	}
}
