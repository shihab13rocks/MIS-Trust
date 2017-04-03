<?php
/**
 * StockRegisterDetailFixture
 *
 */
class StockRegisterDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'stock_register_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'unit_rate' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '15,2'),
		'unit_of_measure_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'page_no' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'balance_as_per_book' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '15,2'),
		'balance_verified_status' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => 'created_by'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'stock_register_id' => 1,
			'item_id' => 1,
			'unit_rate' => 1,
			'unit_of_measure_id' => 1,
			'page_no' => 1,
			'balance_as_per_book' => 1,
			'balance_verified_status' => 'Lorem ipsum dolor ',
			'user_id' => 1,
			'created' => '2013-12-03 05:20:51',
			'modified_by' => 1,
			'modified' => '2013-12-03 05:20:51',
			'status' => 1
		),
	);

}
