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

class ChannelsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Channels::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['mb_channel_tenant_id','mb_channel_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $mb_channel_tenant_id = null {
        get => $this->mb_channel_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('mb_channel_tenant_id', $value);
            $this->mb_channel_tenant_id = $value;
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
    public string|null $mb_channel_code = null {
        get => $this->mb_channel_code;
        set {
            $this->setFullPkAndFilledColumn('mb_channel_code', $value);
            $this->mb_channel_code = $value;
        }
    }

    /**
     * Type
     *
     *
     * {options_model{\Numbers\Microservices\MessageBroker\Model\Channel\Types}}
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $mb_channel_type_code = null {
        get => $this->mb_channel_type_code;
        set {
            $this->setFullPkAndFilledColumn('mb_channel_type_code', $value);
            $this->mb_channel_type_code = $value;
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
    public string|null $mb_channel_name = null {
        get => $this->mb_channel_name;
        set {
            $this->setFullPkAndFilledColumn('mb_channel_name', $value);
            $this->mb_channel_name = $value;
        }
    }

    /**
     * Delay (seconds)
     *
     *
     *
     * {domain{order}}
     *
     * @var int|null Domain: order Type: integer
     */
    public int|null $mb_channel_delay_seconds = 0 {
        get => $this->mb_channel_delay_seconds;
        set {
            $this->setFullPkAndFilledColumn('mb_channel_delay_seconds', $value);
            $this->mb_channel_delay_seconds = $value;
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
    public int|null $mb_channel_inactive = 0 {
        get => $this->mb_channel_inactive;
        set {
            $this->setFullPkAndFilledColumn('mb_channel_inactive', $value);
            $this->mb_channel_inactive = $value;
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
    public string|null $mb_channel_optimistic_lock = 'now()' {
        get => $this->mb_channel_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('mb_channel_optimistic_lock', $value);
            $this->mb_channel_optimistic_lock = $value;
        }
    }
}
