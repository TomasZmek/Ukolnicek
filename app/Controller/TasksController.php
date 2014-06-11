<?php
/**
 * Created by PhpStorm.
 * User: tomas.zmek
 * Date: 3.4.14
 * Time: 9:25
 */

class TasksController extends AppController{
    public $helper = array('Html', 'Form');


    /**
     * Vypis vsech ukolu v indexu
     */
    public function index(){
        $this->set('tasks', $this->Task->find('all'));
    }

    /**
     * Funkce zobrazeni ukolu
     * @param null $id
     * @throws NotFoundException
     */
    public function view($id = null){
        if (!$id){
            throw new NotFoundException(__('Invalid tasks'));
        }
        $task = $this->Task->findById($id);
        if (!$task){
            throw new NotFoundException(__('Invalid tasks'));
        }

        $this->set('task', $task);
    }

    /**
     * funkce pridani ukolu
     */
    public function taskAdd() {
        $this->loadModel('User');
        $this->loadModel('Category');

        $this->set('assignee', $this->User->find('list'));
        $this->set('category', $this->Category->find('list'));
        if ($this->request->is('post')) {
            $this->request->data['Task']['author'] = $this->Auth->user('id');
            $this->Task->create();
            if ($this->Task->save($this->request->data)) {
                $this->Session->setFlash(__('Úkol byl uložen.'));
                return $this->redirect(array('action' => 'index'));
            }

            $this->Session->setFlash(__('Úkol nebylo možné uložit.'));
        }

    }

    public function taskEdit($id = null) {
        $this->loadModel('User');
        $this->loadModel('Category');

        $this->set('assignee', $this->User->find('list'));
        $this->set('category', $this->Category->find('list'));
        if (!$id) {
            throw new NotFoundException(__('Neznámé číslo úkolu'));
        }

        $task = $this->Task->findById($id);
        if (!$task) {
            throw new NotFoundException(__('Neznámé číslo úkolu'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Task->id = $id;
            if ($this->Task->save($this->request->data)) {
                $this->Session->setFlash(__('Úkol byl aktualizován.','alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Úkol nebylo možné aktualizovat.'));
        }

        if (!$this->request->data) {
            $this->request->data = $task;
        }
    }

    public function taskDelete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Task->delete($id)) {
            $this->Session->setFlash(
                __('The post with id: %s has been deleted.', h($id))
            );
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }

        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Task->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

}