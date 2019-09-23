<?php

namespace Numbers\Microservices\MessageBroker\Model;
class Channels extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'MB';
	public $title = 'M/B Channels';
	public $schema;
	public $name = 'mb_channels';
	public $pk = ['mb_channel_tenant_id', 'mb_channel_code'];
	public $tenant = true;
	public $module;
	public $orderby;
	public $limit;
	public $column_prefix = 'mb_channel_';
	public $columns = [
		'mb_channel_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'mb_channel_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'mb_channel_type_code' => ['name' => 'Type', 'domain' => 'type_code', 'options_model' => '\Numbers\Microservices\MessageBroker\Model\Channel\Types'],
		'mb_channel_name' => ['name' => 'Name', 'domain' => 'name'],
		'mb_channel_delay_seconds' => ['name' => 'Delay (seconds)', 'domain' => 'order', 'null' => true],
		'mb_channel_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'mb_channels_pk' => ['type' => 'pk', 'columns' => ['mb_channel_tenant_id', 'mb_channel_code']],
	];
	public $indexes = [
		'mb_channels_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['mb_channel_code', 'mb_channel_name']]
	];
	public $history = false;
	public $audit = [
		'map' => [
			'mb_channel_tenant_id' => 'wg_audit_tenant_id',
			'mb_channel_code' => 'wg_audit_channel_code',
		]
	];
	public $optimistic_lock = true;
	public $options_map = [
		'mb_channel_name' => 'name',
		'mb_channel_inactive' => 'inactive'
	];
	public $options_active = [];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}