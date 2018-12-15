<?php
  include("formulairebdd2.php");
?>

<!doctype html>

<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <title>Formulaire</title>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		
</head>
<body>
  <style>
                                                  /* Coin CSS */
  input[type=number]{
      width:30%;
      background-color:#2ECCFA;
      color:#fff;
      border:2px solid #06F;
      padding:10px;
      font-size:20px;
      cursor:pointer;
      border-radius:5px;
      margin-bottom:15px;
      text-align: center; 
    }

  </style>
                     
<div class="haut"></div>
<p style="text-align: center;"><img src="logo_amu_rvb" style="width: 650px;height: 220px;"></p>
  <div id="section" style="margin: auto;">
    <div id="test">


     									<!-- Récuperation du numéro etudiant -->

      <div class="encadrer">
      	<p>Numéro étudiant<h3><?php echo ''.$_SERVER['REMOTE_USER'].'';?></h3></p>     
      </div>

     									 <!-- Création du formulaire -->
    <form method="POST" id="form2" action="acualiserBDetu.php" style="text-align: center; display: block;"> 
      <div class="login">

      					<!-- Actualisation des credits en direct via la variable $credit1 -->
        <p style="font-size: large;">Crédit(s) disponible(s)<div class="creditopt1" style="font-size: xx-large;"><?php echo $credit1; ?></div></p>

						<!-- Création du nombre de matiére que l'on souhaite via notre bdd pour le formulaire 1 -->
        	 <h2>Option 1</h2>
             <div style="font-size:25px;" id="container2" onFocus="javascript:this.value=''" onkeypress="verifierCaracteres(event); return false;"> 
             <br>
             </div>	
        
      </div>
    <div id="test">

          <div class="login2" style=" width:35%;margin:50px auto; font:Cambria, 
          'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; border-radius:10px;
      border:2px solid #ccc;padding:10px 40px 25px;float: right;margin-right: 2%; margin-top: -2%;">

						<!-- Actualisation des credits en direct via la variable $credit1 -->
            <p style="font-size: large;">Crédit(s) disponible(s) <div class="creditopt2" style="font-size: xx-large;"><?php echo $credit2; ?></p></div>
          

              <h2>Option 2</h2>

             			<!-- Création du nombre de matiére que l'on souhaite via notre bdd pour le formulaire 2 -->
                <div style="font-size:25px;" id="container" onFocus="javascript:this.value=''" onkeypress="verifierCaracteres(event); return false;">  
                <br>
              </div>
              <br>
              

            </div>
          </div>
  
    </div>
        <span><?php echo $error; ?></span>
    </div>
    <!-- Boutton envoyer qui est activer si toutes les conditions sont remplis -->
    <input style="margin-left: 38%;" type="submit" value="Envoyer" name="submitsuivant" disabled="true" id="submitsuivant">
  </form>

  <div class="footer" style="text-align: center;"> Affectation des options 1</div>
  <script>
