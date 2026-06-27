<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Microservices\MessageBroker\Model\Queue;

use Object\ActiveRecord;

class MessagesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Messages::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['mb_quemessage_tenant_id','mb_quemessage_seq','mb_quemessage_id'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $mb_quemessage_tenant_id = null {
        get => $this->mb_quemessage_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('mb_quemessage_tenant_id', $value);
            $this->mb_quemessage_tenant_id = $value;
        }
    }

    /**
     * Message Sequence
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int|null Domain: big_id_sequence Type: bigserial
     */
    public int|null $mb_quemessage_seq = null {
        get => $this->mb_quemessage_seq;
        set {
            $this->setFullPkAndFilledColumn('mb_quemessage_seq', $value);
            $this->mb_quemessage_seq = $value;
        }
    }

    /**
     * Message #
     *
     *
     *
     * {domain{big_id_sequence}}
     *
     * @var int|null Domain: big_id_sequence Type: bigserial
     */
    public int|null $mb_quemessage_id = null {
        get => $this->mb_quemessage_id;
        set {
            $this->setFullPkAndFilledColumn('mb_quemessage_id', $value);
            $this->mb_quemessage_id = $value;
        }
    }

    /**
     * Timestamp
     *
     *
     *
     * {domain{timestamp_now}}
     *
     * @var string|null Domain: timestamp_now Type: timestamp
     */
    public string|null $mb_quemessage_timestamp = 'now()' {
        get => $this->mb_quemessage_timestamp;
        set {
            $this->setFullPkAndFilledColumn('mb_quemessage_timestamp', $value);
            $this->mb_quemessage_timestamp = $value;
        }
    }

    /**
     * Producer Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $mb_quemessage_producer_code = null {
        get => $this->mb_quemessage_producer_code;
        set {
            $this->setFullPkAndFilledColumn('mb_quemessage_producer_code', $value);
            $this->mb_quemessage_producer_code = $value;
        }
    }

    /**
     * Channel Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $mb_quemessage_channel_code = null {
        get => $this->mb_quemessage_channel_code;
        set {
            $this->setFullPkAndFilledColumn('mb_quemessage_channel_code', $value);
            $this->mb_quemessage_channel_code = $value;
        }
    }

    /**
     * Channel Version Code
     *
     *
     *
     * {domain{version_code}}
     *
     * @var string|null Domain: version_code Type: varchar
     */
    public string|null $mb_quemessage_chanversion_code = null {
        get => $this->mb_quemessage_chanversion_code;
        set {
            $this->setFullPkAndFilledColumn('mb_quemessage_chanversion_code', $value);
            $this->mb_quemessage_chanversion_code = $value;
        }
    }

    /**
     * Body
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $mb_quemessage_body = null {
        get => $this->mb_quemessage_body;
        set {
            $this->setFullPkAndFilledColumn('mb_quemessage_body', $value);
            $this->mb_quemessage_body = $value;
        }
    }

    /**
     * Errors
     *
     *
     *
     *
     *
     * @var mixed Type: json
     */
    public mixed $mb_quemessage_errors = null {
        get => $this->mb_quemessage_errors;
        set {
            $this->setFullPkAndFilledColumn('mb_quemessage_errors', $value);
            $this->mb_quemessage_errors = $value;
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
    public int|null $mb_quemessage_inactive = 0 {
        get => $this->mb_quemessage_inactive;
        set {
            $this->setFullPkAndFilledColumn('mb_quemessage_inactive', $value);
            $this->mb_quemessage_inactive = $value;
        }
    }
}
