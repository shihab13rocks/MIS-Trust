<?php
App::uses('MaterialType', 'Model');

/**
 * MaterialType Test Case
 *
 */
class MaterialTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.material_type',
		'app.user',
		'app.organization',
		'app.organization_type',
		'app.user_role',
		'app.user_type',
		'app.organization_group',
		'app.material'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MaterialType = ClassRegistry::init('MaterialType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MaterialType);

		parent::tearDown();
	}

}
