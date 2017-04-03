<?php
App::uses('Beneficiary', 'Model');

/**
 * Beneficiary Test Case
 *
 */
class BeneficiaryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.beneficiary',
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
		$this->Beneficiary = ClassRegistry::init('Beneficiary');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Beneficiary);

		parent::tearDown();
	}

}
