<?php
/**
 * PurchaseRequisitionFixture
 *
 */
class PurchaseRequisitionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'pr_no' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'awp_project_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'purchase_to' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'funding_source' => array('type' => 'integer', 'null' => false, 'default' => null, 'comment' => 'awp_components_id'),
		'total_amount' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '15,2'),
		'requisitioned_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'requisitioned' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'approved_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'approved' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'verified_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'verified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'certified_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'certified' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'pr_no' => 'Lorem ipsum dolor ',
			'awp_project_id' => 1,
			'purchase_to' => 'Lorem ipsum dolor sit amet',
			'funding_source' => 1,
			'total_amount' => 1,
			'requisitioned_by' => 1,
			'requisitioned' => '2013-12-03 05:19:04',
			'approved_by' => 1,
			'approved' => '2013-12-03 05:19:04',
			'verified_by' => 1,
			'verified' => '2013-12-03 05:19:04',
			'certified_by' => 1,
			'certified' => '2013-12-03 05:19:04',
			'user_id' => 1,
			'created' => '2013-12-03 05:19:04',
			'modified_by' => 1,
			'modified' => '2013-12-03 05:19:04',
			'status' => 1
		),
	);

}
