<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ile_controller extends Back_Controller {	

	public function index()
	{
		$a_data = array(
                    "iles" => $this->lib_orm_ile->GetListeIle('id', array())
                );		

		$this->template->title('Beyond','Caribbean', 'Connexion');
		$this->template->set_partial('content','beyond/ile/list', $a_data);
		$this->template->build('beyond/beyond_template');
		
	}

	public function edit($ile_id){
		$a_data = array(
                    "ile" => $this->lib_orm_ile->GetIle($ile_id, true)
                );

		$this->template->title('Caribbean', 'Connexion');
		$this->template->set_partial('content','beyond/ile/edit', $a_data);
		$this->template->build('beyond/beyond_template');
	}
        
        public function newIle(){

		$this->template->title('Caribbean', 'Connexion');
		$this->template->set_partial('content','beyond/ile/new', array());
		$this->template->build('beyond/beyond_template');
	}
}


