<?php
App::uses('AppModel', 'Model');
/**
 * Barcode Model
 *
 * @property Size $Size
 * @property Name $Name
 */
class Barcode extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'barcode';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Size' => array(
			'className' => 'Size',
			'foreignKey' => 'size_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Name' => array(
			'className' => 'Name',
			'foreignKey' => 'name_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
