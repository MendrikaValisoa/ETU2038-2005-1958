<?php
defined('BASEPATH') OR exit('No direct script acces allowed');


	function findObjectbyId($id){
      $sql = "select * from objet where idObjet = %s limit 1";
      $sql = sprintf($sql,$this->db->escape($id));
      $query = $this->db->query($sql);
      return $query->row_array();
    }
      


?>