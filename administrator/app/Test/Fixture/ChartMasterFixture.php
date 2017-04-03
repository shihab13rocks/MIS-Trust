<?php
/**
 * ChartMasterFixture
 *
 */
class ChartMasterFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'chart_group_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'defult_opening_balance' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '15,2'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'Unique1' => array('column' => 'code', 'unique' => 1),
			'FK_chart_master' => array('column' => 'chart_group_id', 'unique' => 0)
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
			'code' => 'Lorem ip',
			'name' => 'Lorem ipsum dolor sit amet',
			'chart_group_id' => 1,
			'defult_opening_balance' => 1,
			'user_id' => 1,
			'created' => '2013-12-12 04:29:33',
			'modified_by' => 1,
			'modified' => '2013-12-12 04:29:33',
			'status' => 1
		),
	);

}
