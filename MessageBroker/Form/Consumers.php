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
		'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
		'general_container' => ['default_row_type' => 'grid', 'order' => 32000],
		'versions_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Microservices\MessageBroker\Model\Consumer\Versions',
			'details_pk' => ['mb_consversion_channel_code', 'mb_consversion_chanversion_code'],
			'required' => true,
			'order' => 35000,
		],
	];
	public $rows = [
		'tabs' => [
			'general' => ['order' => 100, 'label_name' => 'General'],
			'versions' => ['order' => 200, 'label_name' => 'Channel / Versions'],
		],
	];
	public $elements = [
		'top' => [
			'mb_consumer_code' => [
				'mb_consumer_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 95, 'required' => true, 'navigation' => true],
				'mb_consumer_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'mb_consumer_name' => [
				'mb_consumer_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 100],
			],
		],
		'tabs' => [
			'general' => [
				'general' => ['container' => 'general_container', 'order' => 100],
			],
			'versions' => [
				'versions' => ['container' => 'versions_container', 'order' => 100],
			],
		],
		'general_container' => [
			'mb_consumer_token' => [
				'mb_consumer_token' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Token', 'domain' => 'token', 'null' => true, 'required' => true, 'percent' => 100],
			],
			'mb_consumer_delivery_method' => [
				'mb_consumer_delivery_method' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Delivery Method', 'domain' => 'type_code', 'null' => true, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Microservices\MessageBroker\Model\Delivery\Methods'],
			]
		],
		'versions_container' => [
			'row1' => [
				'mb_consversion_channel_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Channel', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Microservices\MessageBroker\Model\Channels', 'onchange' => 'this.form.submit();'],
				'mb_consversion_chanversion_code' => ['order' => 2, 'label_name'=> 'Version', 'domain' => 'version_code', 'null' => true, 'percent' => 45, 'method' => 'select', 'options_model' => '\Numbers\Microservices\MessageBroker\Model\Channel\Versions', 'options_depends' => ['mb_chanversion_channel_code' => 'detail::mb_consversion_channel_code']],
				'mb_consversion_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Consumers',
		'model' => '\Numbers\Microservices\MessageBroker\Model\Consumers',
		'details' => [
			'\Numbers\Microservices\MessageBroker\Model\Consumer\Versions' => [
				'name' => 'Channel / Versions',
				'pk' => ['mb_consversion_tenant_id', 'mb_consversion_consumer_code', 'mb_consversion_channel_code', 'mb_consversion_chanversion_code'],
				'type' => '1M',
				'map' => ['mb_consumer_tenant_id' => 'mb_consversion_tenant_id', 'mb_consumer_code' => 'mb_consversion_consumer_code'],
			]
		]
	];
}