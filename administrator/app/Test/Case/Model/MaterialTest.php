<?php
App::uses('Material', 'Model');

/**
 * Material Test Case
 *
 */
class MaterialTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.material',
		'app.awp_project',
		'app.user',
		'app.organization',
		'app.organization_type',
		'app.user_role',
		'app.user_type',
		'app.organization_group',
		'app.awp_project_detail',
		'app.awp_component',
		'app.awp_activity',
		'app.awp_indicator',
		'app.awp_responsible_party',
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
		'app.asset',
		'app.asset_type',
		'app.asset_particular',
		'app.vendor',
		'app.custody',
		'app.unit_of_measure',
		'app.awp_donor',
		'app.customer',
		'app.awp_budget',
		'app.material_type',
		'app.division',
		'app.activity',
		'app.activity_category',
		'app.activity_type',
		'app.district',
		'app.activity_attachement',
		'app.activity_invitee',
		'app.activity_attendee_type',
		'app.activity_participant',
		'app.activity_organization',
		'app.activity_organization_type',
		'app.beneficiary',
		'app.assessment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Material = ClassRegistry::init('Material');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Material);

		parent::tearDown();
	}

}
