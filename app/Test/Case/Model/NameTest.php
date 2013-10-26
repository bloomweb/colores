<?php
App::uses('Name', 'Model');

/**
 * Name Test Case
 *
 */
class NameTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.name',
		'app.barcode',
		'app.size'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Name = ClassRegistry::init('Name');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Name);

		parent::tearDown();
	}

}
