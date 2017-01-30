<?php
class SetupController extends AppController{
	public $uses = array('Setup');

	public function index(){
		$datas = $this->Setup->find('all');
		$this->set('datas', $datas);
	}

	public function edit($id=null){
		if($id){

		}
		return $this->redirect(array('action' => 'index'));
	}

	public function beforeFilter() {
		parent::beforeFilter();
	}

	public function isAuthorized($user) {
		return parent::isAuthorized($user);
	}
}
?>