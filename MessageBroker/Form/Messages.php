<?php

namespace Numbers\Microservices\MessageBroker\Form;
class Messages extends \Object\Form\Wrapper\Base {
	public $form_link = 'mb_messages';
	public $module_code = 'MB';
	public $title = 'M/B Messages Form';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
			'back' => true,
			'new' => true,
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900]
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'mb_quemessage_id' => [
				'mb_quemessage_seq' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Message Sequence', 'domain' => 'big_id', 'percent' => 50, 'readonly' => true],
				'mb_quemessage_id' => ['order' => 2, 'label_name' => 'Message #', 'domain' => 'big_id_sequence', 'percent' => 45, 'readonly' => true],
				'mb_quemessage_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'mb_quemessage_timestamp' => [
				'mb_quemessage_timestamp' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Timestamp', 'domain' => 'timestamp_now', 'null' => true, 'required' => true, 'method' => 'calendar', 'calendar_icon' => 'right', 'percent' => 50],
			],
			'mb_quemessage_producer_code' => [
				'mb_quemessage_producer_code' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Producer', 'domain' => 'group_code', 'null' => true, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Microservices\MessageBroker\Model\Producers::optionsActive'],
			],
			'mb_quemessage_channel_code' => [
				'mb_quemessage_channel_code' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Channel', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Microservices\MessageBroker\Model\Channels::optionsActive', 'onchange' => 'this.form.submit();'],
				'mb_quemessage_chanversion_code' => ['order' => 4, 'label_name'=> 'Version', 'domain' => 'version_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Microservices\MessageBroker\Model\Channel\Versions', 'options_depends' => ['mb_chanversion_channel_code' => 'mb_quemessage_channel_code']],
			],
			'mb_quemessage_body' => [
				'mb_quemessage_body' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Message Body', 'type' => 'text', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'textarea', 'rows' => 7],
				'mb_quemessage_errors' => ['order' => 2, 'label_name' => 'Message Errors', 'type' => 'text', 'null' => true, 'percent' => 50, 'method' => 'textarea', 'rows' => 7],
			],
			self::HIDDEN => [
				'__producers_token' => ['label_name' => 'Producers Token', 'domain' => 'token', 'null' => true, 'method' => 'hidden'],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Messages',
		'model' => '\Numbers\Microservices\MessageBroker\Model\Queue\Messages'
	];

	public function validate(& $form) {
		if (empty($form->values['mb_quemessage_id'])) {
			$model = new \Numbers\Microservices\MessageBroker\Model\Queue\Messages();
			$form->values = array_merge_hard($form->values, $model->nextvalDoubled());
		}
		if ($form->hasErrors()) return;
		// API must provide producers token
		if ($form->is_api) {
			$producer = \Numbers\Microservices\MessageBroker\Model\Producers::getStatic([
				'where' => [
					'mb_producer_code' => $form->values['mb_quemessage_producer_code'],
				],
				'pk' => null,
				'single_row' => true,
			]);
			if ($producer['mb_producer_token'] != $form->values['__producers_token']) {
				$form->error(DANGER, \Object\Content\Messages::INVALID_VALUES, '__producers_token');
			}
		}
		if (!is_json($form->values['mb_quemessage_body'])) {
			$form->error(DANGER, \Object\Content\Messages::INVALID_VALUES, 'mb_quemessage_body');
		}
		if (!empty($form->values['mb_quemessage_errors']) && !is_json($form->values['mb_quemessage_errors'])) {
			$form->error(DANGER, \Object\Content\Messages::INVALID_VALUES, 'mb_quemessage_errors');
		}
	}

	public function post(& $form) {
		$form->api_values = [
			'mb_quemessage_seq' => $form->values['mb_quemessage_seq'],
			'mb_quemessage_id' => $form->values['mb_quemessage_id'],
		];
	}
}