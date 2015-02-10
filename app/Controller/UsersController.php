<?php 
class UsersController extends AppController{
	
	public function login() {
		
		//debug(AuthComponent::password($this->request->data['User']['password']));
	
		if ($this->Auth->login()){
			//$this->redirect('/');
			return $this->redirect($this->Auth->redirect());
			//$this->Session->setFlash(__('El email o la clave son incorrectas.'), 'default', array(), 'auth');
		}
	}
	
	function logout(){       
		$this->Auth->logout();
		//$this->redirect('login');
		$this->redirect($this->Auth->logout());
	}
	
} 
?>
