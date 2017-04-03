<?php
App::uses('LiteratureDataSource', 'Model');

/**
 * LiteratureDataSource Test Case
 *
 */
class LiteratureDataSourceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.literature_data_source',
		'app.user',
		'app.organization',
		'app.organization_type',
		'app.user_role',
		'app.user_type',
		'app.organization_group',
		'app.literature'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LiteratureDataSource = ClassRegistry::init('LiteratureDataSource');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LiteratureDataSource);

		parent::tearDown();
	}

}
