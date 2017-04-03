<?php
App::uses('ChartGroup', 'Model');

/**
 * ChartGroup Test Case
 *
 */
class ChartGroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chart_group',
		'app.chart_class',
		'app.user',
		'app.organization',
		'app.organization_type',
		'app.user_role',
		'app.user_type',
		'app.organization_group',
		'app.chart_master'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChartGroup = ClassRegistry::init('ChartGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChartGroup);

		parent::tearDown();
	}

}
