<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 */
class User extends AppModel
{

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'username';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'username' => array(
            'minLength' => array(
                'rule' => array('minLength', 5),
                'message' => 'El nombre de usuario no puede estar vacío y debe de tener al menos cinco (5) caracteres',
                'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'old_password' => array(
            'isActualPassword' => array(
                'rule' => array('isActualPassword'),
                'message' => 'La contraseña ingresada no coincide con la actual',
                'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'new_password' => array(
            'minLength' => array(
                'rule' => array('minLength', 5),
                'message' => 'La contraseña no puede estar vacía y debe de tener al menos cinco (5) caracteres',
                'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    public function isActualPassword() {
        $user = $this->find('first');
        $passwordHasher = new SimplePasswordHasher();
        $this->data['User']['old_password'] = $passwordHasher->hash($this->data['User']['old_password']);
        if($user['User']['password'] == $this->data['User']['old_password']) {
            return true;
        } else {
            return false;
        }
    }

    public function beforeSave($options = array()) {
        $passwordHasher = new SimplePasswordHasher();
        if (!$this->id) {
            $this->data['User']['password'] = $passwordHasher->hash($this->data['User']['password']);
        } else {
            $this->data['User']['password'] = $passwordHasher->hash($this->data['User']['new_password']);
        }
        return true;
    }

}