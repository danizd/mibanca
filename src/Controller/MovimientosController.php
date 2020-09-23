<?php
namespace App\Controller;

use App\Controller\AppController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Helper;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Device;
use Cake\ORM\Association;


/**
 * Movimientos Controller
 *
 * @property \App\Model\Table\MovimientosTable $Movimientos
 *
 * @method \App\Model\Entity\Movimiento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MovimientosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categorias'],
        ];
		$archivos = array();
        $movimientos = $this->paginate($this->Movimientos);
        $rutaArchivo = WWW_ROOT . 'files/csv' . DS;
        $files = scandir($rutaArchivo, SCANDIR_SORT_DESCENDING);
        foreach ($files as $key => $file) {
          if (strpos($file, '_importado') !== false) {
              $archivos[] = $file;
          }
        }



        $this->set(compact('movimientos', 'archivos'));
    }

    /**
     * View method
     *
     * @param string|null $id Movimiento id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $movimiento = $this->Movimientos->get($id, [
            'contain' => ['Categorias'],
        ]);

        $this->set('movimiento', $movimiento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $movimiento = $this->Movimientos->newEntity();
        if ($this->request->is('post')) {
            $movimiento = $this->Movimientos->patchEntity($movimiento, $this->request->getData());
            if ($this->Movimientos->save($movimiento)) {
                $this->Flash->success(__('The movimiento has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movimiento could not be saved. Please, try again.'));
        }
        $categorias = $this->Movimientos->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('movimiento', 'categorias'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Movimiento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $movimiento = $this->Movimientos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movimiento = $this->Movimientos->patchEntity($movimiento, $this->request->getData());
            if ($this->Movimientos->save($movimiento)) {
                $this->Flash->success(__('The movimiento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movimiento could not be saved. Please, try again.'));
        }
        $categorias = $this->Movimientos->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('movimiento', 'categorias'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Movimiento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movimiento = $this->Movimientos->get($id);
        if ($this->Movimientos->delete($movimiento)) {
            $this->Flash->success(__('The movimiento has been deleted.'));
        } else {
            $this->Flash->error(__('The movimiento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



  public function subearchivo()
  {

    $uploadData = '';
    $this->set(compact('uploadData'));
    if ($this->request->is('post')) {
      $valida_csv = $this->chkFileExtension($this->request->data);
      if ($valida_csv == true){
        $fileName = $this->request->data['file']['name'];
        $uploadFile = $uploadPath.$fileName;

        if(move_uploaded_file($this->request->data['file']['tmp_name'], WWW_ROOT . 'files/csv' . DS . $fileName)){
          $this->Flash->success(__('El archivo ha sido guardado.'));
          return $this->redirect(array('action' => 'ver'));
        }else{
            $this->Flash->error(__('Archivo incorrecto'));
        }

      }else{
        $this->Flash->error(__('No es un archivo CSV'));
      }
    }
  }



  public function ver($id = null)
  {

    # El archivo a importar
    # Recomiendo poner la ruta absoluta si no está junto al script
    $rutaArchivo = WWW_ROOT . 'files\csv' . DS;
    $csv = $this->leercsv($rutaArchivo);
    $this->set(compact('csv'));

  }

  public function importacsv()
  {

    $uploadData = '';
    $this->set(compact('uploadData'));
    if ($this->request->is('post')) {
      $valida_csv = $this->chkFileExtension($this->request->data);
      if ($valida_csv == true){
        $fileName = $this->request->data['file']['name'];
        $uploadFile = $uploadPath.$fileName;

        if(move_uploaded_file($this->request->data['file']['tmp_name'], WWW_ROOT . 'files/csv' . DS . $fileName)){
          $this->Flash->success(__('El archivo ha sido guardado.'));
          $rutaArchivo = WWW_ROOT . 'files/csv' . DS;
          $filename_ar = explode('.', $fileName);
          rename($rutaArchivo.$fileName, $rutaArchivo.$filename_ar[0]."_subido.csv");

          return $this->redirect(array('action' => 'importacsv'));
        }else{
            $this->Flash->error(__('Archivo incorrecto'));
        }

      }else{
        $this->Flash->error(__('No es un archivo CSV'));
      }
    }
  }






  private function leercsv($rutaArchivo){

    $files = scandir($rutaArchivo, SCANDIR_SORT_DESCENDING);
    foreach ($files as $key => $file) {
      if (strpos($file, '_subido') !== false) {
        $filename = $file;
        break;
      }else{
        $this->Flash->success(__('No hay archivo CSV para importar.'));
        return $this->redirect( ['controller' => 'Movimientos', 'action' => 'index']);
       }
    }

    $documento = IOFactory::load($rutaArchivo.$filename);
    # Se espera que en la primera hoja estén los productos
    $hojaDeMovimientos = $documento->getSheet(0);
    # Calcular el máximo valor de la fila como entero, es decir, el
    # límite de nuestro ciclo
    $numeroMayorDeFila = $hojaDeMovimientos->getHighestRow(); // Numérico
    $letraMayorDeColumna = $hojaDeMovimientos->getHighestColumn(); // Letra
    # Convertir la letra al número de columna correspondiente
    $numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);



    $csv = array();

    // Recorrer filas; comenzar en la fila 2 porque omitimos el encabezado
    for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {

      # Las columnas están en este orden:
      $concepto = $hojaDeMovimientos->getCellByColumnAndRow(3, $indiceFila)->getValue();
      $conceptoAmpliado = $hojaDeMovimientos->getCellByColumnAndRow(8, $indiceFila)->getValue();
      if ($conceptoAmpliado == null) {
        $conceptoAmpliado = '';
      }
      $importesin = $hojaDeMovimientos->getCellByColumnAndRow(4, $indiceFila)->getValue();
      $importe = str_replace(',', '.', $importesin);
      $fechaCtble = date("Y-m-d", strtotime($hojaDeMovimientos->getCellByColumnAndRow(1, $indiceFila)) );

      $csv[] = array('concepto' => $concepto,
                     'conceptoAmpliado' => $conceptoAmpliado,
                     'importe' => $importe,
                     'fechaCtble' => $fechaCtble,
             );


    }
    $csv['nombrearchivo'] = $filename;
    return $csv;
  }

  public function import()
  {

    $array_mov = array();
    $this->loadModel('CadenasCategoria');
    $categ  = $this->CadenasCategoria->find();
    $categ->select([
                  'categorias_id',
                  'cadena' => 'group_concat(cadena)',
                ])
                ->contain('Categorias')
                ->group('categorias_id');



                  foreach ($categ as $key => $value) {
                    $cadenas = explode(',', $value['cadena']);
                    $array_mov[$value["categorias_id"]] = $cadenas;
                  }


    $rutaArchivo = WWW_ROOT . 'files\csv' . DS;
    $csv = $this->leercsv($rutaArchivo);


    $archivo_subido = $csv['nombrearchivo'];
    $archivo_subido = explode('_subido', $archivo_subido);


    $actualiza = false;
    $files = scandir($rutaArchivo, SCANDIR_SORT_DESCENDING);
    foreach ($files as $key => $file) {
      //$archivosin = explode('_importado', $file);

      if (strpos($file, '_importado') !== false) {
        $file_arr = explode('_importado', $file);
        if ($archivo_subido[0] == $file_arr[0] ) {
          $actualiza = true;
        }
      }
    }


    $nombrearchivo = $csv['nombrearchivo'];

    unset($csv['nombrearchivo']);

    $this->loadModel('Movimientos');
    $movimientos = TableRegistry::getTableLocator()->get('Movimientos');
    $entities = $movimientos->newEntities($csv);
    $save = false;

    if ($actualiza == true) {
      $query = $movimientos->query();
      $query->delete()
          ->where(['archivo' => $nombrearchivo])
          ->execute();
    }


    foreach ($csv as $entity) {

      $categoria = $this->searchByValue($entity['concepto'], $array_mov);
      if ($categoria != '') {
         $categoria = $categoria;
      }else{
         $categoria = '0';
      }



      $query = $movimientos->query();
      $query->insert(['concepto', 'conceptoAmpliado','importe' ,'fechaCtble' ,'categorias_id', 'archivo'])
          ->values([
              'concepto' => $entity['concepto'],
              'conceptoAmpliado' => $entity['conceptoAmpliado'],
              'importe' => $entity['importe'],
              'fechaCtble' => $entity['fechaCtble'],
              'categorias_id' => intval($categoria),
              'archivo' => $nombrearchivo,
          ])
          ->execute();
      $save = true;
    }

    if (empty($query)) {
      $this->Flash->success(__('ERROR: Los datos del CSV no han sido importados.'));
    }else{
      $this->Flash->success(__('Los datos del CSV han sido importados.'));
      $namefile = explode('_subido', $nombrearchivo);
      rename($rutaArchivo.$nombrearchivo, $rutaArchivo.$namefile[0]."_importado.csv");
      $this->set(compact('nombrearchivo'));

    }
    return $this->redirect( ['controller' => 'Movimientos', 'action' => 'index']);

  }

  public function estadisticas(){

        $this->paginate = [
            'contain' => ['Categorias'],
        ];

        for ($i=1; $i < 12; $i++) {
          $condition['MONTH(fechaCtble) ='] = $i;
          $movimientos  = $this->Movimientos->find();

          $movimientos->select([
                        'Categorias.nombre',
                        'sum' => $movimientos->func()->sum('importe')
                      ])
                      ->contain('Categorias')
                      ->where($condition)
                      ->group('categorias_id');


                        foreach ($movimientos as $key => $value) {
                          $movs[$value->categoria->nombre][$i]  =  $value->sum;
                        }
                }

        /*
SELECT
  Movimientos.categorias_id AS `Movimientos__categorias_id`, (SUM(importe)) AS `sum`
FROM
  movimientos Movimientos
  INNER JOIN categorias Categorias ON Categorias.id = (Movimientos.categorias_id)
 WHERE month(`fechaCtble`) >= 2 AND month(`fechaCtble`) < 3
GROUP BY
  categorias_id
        */


        $categorias = $this->Movimientos->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('movimientos', 'categorias', 'movs'));


  }

}
