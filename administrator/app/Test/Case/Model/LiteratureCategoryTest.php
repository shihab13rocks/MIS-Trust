<?php
App::uses('LiteratureCategory', 'Model');

/**
 * LiteratureCategory Test Case
 *
 */
class LiteratureCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.literature_category',
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
		$this->LiteratureCategory = ClassRegistry::init('LiteratureCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LiteratureCategory);

		parent::tearDown();
	}

}
