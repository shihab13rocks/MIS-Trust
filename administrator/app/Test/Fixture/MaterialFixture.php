<?php
/**
 * MaterialFixture
 *
 */
class MaterialFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'awp_project_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'objective' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'objective_details' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'budget' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '15,2'),
		'expenditure' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '15,2'),
		'material_type_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'division_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'district_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'beneficiary_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'estimated_beneficiary' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'remarks' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'awp_project_id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'objective' => 'Lorem ipsum dolor sit amet',
			'objective_details' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'budget' => 1,
			'expenditure' => 1,
			'material_type_id' => 1,
			'division_id' => 1,
			'district_id' => 1,
			'beneficiary_id' => 1,
			'estimated_beneficiary' => 'Lorem ipsum dolor sit amet',
			'remarks' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'user_id' => 1,
			'created' => '2013-12-10 04:40:15',
			'modified_by' => 1,
			'modified' => '2013-12-10 04:40:15',
			'status' => 1
		),
	);

}
