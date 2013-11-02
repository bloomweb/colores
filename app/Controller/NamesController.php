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

    public function getNameID() {
        $this->autoRender=false;
        $name = $this->Name->findByName($_GET['name']);
        if($name) {
            echo json_encode(array('success' => true, 'name_id' => $name['Name']['id']));
        } else {
            echo json_encode(array('success' => false));
        }
        exit(0);
    }

    public function getOptions($ajax = 0) {
        if(!$ajax) {
            return $this->Name->find('list');
        } else {
            $this->autoRender=false;
            echo json_encode($this->Name->find('list'));
            exit(0);
        }
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
    public function admin_index($filter = 0)
    {
        $this->Name->recursive = 0;

        if($filter) {
            $this->Session->write('Filtros.name.active', true);
            $filterData = $this->Session->read('Filtros.name.data');
            if(empty($filterData)) {
                $this->Session->write('Filtros.name.data', $this->request->data);
            } elseif(!empty($this->request->data)) {
                $this->Session->write('Filtros.name.data', $this->request->data);
            }
            $this->request->data = $this->Session->read('Filtros.name.data');
            $conditions = array();
            if($this->Session->read('Filtros.name.data.Name.code')) $conditions['Name.code LIKE'] = '%' . $this->Session->read('Filtros.name.data.Name.code') . '%';
            if($this->Session->read('Filtros.name.data.Name.name')) $conditions['Name.name LIKE'] = '%' . $this->Session->read('Filtros.name.data.Name.name') . '%';
            $this->paginate = array(
                'conditions' => $conditions
            );
        } else {
            $this->Session->write('Filtros.name.active', false);
            $this->Session->write('Filtros.name.data', array());
        }
        
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
