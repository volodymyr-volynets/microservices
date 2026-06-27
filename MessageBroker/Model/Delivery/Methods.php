<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Microservices\MessageBroker\Model\Delivery;

use Object\Data;

class Methods extends Data
{
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
