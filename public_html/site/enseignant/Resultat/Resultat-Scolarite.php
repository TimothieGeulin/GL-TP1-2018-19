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
/* * * PDF 2 * * */
/* * * * * * * * */


$tableau_ligne_scolarite = array();
$fichier_scolarite = fopen("test2.txt","r+");
fwrite($fichier_scolarite, $scolarite);
$contenu_fichier_scolarite = file_get_contents('test2.txt');

$nb_ligne = substr_count($contenu_fichier_scolarite, "\n");
$nb_ligne = $nb_ligne - 2;

for ($i=0; $i < $nb_ligne; $i++) { 
      $tableau_ligne_scolarite[$i] = fgets($fichier_scolarite); // lecture de fichier ligne par ligne scolarite     
}




// Création du pdf
$pdf2 = new PDF(); 
$pdf2->AliasNbPages();
$pdf2->AddPage();

$pdf2->SetFont('Arial','B',13);
$pdf2->Cell(68);
$pdf2->Cell(45, 0, $nomParcours,0,C); /* Création du pdf avec une police, une size etc */
$pdf2->Ln(8);
$pdf2->Cell(82);
$pdf2->Cell(45, 0, $anneeScolaire,0,C);

$pdf2->Ln(15);
$pdf2->SetFont('Times','',12);


for ($i=0; $i <= $nb_ligne; $i++) { 
   $tableau_ligne_scolarite[$i] = utf8_decode($tableau_ligne_scolarite[$i]); // Mettre tous les résultats en utf8
}

for ($i=0; $i <=$nb_ligne; $i++) { 
   $tableau_ligne_scolarite[$i] = str_replace('$', "\n", $tableau_ligne_scolarite[$i]); // Remplacer ? par *
   $tableau_ligne_scolarite[$i] = str_replace(':', "\n", $tableau_ligne_scolarite[$i]); // Remplacer ? par \n
   $tableau_ligne_scolarite[$i] = str_replace(',', "\n", $tableau_ligne_scolarite[$i]); // Remplacer ? par \n
}

for ($i=0; $i <=$nb_ligne; $i++) { 

    if(strpos($tableau_ligne_scolarite[$i], '*') !== false){
        $pdf2->Ln(10); 
        $pdf2->SetFont('Arial','B',13);
        $pdf2->MultiCell(100,5,$tableau_ligne_scolarite[$i],0,'L');
        //echo '<br/>';
    }

    else if (strpos($tableau_ligne_scolarite[$i], 'Option n') !== false) {
        $pdf2->SetFont('Arial','B',17);
        $pdf2->Cell(43);
        $pdf2->MultiCell(100,5,$tableau_ligne_scolarite[$i],0,'C');
        //echo '<br/>';
        $pdf2->Ln(10);
    }
    
    else{
        $pdf2->SetFont('Times','',12);
        $pdf2->Cell(10);
        $pdf2->MultiCell(100,5,$tableau_ligne_scolarite[$i],0,'L'); // Fonction pour écrire dans le pdf 
        //echo '<br/>';  
    }
} 

$filename2="Resultat_Affectation_Scolarite.pdf";  
$pdf2->Output();

?>