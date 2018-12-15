<?php

   	if(time() < mktime(0,0,0,11,29,2018)){
		header("Location: http://sebastien.lamblin.etu.perso.luminy.univ-amu.fr/formulaire.php");
	}
	else{
		header("Location: http://sebastien.lamblin.etu.perso.luminy.univ-amu.fr/plusdispo.php");
	}
?>