<?php
// la classe de fonctions
define('FPDF_FONTPATH','../fpdf/font/');
require('../fpdf/fpdf.php');
// connexion base de données
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "documentation";
function connect($db_server, $db_user, $db_pass, $db) {
    if (!($link=mysql_connect($db_server,$db_user,$db_pass))) {
        exit();
    }
    if (!(mysql_select_db($db,$link))) {
        exit();
    }
    return $link;
}
$connexion=connect($db_server,$db_user,$db_pass,$db_name);

// classe étendue pour créer en-tête et pied de page
class PDF extends FPDF
{
// en-tête
function Header()
{
    //Police Arial gras 15
    $this->SetFont('Arial','B',14);
    //Décalage à droite
    $this->Cell(80);
    //Titre
    $this->Cell(30,10,'Essai PDF Membres',0,0,'C');
    //Saut de ligne
    $this->Ln(20);
	}

// pied de page
function Footer()
{
    //Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    //Police Arial italique 8
    $this->SetFont('Arial','I',8);
    //Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
// création du pdf
$pdf=new PDF();
$pdf->SetAuthor('Josue Yhalaibar');
$pdf->SetTitle('Mon joli fichier');
$pdf->SetSubject('Un exemple de création de fichier PDF');
$pdf->SetCreator('Yhalaibar');
$pdf->AliasNBPages();
$pdf->AddPage();

// requête
$sql = mysql_query("SELECT * FROM membre");

// on boucle  
    while ($row = mysql_fetch_object($sql)) {
        //$numero = $row["num_inscription"];
        $nom = $row->nom_visit;
       // $prenoms = $row["prenom_visit"];
        // titre en gras
        $pdf->SetFont('Arial','B',10);
        $pdf->Write(5,$titre);
		      $pdf->Ln();
        // description
        $pdf->SetFont('Arial','',10);
        $pdf->Write(3,$nom);
        $pdf->Ln();
        $pdf->Ln();
    }
// sortie du fichier
$pdf->Output('fichierko.pdf', 'I');
?>