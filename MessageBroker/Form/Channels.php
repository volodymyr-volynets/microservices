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
		'versions_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Microservices\MessageBroker\Model\Channel\Versions',
			'details_pk' => ['mb_chanversion_code'],
			'required' => true,
			'order' => 800,
		],
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
		'versions_container' => [
			'row1' => [
				'mb_chanversion_code' => ['order' => 1, 'label_name' => 'Version Code', 'domain' => 'version_code', 'null' => true, 'required' => true, 'percent' => 30, 'onblur' => 'this.form.submit();'],
				'mb_chanversion_name' => ['order' => 2, 'label_name' => 'Version Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 65],
				'mb_chanversion_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Channels',
		'model' => '\Numbers\Microservices\MessageBroker\Model\Channels',
		'details' => [
			'\Numbers\Microservices\MessageBroker\Model\Channel\Versions' => [
				'name' => 'Channel Versions',
				'pk' => ['mb_chanversion_tenant_id', 'mb_chanversion_channel_code', 'mb_chanversion_code'],
				'type' => '1M',
				'map' => ['mb_channel_tenant_id' => 'mb_chanversion_tenant_id', 'mb_channel_code' => 'mb_chanversion_channel_code']
			],
		]
	];
}