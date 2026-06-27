<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Microservices\MessageBroker\Controller\APIs;

use Numbers\Microservices\MessageBroker\Form\Messages;
use Object\Controller\API;

class NewMessage extends API
{
    public function actionSave()
    {
        $result = Messages::API()->save($this->api_input, ['simple' => true]);
        $this->handleOutput($result);
    }
    public function actionGetStructure()
    {
        return '';
    }
}
