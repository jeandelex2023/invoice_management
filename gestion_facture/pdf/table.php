<?php
require('fpdf.php');

class PDF extends FPDF
{
// en-tête
function Header()
{
	// Logo
    $this->Image('logo.png',10,6,30);
    //Police Arial gras 15
    $this->SetFont('Arial','B',14);
    //Décalage à droite
    $this->Cell(80);
    //Titre
    $this->Cell(30,10,'Essai PDF Membres',0,0,'C');
    //Saut de ligne
    $this->Ln(20);
	}

function BasicTable($header, $data)
{
     // Colors, line width and bold font
    $this->SetFillColor(0,200,240);
    $this->SetTextColor(255);
    $this->SetDrawColor(0,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(40, 35, 40, 45);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
	 // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
	 $fill = false;
    for($i=0;$i<4;$i++)
    {
        $this->Cell($w[0],6,$data[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$data[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,$data[2],'LR',0,'L',$fill);
        $this->Cell($w[3],6,$data[3],'LR',0,'L',$fill);
        $this->Ln();
		$fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
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
$data = array('1','2','3','4');
$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');

$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();
?>