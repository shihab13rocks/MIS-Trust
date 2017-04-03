<?php
App::uses('IncomeType', 'Model');

/**
 * IncomeType Test Case
 *
 */
class IncomeTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.income_type',
		'app.income'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->IncomeType = ClassRegistry::init('IncomeType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->IncomeType);

		parent::tearDown();
	}

}
