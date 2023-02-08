<?php 
  class Recherche extends CI_Model{
    public function chearche($keywords,$categorie){
      if ($categorie==0) {
        $sql = "select * from objet where nom like '%".$keywords."%'";
        // $sql = sprintf($sql);
        $query = $this->db->query($sql);
        return $query->result_array();
      }else{
        $sql = "select * from objet where nom like '%".$keywords."%' and idCategore=".$categorie."";
        // $sql = sprintf($sql,$this->db->escape($categorie));
        $query = $this->db->query($sql);
        return $query->result_array();
      }
    }
  }
?>