<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function liste(){
		$this->load->model('Objet');
        $this->load->model('Proposition');
		$data=array();
		$re=$this->Objet->listObjectbyIdUser(1);
        $ree=$this->Proposition->listeProposition(2);
		$data['listeObjet']=$re;
        $data['propo']=$ree;
		$this->load->view('User/mon',$data);
	}
}

?>