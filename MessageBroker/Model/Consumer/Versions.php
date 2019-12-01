<?php

namespace Numbers\Microservices\MessageBroker\Model\Consumer;
class Versions extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'MB';
	public $title = 'M/B Consumer Versions';
	public $schema;
	public $name = 'mb_consumer_versions';
	public $pk = ['mb_consversion_tenant_id', 'mb_consversion_consumer_code', 'mb_consversion_channel_code', 'mb_consversion_chanversion_code'];
	public $tenant = true;
	public $module;
	public $orderby;
	public $limit;
	public $column_prefix = 'mb_consversion_';
	public $columns = [
		'mb_consversion_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'mb_consversion_consumer_code' => ['name' => 'Consumer Code', 'domain' => 'group_code'],
		'mb_consversion_channel_code' => ['name' => 'Channel Code', 'domain' => 'group_code'],
		'mb_consversion_chanversion_code' => ['name' => 'Version Code', 'domain' => 'version_code'],
		'mb_consversion_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'mb_consumer_versions_pk' => ['type' => 'pk', 'columns' => ['mb_consversion_tenant_id', 'mb_consversion_consumer_code', 'mb_consversion_channel_code', 'mb_consversion_chanversion_code']],
		'mb_consversion_consumer_code_fk' => [
			'type' => 'fk',
			'columns' => ['mb_consversion_tenant_id', 'mb_consversion_consumer_code'],
			'foreign_model' => '\Numbers\Microservices\MessageBroker\Model\Consumers',
			'foreign_columns' => ['mb_consumer_tenant_id', 'mb_consumer_code']
		],
		'mb_consversion_chanversion_code_fk' => [
			'type' => 'fk',
			'columns' => ['mb_consversion_tenant_id', 'mb_consversion_channel_code', 'mb_consversion_chanversion_code'],
			'foreign_model' => '\Numbers\Microservices\MessageBroker\Model\Channel\Versions',
			'foreign_columns' => ['mb_chanversion_tenant_id', 'mb_chanversion_channel_code', 'mb_chanversion_code']
		]
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = false;
	public $options_map = [
		'mb_consversion_name' => 'name',
		'mb_consversion_inactive' => 'inactive'
	];
	public $options_active = [
		'mb_consversion_inactive' => 0
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