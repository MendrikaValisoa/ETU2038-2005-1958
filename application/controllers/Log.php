
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

    public function index()
    {
        $this->load->view('User/log');
    }


    public function accueilAdmin()
    {
        $this->load->model('Categorie');
        $data = array();
        $data['content'] = 'Admin/Categorie'; 
        $data['categorie'] = $this->Categorie->listeCategorie();      
        $this->load->view('Admin/accueilAdmin',$data);
    }
 
    public function login()
    {
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->model('User');
        $pseudo = $this->input->post("pseudo");
        $mdp = $this->input->post("mdp");   
        $logged = $this->User->is_logged($pseudo,$mdp);
        $auth = $logged->row_array();
        if($auth['logged'] == 1)
        {
            $id=$this->User->id($pseudo,$mdp);
            $_SESSION['idUser'] = $id;

            $this->load->model('Objet');
            $data = array();
            $data['content'] = 'User/content'; 
            $data['liste'] = $this->Objet->listObjectbyIdOther($id); 
            
          
            $this->load->view('User/accueilUser',$data);
        }
        else if ($this->input->post('pseudo')=='doda' && $this->input->post('mdp')=='123') {
 
            redirect('Log/accueilAdmin');
        }
        else  {              
        $this->session->set_flashdata('incorrect','Mail ou mot de passe icorrect');  
        $this->session->flashdata('incorrect');
        redirect('Log/index');  
        }
    }

    public function insertCat(){
        $this->load->model('Categorie');
        $nom = $this->input->post('nom');
        $this->Categorie->addCategorie($nom);
        redirect(site_url('Log/accueilAdmin'));
    }

    public function inscrire(){
        $this->load->view('User/Inscription');
    }

    public function inscription(){
        $this->load->model('User');
        $nom = $this->input->post('nom');
        $mdp = $this->input->post('mdp');
        $this->User->addUser($nom,$mdp);
        redirect(site_url('Log/accueilUser'));   
    }
}
?>