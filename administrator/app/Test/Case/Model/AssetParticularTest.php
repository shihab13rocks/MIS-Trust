<?php
App::uses('AssetParticular', 'Model');

/**
 * AssetParticular Test Case
 *
 */
class AssetParticularTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.asset_particular',
		'app.asset_information'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AssetParticular = ClassRegistry::init('AssetParticular');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AssetParticular);

		parent::tearDown();
	}

}
