<?php

namespace Numbers\Microservices\MessageBroker\Form;
class Consumers extends \Object\Form\Wrapper\Base {
	public $form_link = 'mb_consumers';
	public $module_code = 'MB';
	public $title = 'M/B Consumers Form';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
			'back' => true,
			'new' => true,
			'import' => true
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900]
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'mb_consumer_code' => [
				'mb_consumer_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 95, 'required' => true, 'navigation' => true],
				'mb_consumer_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'mb_consumer_name' => [
				'mb_consumer_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 100],
			],
			'mb_consumer_token' => [
				'mb_consumer_token' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Token', 'domain' => 'token', 'null' => true, 'required' => true, 'percent' => 100],
			],
			'mb_consumer_delivery_method' => [
				'mb_consumer_delivery_method' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Delivery Method', 'domain' => 'type_code', 'null' => true, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Microservices\MessageBroker\Model\Delivery\Methods'],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Consumers',
		'model' => '\Numbers\Microservices\MessageBroker\Model\Consumers'
	];
}