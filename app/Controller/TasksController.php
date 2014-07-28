<?php
/**
 * Created by PhpStorm.
 * User: tomas.zmek
 * Date: 3.4.14
 * Time: 9:25
 */

class TasksController extends AppController {
	public $helper = array('Html', 'Form');

	/**
	 * Vypis vsech ukolu v indexu, ktere nebyly dokonceny
	 */
	public function index() {

		$this -> set('tasks', $this -> Task -> find('all', array('conditions' => array('Task.done' => '0'), 'order'=>'Task.created DESC')));
	}

	/**
	 * Funkce zobrazeni ukolu
	 * @param null $id
	 * @throws NotFoundException
	 */
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid tasks'));
		}
		$task = $this -> Task -> findById($id);
		if (!$task) {
			throw new NotFoundException(__('Invalid tasks'));
		}

		$this -> set('task', $task);
	}

	/**
	 * funkce pridani ukolu
	 */
	public function taskAdd() {
		$this -> loadModel('User');
		$this -> loadModel('Category');

		$this -> set('assignee', $this -> User -> find('list', array('fields' => array('User.username'))));
		$this -> set('category', $this -> Category -> find('list'));
		if ($this -> request -> is('post')) {
			$this -> request -> data['Task']['author'] = $this -> Auth -> user('id');
			$this -> Task -> create();
			if ($this -> Task -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Úkol byl uložen.'));
                $userId = $this->request->data['Task']['assignee'];
                $assigneer = $this->User->find('first', array(
                    'conditions' => array('User.id' => $userId)
                ));
                /**
                 * Odesilani mailu v pripade, pridani ukolu
                 */
                App::uses('CakeEmail', 'Network/Email');
                $Email = new CakeEmail('smtp');
                $Email->template('addTask')
                    ->emailFormat('both')
                    ->from('ukolnicek@znrek.cz')
                    ->to($assigneer['User']['email'])
                    ->subject('Obdrzel jste novy ukol!')
                    ->send('smtp');

                return $this -> redirect(array('action' => 'index'));
			}

			$this -> Session -> setFlash(__('Úkol nebylo možné uložit.'));
		}

	}

	/**
	 * @param null $id
	 * @throws NotFoundException
	 * Uprava tasku
	 */
	public function taskEdit($id = null) {
		$this -> loadModel('User');
		$this -> loadModel('Category');

		$this -> set('assignee', $this -> User -> find('list', array('fields' => array('User.username'))));
		$this -> set('category', $this -> Category -> find('list'));
		if (!$id) {
			throw new NotFoundException(__('Neznámé číslo úkolu'));
		}

		$task = $this -> Task -> findById($id);
		if (!$task) {
			throw new NotFoundException(__('Neznámé číslo úkolu'));
		}

		if ($this -> request -> is(array('post', 'put'))) {
			$this -> Task -> id = $id;
			if ($this -> Task -> save($this -> request -> data)) {
				$this -> Session -> setFlash(__('Úkol byl aktualizován.', 'alert alert-success'));
				return $this -> redirect(array('action' => 'index'));
			}
			$this -> Session -> setFlash(__('Úkol nebylo možné aktualizovat.'));
		}

		if (!$this -> request -> data) {
			$this -> request -> data = $task;
		}
	}

	/**
	 * @param $id
	 * @throws MethodNotAllowedException
	 * Smazani prispevku
	 */
	public function taskDelete($id) {
		if ($this -> request -> is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this -> Task -> delete($id)) {
			$this -> Session -> setFlash(__('The post with id: %s has been deleted.', h($id)));
			return $this -> redirect(array('action' => 'index'));
		}
	}

	/**
	 * @param null $id
	 * @throws NotFoundException
	 * Provede dokončení úkolu.
	 */

	public function taskDone($id = null) {
		if (!task) {
			throw new NotFoundException(__('Neznámé číslo úkolu'));
		}
		$task = $this -> Task -> findById($id);
		if (!$task) {
			throw new NotFoundException(__('Neznámé číslo úkolu'));
		}

		$this -> Task -> id = $id;
		if ($this -> Task -> saveField('done', '1')) {
			$this -> Session -> setFlash(__('Úkol byl uzavřen.', 'alert alert-success'));
			return $this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('Úkol nebylo možné uzavřít.'));

		if (!$this -> request -> data) {
			$this -> request -> data = $task;
		}
	}
	/**
     * @param $user
     * @return bool
     * Kontrola, jestli je uzivatel autorizovany
     */
	public function isAuthorized($user) {
		// All registered users can add posts
		if ($this -> action === 'add') {
			return true;
		}

		// The owner of a post can edit and delete it
		if (in_array($this -> action, array('edit', 'delete'))) {
			$postId = (int)$this -> request -> params['pass'][0];
			if ($this -> Task -> isOwnedBy($postId, $user['id'])) {
				return true;
			}
		}

		return parent::isAuthorized($user);
	}

}
