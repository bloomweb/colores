<?php
App::uses('AppModel', 'Model');
/**
 * Backup Model
 *
 * @property Backup $Backup
 */
class Backup extends AppModel
{

    public $useTable = false;

	public function importColores($path) {

		// Abrir el archivo
		$handle = fopen($path, "r");

		// Leer la primera fila como cabeceras
		$headers = fgetcsv($handle);

		if(count($headers) != 2) return array('success' => false, 'message' => 'El archivo contiene una cantidad distinta de columnas a las requeridas.');
		if($headers[0] != 'ID_Name' || $headers[1] != 'Name') return array('success' => false, 'message' => 'No se reconocen las columnas requeridas.');

		$names = array();

		// Procesar el archivo
		for (; ($row = fgetcsv($handle)) !== FALSE;) {

			$name = array('code' => '', 'name' => '');

			// Para cada cabecera
			foreach ($headers as $key => $header) {
				if($key) {
					$name['name'] = trim($row[$key]);
				} else {
					$name['code'] = trim($row[$key]);
				}
			}

			$names[]['Name'] = $name;

		}

		// Cerrar el archivo
		fclose($handle);

		$Name = ClassRegistry::init('Name');

		$result = array('success' => true, 'message' => '');

		foreach($names as $key => $name) {
			$tmp = $Name->find('first', array('conditions' => array('Name.code' => $name['Name']['code'], 'Name.name' => $name['Name']['name'])));
			if($tmp) {
				$result['message'] = 'Se omitieron registros que ya existían en la base de datos';
				unset($names[$key]);
			}
		}

		if(!empty($names)) {
			if($Name->saveAll($names)) {
				$result['success'] = true;
			} else {
				$result['success'] = false;
			}
		} else {
			$result['success'] = false;
			$result['message'] = 'No se encontraron datos nuevos para agregar.';
		}

		return $result;

	}

	public function importTamaños($path) {

		// Abrir el archivo
		$handle = fopen($path, "r");

		// Leer la primera fila como cabeceras
		$headers = fgetcsv($handle);

		if(count($headers) != 2) return array('success' => false, 'message' => 'El archivo contiene una cantidad distinta de columnas a las requeridas.');
		if($headers[0] != 'ID_Amount' || $headers[1] != 'Name_Amount') return array('success' => false, 'message' => 'No se reconocen las columnas requeridas.');

		$sizes = array();

		// Procesar el archivo
		for (; ($row = fgetcsv($handle)) !== FALSE;) {

			$size = array('amount' => '');

			// Para cada cabecera
			foreach ($headers as $key => $header) {
				if($key) {
					$size['amount'] = trim($row[$key]);
				} else {
					// Esta columna no se utiliza en este programa
				}
			}

			$sizes[]['Size'] = $size;

		}

		// Cerrar el archivo
		fclose($handle);

		$Size = ClassRegistry::init('Size');

		$result = array('success' => true, 'message' => '');

		foreach($sizes as $key => $size) {
			$tmp = $Size->find('first', array('conditions' => array('Size.amount' => $size['Size']['amount'])));
			if($tmp) {
				$result['message'] = 'Se omitieron registros que ya existían en la base de datos';
				unset($sizes[$key]);
			}
		}

		if(!empty($sizes)) {
			if($Size->saveAll($sizes)) {
				$result['success'] = true;
			} else {
				$result['success'] = false;
			}
		} else {
			$result['success'] = false;
			$result['message'] = 'No se encontraron datos nuevos para agregar.';
		}

		return $result;

	}

	public function importCodigosDeBarras($path) {

		// Abrir el archivo
		$handle = fopen($path, "r");

		// Leer la primera fila como cabeceras
		$headers = fgetcsv($handle);

		if(count($headers) != 4) return array('success' => false, 'message' => 'El archivo contiene una cantidad distinta de columnas a las requeridas.');
		if($headers[0] != 'Key_Barcode' || $headers[1] != 'Barcode' || $headers[2] != 'ID_Amount' || $headers[3] != 'ID_Name') return array('success' => false, 'message' => 'No se reconocen las columnas requeridas.');

		$barcodes = array();

		$Barcode = ClassRegistry::init('Barcode');
		$Size = ClassRegistry::init('Size');
		$Name = ClassRegistry::init('Name');

		// Procesar el archivo
		for (; ($row = fgetcsv($handle)) !== FALSE;) {

			$barcode = array('size_id' => '', 'name_id' => '', 'barcode' => '');

			// Para cada cabecera
			foreach ($headers as $key => $header) {
				switch($key) {
					case 0:
						// No se utiliza en el programa
						break;
					case 1:
						$barcode['barcode'] = trim($row[$key]);
						break;
					case 2:
						// Obtener el ID registrado para el tamaño
						$size = $Size->find('first', array('conditions' => array('Size.amount' => trim($row[$key]))));
						$barcode['size_id'] = $size['Size']['id'];
						break;
					case 3:
						// Obtener el ID registrado para el color
						$name = $Name->find('first', array('conditions' => array('Name.code' => trim($row[$key]))));
						$barcode['name_id'] = $name['Name']['id'];
						break;
				}
			}

			$barcodes[]['Barcode'] = $barcode;

			set_time_limit(60);

		}

		// Cerrar el archivo
		fclose($handle);

		$result = array('success' => true, 'message' => '');

		foreach($barcodes as $key => $barcode) {
			$tmp = $Barcode->find(
				'first',
				array(
					'conditions' => array(
						'Barcode.size_id' => $barcode['Barcode']['size_id'],
						'Barcode.name_id' => $barcode['Barcode']['name_id']
					)
				)
			);
			if($tmp) {
				$result['message'] = 'Se omitieron registros que ya existían en la base de datos';
				unset($barcodes[$key]);
			}
		}

		$uno = 1;

		if(!empty($barcodes)) {
			if($Barcode->saveAll($barcodes)) {
				$result['success'] = true;
			} else {
				$result['success'] = false;
			}
		} else {
			$result['success'] = false;
			$result['message'] = 'No se encontraron datos nuevos para agregar.';
		}

		return $result;

	}

}
