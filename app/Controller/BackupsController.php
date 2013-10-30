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
			$this->process_import($this->request->data, 'colores');
		}
	}

	public function admin_importTamaños() {
		if($this->request->is('post')) {
			$this->process_import($this->request->data, 'tamaños');
		}
	}

	public function admin_importCodigosDeBarras() {
		if($this->request->is('post')) {
			$this->process_import($this->request->data, 'codigos');
		}
	}

	private function process_import($data, $type) {
		if(!$data['Backup']['file']['error'] && $data['Backup']['file']['type'] == 'text/csv') {
			$path = WWW_ROOT . 'files' . DS . 'uploads';
			$filename = $data['Backup']['file']['name'];
			$tmp_name = $data['Backup']['file']['tmp_name'];
			$file_dest = $path . DS .$filename;
			if(move_uploaded_file($tmp_name, $file_dest)) {
				$result = null;
				switch($type) {
					case 'colores':
						$result = $this->Backup->importColores($file_dest);
						break;
					case 'tamaños':
						$result = $this->Backup->importTamaños($file_dest);
						break;
					case 'codigos':
						$result = $this->Backup->importCodigosDeBarras($file_dest);
						break;
				}
				if($result['success']) {
					$this->Session->setFlash('Se importaron los datos satisfactoriamente.');
				} else {
					$this->Session->setFlash($result['message']);
				}
			} else {
				$this->Session->setFlash('Error al subir el archivo. Asegure que se pueda escribir en el destino.');
			}
		} else {
			$this->Session->setFlash('Error al subir el archivo. Asegure que es un archivo CSV.');
		}
	}

}