// Coté JS qui nous permet une actualisation en temps réel des données et des contraintes du formulaire
    var credit1 = '<?php echo $credit1; ?>'; // Credits actuels form 1
    var maxcredit1 = '<?php echo $maxcredit1; ?>'; // Maximum des credits que l'on peut avoir sur une seule matiére soit 70% des credits1
    maxcredit1 = Math.round(maxcredit1); // Arrondi de notre maxcredits1
    var credit2 = '<?php echo $credit2; ?>'; // Credits actuels form 2
    var maxcredit2 = '<?php echo $maxcredit2; ?>'; // Maximum des credits que l'on peut avoir sur une seule matiére soit 70% des credits2
    maxcredit2 = Math.round(maxcredit2); // Arrondi de notre maxcredits2
    var tableau = []; // Récupérer les données via notre bdd pour le form 2
    var tableau2 = []; // Récupérer les données via notre bdd pour le form 1
    var OptionJ1 = []; // Récupére nos données pour actualisé nos contraintes dans un tableau pour le form 1
    var OptionJ2 = []; // Récupére nos données pour actualisé nos contraintes dans un tableau pour le form 2
    var tmp = 0;
    var tmp2 = 0;

    var valider1; // Validation formulaire 1
    var valider2; // Validation formulaire 2
    var compteur1 = 0; // compte le nombre de matiere enregistrer J1
    var compteur2 = 0; // compte le nombre de matiere enregistrer J2


    var moitieMin1 = credit1/2; // Nombre de matiéres minimum a séléctionné pour envoyer le formulaire 1
    half1 = credit1/2; // Nombre de credits divisés par 2 pour pouvoir travailler dans nos boucle pour form 1
    half2 = credit2/2; // Nombre de credits divisés par 2 pour pouvoir travailler dans nos boucle pour form 1
    moitieMin1 = moitieMin1 * 0.5;
    moitieMin1 = Math.round(moitieMin1); // arrondi
    
    var moitieMin2 = credit2/2; // Nombre de matiéres minimum a séléctionné pour envoyer le formulaire 2
    moitieMin2 = moitieMin2 * 0.5;
    moitieMin2 = Math.round(moitieMin2); // arrondi

    tableau2[0] = '<?php echo $TabResultat0[0]; ?>';
    tableau2[1] = '<?php echo $TabResultat1[0]; ?>';
    tableau2[2] = '<?php echo $TabResultat2[0]; ?>';
    tableau2[3] = '<?php echo $TabResultat3[0]; ?>';
    tableau2[4] = '<?php echo $TabResultat4[0]; ?>';
    tableau2[5] = '<?php echo $TabResultat5[0]; ?>';
    tableau2[6] = '<?php echo $TabResultat6[0]; ?>';
    tableau2[7] = '<?php echo $TabResultat7[0]; ?>';
    tableau2[8] = '<?php echo $TabResultat8[0]; ?>'; // Recopie du nom des matiéres pour le jour 1 via bdd
    tableau2[9] = '<?php echo $TabResultat9[0]; ?>';
    tableau2[10] = '<?php echo $TabResultat10[0]; ?>';
    tableau2[11] = '<?php echo $TabResultat11[0]; ?>';
    tableau2[12] = '<?php echo $TabResultat12[0]; ?>';
    tableau2[13] = '<?php echo $TabResultat13[0]; ?>';
    tableau2[14] = '<?php echo $TabResultat14[0]; ?>';
    tableau2[15] = '<?php echo $TabResultat15[0]; ?>';
    tableau2[16] = '<?php echo $TabResultat16[0]; ?>';
    tableau2[17] = '<?php echo $TabResultat17[0]; ?>';
    tableau2[18] = '<?php echo $TabResultat18[0]; ?>';
    tableau2[19] = '<?php echo $TabResultat19[0]; ?>';
    tableau2[20] = '<?php echo $TabResultat20[0]; ?>';
    tableau2[21] = '<?php echo $TabResultat21[0]; ?>';


    tableau[0] = '<?php echo $TabResultat0_2[0]; ?>';
    tableau[1] = '<?php echo $TabResultat1_2[0]; ?>';
    tableau[2] = '<?php echo $TabResultat2_2[0]; ?>';
    tableau[3] = '<?php echo $TabResultat3_2[0]; ?>';
    tableau[4] = '<?php echo $TabResultat4_2[0]; ?>';
    tableau[5] = '<?php echo $TabResultat5_2[0]; ?>';
    tableau[6] = '<?php echo $TabResultat6_2[0]; ?>';
    tableau[7] = '<?php echo $TabResultat7_2[0]; ?>';
    tableau[8] = '<?php echo $TabResultat8_2[0]; ?>';
    tableau[9] = '<?php echo $TabResultat9_2[0]; ?>';
    tableau[10] = '<?php echo $TabResultat10_2[0]; ?>'; // Recopie du nom des matiéres pour le jour 2 via bdd 
    tableau[11] = '<?php echo $TabResultat11_2[0]; ?>';
    tableau[12] = '<?php echo $TabResultat12_2[0]; ?>';
    tableau[13] = '<?php echo $TabResultat13_2[0]; ?>';
    tableau[14] = '<?php echo $TabResultat14_2[0]; ?>';
    tableau[15] = '<?php echo $TabResultat15_2[0]; ?>';
    tableau[16] = '<?php echo $TabResultat16_2[0]; ?>';
    tableau[17] = '<?php echo $TabResultat17_2[0]; ?>';
    tableau[18] = '<?php echo $TabResultat18_2[0]; ?>';
    tableau[19] = '<?php echo $TabResultat19_2[0]; ?>';
    tableau[20] = '<?php echo $TabResultat20_2[0]; ?>';
    tableau[21] = '<?php echo $TabResultat21_2[0]; ?>';

    

     $(document).ready(function() {
      
      function load_fonction(){

         
      
            compteur1 = 0;

            for(var a = 0; a < half1; a++){
              OptionJ1[a] = document.getElementById("Option"+(a+1)).value;
            }
            for(var a = 0; a < half1; a++){
              if(OptionJ1[a] > maxcredit1){
                alert("Nombre de crédits invalide sur le formulaire de L'option 1");
                  $('input[type="submit"]').removeClass("idleField").addClass("idle");  
                document.getElementById('submitsuivant').disabled = true;
                displayBoxes2(); // reset formulaire si mauvaise valeur
              }
            }

            for(var a = 0; a < half1; a++){
              if(OptionJ1[a] == credit1){
                alert("Nombre de crédits invalide sur le formulaire de L'option 1");
                $('input[type="submit"]').removeClass("idleField").addClass("idle");  
                document.getElementById('submitsuivant').disabled = true;
                   displayBoxes2(); // reset formulaire si mauvaise valeur
              }

            }
          tmp = 0;
            for(var a = 0; a < half1; a++){
              tmp += parseInt(OptionJ1[a]);
            }


            if(credit1 - tmp < 0){
                alert("Nombre de crédits invalide sur le formulaire de L'option 1");
                $('input[type="submit"]').removeClass("idleField").addClass("idle");    
                document.getElementById('submitsuivant').disabled = true;
                  displayBoxes2(); 
            }
            
            compteur1 = 0;
            for(var a = 0; a < half1; a++){
                if(OptionJ1[a] > 0){
                  compteur1++;
                }
            }
            CreditFinal1 = 0;
            for(var a = 0; a < half1; a++){
              CreditFinal1 += parseInt(OptionJ1[a]);
            }
            valider1 = 0;
            if(CreditFinal1 == credit1){
              valider1 = 1;
            }

            if(valider1 == 1 && valider2 == 1){
              if(compteur1 >= moitieMin1 && compteur2 >= moitieMin2){
                $('input[type="text"]').addClass("idle"); 
                document.getElementById('submitsuivant').disabled = false;
              }
            }
            if(CreditFinal1 != credit1){
              $('input[type="submit"]').removeClass("idleField").addClass("idle");   
              document.getElementById('submitsuivant').disabled = true;
            }
        

        $.post("test.php", $("#form2").serialize(), function(data) {
          $(".creditopt1").text(data);

        });
      }

      setInterval(load_fonction,100)
    });


 $(document).ready(function() {
    
    function load_fonction2(){

      compteur2 = 0;

      for(var a = 0; a < half2; a++){
        OptionJ2[a] = document.getElementById("Option"+(a+1)+"_2").value;
      }
      for(var a = 0; a < half2; a++){
        if(OptionJ2[a] > maxcredit2){
          alert("Nombre de crédits invalide sur le formulaire de L'option 2");
          $('input[type="submit"]').removeClass("idleField").addClass("idle");   
                document.getElementById('submitsuivant').disabled = true;
          displayBoxes(); // reset formulaire si mauvaise valeur
        }
      }

      for(var a = 0; a < half2; a++){
        if(OptionJ2[a] == credit2){
          alert("Nombre de crédits invalide sur le formulaire de L'option 2");
          $('input[type="submit"]').removeClass("idleField").addClass("idle");    
                document.getElementById('submitsuivant').disabled = true;
            displayBoxes(); // reset formulaire si mauvaise valeur
        }

      }
    tmp2 = 0;
      for(var a = 0; a < half2; a++){
        tmp2 += parseInt(OptionJ2[a]);
      }


      if(credit2 - tmp2 < 0){
          alert("Nombre de crédits invalide sur le formulaire de L'option 2");
          $('input[type="submit"]').removeClass("idleField").addClass("idle");  
                document.getElementById('submitsuivant').disabled = true;
            	displayBoxes(); 
      }
      
      compteur2 = 0;
      for(var a = 0; a< half2; a++){
          if(OptionJ2[a] > 0){
            compteur2++;
          }
      }
      CreditFinal2 = 0;
      for(var a = 0; a < half2; a++){
        CreditFinal2 += parseInt(OptionJ2[a]);
      }
      valider2 = 0;
      if(CreditFinal2 == credit2){
        valider2 = 1;
      }

      if(valider1 == 1 && valider2 == 1){
        if(compteur1 >= moitieMin1 && compteur2 >= moitieMin2){
          $('input[type="submit"]').addClass("idleField");
          document.getElementById('submitsuivant').disabled = false;
        }
      }

      if(CreditFinal2 != credit2){
              $('input[type="submit"]').removeClass("idleField").addClass("idle");  
              document.getElementById('submitsuivant').disabled = true;
      }
/*********** fonction original ****************/
      $.post("test2.php", $("#form2").serialize(), function(data) {
          $(".creditopt2").text(data);

        });
      }
      setInterval(load_fonction2,100)
    });

  $(document).ready(function() { 
      displayBoxes();

    });							// Appels JS de nos deux formulaires

   $(document).ready(function() {
      displayBoxes2();

    });

  </script>

  <script>

   

    function verifierCaracteres(event){ // Fonction qui permet de n'avoir que des chiffres dans notre formulaire.
          
      var keyCode = event.which ? event.which : event.keyCode;
      var touche = String.fromCharCode(keyCode);
          
      var champ = document.getElementById('mon_input');
          
      var caracteres = '0123456789';
          
      if(caracteres.indexOf(touche) >= 0) {
        champ.value += touche;
      }      
    }

   

  function displayBoxes2() {  // fonction qui permet la création de notre formulaire en ajoutant nos conditions form 1

      var container2 = document.getElementById("container2");

      while (container2.hasChildNodes()) {
          container2.removeChild(container2.lastChild);
      }

      for (var j = 0; j < half1; j++){
         
          container2.appendChild(document.createTextNode("" + tableau2[j]));
          container2.appendChild(document.createElement("br"));
          var input = document.createElement("input");
          container2.appendChild(document.createElement("br"));
          input.type = "number";
          input.id = "Option"+(j+1);
          input.setp = "1";
          input.min = "0";
          input.value = "0";
          input.name = tableau2[j];
          input.max = "<?php echo $maxcredit1 ;?>";
          input.onkeypress="verifierCaracteres(event); return false;";
          
          container2.appendChild(input);
          container2.appendChild(document.createElement("br"));
      }
  }

   function displayBoxes() { // fonction qui permet la création de notre formulaire en ajoutant nos conditions form 2

      var container = document.getElementById("container");

      while (container.hasChildNodes()) {
          container.removeChild(container.lastChild);
      }

      for (var i = 0; i < half2; i++){
         
          container.appendChild(document.createTextNode("" + tableau[i]));
          container.appendChild(document.createElement("br"));
          var input2 = document.createElement("input");
          container.appendChild(document.createElement("br"));
          input2.type = "number";
          input2.id = "Option"+(i+1)+"_2";
          input2.setp = "1";
          input2.min = "0";
          input2.value = "0";
          input2.name = tableau[i];
          input2.max = "<?php echo $maxcredit2 ;?>";
          input2.onkeypress="verifierCaracteres(event); return false;";
          
          container.appendChild(input2);
          container.appendChild(document.createElement("br"));
      }
  }

</script>
  </body>
</html>