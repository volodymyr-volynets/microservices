<?php

namespace Numbers\Microservices\MessageBroker\Data;
class Import extends \Object\Import {
	public $data = [
		'modules' => [
			'options' => [
				'pk' => ['sm_module_code'],
				'model' => '\Numbers\Backend\System\Modules\Model\Collection\Modules',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_module_code' => 'MB',
					'sm_module_type' => 20,
					'sm_module_name' => 'M/B Message Broker',
					'sm_module_abbreviation' => 'M/B',
					'sm_module_icon' => 'fas fa-clipboard-list',
					'sm_module_transactions' => 0,
					'sm_module_multiple' => 0,
					'sm_module_activation_model' => null,
					'sm_module_custom_activation' => 0,
					'sm_module_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Module\Dependencies' => []
				]
			]
		],
		'features' => [
			'options' => [
				'pk' => ['sm_feature_code'],
				'model' => '\Numbers\Backend\System\Modules\Model\Collection\Module\Features',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_feature_module_code' => 'MB',
					'sm_feature_code' => 'MB::MESSAGE_BROKER',
					'sm_feature_type' => 10,
					'sm_feature_name' => 'M/B Message Broker',
					'sm_feature_icon' => 'fas fa-clipboard-list',
					'sm_feature_activation_model' => null,
					'sm_feature_activated_by_default' => 1,
					'sm_feature_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Module\Dependencies' => []
				]
			]
		]
	];
}