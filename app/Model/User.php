<?php
/*
 * Model untuk data User
 * dikembangkan oleh Budi Susanto (budsus@ti.ukdw.ac.id)
 *
 */
?>
<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public $validate = array (
			'username' => array(
					'required' => array(
						'rule' => array('notBlank', 'isUnique'),
						'message' => 'Username harus dimasukkan'
					)
				),
			'password' => array(
					'required' => array(
						'rule' => array('notBlank'),
						'message' => 'Password harus dimasukkan'
					)
				),
			'name' => array(
					'required' => array(
						'rule' => array('notBlank'),
						'message' => 'Nama lengkap harus dimasukkan'
					)
				),
			'role' => array(
					'valid' => array(
						'rule' => array('inList', array('admin', 'majelis', 'kantor')),
						'message' => 'Silahkan pilih sebuah role yang valid',
						'allowEmpty' => false
					)
				)
		);

	public function beforeSave($options = array()){
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['password'] =
				$passwordHasher->hash($this->data[$this->alias]['password']);
		}
		return true;
	}

	public function isAktifById($userid) {
		if ($userid) {
			$this->id = $userid;
			return ($this->field('aktif') === 'Aktif');
		}
		return false;
	}

	public function isAktifByUname($uname) {
		if ($uname) {
			$data = $this->findByUsername($uname);
			if ($data) {
				return ($data['User']['aktif'] === 'Aktif');
			}
		}
		return false;
	}

	public function updateLastLogin($userid){
		if ($userid) {
			$this->id = $userid;
			$this->saveField('last_login', date('Y/m/d H:i:s', time()));
		}
	}

	public function updateLastLogout($userid){
		if ($userid) {
			$this->id = $userid;
			$this->saveField('last_logout', date('Y/m/d H:i:s', time()));
		}
	}

	public function roleUser() {
		$arrRoles = array(
							'admin'    => 'Administrator',
						  'majelis'    => 'Majelis',
						  'kantor'   => 'Sekretaris Kantor'
					);
		return $arrRoles;
	}
}
?>
