<?php

namespace Numbers\Microservices\MessageBroker\Data;
class APIs extends \Object\Import {
	public $data = [
		'controllers' => [
			'options' => [
				'pk' => ['sm_resource_id'],
				'model' => '\Numbers\Backend\System\Modules\Model\Collection\Resources',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_resource_id' => '::id::\Numbers\Microservices\MessageBroker\Controller\APIs\NewMessage',
					'sm_resource_code' => '\Numbers\Microservices\MessageBroker\Controller\APIs\NewMessage',
					'sm_resource_type' => 150,
					'sm_resource_classification' => 'APIs',
					'sm_resource_name' => 'M/B New Message API',
					'sm_resource_description' => null,
					'sm_resource_icon' => '',
					'sm_resource_module_code' => 'MB',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'Microservices',
					'sm_resource_group3_name' => 'Message Broker',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 1,
					'sm_resource_acl_authorized' => 1,
					'sm_resource_acl_permission' => 0,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Resource\Features' => [],
					'\Numbers\Backend\System\Modules\Model\Resource\Map' => []
				],
			]
		]
	];
}