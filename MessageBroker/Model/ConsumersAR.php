<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Microservices\MessageBroker\Model;

use Object\ActiveRecord;

class ConsumersAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Consumers::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['mb_consumer_tenant_id','mb_consumer_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $mb_consumer_tenant_id = null {
        get => $this->mb_consumer_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('mb_consumer_tenant_id', $value);
            $this->mb_consumer_tenant_id = $value;
        }
    }

    /**
     * Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $mb_consumer_code = null {
        get => $this->mb_consumer_code;
        set {
            $this->setFullPkAndFilledColumn('mb_consumer_code', $value);
            $this->mb_consumer_code = $value;
        }
    }

    /**
     * Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $mb_consumer_name = null {
        get => $this->mb_consumer_name;
        set {
            $this->setFullPkAndFilledColumn('mb_consumer_name', $value);
            $this->mb_consumer_name = $value;
        }
    }

    /**
     * Token
     *
     *
     *
     * {domain{token}}
     *
     * @var string|null Domain: token Type: varchar
     */
    public string|null $mb_consumer_token = null {
        get => $this->mb_consumer_token;
        set {
            $this->setFullPkAndFilledColumn('mb_consumer_token', $value);
            $this->mb_consumer_token = $value;
        }
    }

    /**
     * Delivery Method
     *
     *
     * {options_model{\Numbers\Microservices\MessageBroker\Model\Delivery\Methods}}
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $mb_consumer_delivery_method = null {
        get => $this->mb_consumer_delivery_method;
        set {
            $this->setFullPkAndFilledColumn('mb_consumer_delivery_method', $value);
            $this->mb_consumer_delivery_method = $value;
        }
    }

    /**
     * Inactive
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $mb_consumer_inactive = 0 {
        get => $this->mb_consumer_inactive;
        set {
            $this->setFullPkAndFilledColumn('mb_consumer_inactive', $value);
            $this->mb_consumer_inactive = $value;
        }
    }

    /**
     * Optimistic Lock
     *
     *
     *
     * {domain{optimistic_lock}}
     *
     * @var string|null Domain: optimistic_lock Type: timestamp
     */
    public string|null $mb_consumer_optimistic_lock = 'now()' {
        get => $this->mb_consumer_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('mb_consumer_optimistic_lock', $value);
            $this->mb_consumer_optimistic_lock = $value;
        }
    }
}
