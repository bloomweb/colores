<?php
App::uses('AppController', 'Controller');
/**
 * Sizes Controller
 *
 * @property Size $Size
 * @property PaginatorComponent $Paginator
 */
class SizesController extends AppController
{

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('getOptions');
    }

    public function getOptions()
    {
        return $this->Size->find('list');
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->Size->recursive = 0;
        $this->set('sizes', $this->Paginator->paginate());
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
        if (!$this->Size->exists($id)) {
            throw new NotFoundException(__('Dato no válido'));
        }
        $options = array('conditions' => array('Size.' . $this->Size->primaryKey => $id));
        $this->set('size', $this->Size->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Size->create();
            if ($this->Size->save($this->request->data)) {
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
        if (!$this->Size->exists($id)) {
            throw new NotFoundException(__('Dato no válido'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Size->save($this->request->data)) {
                $this->Session->setFlash(__('Se han guardado los datos.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo guardar los datos. Por favor, intente de nuevo.'));
            }
        } else {
            $options = array('conditions' => array('Size.' . $this->Size->primaryKey => $id));
            $this->request->data = $this->Size->find('first', $options);
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
        $this->Size->id = $id;
        if (!$this->Size->exists()) {
            throw new NotFoundException(__('Dato no válido'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Size->delete()) {
            $this->Session->setFlash(__('Se ha eliminado el registro.'));
        } else {
            $this->Session->setFlash(__('No se pudo eliminar el registro. Por favor, intente de nuevo.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}