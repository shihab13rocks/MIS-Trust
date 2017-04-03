<?php
/**
 * ExpenseFixture
 *
 */
class ExpenseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'expense_type_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'date' => array('type' => 'date', 'null' => false, 'default' => null),
		'vouchar_no' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'purpose_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'payment_amount' => array('type' => 'float', 'null' => false, 'default' => null),
		'paid' => array('type' => 'float', 'null' => false, 'default' => null),
		'due' => array('type' => 'float', 'null' => false, 'default' => null),
		'payment_for' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'remark' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => '0000-00-00 00:00:00'),
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
			'expense_type_id' => 1,
			'date' => '2014-02-18',
			'vouchar_no' => 'Lorem ipsum dolor sit amet',
			'purpose_id' => 1,
			'payment_amount' => 1,
			'paid' => 1,
			'due' => 1,
			'payment_for' => 'Lorem ipsum dolor sit amet',
			'remark' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created_by' => 1,
			'created' => '2014-02-18 18:57:05',
			'modified_by' => 1,
			'modified' => '2014-02-18 18:57:05'
		),
	);

}
