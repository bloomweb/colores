<?php
App::uses('AppModel', 'Model');
/**
 * Size Model
 *
 * @property Barcode $Barcode
 */
class Size extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'amount';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Barcode' => array(
			'className' => 'Barcode',
			'foreignKey' => 'size_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
