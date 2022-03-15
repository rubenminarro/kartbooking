<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Estados Controller
 *
 * @property \App\Model\Table\EstadosTable $Estados
 * @method \App\Model\Entity\Estado[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EstadosController extends AppController {
  /**
    * Index method
    *
    * @return \Cake\Http\Response|null|void Renders view
    */
  public function index() {
    $estados = $this->Estados->find()
		->order(['descripcion'=>'asc']);
		$this->set('title','Superkarts - Administración');
		$this->set(compact(['estados']));
		$this->viewBuilder()->setLayout('admin');
	}
		
	/**
    * Add method
    *
    * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
    */
  public function add(){
    $estado = $this->Estados->newEmptyEntity();
    if ($this->request->is('post')) {
      $estado = $this->Estados->patchEntity($estado, $this->request->getData());
      if ($this->Estados->save($estado)) {
        $this->Flash->success(__('El estado se ha guardado correctamente.'));
				return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('El estado no se ha podido guardar. Por favor intente nuevamente.'));
    }
    $this->set('title','Superkarts - Administración');
		$this->set(compact(['estado']));
		$this->viewBuilder()->setLayout('admin');
  }

  /**
    * Edit method
    *
    * @param string|null $id Estado id.
    * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
  public function edit($id = null) {
    $estado = $this->Estados->get($id, [
      'contain' => [],
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $estado = $this->Estados->patchEntity($estado, $this->request->getData());
      if ($this->Estados->save($estado)) {
        $this->Flash->success(__('El estado se ha guardado correctamente.'));
				return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('El estado no se ha podido guardar. Por favor intente nuevamente.'));
    }
    $this->set('title','Superkarts - Administración');
		$this->set(compact(['estado']));
		$this->viewBuilder()->setLayout('admin');
  }
}