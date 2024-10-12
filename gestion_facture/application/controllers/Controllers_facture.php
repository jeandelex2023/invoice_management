<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controllers_facture extends CI_Controller {
public function __construct(){
	//tsy afaka antsoina ny donnee membre ny fonction 1 raha toa ka ts ahitana constructeur ie: ampiasaina ny constructeur rah tehampiasa attribut na fonction
parent::__construct();
$this->load->model('Modele_facture','fi');

	}
    public function index()
    {
        $data['row']=$this->fi->getFacture();
        $this->load->view('index',$data);
 
    }
    function ajouter(){
            $data=array(
            "numeroFacture"=>$this->input->post('var_numeroFacture'),
			"nomClient_facture"=>$this->input->post('var_nomClient_facture'),
			"referenceFacture"=>$this->input->post('var_referenceFacture'),
			"dateFacture"=>$this->input->post('var_dateFacture'),
			"montantFacture"=>$this->input->post('var_montantFacture'),
            "totalFacture"=>$this->input->post('var_totalFacture'));
             
			$this->db->insert('facture',$data);
            redirect('Controllers_facture/index');             
        }
		
	function supprimer_les_donnees_apartir_de_id($var_numeroFacture){
                
            $this->db->where('numeroFacture' ,$var_numeroFacture);
            $this->db->delete('facture');
            
			echo "
			<script> alert('Attention'); </script>";
            $this->index();
             }
			 
	function metre_ajour_les_donnees(){
		
            $var_numeroFacture=$this->input->post('var_numeroFacture');
            $data=array(
            "numeroFacture"=>$this->input->post('var_numeroFacture'),
            "nomClient_facture"=>$this->input->post('var_nomClient_facture'),
            "referenceFacture"=>$this->input->post('var_referenceFacture'),
            "dateFacture"=>$this->input->post('var_dateFacture'),
            "montantFacture"=>$this->input->post('var_montantFacture'),
			"totalFacture"=>$this->input->post('var_totalFacture'));
            $this->db->where('numeroFacture',$var_numeroFacture);
            $this->db->update('facture' ,$data);
            redirect('Controllers_facture/index');
                 }
				 
	function recupperer_les_donnees_ds1_form($recharger_toutes_les_donnees_etre_ajours){
		
            $data['table_delex']=$this->fi->getFactureRow($recharger_toutes_les_donnees_etre_ajours);
            $this->load->view('Mise_ajourFacture',$data);
                          
                }
	
	public function imprimer_tout(){
                     $this->load->view('pdf/Impression_facture');
                }
 }