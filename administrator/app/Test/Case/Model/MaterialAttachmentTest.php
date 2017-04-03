<?php
App::uses('MaterialAttachment', 'Model');

/**
 * MaterialAttachment Test Case
 *
 */
class MaterialAttachmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.material_attachment',
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
		$this->MaterialAttachment = ClassRegistry::init('MaterialAttachment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MaterialAttachment);

		parent::tearDown();
	}

}
