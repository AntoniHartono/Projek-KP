<?php
/*
 * Controller untuk manajemen Akun Pemakai
 * dikembangkan oleh Budi Susanto (budsus@ti.ukdw.ac.id)
 *
 */
?>
<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class UsersController extends AppController {
	public $components = array('Paginator', 'Session', 'Cookie', 'Flash', 'ImageCropResize.Image');
	public $uses = array('User');
	public $helpers = array('Flash');
	public $layout = 'default';

	public function beforeFilter() {
		parent::beforeFilter();

		$this->Auth->allow( 'login' );
	}

	public function isAuthorized($user) {
		if ($this->action === 'logout') {
			return true;
		}
		if (in_array($this->action, array('index', 'add', 'delete'))) {
			if (isset($user['role']) && $user['role'] === 'admin') {
				return true;
			}
			return false;
		} else if (in_array($this->action, array('edit', 'chpasswd'))) {
			if (isset($user['role']) && in_array($user['role'], array('admin', 'majelis', 'kantor'))) {
				return true;
			}
			return parent::isAuthorized($user);
		}
	}

	public function index() {
		$conditions = array();
		$this->User->recursive = 1;
		if (!empty($this->data) && $this->data['cari'] !== '') {
			$conditions = array(
						'or' => array(
							'name LIKE ' => '%' . strtolower($this->data['cari']) . '%',
							'username LIKE ' => '%' . strtolower($this->data['cari']) . '%'
						)
					);
			$this->Session->write('conditions',$conditions);
			$this->Session->write('search', $this->data['cari']);
		} else {
			if (empty($this->params['named']['o'])) {
				$this->Session->delete('conditions');
				$this->Session->delete('search');
			} else {
				if ($this->params['named']['o'] === 'search') {
					$conditions = $this->Session->read('conditions');
				} else {
					$this->Session->delete('conditions');
					$this->Session->delete('search');
				}
			}
		}

		$this->Paginator->settings = array(
				'limit' => 20,
				'order' => array(
					'User.name' => 'asc'
				),
				'conditions' => $conditions
			);

		try {
			$this->set('users', $this->Paginator->paginate('User'));
		} catch (NotFoundException $e) {
			$this->redirect(array('action'=>'index'));
		}
	}

	/* untuk ubah password */
	public function chpasswd($id=null) {
		$this->set('roles', $this->User->roleUser());
		$userid = $id;
		if ($id == null) {
			if ($this->Auth->login()) {
				$userid = $this->Auth->user('id');
			}
		} else {
			$iduser = $this->User->findByIdhash($id);
			if (!empty($iduser)) {
				$userid = $iduser['User']['id'];
			}
		}

		$this->User->id = $userid;
		if (!$this->User->exists()) {
			$this->Flash->error(__('User tidak ditemukan, silahkan dicoba lagi.'));
			if ($this->Auth->user('role') === 'admin') {
				$this->redirect(array('action' => 'index'));
			} else {
				$this->redirect(array('controller' => 'main'));
			}
		}

		// tambahkan validator untuk field current_password dan retype password
		//
		$this->User->validator()->add('password2', array('notBlank'));

		if ($this->request->is('post') || $this->request->is('put')) {

			// cek apakah current_password sama dengan yang tersimpan
			$userpasswd = $this->User->findById($userid);

			if ($this->data['User']['password'] !== $this->data['User']['password2']) {
				$this->Flash->error(__('Password tidak cocok. Ulangi kembali.'));
				$this->request->data = $this->User->read(null, $userid);
				unset($this->request->data['User']['password']);
				unset($this->request->data['User']['password2']);
			} else {
				if ($this->User->save($this->request->data)) {
					$this->Flash->success(__('User telah tersimpan.'));

					$this->User->validator()->remove('password2');

					if ($this->Auth->user('role') === 'admin') {
						$this->redirect(array('action' => 'index'));
					} else {
						$this->redirect(array('controller' => 'main', 'action'=>'index'));
					}
				}
				$this->Flash->error(__('User tidak dapat diupdate, silahkan dicoba lagi.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $userid);
			unset($this->request->data['User']['password']);
		}
	}

	/* Untuk menambah akun pengguna */
	public function add() {
		$this->set('roles', $this->User->roleUser());

		if ($this->request->is('post')){

			if (!($this->data['User']['password'] ===
				$this->data['User']['password2'])) {
				$this->Flash->error(__('Passwords tidak cocok.', true));
				return;
			}

			$this->request->data['User']['idhash'] =
				md5('UKDWjogja' . $this->data['User']['username']);

			try {
				$this->User->create();
				if ($this->User->save($this->request->data)){
					$this->Flash->success(__('User telah tersimpan.'));
					return $this->redirect(array('action' => 'index'));
				}
			} catch (PDOException $e) {
				$this->Flash->error(__('User tidak dapat tersimpan. ' . $e->errorInfo[2]));
			}
		}
	}

	/* Untuk update profil pengguna */
	public function edit($id=null){
		$this->set('roles', $this->User->roleUser());

		if ($this->request->is('post') || $this->request->is('put')) {
			if (!empty($this->request->data['User']['file']['tmp_name'])) {
				$file = $this->request->data['User']['file'];
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1);
				$fullfilename = md5($this->request->data['User']['name']) . '.' . $ext;
				$hasilupload = $this->__uploadfile($file, $ext, $fullfilename);

				if ($hasilupload) {
					$this->request->data['User']['filename'] =
						$hasilupload;
					$this->request->data['User']['filedir'] =
					   '/uploads/pp/thumbs/';
					$this->request->data['User']['mime_type'] =
						$file['type'];
				}
			}

			try {
				if ($this->User->save($this->request->data)) {
					$this->Flash->success(__('User telah tersimpan.'));

					if ($this->Auth->user('role') === 'admin') {
						$this->redirect(array('action' => 'index'));
					} else {
						$this->redirect(array('controller' => 'main'));
					}
				}
			} catch (PDOException $e) {
				$this->Flash->error(__('User tidak dapat diupdate. ' . $e->errorInfo[2]));
			}
		} else {
			$userid = $id;
			$isFound = true;
			if ($id == null) {
				if ($this->Auth->login()) {
					$userid = $this->Auth->user('id');
				}
			} else {
				$iduser = $this->User->findByIdhash($id);
				if (empty($iduser)) {
					$isFound = false;
				} else {
					$userid = $iduser['User']['id'];
				}
			}

			if ($isFound){
				$this->request->data = $this->User->read(null, $userid);
				unset($this->request->data['User']['password']);
			} else {
				$this->Flash->error(__('User tidak ditemukan, silahkan dicoba lagi.'));
				if ($this->Auth->user('role') === 'admin') {
					$this->redirect(array('action' => 'index'));
				} else {
					$this->redirect(array('controller' => 'main'));
				}
			}
		}
	}

	/* untuk menghapus akun pengguna */
	public function delete($id = null) {
		$this->request->onlyAllow('post');

		$iduser = $this->User->findByIdhash($id);

		$userid = $iduser['User']['id'];

		$this->User->id = $userid;
		if (!$this->User->exists()) {
			$this->Flash->error(__('User tidak ditemukan, silahkan dicoba lagi.'));
		}
		try {
			if ($this->User->delete()){
				$this->Flash->success(__('User telah terhapus'));
				$this->redirect(array('action' => 'index'));
			}
		} catch (PDOException $e) {
			$this->Flash->error(__('User tidak dapat dihapus.' . $e->errorInfo[2]));
			$this->redirect(array('action'=>'index'));
		}
	}

	public function login() {
		if (!$this->Session->check('Auth.User')) {
			if ($this->request->is('post')) {
				if ($this->User->isAktifByUname($this->request->data['User']['username'])) {
					if ($this->Auth->login()) {

						$this->User->updateLastLogin($this->Auth->user('id'));

						$_SESSION['KCFINDER']['disabled']=false;

						if ($this->request->data['User']['remember_me'] == 1) {
							// remove "remember me checkbox"
							unset($this->request->data['User']['remember_me']);

							// hash the user's password
							$passwordHasher = new SimplePasswordHasher();
							$this->request->data['User']['password'] =
								$passwordHasher->hash($this->request->data['User']['password']);

							// write the cookie
							$this->Cookie->write('its_me_cookie', $this->request->data['User'], true, '2 days');
						}

						return $this->redirect($this->Auth->redirectUrl());
					}
					$this->Flash->error('Username dan password tidak valid, silahkan ulang kembali');
				} else {
					$this->Flash->error('Akun Anda tidak aktif.');
				}
			}
		} else {
			if ($this->Auth->user('role') === 'admin') {
				$this->redirect(array('controller'=>'admin', 'action' => 'index'));
			} else {
				$this->redirect(array('controller'=>'main', 'action' => 'index'));
			}
		}
	}

	public function logout() {
		$this->User->updateLastLogout($this->Auth->user('id'));

		$this->Session->destroy();
		$this->Cookie->delete('its_me_cookie');
		return $this->redirect($this->Auth->logout());
	}

	private function __uploadfile($file, $ext, $fullname = null) {
		$arr_ext = array('jpg', 'jpeg', 'gif', 'png');

		if(in_array($ext, $arr_ext)) {
			$nmfile = $file['name'];
			if ($fullname) $nmfile = $fullname;

			$fullpath = APP . '/webroot/uploads/pp/' . $nmfile;
			move_uploaded_file($file['tmp_name'], $fullpath);

			$options = array(
				'width'             => 128,    //Width of the new Image, Default is Original Width
				'height'            => 128,    //Height of the new Image, Default is Original Height
				'aspect'            => true,    //Keep aspect ratio
				'crop'              => false,   	//Crop the Image
				'cropvars'          => array(0, 0, 128, 128), //How to crop the image, array($startx, $starty, $endx, $endy);
				'autocrop'          => false,   //Auto crop the image, calculate the crop according to the size and crop from the middle
				'htmlAttributes'    => array(), //Html attributes for the image tag
				'quality'           => 90,      //Quality of the image
				'urlOnly'           => true    //Return only the URL or return the Image tag
			);

			$urlImg = $this->Image->resize('/app/webroot/uploads/pp/' . $nmfile, $options);
			$cropPathDest = APP . '/webroot/uploads/pp/thumbs/' . $nmfile;
			$cropPathSrc = APP . '/webroot/' . $urlImg;
			rename($cropPathSrc, $cropPathDest);

			return $nmfile;

		} else {
			return false;
		}
	}
}
?>
