<?php
App::uses('ExpenseType', 'Model');

/**
 * ExpenseType Test Case
 *
 */
class ExpenseTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.expense_type',
		'app.expense'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ExpenseType = ClassRegistry::init('ExpenseType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ExpenseType);

		parent::tearDown();
	}

}
