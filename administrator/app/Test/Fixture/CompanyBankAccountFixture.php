<?php
/**
 * CompanyBankAccountFixture
 *
 */
class CompanyBankAccountFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'account_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'iban' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'account_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'account_no' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'bank_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'chart_master_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'utf8_general_ci', 'comment' => 'gl_account_code', 'charset' => 'utf8'),
		'default_opening_balance' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '15,2'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
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
			'code' => 'Lorem ipsum dolor sit amet',
			'account_type_id' => 1,
			'iban' => 'Lorem ip',
			'account_name' => 'Lorem ipsum dolor sit amet',
			'account_no' => 'Lorem ipsum dolor ',
			'bank_name' => 'Lorem ipsum dolor sit amet',
			'chart_master_id' => 'Lorem ips',
			'default_opening_balance' => 1,
			'user_id' => 1,
			'created' => '2013-12-12 04:30:34',
			'modified_by' => 1,
			'modified' => '2013-12-12 04:30:34',
			'status' => 1
		),
	);

}
