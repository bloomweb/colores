<?php
App::uses('AppController', 'Controller');
/**
 * Barcodes Controller
 *
 * @property Barcode $Barcode
 * @property PaginatorComponent $Paginator
 */
class BarcodesController extends AppController {

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
		$this->Barcode->recursive = 0;
		$this->set('barcodes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Barcode->exists($id)) {
			throw new NotFoundException(__('Invalid barcode'));
		}
		$options = array('conditions' => array('Barcode.' . $this->Barcode->primaryKey => $id));
		$this->set('barcode', $this->Barcode->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Barcode->create();
			if ($this->Barcode->save($this->request->data)) {
				$this->Session->setFlash(__('The barcode has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The barcode could not be saved. Please, try again.'));
			}
		}
		$sizes = $this->Barcode->Size->find('list');
		$names = $this->Barcode->Name->find('list');
		$this->set(compact('sizes', 'names'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Barcode->exists($id)) {
			throw new NotFoundException(__('Invalid barcode'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Barcode->save($this->request->data)) {
				$this->Session->setFlash(__('The barcode has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The barcode could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Barcode.' . $this->Barcode->primaryKey => $id));
			$this->request->data = $this->Barcode->find('first', $options);
		}
		$sizes = $this->Barcode->Size->find('list');
		$names = $this->Barcode->Name->find('list');
		$this->set(compact('sizes', 'names'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Barcode->id = $id;
		if (!$this->Barcode->exists()) {
			throw new NotFoundException(__('Invalid barcode'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Barcode->delete()) {
			$this->Session->setFlash(__('The barcode has been deleted.'));
		} else {
			$this->Session->setFlash(__('The barcode could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Barcode->recursive = 0;
		$this->set('barcodes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Barcode->exists($id)) {
			throw new NotFoundException(__('Invalid barcode'));
		}
		$options = array('conditions' => array('Barcode.' . $this->Barcode->primaryKey => $id));
		$this->set('barcode', $this->Barcode->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Barcode->create();
			if ($this->Barcode->save($this->request->data)) {
				$this->Session->setFlash(__('The barcode has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The barcode could not be saved. Please, try again.'));
			}
		}
		$sizes = $this->Barcode->Size->find('list');
		$names = $this->Barcode->Name->find('list');
		$this->set(compact('sizes', 'names'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Barcode->exists($id)) {
			throw new NotFoundException(__('Invalid barcode'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Barcode->save($this->request->data)) {
				$this->Session->setFlash(__('The barcode has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The barcode could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Barcode.' . $this->Barcode->primaryKey => $id));
			$this->request->data = $this->Barcode->find('first', $options);
		}
		$sizes = $this->Barcode->Size->find('list');
		$names = $this->Barcode->Name->find('list');
		$this->set(compact('sizes', 'names'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Barcode->id = $id;
		if (!$this->Barcode->exists()) {
			throw new NotFoundException(__('Invalid barcode'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Barcode->delete()) {
			$this->Session->setFlash(__('The barcode has been deleted.'));
		} else {
			$this->Session->setFlash(__('The barcode could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
