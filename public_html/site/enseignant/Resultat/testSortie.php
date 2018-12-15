<?php

require('fpdf181/fpdf.php');
include("Affectation2.php");

/* * * * * * * * */
/* * * PDF 1 * * */
/* * * * * * * * */

//On met notre data dans un tableau pour simplifier l'écriture dans le pdf
$tableau_ligne = array();

$fichier = fopen("test.txt","w+");   
fwrite($fichier, $resultat);


/* * * * * * * * */
/* * * PDF 2 * * */
/* * * * * * * * */


$tableau_ligne_scolarite = array();
$fichier_scolarite = fopen("test2.txt","w+");
fwrite($fichier_scolarite, $scolarite);
