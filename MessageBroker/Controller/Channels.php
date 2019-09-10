<?php

namespace Numbers\Microservices\MessageBroker\Controller;
class Channels extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Microservices\MessageBroker\Form\List2\Channels([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Microservices\MessageBroker\Form\Channels([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\Microservices\MessageBroker\Form\Channels',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}