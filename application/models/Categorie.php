<?php 

class Categorie extends CI_Model {

    public function listeCategorie() {
	    $query = $this->db->query('SELECT * FROM categorie');
	    return $query->result_array();
    }

    public function addCategorie($nom){
        $sql="insert into categorie (nom) values(%s)";
	    $sql=sprintf($sql,$this->db->escape($nom));
	    $query=$this->db->query($sql);
    }
}


?>