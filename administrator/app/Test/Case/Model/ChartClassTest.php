<?php
App::uses('ChartClass', 'Model');

/**
 * ChartClass Test Case
 *
 */
class ChartClassTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chart_class',
		'app.user',
		'app.organization',
		'app.organization_type',
		'app.user_role',
		'app.user_type',
		'app.organization_group',
		'app.chart_group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChartClass = ClassRegistry::init('ChartClass');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChartClass);

		parent::tearDown();
	}

}
