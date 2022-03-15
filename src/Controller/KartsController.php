<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Karts Controller
 *
 * @property \App\Model\Table\KartsTable $Karts
 * @method \App\Model\Entity\Kart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KartsController extends AppController {
  /**
    * Index method
    *
    * @return \Cake\Http\Response|null|void Renders view
    */
  public function index() {
		$karts = $this->Karts->find()
		->order(['tipo'=>'asc']);
		$this->set('title','Superkarts - Administración');
		$this->set(compact(['karts']));
		$this->viewBuilder()->setLayout('admin');
  }

  /**
    * Add method
    *
    * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
    */
  public function add() {
    $kart = $this->Karts->newEmptyEntity();
    if ($this->request->is('post')) {
      $kart = $this->Karts->patchEntity($kart, $this->request->getData());
      if ($this->Karts->save($kart)) {
        $this->Flash->success(__('El tipo de kart se ha guardado correctamente.'));
				return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('El tipo de kart no se ha podido guardar. Por favor intente nuevamente.'));
    }
    $this->set('title','Superkarts - Administración');
		$this->set(compact(['kart']));
		$this->viewBuilder()->setLayout('admin');
  }

  /**
    * Edit method
    *
    * @param string|null $id Kart id.
    * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
  public function edit($id = null) {
    $kart = $this->Karts->get($id, [
      'contain' => [],
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $kart = $this->Karts->patchEntity($kart, $this->request->getData());
      if ($this->Karts->save($kart)) {
        $this->Flash->success(__('El tipo de kart se ha guardado correctamente.'));
				return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('El tipo de kart no se ha podido guardar. Por favor intente nuevamente.'));
    }
    $this->set(compact('kart'));
  }
}