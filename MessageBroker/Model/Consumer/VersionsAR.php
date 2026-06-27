<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Microservices\MessageBroker\Model\Consumer;

use Object\ActiveRecord;

class VersionsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Versions::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['mb_consversion_tenant_id','mb_consversion_consumer_code','mb_consversion_channel_code','mb_consversion_chanversion_code'];
    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $mb_consversion_tenant_id = null {
        get => $this->mb_consversion_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('mb_consversion_tenant_id', $value);
            $this->mb_consversion_tenant_id = $value;
        }
    }

    /**
     * Consumer Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $mb_consversion_consumer_code = null {
        get => $this->mb_consversion_consumer_code;
        set {
            $this->setFullPkAndFilledColumn('mb_consversion_consumer_code', $value);
            $this->mb_consversion_consumer_code = $value;
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
    public string|null $mb_consversion_channel_code = null {
        get => $this->mb_consversion_channel_code;
        set {
            $this->setFullPkAndFilledColumn('mb_consversion_channel_code', $value);
            $this->mb_consversion_channel_code = $value;
        }
    }

    /**
     * Version Code
     *
     *
     *
     * {domain{version_code}}
     *
     * @var string|null Domain: version_code Type: varchar
     */
    public string|null $mb_consversion_chanversion_code = null {
        get => $this->mb_consversion_chanversion_code;
        set {
            $this->setFullPkAndFilledColumn('mb_consversion_chanversion_code', $value);
            $this->mb_consversion_chanversion_code = $value;
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
    public int|null $mb_consversion_inactive = 0 {
        get => $this->mb_consversion_inactive;
        set {
            $this->setFullPkAndFilledColumn('mb_consversion_inactive', $value);
            $this->mb_consversion_inactive = $value;
        }
    }
}
