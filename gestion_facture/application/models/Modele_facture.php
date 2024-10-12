<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Modele_facture extends CI_Model{
	public function getFacture()
 {
			$query = $this->db->get('facture');
			return $query->result();

  }
	function getFactureRow($var_numeroFacture){
			$this->db->where('numeroFacture',$var_numeroFacture);
			$query = $this->db->get('facture');
			return $query->row();


 }
	function search_mytable($var_numeroFacture, $var_nomClient_facture) {
			return $this->db->select('*')
				->from($this->tables) 
				->like('numeroFacture',$var_numeroFacture)
				->or_like('nomClient_facture', $var_nomClient_facture)
				->get()
				->result();
}

}