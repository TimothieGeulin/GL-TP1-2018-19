<?php

require('fpdf181/fpdf.php');


function em($word) {

    $word = str_replace("@","%40",$word);
    $word = str_replace("`","%60",$word);
    $word = str_replace("¢","%A2",$word);
    $word = str_replace("£","%A3",$word);
    $word = str_replace("¥","%A5",$word);
    $word = str_replace("|","%A6",$word);
    $word = str_replace("«","%AB",$word);
    $word = str_replace("¬","%AC",$word);
    $word = str_replace("¯","%AD",$word);
    $word = str_replace("º","%B0",$word);
    $word = str_replace("±","%B1",$word);
    $word = str_replace("ª","%B2",$word);
    $word = str_replace("µ","%B5",$word);
    $word = str_replace("»","%BB",$word);
    $word = str_replace("¼","%BC",$word);
    $word = str_replace("½","%BD",$word);
    $word = str_replace("¿","%BF",$word);
    $word = str_replace("À","%C0",$word);
    $word = str_replace("Á","%C1",$word);
    $word = str_replace("Â","%C2",$word);
    $word = str_replace("Ã","%C3",$word);
    $word = str_replace("Ä","%C4",$word);
    $word = str_replace("Å","%C5",$word);
    $word = str_replace("Æ","%C6",$word);
    $word = str_replace("Ç","%C7",$word);
    $word = str_replace("È","%C8",$word);
    $word = str_replace("É","%C9",$word);
    $word = str_replace("Ê","%CA",$word);
    $word = str_replace("Ë","%CB",$word);
    $word = str_replace("Ì","%CC",$word);
    $word = str_replace("Í","%CD",$word);
    $word = str_replace("Î","%CE",$word);
    $word = str_replace("Ï","%CF",$word);
    $word = str_replace("Ð","%D0",$word);
    $word = str_replace("Ñ","%D1",$word);
    $word = str_replace("Ò","%D2",$word);
    $word = str_replace("Ó","%D3",$word);
    $word = str_replace("Ô","%D4",$word);
    $word = str_replace("Õ","%D5",$word);
    $word = str_replace("Ö","%D6",$word);
    $word = str_replace("Ø","%D8",$word);
    $word = str_replace("Ù","%D9",$word);
    $word = str_replace("Ú","%DA",$word);
    $word = str_replace("Û","%DB",$word);
    $word = str_replace("Ü","%DC",$word);
    $word = str_replace("Ý","%DD",$word);
    $word = str_replace("Þ","%DE",$word);
    $word = str_replace("ß","%DF",$word);
    $word = str_replace("à","%E0",$word);
    $word = str_replace("á","%E1",$word);
    $word = str_replace("â","%E2",$word);
    $word = str_replace("ã","%E3",$word);
    $word = str_replace("ä","%E4",$word);
    $word = str_replace("å","%E5",$word);
    $word = str_replace("æ","%E6",$word);
    $word = str_replace("ç","%E7",$word);
    $word = str_replace("è","%E8",$word);
    $word = str_replace("é","%E9",$word);
    $word = str_replace("ê","%EA",$word);
    $word = str_replace("ë","%EB",$word);
    $word = str_replace("ì","%EC",$word);
    $word = str_replace("í","%ED",$word);
    $word = str_replace("î","%EE",$word);
    $word = str_replace("ï","%EF",$word);
    $word = str_replace("ð","%F0",$word);
    $word = str_replace("ñ","%F1",$word);
    $word = str_replace("ò","%F2",$word);
    $word = str_replace("ó","%F3",$word);
    $word = str_replace("ô","%F4",$word);
    $word = str_replace("õ","%F5",$word);
    $word = str_replace("ö","%F6",$word);
    $word = str_replace("÷","%F7",$word);
    $word = str_replace("ø","%F8",$word);
    $word = str_replace("ù","%F9",$word);
    $word = str_replace("ú","%FA",$word);
    $word = str_replace("û","%FB",$word);
    $word = str_replace("ü","%FC",$word);
    $word = str_replace("ý","%FD",$word);
    $word = str_replace("þ","%FE",$word);
    $word = str_replace("ÿ","%FF",$word);
    return $word;
}


class PDF extends FPDF
{
    // En-tete
    function Header()
    {
        // Logo
        $this->Image('logo_amu_rvb.jpg', 150, 6, 40, 16);
        // Police Arial gras 15
        $this->SetFont('Arial','B',15);
        // Decalage e droite
        $this->Cell(60);
        // Titre
        $title = 'Affectation des options :';
        $title = em($title);
        $title = urldecode($title);
        $this->Cell(70,10,$title,1,0,'C');
        // Saut de ligne
        $this->Ln(15);
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


$nomParcours = 'Licence 3 Informatique';    // temporaire le temps de les rentrer a la main
$anneeScolaire = '2018/2019';

/* * * * * * * * */
/* * * PDF 1 * * */
/* * * * * * * * */

//On met notre data dans un tableau pour simplifier l'écriture dans le pdf
$tableau_ligne = array();
$fichier = fopen("test.txt","r+");           
$contenu_fichier = file_get_contents('test.txt');
fwrite($fichier, $resultat);
$nb_etu = substr_count($contenu_fichier, "\n"); // Nombre d'etudiant total

for ($i=0; $i <= $nb_etu; $i++) { 
      $tableau_ligne[$i] = fgets($fichier); // lecture de fichier ligne par ligne 
}

//Création du pdf
$pdf = new PDF(); // Instanciation de la classe derivee
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','B',13);
$pdf->Cell(68);
$pdf->Cell(45, 0, $nomParcours,0,C); /* Création du pdf avec une police, une size etc */
$pdf->Ln(8);
$pdf->Cell(82);
$pdf->Cell(45, 0, $anneeScolaire,0,C);

$pdf->Ln(15);
$pdf->SetFont('Times','',12);

for ($i=1; $i <= $nb_etu; $i++) { 
   $tableau_ligne[$i] = utf8_decode($tableau_ligne[$i]); // Mettre tous les résultats en utf8
}

for ($i=1; $i <=$nb_etu; $i++) { 
   $tableau_ligne[$i] = str_replace('?', '*', $tableau_ligne[$i]); // Remplacer ? par *
   $tableau_ligne[$i] = str_replace(':', "\n", $tableau_ligne[$i]); // Remplacer ? par \n
   $tableau_ligne[$i] = str_replace(',', "\n", $tableau_ligne[$i]); // Remplacer ? par \n
}


for ($i=1; $i <=$nb_etu; $i++) { 
    $pdf->MultiCell(100,5,$tableau_ligne[$i],0,'L'); // Fonction pour écrire dans le pdf 
}   

$filename="Resultat_Affectation.pdf"; 
$pdf->Output();	

?>
