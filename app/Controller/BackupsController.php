<?php
App::uses('AppController', 'Controller');
/**
 * Backups Controller
 *
 * @property Backup $Backup
 * @property PaginatorComponent $Paginator
 */
class BackupsController extends AppController
{

    public function admin_backup() {
        
    }

    public function admin_restore() {

    }

	public function admin_importColores() {
		if($this->request->is('post')) {
			if(!$this->request->data['Backup']['file']['error'] && $this->request->data['Backup']['file']['type'] == 'text/csv') {
				$path = WWW_ROOT . 'files' . DS . 'uploads';
				$uno = 1;
			} else {
				$this->Session->setFlash('Error al subir el archivo. Asegure que es un archivo CSV.');
			}
		}
	}

	public function admin_importTamaños() {

	}

	public function admin_importCodigosDeBarras() {

	}

}
