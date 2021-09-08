<?php

namespace Learning\Management\Plugin;

class ExamplePlugin
{

	public function beforeSetTitle(\Learning\Management\Controller\Index\Example $subject, $title)
	{
		$title = $title . " to ";
		echo __METHOD__ . "</br>";

		return [$title];
	}


	public function afterGetTitle(\Learning\Management\Controller\Index\Example $subject, $result)
	{

		echo __METHOD__ . "</br>";

		return '<h1>' . $result . 'Learning.com' . '</h1>';
	}


	public function aroundGetTitle(\Learning\Management\Controller\Index\Example $subject, callable $proceed)
	{

		echo __METHOD__ . " - Before proceed() </br>";
		$result = $proceed();
		echo __METHOD__ . " - After proceed() </br>";


		return $result;
	}
}
