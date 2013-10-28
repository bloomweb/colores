<?php
App::uses('AppModel', 'Model');
/**
 * Barcode Model
 *
 * @property Size $Size
 * @property Name $Name
 * @property Log $Log
 */
class Barcode extends AppModel
{

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'barcode';

    /*public $virtualFields = array(
        'color' => 'Name.name',
        'tamaño' => 'Size.amount',
    );*/

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'size_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'combinationUnique' => array(
                'rule' => array('combinationUnique'),
                'message' => 'Esta combinación de color y tamaño ya tiene un código de barras asignado',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'name_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'combinationUnique' => array(
                'rule' => array('combinationUnique'),
                'message' => 'Esta combinación de color y tamaño ya tiene un código de barras asignado',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'barcode' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'minLength' => array(
                'rule' => array('minLength', 12),
                'message' => 'El código de barras debe de tener 12 caracteres',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'El valor ingresado debe de ser numérico',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    public function combinationUnique() {
        $result = $this->find(
            'first',
            array(
                'options' => array(
                    'size_id' => $this->data['Barcode']['size_id'],
                    'name_id' => $this->data['Barcode']['name_id']
                )
            )
        );
        if($result) {
            return false;
        } else {
            return true;
        }
    }

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

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Log' => array(
            'className' => 'Log',
            'foreignKey' => 'barcode_id',
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
