<?php
App::uses('LiteratureParticipant', 'Model');

/**
 * LiteratureParticipant Test Case
 *
 */
class LiteratureParticipantTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.literature_participant',
		'app.literature',
		'app.literature_attendee_type',
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
		$this->LiteratureParticipant = ClassRegistry::init('LiteratureParticipant');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LiteratureParticipant);

		parent::tearDown();
	}

}
