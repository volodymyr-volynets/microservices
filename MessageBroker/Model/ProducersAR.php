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

class ProducersAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Producers::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['mb_producer_tenant_id','mb_producer_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $mb_producer_tenant_id = null {
        get => $this->mb_producer_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('mb_producer_tenant_id', $value);
            $this->mb_producer_tenant_id = $value;
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
    public string|null $mb_producer_code = null {
        get => $this->mb_producer_code;
        set {
            $this->setFullPkAndFilledColumn('mb_producer_code', $value);
            $this->mb_producer_code = $value;
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
    public string|null $mb_producer_name = null {
        get => $this->mb_producer_name;
        set {
            $this->setFullPkAndFilledColumn('mb_producer_name', $value);
            $this->mb_producer_name = $value;
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
    public string|null $mb_producer_token = null {
        get => $this->mb_producer_token;
        set {
            $this->setFullPkAndFilledColumn('mb_producer_token', $value);
            $this->mb_producer_token = $value;
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
    public int|null $mb_producer_inactive = 0 {
        get => $this->mb_producer_inactive;
        set {
            $this->setFullPkAndFilledColumn('mb_producer_inactive', $value);
            $this->mb_producer_inactive = $value;
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
    public string|null $mb_producer_optimistic_lock = 'now()' {
        get => $this->mb_producer_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('mb_producer_optimistic_lock', $value);
            $this->mb_producer_optimistic_lock = $value;
        }
    }
}
