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

    public function printLabel()
    {
        $this->autoRender=false;
        $this->redirect('/');
    }

}
