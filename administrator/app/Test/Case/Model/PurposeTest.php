<?php
App::uses('Purpose', 'Model');

/**
 * Purpose Test Case
 *
 */
class PurposeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.purpose',
		'app.expense',
		'app.income'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Purpose = ClassRegistry::init('Purpose');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Purpose);

		parent::tearDown();
	}

}
