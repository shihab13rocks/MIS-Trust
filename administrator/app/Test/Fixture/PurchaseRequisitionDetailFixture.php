<?php
/**
 * PurchaseRequisitionDetailFixture
 *
 */
class PurchaseRequisitionDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'purchase_requisition_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'unit_in_hand' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '15,2'),
		'require_qty' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '15,2'),
		'unit_of_measure_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'estimated_unit_price' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '15,2'),
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
			'purchase_requisition_id' => 1,
			'item_id' => 1,
			'unit_in_hand' => 1,
			'require_qty' => 1,
			'unit_of_measure_id' => 1,
			'estimated_unit_price' => 1,
			'user_id' => 1,
			'created' => '2013-12-03 05:18:43',
			'modified_by' => 1,
			'modified' => '2013-12-03 05:18:43',
			'status' => 1
		),
	);

}
