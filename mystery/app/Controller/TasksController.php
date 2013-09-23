<?php

class TasksController extends AppController {
	public $helpers = array('Html', 'Form');

	public function home() {
		$this->set('user', $this->findById(CakeSession::read("Auth.User.username")));
	}
}













?>