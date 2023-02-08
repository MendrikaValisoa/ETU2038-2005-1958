
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All extends CI_Controller {
    public function liste(){
      $this->load->model('Categorie');
      $this->load->model('Objet');
      $categorie=array();
      $categorie['liste'] = $this->Categorie->listeCategorie();
      $categorie['obj'] = $this->Objet->findObjectbyIdCatUs(1,$_SESSION['idUser']);
      $this->load->view('User/allObjets',$categorie);
    }

    public function listObj($idcat){
      $this->load->model('Categorie');
      $this->load->model('Objet');
      $categorie=array();
      $categorie['liste'] = $this->Categorie->listeCategorie();
      $categorie['obj'] = $this->Objet->findObjectbyIdCatUs($idcat,$_SESSION['idUser']);
      $this->load->view('User/allObjets',$categorie);
    }

    public function recherche(){
      $keywords=$_POST['keywords'];
      $categorie = $_POST['categorie'];
      $this->load->model('Recherche');
      $objet = array();
      $this->load->model('Categorie');
      $objet['liste'] = $this->Categorie->listeCategorie();
      $objet['obj'] = $this->Recherche->chearche($keywords,$categorie);
      $this->load->view('User/allObjets',$objet);
    }
}

?>