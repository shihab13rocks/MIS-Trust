<?php
App::uses('LiteratureType', 'Model');

/**
 * LiteratureType Test Case
 *
 */
class LiteratureTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.literature_type',
		'app.user',
		'app.organization',
		'app.organization_type',
		'app.user_role',
		'app.user_type',
		'app.organization_group',
		'app.literature'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LiteratureType = ClassRegistry::init('LiteratureType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LiteratureType);

		parent::tearDown();
	}

}
