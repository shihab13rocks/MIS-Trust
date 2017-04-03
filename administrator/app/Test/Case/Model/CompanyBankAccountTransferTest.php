<?php
App::uses('CompanyBankAccountTransfer', 'Model');

/**
 * CompanyBankAccountTransfer Test Case
 *
 */
class CompanyBankAccountTransferTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.company_bank_account_transfer',
		'app.chart_master',
		'app.chart_group',
		'app.chart_class',
		'app.user',
		'app.organization',
		'app.organization_type',
		'app.user_role',
		'app.user_type',
		'app.organization_group',
		'app.company_bank_account',
		'app.company_budget',
		'app.expense_invoice_detail',
		'app.income_invoice_detail',
		'app.transaction_master',
		'app.company_bank_transfer_attachment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CompanyBankAccountTransfer = ClassRegistry::init('CompanyBankAccountTransfer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CompanyBankAccountTransfer);

		parent::tearDown();
	}

}
