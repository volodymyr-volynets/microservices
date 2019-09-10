<?php

namespace Numbers\Microservices\MessageBroker\Form;
class Producers extends \Object\Form\Wrapper\Base {
	public $form_link = 'mb_producers';
	public $module_code = 'MB';
	public $title = 'M/B Producers Form';
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
			'mb_producer_code' => [
				'mb_producer_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 95, 'required' => true, 'navigation' => true],
				'mb_producer_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'mb_producer_name' => [
				'mb_producer_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 100],
			],
			'mb_producer_token' => [
				'mb_producer_token' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Token', 'domain' => 'token', 'null' => true, 'required' => true, 'percent' => 100],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Producers',
		'model' => '\Numbers\Microservices\MessageBroker\Model\Producers'
	];
}