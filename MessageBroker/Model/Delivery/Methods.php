<?php

namespace Numbers\Microservices\MessageBroker\Model\Delivery;
class Methods extends \Object\Data {
	public $module_code = 'MB';
	public $title = 'M/B Delivery Methods';
	public $column_key = 'mb_delivmethod_code';
	public $column_prefix = 'mb_delivmethod_';
	public $orderby;
	public $columns = [
		'mb_delivmethod_code' => ['name' => 'Type', 'domain' => 'type_code'],
		'mb_delivmethod_name' => ['name' => 'Name', 'type' => 'text']
	];
	public $data = [
		'PULL' => ['mb_delivmethod_name' => 'Pull'],
		'PUSH' => ['mb_delivmethod_name' => 'Push'],
	];
}