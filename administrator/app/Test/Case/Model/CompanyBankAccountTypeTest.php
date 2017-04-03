<?php
App::uses('CompanyBankAccountType', 'Model');

/**
 * CompanyBankAccountType Test Case
 *
 */
class CompanyBankAccountTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.company_bank_account_type',
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
		$this->CompanyBankAccountType = ClassRegistry::init('CompanyBankAccountType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CompanyBankAccountType);

		parent::tearDown();
	}

}
