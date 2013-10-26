<?php
App::uses('AppController', 'Controller');
/**
 * Names Controller
 *
 * @property Name $Name
 * @property PaginatorComponent $Paginator
 */
class NamesController extends AppController
{

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('getOptions');
    }

    public function getOptions() {
        return $this->Name->find('list');
    }

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
    public function index()
    {
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
    public function view($id = null)
    {
        if (!$this->Name->exists($id)) {
            throw new NotFoundException(__('Dato no válido'));
        }
        $options = array('conditions' => array('Name.' . $this->Name->primaryKey => $id));
        $this->set('name', $this->Name->find('first', $options));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
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
    public function admin_view($id = null)
    {
        if (!$this->Name->exists($id)) {
            throw new NotFoundException(__('Dato no válido'));
        }
        $options = array('conditions' => array('Name.' . $this->Name->primaryKey => $id));
        $this->set('name', $this->Name->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Name->create();
            if ($this->Name->save($this->request->data)) {
                $this->Session->setFlash(__('Se han guardado los datos.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo guardar los datos. Por favor, intente de nuevo.'));
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
    public function admin_edit($id = null)
    {
        if (!$this->Name->exists($id)) {
            throw new NotFoundException(__('Dato no válido'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Name->save($this->request->data)) {
                $this->Session->setFlash(__('Se han guardado los datos.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo guardar los datos. Por favor, intente de nuevo.'));
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
    public function admin_delete($id = null)
    {
        $this->Name->id = $id;
        if (!$this->Name->exists()) {
            throw new NotFoundException(__('Dato no válido'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Name->delete()) {
            $this->Session->setFlash(__('Se ha eliminado el registro.'));
        } else {
            $this->Session->setFlash(__('No se pudo eliminar el registro. Por favor, intente de nuevo.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
