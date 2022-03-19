<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Home Controller
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController {

  public function beforeFilter(\Cake\Event\EventInterface $event) {
		parent::beforeFilter($event);
		$this->Authentication->addUnauthenticatedActions(['index','cantidadReservas','seleccionarHorarioDisponible','buscarPilotos','registrarPiloto','guardarReserva','diasBloqueados']);
	}

  /**
    * Index method
    *
    * @return \Cake\Http\Response|null|void Renders view
    */
  public function index(){
    $this->layout = 'default';
    $diasBloqueados = $this->diasBloqueados();
    $this->set('title','Superkarts - Alquiler de Kartings');
    $this->set(compact('diasBloqueados'));
  }

  public function cantidadReservas(){   
          
    $fecha = $_POST['fecha'];
    $this->viewBuilder()->setClassName('Json');
    $this->loadModel('Horarios');
    $this->loadModel('Reservas');
    $this->loadModel('CedulaPilotoReserva');
        
    $reservas = $this->Reservas->find()
    ->select([
      'id_horario',
      'cantidad_reservas' => 'count(Reservas.id_horario)',
      'cantidad_total' => 'hr.cantidad',
      'cantidad_restante' => 'hr.cantidad - count(Reservas.id_horario)',
      'horario' => 'hr.inicio',
    ])
    ->join([
      'table' => 'horarios',
      'alias' => 'hr',
      'type' => 'LEFT',
      'conditions' => 'hr.id_horario = Reservas.id_horario'])
    ->join([
      'table' => 'cedula_piloto_reserva',
      'alias' => 'cpr',
      'type' => 'LEFT',
      'conditions' => 'cpr.id_reserva = Reservas.id_reserva'])
    ->where(['Reservas.dia' => $fecha,'Reservas.id_estado IN' => ['1','2']])
    ->group(['Reservas.id_horario']);

    $id_horarios = $this->Reservas->find()
    ->select([
      'id_horario'
    ])
    ->where(['dia' => $fecha]);

    $horarios = $this->Horarios->find()
    ->select([
      'id_horario',
      'cantidad_reservas' => '0',
      'cantidad_total' => 'cantidad',
      'cantidad_restante' => '10',
      'horario' => 'inicio'
    ])
    ->where(['id_horario NOT IN' => $id_horarios, 'id_estado' => '5']);

    $horarios->unionAll($reservas);
      
    $reservas_diarias = [];
    foreach ($horarios as $key => $value) {
      $reservas_diarias[$value['id_horario']] = $value;
    }

    usort($reservas_diarias, function($a, $b) {
      return $a['horario'] <=> $b['horario'];
    });

    $this->set(compact('reservas_diarias'));
    $this->viewBuilder()->setOption('serialize', 'reservas_diarias');
  }

  public function seleccionarHorarioDisponible() { 
      
    $fecha = $_POST['fecha'];
    $id_horario = $_POST['id_horario'];
    $cantidad_pilotos = $_POST['cantidad_pilotos'];
    $this->viewBuilder()->setClassName('Json');
    $this->loadModel('Horarios');
    $this->loadModel('Reservas');
    $this->loadModel('CedulaPilotoReserva');

    $reservas = $this->Reservas->find()
    ->select([
      'id_horario',
      'cantidad_reservas' => 'count(Reservas.id_horario)',
      'cantidad_total' => 'hr.cantidad',
      'cantidad_restante' => 'hr.cantidad - count(Reservas.id_horario)',
      'horario' => 'hr.inicio',
    ])
    ->join([
      'table' => 'horarios',
      'alias' => 'hr',
      'type' => 'LEFT',
      'conditions' => 'hr.id_horario = Reservas.id_horario'])
    ->join([
      'table' => 'cedula_piloto_reserva',
      'alias' => 'cpr',
      'type' => 'LEFT',
      'conditions' => 'cpr.id_reserva = Reservas.id_reserva'])
    ->where(['Reservas.dia' => $fecha,'Reservas.id_estado IN' => ['1','2']])
    ->group(['Reservas.id_horario']);

    $id_horarios = $this->Reservas->find()
    ->select([
      'id_horario'
    ])
    ->where(['dia' => $fecha]);

    $horarios = $this->Horarios->find()
    ->select([
      'id_horario',
      'cantidad_reservas' => '0',
      'cantidad_total' => 'cantidad',
      'cantidad_restante' => '10',
      'horario' => 'inicio'
    ])
    ->where(['id_horario NOT IN' => $id_horarios, 'id_estado' => '5']);

    $horarios->unionAll($reservas);
      
    $reservas_actual = [];

    foreach ($horarios as $key => $value) {
      if ($value['id_horario'] == $id_horario) {
        $reservas_actual[$value['id_horario']]['id_horario'] = $value['id_horario'];
        $reservas_actual[$value['id_horario']]['cantidad_reservas'] = strval($value['cantidad_reservas']+$cantidad_pilotos);
        $reservas_actual[$value['id_horario']]['cantidad_total'] = $value['cantidad_total'];
        $reservas_actual[$value['id_horario']]['cantidad_restante'] = $value['cantidad_total']-$value['cantidad_reservas']-$cantidad_pilotos;
        $reservas_actual[$value['id_horario']]['horario'] = $value['horario'];
      }else{
        $reservas_actual[$value['id_horario']]['id_horario'] = $value['id_horario'];
        $reservas_actual[$value['id_horario']]['cantidad_reservas'] = $value['cantidad_reservas'];
        $reservas_actual[$value['id_horario']]['cantidad_total'] = $value['cantidad_total'];
        $reservas_actual[$value['id_horario']]['cantidad_restante'] = $value['cantidad_total']-$value['cantidad_reservas'];
        $reservas_actual[$value['id_horario']]['horario'] = $value['horario'];
      }
    }
      
    usort($reservas_actual, function($a, $b) {
      return $a['horario'] <=> $b['horario'];
    });

    $this->set(compact('reservas_actual'));
    $this->viewBuilder()->setOption('serialize', 'reservas_actual');
  }

  public function buscarPilotos() { 
    $ci = $_POST['ci'];
    $this->viewBuilder()->setClassName('Json');
    $this->loadModel('Pilotos');
      
    $query = $this->Pilotos->find()
    ->where(['ci' => $ci]);
    $piloto = $query->first();

    $this->set(compact('piloto'));
    $this->viewBuilder()->setOption('serialize', 'piloto');
  }

  public function registrarPiloto() { 
    $this->viewBuilder()->setClassName('Json');
    $this->loadModel('Pilotos');
    $ci = $_POST['ci'];
      
    $query = $this->Pilotos->find()
    ->select(['id_piloto','ci'])
    ->where(['ci' => $ci]);
    $piloto_data = $query->first();

    if(isset($piloto_data->id_piloto)){
      $id_piloto = $piloto_data->id_piloto;
      $ci = 0;
      $piloto = 0;
    }else{ 
      $pilotosTable = $this->getTableLocator()->get('Pilotos');
      $piloto = $pilotosTable->newEmptyEntity();

      $piloto->ci = $ci;
      $piloto->nombre = $_POST['nombre'];
      $piloto->apellido = $_POST['apellido'];
      $piloto->telefono = $_POST['telefono'];
      $piloto->correo = $_POST['correo'];

      if ($pilotosTable->save($piloto)) {
        $id_piloto = $piloto->id_piloto;
      }else{
        $id_piloto = null;
      }
    }
    $this->set(compact(['id_piloto','ci','piloto']));
    $this->viewBuilder()->setOption('serialize', ['id_piloto','ci','piloto']);
  }

  public function guardarReserva(){ 
      
    $this->viewBuilder()->setClassName('Json');
    $this->loadModel('Reservas');
    $result = 0;

    $reservasTable = $this->getTableLocator()->get('Reservas');
    $reserva = $reservasTable->newEmptyEntity();
    
    $reserva->id_piloto = $_POST['id-piloto'];
    $reserva->id_horario = $_POST['id-horario'];
    $reserva->id_estado = 1;
    $reserva->id_kart = $_POST['id_kart'];
    $reserva->dia = $_POST['fecha-reserva'];
    $reserva->cantidad = $_POST['cantidad-pilotos'];
    
    try {
      $result = ($reservasTable->save($reserva)) ? 1 : 0;
    } catch(\Exception $e) {
      $result = 2;
    }

    $this->set(compact('result'));
    $this->viewBuilder()->setOption('serialize', 'result');
  }

  public function diasBloqueados(){ 

    $lunes = new \DateTime('first Monday of this year');
    $martes = new \DateTime('first Tuesday of this year');
    $thisMonthLunes = $lunes->format('Y');
    $thisMonthMartes = $martes->format('Y');

    $diasBloqueados = [];

    while ($lunes->format('Y') === $thisMonthLunes) {
      array_push($diasBloqueados, $lunes->format('Y-m-d'));
      $lunes->modify('next Monday');
    }
    while ($martes->format('Y') === $thisMonthMartes) {
      array_push($diasBloqueados, $martes->format('Y-m-d'));
      $martes->modify('next Tuesday');
    }
    return $diasBloqueados;
  }
}