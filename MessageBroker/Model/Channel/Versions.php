<?php

namespace Numbers\Microservices\MessageBroker\Model\Channel;
class Versions extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'MB';
	public $title = 'M/B Channel Versions';
	public $schema;
	public $name = 'mb_channel_versions';
	public $pk = ['mb_chanversion_tenant_id', 'mb_chanversion_channel_code', 'mb_chanversion_code'];
	public $tenant = true;
	public $module;
	public $orderby;
	public $limit;
	public $column_prefix = 'mb_chanversion_';
	public $columns = [
		'mb_chanversion_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'mb_chanversion_channel_code' => ['name' => 'Channel Code', 'domain' => 'group_code'],
		'mb_chanversion_code' => ['name' => 'Version Code', 'domain' => 'version_code'],
		'mb_chanversion_name' => ['name' => 'Name', 'domain' => 'name'],
		'mb_chanversion_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'mb_channel_versions_pk' => ['type' => 'pk', 'columns' => ['mb_chanversion_tenant_id', 'mb_chanversion_channel_code', 'mb_chanversion_code']],
		'mb_chanversion_channel_code_fk' => [
			'type' => 'fk',
			'columns' => ['mb_chanversion_tenant_id', 'mb_chanversion_channel_code'],
			'foreign_model' => '\Numbers\Microservices\MessageBroker\Model\Channels',
			'foreign_columns' => ['mb_channel_tenant_id', 'mb_channel_code']
		],
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = false;
	public $options_map = [
		'mb_chanversion_name' => 'name',
		'mb_chanversion_inactive' => 'inactive'
	];
	public $options_active = [
		'mb_chanversion_inactive' => 0
	];
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