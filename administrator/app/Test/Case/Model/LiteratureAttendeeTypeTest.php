<?php
App::uses('LiteratureAttendeeType', 'Model');

/**
 * LiteratureAttendeeType Test Case
 *
 */
class LiteratureAttendeeTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.literature_attendee_type',
		'app.user',
		'app.organization',
		'app.organization_type',
		'app.user_role',
		'app.user_type',
		'app.organization_group',
		'app.literature_participant'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LiteratureAttendeeType = ClassRegistry::init('LiteratureAttendeeType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LiteratureAttendeeType);

		parent::tearDown();
	}

}
