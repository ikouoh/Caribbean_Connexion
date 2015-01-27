<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beyond_controller extends Back_Controller {	

	public function index()
	{
		$a_data = array(
                    "is_admin" => (isset($_SESSION["admin"]))?$_SESSION["admin"]:false
                );

		$this->template->title('Beyond','Caribbean', 'Connexion');
		$this->template->set_partial('content','beyond/beyond', $a_data);
		$this->template->build('beyond/beyond_template');
		
	}

        public function set_database(){
		$em = $this->doctrine->em;
		$schemaTool = new \Doctrine\ORM\Tools\SchemaTool($em);
		$classes = $em->getMetadataFactory()->getAllMetadata();
		//$schemaTool->dropSchema($classes);
		//$schemaTool->createSchema($classes);
		$schemaTool->updateSchema($classes);
                
                $this->template->title('Beyond','Caribbean', 'Connexion');
		$this->template->set_partial('content','beyond/setdata', array());
		$this->template->build('beyond/beyond_template');
	}
}
