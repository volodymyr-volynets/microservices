<?php

namespace Numbers\Microservices\MessageBroker\UnitTests;
class Base extends \PHPUnit\Framework\TestCase {

	public function testInitialize() {
		// initialize database
		$db = \Application::get('db.default_phpunit');
		if (empty($db)) {
			$db = \Application::get('db.default');
		}
		unset($db['cache_link']);
		$db_object = new \Db('default', $db['submodule'], $db);
		$db_object->connect($db['servers'][1]);
		// tenant
		$tenant_id = (int) \Application::get('phpunit.tenant_default_id');
		$this->assertEquals(true, !empty($tenant_id));
		\Tenant::setOverrideTenantId($tenant_id);
		// fetch module
		$result = \Numbers\Tenants\Tenants\Model\Modules::getStatic([
			'where' => [
				'tm_module_module_code' => 'MB'
			],
			'columns' => ['tm_module_id'],
			'pk' => ['tm_module_id']
		]);
		$this->assertEquals(true, !empty($result), 'Please activate "M/B Message Broker!');
		// we group all variable we would need in the future
		return [
			'tenant_id' => $tenant_id,
			'module_id' => key($result)
		];
	}

	/**
	 * @depends testInitialize
	 */
	public function testModuleSetup($options) {
		// producer
		$producer = \Numbers\Microservices\MessageBroker\Model\Producers::getStatic([
			'where' => [
				'mb_producer_code' => 'PHPUNIT'
			],
			'pk' => null,
			'single_row' => true,
		]);
		$this->assertEquals(true, !empty($producer), 'You must create PHPUNIT producer!');
		// channel
		$channel = \Numbers\Microservices\MessageBroker\Model\Channels::getStatic([
			'where' => [
				'mb_channel_code' => 'PHPUNIT'
			],
			'pk' => null,
			'single_row' => true,
		]);
		$this->assertEquals(true, !empty($channel), 'You must create PHPUNIT channel!');
		// consumers
		$consumers = \Numbers\Microservices\MessageBroker\Model\Consumers::getStatic([
			'where' => [
				'mb_consumer_code' => ['PHPUNIT1', 'PHPUNIT2']
			],
			'pk' => ['mb_consumer_code']
		]);
		$this->assertEquals(true, !empty($consumers) && count($consumers) == 2, 'You must create PHPUNIT1 and PHPUNIT2 consumers!');
	}
}