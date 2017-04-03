<?php
/**
 * CompanyBankAccountTransferFixture
 *
 */
class CompanyBankAccountTransferFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'invoice_no' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'from_bank_account' => array('type' => 'integer', 'null' => false, 'default' => null, 'comment' => 'bank_account_id'),
		'to_bank_account' => array('type' => 'integer', 'null' => false, 'default' => null, 'comment' => 'bank_account_id'),
		'chart_master_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'comment' => 'charging_gl_code'),
		'transfer_amount' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '15,2'),
		'charging_amount' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '15,2'),
		'transfer_date' => array('type' => 'datetime', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'reference_no' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'is_reverse' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'child_invoice_no' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => 'bank_account_transfer_id'),
		'comments' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'has_attachment' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
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
			'invoice_no' => 'Lorem ipsum dolor ',
			'from_bank_account' => 1,
			'to_bank_account' => 1,
			'chart_master_id' => 1,
			'transfer_amount' => 1,
			'charging_amount' => 1,
			'transfer_date' => '2013-12-12 04:30:05',
			'reference_no' => 'Lorem ipsum dolor ',
			'is_reverse' => 1,
			'child_invoice_no' => 1,
			'comments' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'has_attachment' => 1,
			'user_id' => 1,
			'created' => '2013-12-12 04:30:05',
			'modified_by' => 1,
			'modified' => '2013-12-12 04:30:05',
			'status' => 1
		),
	);

}
