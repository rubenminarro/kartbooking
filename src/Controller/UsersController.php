<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {
  
	public function beforeFilter(\Cake\Event\EventInterface $event) {
		parent::beforeFilter($event);
		$this->Authentication->addUnauthenticatedActions(['login']);
	}
	
	/**
    * Index method
    *
    * @return \Cake\Http\Response|null|void Renders view
    */
  public function index() {
		$usuarios = $this->Users->find()
		->select([
			'id_user',
			'id_estado',
			'username',
			'estado' =>'es.descripcion',
			'email'
		])
		->join([
			'table' => 'estados',
			'alias' => 'es',
			'type' => 'LEFT',
			'conditions' => 'es.id_estado = Users.id_estado'])
		->order(['username'=>'asc']);
				
		$this->set('title','Superkarts - Administración');
		$this->set(compact(['usuarios']));
		$this->viewBuilder()->setLayout('admin');
  }

  /**
    * Add method
    *
    * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
    */
  public function add() {
    $user = $this->Users->newEmptyEntity();
    if ($this->request->is('post')) {
      $user = $this->Users->patchEntity($user, $this->request->getData());
      if ($this->Users->save($user)) {
        $this->Flash->success(__('El usuario se ha guardado correctamente.'));
				return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('El usuario no se ha podido guardar. Por favor intente nuevamente.'));
    }
		$this->set('title','Superkarts - Administración');
		$this->set(compact(['user']));
		$this->viewBuilder()->setLayout('admin');
  }

  /**
    * Edit method
    *
    * @param string|null $id User id.
    * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
  public function edit($id = null) {
		$this->loadModel('Estados');
	  $estadosDatos = $this->Estados->find()->select(['id_estado','descripcion'])->where(['id_estado IN' => [5,6]]);
		$estados = [];
		foreach ($estadosDatos as $key => $estado) {
		  $estados[$estado['id_estado']] = $estado['descripcion'];
		}
    $user = $this->Users->get($id, [
      'contain' => [],
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $user = $this->Users->patchEntity($user, $this->request->getData());
      if ($this->Users->save($user)) {
        $this->Flash->success(__('El usuario se ha guardado correctamente.'));
				return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('El usuario no se ha podido guardar. Por favor intente nuevamente.'));
    }
		$this->set('title','Superkarts - Administración');
		$this->set(compact(['user','estados']));
		$this->viewBuilder()->setLayout('admin');
  }

	public function login() {
		$this->request->allowMethod(['get', 'post']);
    $result = $this->Authentication->getResult();
    if ($result->isValid()) {
      $redirect = $this->request->getQuery('redirect', [
        'controller' => 'Reservas',
        'action' => 'index',
      ]);
			return $this->redirect($redirect);
    }
    if ($this->request->is('post') && !$result->isValid()) {
      $this->Flash->error(__('Usuario o contraseña inválida'));
    }

		$this->set('title','Superkarts - Administración');
		$this->viewBuilder()->setLayout('login');
  }

	public function logout() {
    $result = $this->Authentication->getResult();
    if ($result->isValid()) {
      $this->Authentication->logout();
      return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }	
	}
}