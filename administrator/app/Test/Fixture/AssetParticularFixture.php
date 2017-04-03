<?php
/**
 * AssetParticularFixture
 *
 */
class AssetParticularFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'particular_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'created_date' => array('type' => 'datetime', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'updated_by' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'updated_date' => array('type' => 'datetime', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'is_active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'particular_name' => 'Lorem ipsum dolor sit amet',
			'created_by' => 1,
			'created_date' => '2013-11-18 09:16:14',
			'updated_by' => 1,
			'updated_date' => '2013-11-18 09:16:14',
			'is_active' => 1
		),
	);

}
