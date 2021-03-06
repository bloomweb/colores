<?php
/**
 * BarcodeFixture
 *
 */
class BarcodeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'size_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'name_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'barcode' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 12, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'size_id' => 1,
			'name_id' => 1,
			'barcode' => 'Lorem ipsu',
			'created' => '2013-10-28 17:21:02',
			'modified' => '2013-10-28 17:21:02'
		),
	);

}
