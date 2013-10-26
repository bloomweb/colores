<?php
App::uses('Barcode', 'Model');

/**
 * Barcode Test Case
 *
 */
class BarcodeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.barcode',
		'app.size',
		'app.name'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Barcode = ClassRegistry::init('Barcode');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Barcode);

		parent::tearDown();
	}

}
