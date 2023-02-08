<?php

if ( ! defined('BASEPATH')) exit('No direct script acces allowed');

class User extends CI_Model
{

    public function is_logged($nom,$code)
    {
        $requete = $this->db->query("select count(*) as logged from user where nom='$nom' and mdp='$code' ");
        return $requete;
    }

    public function addUser($nom,$mdp){
        $sql="insert into user (nom,mdp) values(%s,%s)";
	    $sql=sprintf($sql,$this->db->escape($nom),$this->db->escape($mdp));
	    $query=$this->db->query($sql);
    }

    public function id($nom,$code)
    {
        $resultat=array(); 
        $sql="select * from user where nom=%s and mdp=%s limit 1";
	    $sql=sprintf($sql,$this->db->escape($nom),$this->db->escape($code));
	    $query=$this->db->query($sql);
        $resultat=$query->row_array();        
        return $resultat['idUser'];      
    }    
}
?>