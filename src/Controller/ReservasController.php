<?php
declare(strict_types=1);

namespace App\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * Reservas Controller
 *
 * @property \App\Model\Table\ReservasTable $Reservas
 * @method \App\Model\Entity\Reserva[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReservasController extends AppController {
  /**
    * Index method
    *
    * @return \Cake\Http\Response|null|void Renders view
    */
  public function index() {
    
		$this->set('title','Superkarts - Administración');
    $this->viewBuilder()->setLayout('admin');
    $this->loadModel('Estados');

    $estadosDatos = $this->Estados->find()->select(['id_estado','descripcion'])->where(['id_estado NOT IN' => [5,6]]);
    $estados = [];
    foreach ($estadosDatos as $key => $estado) {
      $estados[$estado['id_estado']] = $estado['descripcion'];
    }

    $datos = $this->Reservas->find()
      ->select([
        'id_reserva',
        'id_piloto' => 'pi.id_piloto',
        'cantidad' => 'Reservas.cantidad',
        'piloto_nombre' => 'pi.nombre',
        'piloto_apellido' => 'pi.apellido',
        'correo' => 'pi.correo',
        'telefono' => 'pi.telefono',
        'id_horario' => 'hr.id_horario',
        'horario' => 'hr.inicio',
        'id_estado' => 'es.id_estado',
        'estado' => 'es.descripcion',
        'dia',
        'id_kart' => 'k.id_kart',
        'tipo_karitng' => 'k.tipo'
      ])
      ->join([
        'table' => 'pilotos',
        'alias' => 'pi',
        'type' => 'LEFT',
        'conditions' => 'pi.id_piloto = Reservas.id_piloto'])
      ->join([
        'table' => 'horarios',
        'alias' => 'hr',
        'type' => 'LEFT',
        'conditions' => 'hr.id_horario = Reservas.id_horario'])
      ->join([
        'table' => 'estados',
        'alias' => 'es',
        'type' => 'LEFT',
        'conditions' => 'es.id_estado = Reservas.id_estado'])
      ->join([
        'table' => 'karts',
        'alias' => 'k',
        'type' => 'LEFT',
        'conditions' => 'k.id_kart = Reservas.id_kart'])
      ->order(['dia' => 'DESC']);

    $dia_reservas = [];
      
    foreach ($datos as $dato) {
      if ($dato) {
        $dia_reservas[$dato['dia']][$dato['id_horario']][$dato['id_piloto']][] = [
          'id_reserva' => $dato['id_reserva'],
          'id_piloto' => $dato['id_piloto'],
          'piloto_nombre' => $dato['piloto_nombre'],
          'piloto_apellido' => $dato['piloto_apellido'],
          'cantidad' => $dato['cantidad'],
          'telefono' => $dato['telefono'],
          'correo' => $dato['correo'],
          'id_horario' => $dato['id_horario'],
          'horario' => $dato['horario'],
          'id_estado' => $dato['id_estado'],
          'estado' => $dato['estado'],
          'dia' => date("d/m/Y", strtotime($dato['dia'])),
          'id_kart' => $dato['id_kart'],
          'tipo_karitng' => $dato['tipo_karitng'],
        ];
      }
    }

    $this->set(compact(['dia_reservas','estados']));
  }

	public function exportar(){

    $fecha = $_GET['fecha']; 
    $templateName = 'reservas_template.xlsx';
    $fileName = 'reservas.xlsx';

    $reader = IOFactory::createReader('Xlsx');
    $spreadsheet = $reader->load($templateName);
      
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('B3', $fecha);
    
    $fechaActual = explode("/",$fecha);
    $nuevaFecha = $fechaActual[2]."-".$fechaActual[1]."-".$fechaActual[0];
    $datosReserva = $this->datosReserva($nuevaFecha);

    $spreadsheet->getActiveSheet()->fromArray($datosReserva,NULL,'A6');

    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save($fileName);
      
    $response = $this->response->withFile($fileName,['download'=>true,'name'=>$fileName]);
    return $response;

  }

  public function datosReserva($fecha){
    
    $this->loadModel('Reservas');
    $this->loadModel('Pilotos');
    $this->loadModel('Horarios');

    $datos = $this->Reservas->find()
      ->select([
        'id_reserva',
        'id_piloto' => 'pi.id_piloto',
        'cantidad' => 'Reservas.cantidad',
        'piloto_nombre' => 'pi.nombre',
        'piloto_apellido' => 'pi.apellido',
        'correo' => 'pi.correo',
        'telefono' => 'pi.telefono',
        'id_horario' => 'hr.id_horario',
        'horario' => 'hr.inicio',
        'estado' => 'es.descripcion',
        'dia',
        'tipo_karitng' => 'k.tipo'
      ])
      ->join([
        'table' => 'pilotos',
        'alias' => 'pi',
        'type' => 'LEFT',
        'conditions' => 'pi.id_piloto = Reservas.id_piloto'])
      ->join([
        'table' => 'horarios',
        'alias' => 'hr',
        'type' => 'LEFT',
        'conditions' => 'hr.id_horario = Reservas.id_horario'])
      ->join([
        'table' => 'estados',
        'alias' => 'es',
        'type' => 'LEFT',
        'conditions' => 'es.id_estado = Reservas.id_estado'])
      ->join([
        'table' => 'karts',
        'alias' => 'k',
        'type' => 'LEFT',
        'conditions' => 'k.id_kart = Reservas.id_kart'])
      ->order(['dia' => 'DESC'])
      ->where(['dia'=> $fecha]);
        
    $datos_reservas = [];

    foreach ($datos as $dato) {
      if ($dato) {
        $datos_reservas[$dato['id_horario']][$dato['id_piloto']][] = [
          'id_reserva' => $dato['id_reserva'],
          'id_piloto' => $dato['id_piloto'],
          'cantidad' => $dato['cantidad'],
          'piloto_nombre' => $dato['piloto_nombre'],
          'piloto_apellido' => $dato['piloto_apellido'],
          'telefono' => $dato['telefono'],
          'correo' => $dato['correo'],
          'id_horario' => $dato['id_horario'],
          'horario' => $dato['horario'],
          'id_estado' => $dato['id_estado'],
          'estado' => $dato['estado'],
          'dia' => date("d/m/Y", strtotime($dato['dia'])),
          'id_kart' => $dato['id_kart'],
          'tipo_karitng' => $dato['tipo_karitng'],
        ];
      }
    }

    $resultado = [];

    foreach ($datos_reservas as $key => $horario_reserva) {
      foreach ($horario_reserva as $key => $reposonble_reserva) {
        foreach ($reposonble_reserva as $key => $reserva) {
          
          $resultado[] = [
            'horario' => $reposonble_reserva[0]['horario'],
            'piloto' => $reserva['piloto_nombre'].' '.$reserva['piloto_apellido'],
            'telefono' => $reserva['telefono'],
            'correo' => $reserva['correo'],
            'estado' => $reserva['estado'],
            'tipo_karitng' => $reserva['tipo_karitng'],
            'total' => $reserva['cantidad']
          ];
          
        }

      }
    }

    return $resultado;
  }

  public function borrarReserva(){
    
    $this->viewBuilder()->setClassName('Json');
    $this->loadModel('Reservas');

    $idReserva = $_POST['idReserva'];

    $reservasTable = $this->getTableLocator()->get('Reservas');
    $reserva = $reservasTable->get($idReserva);
    
    $result = ($this->Reservas->delete($reserva)) ? 1 : 0;
    
    $this->set(compact('result'));
    $this->viewBuilder()->setOption('serialize', 'result');
    
  }

  public function cambiarEstado(){
    
    $this->viewBuilder()->setClassName('Json');
    $this->loadModel('Reservas');

    $idReserva = $_POST['idReserva'];
    $idEstado = $_POST['idEstado'];

    $reservasTable = $this->getTableLocator()->get('Reservas');
    $reserva = $reservasTable->get($idReserva);
    $reserva->id_estado = $idEstado;

    try {
      $result = ($reservasTable->save($reserva)) ? 1 : 0;
    } catch(\Exception $e) {
      $result = 2;
    }

    $this->set(compact('result'));
    $this->viewBuilder()->setOption('serialize', 'result');
    
  }
}