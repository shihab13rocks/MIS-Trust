<?php
/**
 * AssessmentFixture
 *
 */
class AssessmentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'material_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'due_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'assessment_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'material_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'due_date' => '2013-12-10 04:36:49',
			'assessment_date' => '2013-12-10 04:36:49',
			'from_date' => '2013-12-10 04:36:49',
			'to_date' => '2013-12-10 04:36:49',
			'user_id' => 1,
			'created' => '2013-12-10 04:36:49',
			'modified_by' => 1,
			'modified' => '2013-12-10 04:36:49',
			'status' => 1
		),
	);

}
