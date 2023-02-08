<?php 
  class Insert extends CI_Model{
      public function addPhoto($idObjet,$photo){
        $sql="insert into photo (idObjet,photo) values(%s,%s)";
        $sql=sprintf($sql,$this->db->escape($idObjet),$this->db->escape($photo));
        $query=$this->db->query($sql);
      }
  }


?>