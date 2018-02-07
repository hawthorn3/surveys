<!-- File: /app/Controller/SurveysController.php -->

<?php

class SurveysController extends AppController {
	
//	var $name = 'Surveys';
	
	public $helpers = array('Html', 'Form', 'Flash');

	public function index() {
		$this->set('surveys', $this->Survey->find('all'));
		
		$this->set('users', $this->Survey->User->find('list'));
	}

	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Ungültige ID'));
		}
		$survey = $this->Survey->findById($id);
		if (!$survey) {
			throw new NotFoundException(__('Ungültiger Eintrag'));
		}
		$this->set('survey', $survey);
		
		$users = $this->Survey->User->find('list');
		$this->set(compact('users'));
		
		$skills = $this->Survey->Skill->find('list');
		$this->set(compact('skills'));
	}


	public function add() {

		$users = $this->Survey->User->find('list');
		$this->set(compact('users'));
		
		$skills = $this->Survey->Skill->find('list');
		$this->set(compact('skills'));
				
		// if the HTTP method of the request was POST, it saves the data using the Survey model
		if ($this->request->is('post')) {
			$this->Survey->create();
			if ($this->Survey->save($this->request->data)) {
				$this->Flash->success(__('Survey wurde erfolgreich angelegt.'));
			
				$survey = $this->Survey->findById($this->Survey->getInsertId());
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('Survey konnte nicht gespeichert werden.'));
		}

}
/*
	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Ungültig'));
		}

		$survey = $this->Survey->findById($id);
		if (!$survey) {
			throw new NotFoundException(__('Ungültig'));
		}

		$this->set('id', $id);
		if ($this->request->is(array('post', 'put'))) {
			$this->Survey->id = $id;
			if ($this->Survey->save($this->request->data)) {
				$this->Flash->success(__('Der Eintrag wurde aktualisiert.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('Der Eintrag konnte nicht aktualisiert werden.'));
			}
		}

		if (!$this->request->data) {
			$this->request->data = $survey;
		}
	}

	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		$survey = $this->Survey->findById($id);
		if ($this->Survey->delete($id)) {
			$this->Flash->success(
				__('Survey mit ID: %s wurde gelöscht.', h($id))
			);
		} else {
			$this->Flash->error(
				__('Survey mit ID: %s konnte nicht gelöscht werden.', h($id))
				);
		}

		return $this->redirect(array('action' => 'index'));
	}
*/

}
