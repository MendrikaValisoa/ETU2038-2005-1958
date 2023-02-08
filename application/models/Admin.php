<?php 
  class Admin extends CI_Model{

    public function getNbrInscrit(){
      $sql = "select count(*) from user";
      $sql = sprintf($sql);
      $query = $this->db->query($sql);
      return $query->result_array();
    }
  }
?>