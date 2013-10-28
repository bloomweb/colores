<?php
App::uses('AppController', 'Controller');
/**
 * Barcodes Controller
 *
 * @property Barcode $Barcode
 * @property PaginatorComponent $Paginator
 */
class BarcodesController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * @param int $filter
     * @return void
     */
    public function admin_index($filter = 0)
    {
        $this->Barcode->recursive = 0;

        if($filter) {
            $this->Session->write('Filtros.barcode.active', true);
            $filterData = $this->Session->read('Filtros.barcode.data');
            if(empty($filterData)) {
                $this->Session->write('Filtros.barcode.data', $this->request->data);
            } elseif(!empty($this->request->data)) {
                $this->Session->write('Filtros.barcode.data', $this->request->data);
            }
            $this->request->data = $this->Session->read('Filtros.barcode.data');
            $conditions = array();
            if($this->Session->read('Filtros.barcode.data.Barcode.size_id')) $conditions['Barcode.size_id'] = $this->Session->read('Filtros.barcode.data.Barcode.size_id');
            if($this->Session->read('Filtros.barcode.data.Barcode.name_id')) $conditions['Barcode.name_id'] = $this->Session->read('Filtros.barcode.data.Barcode.name_id');
            if($this->Session->read('Filtros.barcode.data.Barcode.barcode')) $conditions['Barcode.barcode LIKE'] = '%' . $this->Session->read('Filtros.barcode.data.Barcode.barcode') . '%';
            $this->paginate = array(
                'conditions' => $conditions
            );
        } else {
            $this->Session->write('Filtros.barcode.active', false);
            $this->Session->write('Filtros.barcode.data', array());
        }

        $this->set('sizes', $this->Barcode->Size->find('list'));
        $this->set('names', $this->Barcode->Name->find('list'));
        $this->set('barcodes', $this->Paginator->paginate());

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
        if (!$this->Barcode->exists($id)) {
            throw new NotFoundException(__('Dato no válido'));
        }
        $options = array('conditions' => array('Barcode.' . $this->Barcode->primaryKey => $id));
        $this->set('barcode', $this->Barcode->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Barcode->create();
            if ($this->Barcode->save($this->request->data)) {
                $this->Session->setFlash(__('Se han guardado los datos.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo guardar los datos. Por favor, intente de nuevo.'));
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
    public function admin_edit($id = null)
    {
        if (!$this->Barcode->exists($id)) {
            throw new NotFoundException(__('Dato no válido'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Barcode->save($this->request->data)) {
                $this->Session->setFlash(__('Se han guardado los datos.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo guardar los datos. Por favor, intente de nuevo.'));
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
    public function admin_delete($id = null)
    {
        $this->Barcode->id = $id;
        if (!$this->Barcode->exists()) {
            throw new NotFoundException(__('Dato no válido'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Barcode->delete()) {
            $this->Session->setFlash(__('Se ha eliminado el registro.'));
        } else {
            $this->Session->setFlash(__('No se pudo eliminar el registro. Por favor, intente de nuevo.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
