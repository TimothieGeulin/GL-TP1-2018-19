<?php
require('fpdf181/fpdf.php');

class PDF extends FPDF
{
// En-tete
function Header()
{
	// Logo
	$this->Image('logo_amu_rvb.jpg', 165, 6, 40, 16);
	// Police Arial gras 15
	$this->SetFont('Arial','B',15);
	// Decalage e droite
	$this->Cell(45);
	// Titre
	$title = 'Affectation des options 2018/2019 : é'
	$title = iconv('UTF-8', 'windows-1252', $title);

	$this->Cell(90,10,$title,1,0,'C');
	// Saut de ligne
	$this->Ln(20);
}

// Pied de page
function Footer()
{
	// Positionnement e 1,5 cm du bas
	$this->SetY(-15);
	// Police Arial italique 8
	$this->SetFont('Arial','I',8);
	// Numero de page
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation de la classe derivee
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
	$pdf->Cell(0,10,'Impression de la ligne numero '.$i,0,1);
$pdf->Output();
?>
