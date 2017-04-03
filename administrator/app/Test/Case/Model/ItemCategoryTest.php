<?php
App::uses('ItemCategory', 'Model');

/**
 * ItemCategory Test Case
 *
 */
class ItemCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.item_category',
		'app.user',
		'app.organization',
		'app.organization_type',
		'app.user_role',
		'app.user_type',
		'app.organization_group',
		'app.item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ItemCategory = ClassRegistry::init('ItemCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ItemCategory);

		parent::tearDown();
	}

}
