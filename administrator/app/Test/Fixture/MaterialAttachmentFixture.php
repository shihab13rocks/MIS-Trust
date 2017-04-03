<?php
/**
 * MaterialAttachmentFixture
 *
 */
class MaterialAttachmentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'attachment_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'due_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'actual_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'from_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'to_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'attachment_date' => '2013-12-10 04:39:42',
			'due_date' => '2013-12-10 04:39:42',
			'actual_date' => '2013-12-10 04:39:42',
			'from_date' => '2013-12-10 04:39:42',
			'to_date' => '2013-12-10 04:39:42',
			'user_id' => 1,
			'created' => '2013-12-10 04:39:42',
			'modified_by' => 1,
			'modified' => '2013-12-10 04:39:42',
			'status' => 1
		),
	);

}
