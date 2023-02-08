<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Echange extends CI_Controller {

    public function index($idObjet)
    {
    	$_SESSION['idObjet']=$idObjet;
		$this->load->model('Objet');
        $data = array();
        $ree=$this->Objet->listObjectbyIdUser(2);
        $data['objet'] = $ree;
        $data['idObjet'] = $idObjet;
        $this->load->view('User/Procecus',$data);
    }
    public function traitement($idObjet1,$idObjet2){
    	$this->load->model('Objet');
    	$user1=$this->Objet->findObjectbyId($idObjet1);
    	$user2=$this->Objet->findObjectbyId($idObjet2);
    	$this->load->model('Proposition');
    	$this->Proposition->insertProposition($idObjet1,$idObjet2,$user1['idUser'],$user2['idUser']);
        $data = array();
        $ree=$this->Objet->listObjectbyIdUser(2);
        $data['objet'] = $ree;
        $data['idObjet'] = $idObjet1;        
    	$this->load->view('User/Procecus',$data);

    }
    public function takalo($idProposition){
    	$this->load->model('Proposition');
    	$propo=$this->Proposition->getPropositionbyId($idProposition);
    	$this->Proposition->exangeProprietaire($propo['idObjet1'],$propo['idObjet2'],$propo['idUser1'],$propo['idUser2']);
    }

}