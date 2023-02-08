<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjoutObjet extends CI_Controller {
	public function add(){
		$this->load->model('Categorie');
		$data=array();
		$re=$this->Categorie->listeCategorie();
		$data['listeCategorie']=$re;
		$this->load->view('User/ajouter',$data);
	}
	public function addIt(){
		
        print_r($_POST);
        
        print_r($_FILES);
        if($_FILES){
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file')  )
                {
                        $error = array('error' => $this->upload->display_errors());
                        die("Error");
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $fileName=$data['upload_data']['file_name'];
                        $prix=$_POST['prix'];
                        $description=$_POST['description'];
                        $categorie=$_POST['categorie'];
                        $nom=$_POST['nom'];
                        $this->load->model('Objet');
                        $query=$this->Objet->insertObject($nom,$categorie,2,$fileName,$prix,$description);
                        if($query){
                            $this->session->set_flashdata('inserted','yes');
                            redirect('AjoutObjet/add');
                        }else{

                            redirect('AjoutObjet/addIt');
                        }
                }           
        }else{

        }
	}

    public function supprimer($idObjet){
        $this->load->model('Objet');
        $this->load->model('Proposition');
        $data = array();
        $req=$this->Objet->deleteObject($idObjet);
        $re=$this->Objet->listObjectbyIdUser($_SESSION['idUser']);
        $ree=$this->Proposition->listeProposition($_SESSION['idUser']);
		$data['listeObjet']=$re;
        $data['propo']=$ree;
        $data['objet']=$req;
        $data['idObjet'] = $idObjet; 
        $this->load->view('User/mon',$data);         
    }

    public function modifier($idObjet){
        $this->load->model('Categorie');
        $this->load->model('Objet');
        $data=array();
        $re=$this->Categorie->listeCategorie();
        $ree=$this->Objet->findObjectbyId($idObjet);
        $data['listeCategorie']=$re;
        $data['objet']=$ree;
        $data['idObjet'] = $idObjet;
        $this->load->view('User/modifier',$data);        
    }	
    
    public function update($idObjet){        
        if($_FILES){
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        die("Error");
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $fileName=$data['upload_data']['file_name'];
                        $prix=$_POST['prix'];
                        $description=$_POST['description'];
                        $categorie=$_POST['categorie'];
                        $nom=$_POST['nom'];
                        $this->load->model('Objet');
                        $query=$this->Objet->updateObject($idObjet,$categorie,$nom,$fileName,$prix,$description);
                        if($query){
                            $this->session->set_flashdata('inserted','yes');        
                            redirect('Profile/liste');
                        }else{

                            redirect('Profile/liste');
                        }
                }           
        }else{

        }        
    }
}

?>