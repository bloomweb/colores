<?php
App::uses('AppController', 'Controller');
/**
 * Labels Controller
 *
 * @property Label $Label
 * @property PaginatorComponent $Paginator
 */
class LabelsController extends AppController
{

    public function getPreview($name_id, $size_id) {
        $this->layout=false;
        $this->loadModel('Size');
        $this->loadModel('Name');
        $this->loadModel('Barcode');
        $size = $this->Size->read(null, $size_id);
        $name = $this->Name->read(null, $name_id);
        if($size && $name) {
            $barcode = $this->Barcode->find(
                'first',
                array(
                    'conditions' => array(
                        'Barcode.name_id' => $name_id,
                        'Barcode.size_id' => $size_id
                    )
                )
            );
            if($barcode) {
                $result = true;
            } else {
                $result = false;
            }
        } else {
            $barcode = false;
            $result = false;
        }
        if(!$result) {
            $this->Session->setFlash('No existe un registro con esa combinación');
        }
        $this->set(compact('size', 'name', 'barcode', 'result'));
    }

    public function printLabel()
    {
        $this->autoRender=false;
        $this->redirect('/');
    }

}
