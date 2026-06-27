<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Microservices\MessageBroker\Model\Channel;

use Object\Data;

class Types extends Data
{
    public $module_code = 'MB';
    public $title = 'M/B Channel Types';
    public $column_key = 'mb_chantype_code';
    public $column_prefix = 'mb_chantype_';
    public $orderby;
    public $columns = [
        'mb_chantype_code' => ['name' => 'Type', 'domain' => 'type_code'],
        'mb_chantype_name' => ['name' => 'Name', 'type' => 'text']
    ];
    public $data = [
        'DISTRIBUTION' => ['mb_chantype_name' => 'Distribution'],
        'ROUND_ROBIN' => ['mb_chantype_name' => 'Round Robin'],
        'PRIORITIZED' => ['mb_chantype_name' => 'Prioritized'],
        'FIFO' => ['mb_chantype_name' => 'First In First Out List'],
        'LIFO' => ['mb_chantype_name' => 'Last In First Out List'],
    ];
}
