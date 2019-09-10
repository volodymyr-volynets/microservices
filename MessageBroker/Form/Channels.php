<?php

namespace Numbers\Microservices\MessageBroker\Form;
class Channels extends \Object\Form\Wrapper\Base {
	public $form_link = 'mb_channels';
	public $module_code = 'MB';
	public $title = 'M/B Channels Form';
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
			'mb_channel_code' => [
				'mb_channel_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 95, 'required' => true, 'navigation' => true],
				'mb_channel_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'mb_channel_name' => [
				'mb_channel_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 100],
			],
			'mb_channel_type_code' => [
				'mb_channel_type_code' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Type', 'domain' => 'type_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Microservices\MessageBroker\Model\Channel\Types'],
				'mb_channel_delay_seconds' => ['order' => 2, 'label_name' => 'Delay (seconds)', 'domain' => 'order', 'null' => true, 'percent' => 50],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Channels',
		'model' => '\Numbers\Microservices\MessageBroker\Model\Channels'
	];
}