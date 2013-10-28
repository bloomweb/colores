<?php
App::uses('AppController', 'Controller');
/**
 * Logs Controller
 *
 * @property Log $Log
 * @property PaginatorComponent $Paginator
 */
class LogsController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function addLog() {
        $this->autoRender = false;
        $barcode = $this->Log->Barcode->find(
            'first',
            array(
                'conditions' => array(
                    'name_id' => $_POST['name_id'],
                    'size_id' => $_POST['size_id'],
                )
            )
        );
        if($barcode) {
            $log = array(
                'Log' => array(
                    'color' => $barcode['Name']['name'],
                    'tamaño' => $barcode['Size']['amount'],
                    'barcode_id' => $barcode['Barcode']['id'],
                    'tanda_base' => $_POST['tanda_base']
                )
            );
            echo json_encode(array(
                'success' => $this->Log->save($log),
                'name_id' => $_POST['name_id'],
                'size_id' => $_POST['size_id'],
                'barcode' => $barcode,
                'log' => $log
            ));
        } else {
            echo json_encode(array(
                'success' => false,
            ));
        }
        exit(0);
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->Log->recursive = 0;
        $this->set('logs', $this->Paginator->paginate());
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
        if (!$this->Log->exists($id)) {
            throw new NotFoundException(__('Invalid log'));
        }
        $options = array('conditions' => array('Log.' . $this->Log->primaryKey => $id));
        $this->set('log', $this->Log->find('first', $options));
    }

}
