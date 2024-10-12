<?php

		// Malagasy : Delex no auteur
		// English: Design and Developped by Delex
//set_include_path(get_include_path().PATH_SEPARATOR.dirname(__FILE__)."base_url('assets/pdf')");
require('pdf/fpdf.php');
class PDF extends FPDF
{

		// Malagasy :Ity no kitiho raha hanova le en tete titre an le tableau ireo
		// English: This, you can modify and configure the header just using that below function property
function Header(){
		
		// Logo
		$this->Image('pdf/logo.png',10,6,30);  
		
		//Police Arial gras 15
		$this->SetFont('Arial','B',14);
		
		//Décalage à droite
		$this->Cell(80);
		//Titre
		$this->Cell(30,30,'SOCIETE AUXILLIAIRE MARITIME DE MADAGASCAR',0,0,'C');
									$this->Ln(15);
				   $this->Cell(200,10,'__________________________________________________',0,0,'C');
		$this->Ln(10);
		 $this->Cell(200,10,'LISTE DE FACTURES',0,0,'C');
									$this->Ln(5);
			$this->Cell(200,10,'***************',0,0,'C');
		//Saut de ligne
		$this->Ln(20);

}

		// Malagasy :Ity no kitiho ra hikitikitika ny elemnt sy le tableau ianao
		// English: This, try to configure these below if you want to modify the table content element
function BasicTable($header)
{
		 // Colors, line width and bold font
		$this->SetFillColor(0,90,100);
		$this->SetTextColor(255);
		$this->SetDrawColor(0,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		
		// Header
		$w = array(30, 30, 30, 30, 30, 30); // Str 6 ny element anaty table mysql any de zay no dikan io zvtr ireo
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		$this->Ln();
		
		// Color and font restoration
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		
		// Requette
		mysql_connect("127.0.0.1", "root", "") or die(mysql_error()); 
		mysql_select_db("gestion_caissiere") or die(mysql_error()); 
		$query ="SELECT * FROM facture";
		$data=mysql_query($query);
		$fill=false;
		$i = 0 ;
		while($row=mysql_fetch_object($data)){
		/*<button type="submit" class="btn btn-primary">Submit</button>*/
			$this->Cell($w[0],6,$row->numeroFacture,'LR',0,'L',$fill);
			$this->Cell($w[1],6,$row->nomClient_facture,'LR',0,'L',$fill);
			$this->Cell($w[2],6,$row->referenceFacture,'LR',0,'L',$fill);
			$this->Cell($w[3],6,$row->dateFacture,'LR',0,'L',$fill);
			$this->Cell($w[4],6,$row->montantFacture,'LR',0,'L',$fill);
			$this->Cell($w[5],6,$row->totalFacture,'LR',0,'L',$fill);
			$this->Ln();
			$fill = !$fill;
			$i++;
		}
		// Closing line
		$this->Cell(array_sum($w),0,'','T');
}

		// Malagasy :Ity no kitiho raha tehanova le pied de page an le papier ho impimen ianao
		// English: but if you want to change the footer one , you can modify it. take care about the property
function Footer()
{
		//Positionnement à 1,5 cm du bas
		$this->SetY(-15);
		//Police Arial italique 8
		$this->SetFont('Arial','I',8);
		
		//Numéro de page
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
//--
}
$pdf = new PDF();

		// Column headings
		$header = array('Numero', 'Client', 'Reference', 'Date', 'Montant', 'Total');
		$pdf->SetAuthor('TRC');
		$pdf->SetTitle('Liste');
		$pdf->SetSubject('Listes des factures imprimées');
		$pdf->SetCreator('premiere pas en codeigiter ->Delex yan ty');
		$pdf->SetFont('Arial','',12);
		$pdf->AddPage();
		$pdf->BasicTable($header);
		$pdf->AliasNBPages();
		// sortie du fichier
		$pdf->Output('liste_des_factures.pdf', 'I');
?>