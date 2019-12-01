<?php

namespace Numbers\Microservices\MessageBroker\Controller\APIs;
class NewMessage extends \Object\Controller\API {
	public function actionSave() {
		$result = \Numbers\Microservices\MessageBroker\Form\Messages::API()->save($this->api_input, ['simple' => true]);
		$this->handleOutput($result);
	}
	public function actionGetStructure() {
		return '';
	}
}