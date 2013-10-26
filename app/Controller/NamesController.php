<?php
App::uses('AppController', 'Controller');
/**
 * Names Controller
 *
 * @property Name $Name
 * @property PaginatorComponent $Paginator
 */
class NamesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Name->recursive = 0;
		$this->set('names', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Name->exists($id)) {
			throw new NotFoundException(__('Invalid name'));
		}
		$options = array('conditions' => array('Name.' . $this->Name->primaryKey => $id));
		$this->set('name', $this->Name->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Name->create();
			if ($this->Name->save($this->request->data)) {
				$this->Session->setFlash(__('The name has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The name could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Name->exists($id)) {
			throw new NotFoundException(__('Invalid name'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Name->save($this->request->data)) {
				$this->Session->setFlash(__('The name has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The name could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Name.' . $this->Name->primaryKey => $id));
			$this->request->data = $this->Name->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Name->id = $id;
		if (!$this->Name->exists()) {
			throw new NotFoundException(__('Invalid name'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Name->delete()) {
			$this->Session->setFlash(__('The name has been deleted.'));
		} else {
			$this->Session->setFlash(__('The name could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Name->recursive = 0;
		$this->set('names', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Name->exists($id)) {
			throw new NotFoundException(__('Invalid name'));
		}
		$options = array('conditions' => array('Name.' . $this->Name->primaryKey => $id));
		$this->set('name', $this->Name->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Name->create();
			if ($this->Name->save($this->request->data)) {
				$this->Session->setFlash(__('The name has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The name could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Name->exists($id)) {
			throw new NotFoundException(__('Invalid name'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Name->save($this->request->data)) {
				$this->Session->setFlash(__('The name has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The name could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Name.' . $this->Name->primaryKey => $id));
			$this->request->data = $this->Name->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Name->id = $id;
		if (!$this->Name->exists()) {
			throw new NotFoundException(__('Invalid name'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Name->delete()) {
			$this->Session->setFlash(__('The name has been deleted.'));
		} else {
			$this->Session->setFlash(__('The name could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
