<?php 
  class Objet extends CI_Model{

    public function insertObject($nom,$idCategore,$idUser,$sary,$prix,$description){
      $sql="insert into objet values(NULL,%s,%s,%s,%s,%s,%s)";
	    $sql=sprintf($sql,$this->db->escape($nom),$this->db->escape($idCategore),$this->db->escape($idUser),$this->db->escape($sary),$this->db->escape($prix),$this->db->escape($description));
	    $query=$this->db->query($sql);
    }

    public function listObjectbyIdUser($client){
      $sql = "select * from objet where idUser = %s";
      $sql = sprintf($sql,$this->db->escape($client));
      $query = $this->db->query($sql);
      return $query->result_array();
    }

    public function listObjectbyIdOther($client){
      $sql = "select * from objet where idUser != %s";
      $sql = sprintf($sql,$this->db->escape($client));
      $query = $this->db->query($sql);
      return $query->result_array();
    }

    public function updateObject($idobj,$categore,$nom,$sary,$prix,$description){
      $sql="update objet set idCategore=%d ,nom=%s,sary=%s,prix=%d,description=%s where idObjet=%s";
	    $sql=sprintf($sql,$this->db->escape($categore),$this->db->escape($nom),$this->db->escape($sary),$this->db->escape($prix),$this->db->escape($description),$this->db->escape($idobj));
	    $query=$this->db->query($sql);
    }

    public function deleteObject($idobject){
      $sql = "delete from objet where idObjet = %s";
      $sql = sprintf($sql,$this->db->escape($idobject));
      $query = $this->db->query($sql);
    }

    public function findObjectbyId($id){
      $sql = "select * from objet where idObjet = %s limit 1";
      $sql = sprintf($sql,$this->db->escape($id));
      $query = $this->db->query($sql);
      return $query->row_array();
    }

    public function findObjectbyIdCatUs($idcat,$idUser){
      $sql = "select * from objet where idUser = %s and idCategore = %s";
      $sql = sprintf($sql,$this->db->escape($idUser),$this->db->escape($idcat));
      $query = $this->db->query($sql);
      return $query->result_array();
    }

  }
?>