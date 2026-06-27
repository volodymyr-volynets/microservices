<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Microservices\MessageBroker\UnitTests;

use Numbers\Microservices\MessageBroker\Model\Channels;
use Numbers\Microservices\MessageBroker\Model\Consumers;
use Numbers\Microservices\MessageBroker\Model\Producers;
use Numbers\Tenants\Tenants\Model\Modules;
use PHPUnit\Framework\TestCase;

class Base extends TestCase
{
    public function testInitialize()
    {
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
        $result = Modules::getStatic([
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
    public function testModuleSetup($options)
    {
        // producer
        $producer = Producers::getStatic([
            'where' => [
                'mb_producer_code' => 'PHPUNIT'
            ],
            'pk' => null,
            'single_row' => true,
        ]);
        $this->assertEquals(true, !empty($producer), 'You must create PHPUNIT producer!');
        // channel
        $channel = Channels::getStatic([
            'where' => [
                'mb_channel_code' => 'PHPUNIT'
            ],
            'pk' => null,
            'single_row' => true,
        ]);
        $this->assertEquals(true, !empty($channel), 'You must create PHPUNIT channel!');
        // consumers
        $consumers = Consumers::getStatic([
            'where' => [
                'mb_consumer_code' => ['PHPUNIT1', 'PHPUNIT2']
            ],
            'pk' => ['mb_consumer_code']
        ]);
        $this->assertEquals(true, !empty($consumers) && count($consumers) == 2, 'You must create PHPUNIT1 and PHPUNIT2 consumers!');
    }
}
