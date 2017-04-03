<?php
/**
 * StockRegisterFixture
 *
 */
class StockRegisterFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'book_no' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'entry_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'verified_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'verified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'certified_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'certified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'reviewed_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'reviewed' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'approved_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'approved' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'book_no' => 'Lorem ipsum dolor ',
			'entry_date' => '2013-12-03 05:21:06',
			'location_id' => 1,
			'verified_by' => 1,
			'verified' => '2013-12-03 05:21:06',
			'certified_by' => 1,
			'certified' => '2013-12-03 05:21:06',
			'reviewed_by' => 1,
			'reviewed' => '2013-12-03 05:21:06',
			'approved_by' => 1,
			'approved' => '2013-12-03 05:21:06',
			'user_id' => 1,
			'created' => '2013-12-03 05:21:06',
			'modified_by' => 1,
			'modified' => '2013-12-03 05:21:06',
			'status' => 1
		),
	);

}
