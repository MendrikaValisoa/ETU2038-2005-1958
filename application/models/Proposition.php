<?php 

class Proposition extends CI_Model {
    public function listeProposition($idUser){
      $sql = "select * from Proposition where idUser1 != %s and etat=0";
      $sql = sprintf($sql,$this->db->escape($idUser));
      $query = $this->db->query($sql);
      return $query->result_array();
    }	
    public function exangeProprietaire($idObjet1,$idObjet2,$user1,$user2){
      $sql="update objet set idUser=%s where idObjet=%s";
      $sql=sprintf($sql,$this->db->escape($user1),$this->db->escape($idObjet2));
      $sql1="update objet set idUser=%s where idObjet=%s";
      $sql1=sprintf($sql,$this->db->escape($user2),$this->db->escape($idObjet1));
      $this->db->query($sql);
      $this->db->query($sql1);
  	}

    public function insertProposition($idObjet1,$idObjet2,$user1,$user2){
      $sql = "insert into proposition values(null,%s,%s,%s,%s,0)";
      $sql = sprintf($sql,$user1,$idObjet1,$user2,$idObjet2);
      $query = $this->db->query($sql);    	
    }
    public function getPropositionbyId($idProposition){
    	$sql = "select * from proposition where idProposition=%s";
      $sql = sprintf($sql,$this->db->escape($idProposition));
      $query = $this->db->query($sql);
      return $query->result_array();
    }
}


?>