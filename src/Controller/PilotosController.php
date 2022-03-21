<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Pilotos Controller
 *
 * @property \App\Model\Table\PilotosTable $Pilotos
 * @method \App\Model\Entity\Piloto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PilotosController extends AppController {
  /**
    * Index method
    *
    * @return \Cake\Http\Response|null|void Renders view
    */
  public function index(){
		$pilotos = $this->Pilotos->find()
		->select([
			'id_piloto',
			'ci',
			'nombre',
			'apellido',
			'correo',
			'telefono'
		])
		->order(['nombre'=>'asc','apellido'=>'asc']);
		$this->set('title','KCP - Karting Outdoor - Administración');
		$this->set(compact(['pilotos']));
		$this->viewBuilder()->setLayout('admin');
   }

  /**
    * Add method
    *
    * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
    */
  public function add(){
    $piloto = $this->Pilotos->newEmptyEntity();
    if ($this->request->is('post')) {
      $piloto = $this->Pilotos->patchEntity($piloto, $this->request->getData());
      if ($this->Pilotos->save($piloto)) {
        $this->Flash->success(__('El piloto se ha guardado correctamente.'));
		  	return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('El piloto no se ha podido guardar. Por favor intente nuevamente.'));
    }
    $this->set('title','KCP - Karting Outdoor - Administración');
		$this->set(compact(['piloto']));
		$this->viewBuilder()->setLayout('admin');
  }

  /**
    * Edit method
    *
    * @param string|null $id Piloto id.
    * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
  public function edit($id = null) {
    $piloto = $this->Pilotos->get($id, [
      'contain' => [],
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $piloto = $this->Pilotos->patchEntity($piloto, $this->request->getData());
      if ($this->Pilotos->save($piloto)) {
        $this->Flash->success(__('El piloto se ha guardado correctamente.'));
	  		return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('El piloto no se ha podido guardar. Por favor intente nuevamente.'));
    }
    $this->set('title','KCP - Karting Outdoor - Administración');
		$this->set(compact(['piloto']));
		$this->viewBuilder()->setLayout('admin');
  }
}