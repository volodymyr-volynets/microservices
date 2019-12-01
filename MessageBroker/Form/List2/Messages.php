<?php

namespace Numbers\Microservices\MessageBroker\Form\List2;
class Messages extends \Object\Form\Wrapper\List2 {
	public $form_link = 'mb_messages_list';
	public $module_code = 'MB';
	public $title = 'M/B Messages List';
	public $options = [
		'segment' => self::SEGMENT_LIST,
		'actions' => [
			'refresh' => true,
			'new' => true,
			'filter_sort' => ['value' => 'Filter/Sort', 'sort' => 32000, 'icon' => 'fas fa-filter', 'onclick' => 'Numbers.Form.listFilterSortToggle(this);']
		]
	];
	public $containers = [
		'tabs' => ['default_row_type' => 'grid', 'order' => 1000, 'type' => 'tabs', 'class' => 'numbers_form_filter_sort_container'],
		'filter' => ['default_row_type' => 'grid', 'order' => 1500],
		'sort' => self::LIST_SORT_CONTAINER,
		self::LIST_CONTAINER => ['default_row_type' => 'grid', 'order' => PHP_INT_MAX],
	];
	public $rows = [
		'tabs' => [
			'filter' => ['order' => 100, 'label_name' => 'Filter'],
			'sort' => ['order' => 200, 'label_name' => 'Sort'],
		]
	];
	public $elements = [
		'tabs' => [
			'filter' => [
				'filter' => ['container' => 'filter', 'order' => 100]
			],
			'sort' => [
				'sort' => ['container' => 'sort', 'order' => 100]
			]
		],
		'filter' => [
			'mb_quemessage_producer_code' => [
				'mb_quemessage_producer_code1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Producer', 'domain' => 'group_code', 'null' => true, 'method' => 'select', 'options_model' => '\Numbers\Microservices\MessageBroker\Model\Producers', 'query_builder' => 'a.mb_quemessage_producer_code;='],
			],
			'mb_quemessage_channel_code' => [
				'mb_quemessage_channel_code1' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Channel', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Microservices\MessageBroker\Model\Channels', 'query_builder' => 'a.mb_quemessage_channel_code;=', 'onchange' => 'this.form.submit();'],
				'mb_quemessage_chanversion_code1' => ['order' => 2, 'label_name'=> 'Version', 'domain' => 'version_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Microservices\MessageBroker\Model\Channel\Versions', 'options_depends' => ['mb_chanversion_channel_code' => 'mb_quemessage_channel_code1']],
			]
		],
		'sort' => [
			'__sort' => [
				'__sort' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Sort', 'domain' => 'code', 'details_unique_select' => true, 'percent' => 50, 'null' => true, 'method' => 'select', 'options' => self::LIST_SORT_OPTIONS, 'onchange' => 'this.form.submit();'],
				'__order' => ['order' => 2, 'label_name' => 'Order', 'type' => 'smallint', 'default' => SORT_ASC, 'percent' => 50, 'null' => true, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Object\Data\Model\Order', 'onchange' => 'this.form.submit();'],
			]
		],
		self::LIST_BUTTONS => self::LIST_BUTTONS_DATA,
		self::LIST_CONTAINER => [
			'row1' => [
				'mb_quemessage_seq' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Sequence', 'domain' => 'big_id', 'percent' => 10, 'url_edit' => true],
				'mb_quemessage_id' => ['order' => 2, 'label_name' => 'Message #', 'domain' => 'big_id', 'percent' => 30, 'url_edit' => true],
				'mb_quemessage_timestamp' => ['order' => 3, 'label_name' => 'Timestamp', 'domain' => 'timestamp_now', 'percent' => 50],
				'mb_quemessage_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 10]
			],
			'row2' => [
				'_blank' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'percent' => 10],
				'mb_quemessage_producer_code' => ['order' => 2, 'label_name' => 'Producer', 'domain' => 'group_code', 'percent' => 30, 'options_model' => '\Numbers\Microservices\MessageBroker\Model\Producers'],
				'mb_quemessage_channel_code' => ['order' => 3, 'label_name' => 'Channel', 'domain' => 'group_code', 'percent' => 30, 'options_model' => '\Numbers\Microservices\MessageBroker\Model\Channels'],
				'mb_quemessage_chanversion_code' => ['order' => 4, 'label_name'=> 'Version', 'domain' => 'version_code', 'percent' => 40, 'options_model' => '\Numbers\Microservices\MessageBroker\Model\Channel\Versions', 'options_depends' => ['mb_chanversion_channel_code' => 'mb_quemessage_channel_code']],
			],
			'row3' => [
				'_blank2' => ['order' => 1, 'row_order' => 300, 'label_name' => '', 'percent' => 10],
				'mb_quemessage_body' => ['order' => 2, 'label_name' => 'Body', 'type' => 'json', 'percent' => 50],
				'mb_quemessage_errors' => ['order' => 3, 'label_name' => 'Errors', 'type' => 'json', 'percent' => 40],
			]
		]
	];
	public $query_primary_model = '\Numbers\Microservices\MessageBroker\Model\Queue\Messages';
	public $query_primary_parameters = [];
	public $list_options = [
		'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'default_limit' => 30,
		'default_sort' => [
			'mb_quemessage_timestamp' => SORT_DESC
		]
	];
	const LIST_SORT_OPTIONS = [
		'mb_quemessage_timestamp' => ['name' => 'Timestamp'],
	];
}