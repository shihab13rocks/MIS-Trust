<?php
App::uses('Assessment', 'Model');

/**
 * Assessment Test Case
 *
 */
class AssessmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.assessment',
		'app.material',
		'app.user',
		'app.organization',
		'app.organization_type',
		'app.user_role',
		'app.user_type',
		'app.organization_group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Assessment = ClassRegistry::init('Assessment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Assessment);

		parent::tearDown();
	}

}
