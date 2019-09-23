<?php

namespace Numbers\Microservices\MessageBroker\Model;
class Producers extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'MB';
	public $title = 'M/B Producers';
	public $schema;
	public $name = 'mb_producers';
	public $pk = ['mb_producer_tenant_id', 'mb_producer_code'];
	public $tenant = true;
	public $module;
	public $orderby;
	public $limit;
	public $column_prefix = 'mb_producer_';
	public $columns = [
		'mb_producer_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'mb_producer_code' => ['name' => 'Code', 'domain' => 'group_code'],
		'mb_producer_name' => ['name' => 'Name', 'domain' => 'name'],
		'mb_producer_token' => ['name' => 'Token', 'domain' => 'token', 'null' => true],
		'mb_producer_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'mb_producers_pk' => ['type' => 'pk', 'columns' => ['mb_producer_tenant_id', 'mb_producer_code']],
	];
	public $indexes = [
		'mb_producers_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['mb_producer_code', 'mb_producer_name']]
	];
	public $history = false;
	public $audit = [
		'map' => [
			'mb_producer_tenant_id' => 'wg_audit_tenant_id',
			'mb_producer_code' => 'wg_audit_producer_code',
		]
	];
	public $optimistic_lock = true;
	public $options_map = [
		'mb_producer_name' => 'name',
		'mb_producer_inactive' => 'inactive'
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