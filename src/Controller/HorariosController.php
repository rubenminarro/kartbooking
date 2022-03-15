<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Horarios Controller
 *
 * @property \App\Model\Table\HorariosTable $Horarios
 * @method \App\Model\Entity\Horario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HorariosController extends AppController {
  /**
    * Index method
    *
    * @return \Cake\Http\Response|null|void Renders view
    */
  public function index(){
    $horarios = $this->Horarios->find()
		->select([
			'id_horario',
			'id_estado',
			'estado' =>'es.descripcion',
			'inicio',
			'fin',
			'cantidad'
		])
		->join([
			'table' => 'estados',
			'alias' => 'es',
			'type' => 'LEFT',
			'conditions' => 'es.id_estado = Horarios.id_estado'])
		->order(['inicio'=>'asc']);
				
		$this->set('title','Superkarts - Administración');
		$this->set(compact(['horarios']));
		$this->viewBuilder()->setLayout('admin');
  }

  /**
    * Add method
    *
    * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
    */
  public function add(){
		$this->loadModel('Estados');
		$estadosDatos = $this->Estados->find()->select(['id_estado','descripcion'])->where(['id_estado IN' => [5,6]]);
		$estados = [];
		foreach ($estadosDatos as $key => $estado) {
			$estados[$estado['id_estado']] = $estado['descripcion'];
		}
   	$horario = $this->Horarios->newEmptyEntity();
    if ($this->request->is('post')) {
      $horario = $this->Horarios->patchEntity($horario, $this->request->getData());
      if ($this->Horarios->save($horario)) {
        $this->Flash->success(__('El horario se ha guardado correctamente.'));
				return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('El horario no se ha podido guardar. Por favor intente nuevamente.'));
    }
		$this->set(compact(['horario','estados']));
		$this->set('title','Superkarts - Administración');
		$this->viewBuilder()->setLayout('admin');
  }

  /**
    * Edit method
    *
    * @param string|null $id Horario id.
    * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
  public function edit($id = null){
    $this->loadModel('Estados');
	  $estadosDatos = $this->Estados->find()->select(['id_estado','descripcion'])->where(['id_estado IN' => [5,6]]);
		$estados = [];
		foreach ($estadosDatos as $key => $estado) {
		  $estados[$estado['id_estado']] = $estado['descripcion'];
		}  
		$horario = $this->Horarios->get($id, [
      'contain' => [],
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $horario = $this->Horarios->patchEntity($horario, $this->request->getData());
      if ($this->Horarios->save($horario)) {
        $this->Flash->success(__('El horario se ha guardado correctamente.'));
        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('El horario no se ha podido guardar. Por favor intente nuevamente.'));
    }
    $this->set(compact(['horario','estados']));
		$this->set('title','Superkarts - Administración');
		$this->viewBuilder()->setLayout('admin');
  }
}
