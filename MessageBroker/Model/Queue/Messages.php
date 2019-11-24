<?php

namespace Numbers\Microservices\MessageBroker\Model\Queue;
class Messages extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'MB';
	public $title = 'M/B Queue Messages';
	public $schema;
	public $name = 'mb_queue_messages';
	public $pk = ['mb_quemessage_tenant_id', 'mb_quemessage_seq', 'mb_quemessage_id'];
	public $tenant = true;
	public $module;
	public $orderby;
	public $limit;
	public $column_prefix = 'mb_quemessage_';
	public $columns = [
		'mb_quemessage_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'mb_quemessage_seq' => ['name' => 'Message Sequence', 'domain' => 'big_id_sequence'],
		'mb_quemessage_id' => ['name' => 'Message #', 'domain' => 'big_id_sequence'],
		'mb_quemessage_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
		// header
		'mb_quemessage_producer_code' => ['name' => 'Producer Code', 'domain' => 'group_code'],
		'mb_quemessage_channel_code' => ['name' => 'Channel Code', 'domain' => 'group_code'],
		'mb_quemessage_chanversion_code' => ['name' => 'Channel Version Code', 'domain' => 'version_code'],
		// body
		'mb_quemessage_body' => ['name' => 'Body', 'type' => 'json'],
		'mb_quemessage_errors' => ['name' => 'Errors', 'type' => 'json', 'null' => true],
		// other
		'mb_quemessage_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'mb_queue_messages_pk' => ['type' => 'pk', 'columns' => ['mb_quemessage_tenant_id', 'mb_quemessage_seq', 'mb_quemessage_id']],
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
	public $optimistic_lock = false;
	public $options_map = [];
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

	/**
	 * Nextval
	 *
	 * @return array
	 */
	public function nextvalDoubled() : array {
		$result = [
			'mb_quemessage_seq' => null,
			'mb_quemessage_id' => null
		];
		$result['mb_quemessage_seq'] = $this->sequence('mb_quemessage_seq', 'currval', \Tenant::id());
		if (empty($result['mb_quemessage_seq'])) {
			$result['mb_quemessage_seq'] = $this->sequence('mb_quemessage_seq', 'nextval', \Tenant::id());
		}
		$result['mb_quemessage_id'] = $this->sequence('mb_quemessage_id', 'nextval', \Tenant::id());
		// if we need to reset the sequence
		if ($result['mb_quemessage_id'] == PHP_INT_MAX) {
			$this->sequence('mb_quemessage_seq', 'nextval', \Tenant::id());
			$this->db_object->setval($this->full_table_name . '_mb_quemessage_id_seq', 1, \Tenant::id(), null);
		}
		return $result;
	}
}