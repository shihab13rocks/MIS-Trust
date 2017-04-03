<?php
App::uses('Item', 'Model');

/**
 * Item Test Case
 *
 */
class ItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.item',
		'app.item_category',
		'app.user',
		'app.organization',
		'app.organization_type',
		'app.user_role',
		'app.user_type',
		'app.organization_group',
		'app.unit_of_measure',
		'app.asset',
		'app.asset_type',
		'app.asset_particular',
		'app.vendor',
		'app.country',
		'app.agency',
		'app.travel_reimbursement',
		'app.employee',
		'app.employee_designation',
		'app.employee_attendance',
		'app.leave_category',
		'app.leave_application',
		'app.leave_attachment',
		'app.leave_assign',
		'app.holiday',
		'app.travel_reimbursement_attachment',
		'app.travel_reimbursement_detail',
		'app.travel_mode',
		'app.travel_request',
		'app.duty_station',
		'app.travel_arranging_organization',
		'app.travel_request_itinerary',
		'app.location',
		'app.awp_donor',
		'app.awp_project_detail',
		'app.awp_project',
		'app.awp_component',
		'app.awp_activity',
		'app.awp_indicator',
		'app.awp_responsible_party',
		'app.awp_budget',
		'app.customer',
		'app.custody',
		'app.purchase_requisition_detail',
		'app.stock_register_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Item = ClassRegistry::init('Item');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Item);

		parent::tearDown();
	}

}
