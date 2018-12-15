<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE>Ma page</TITLE>
</HEAD>
  <style>


.haut{
    background-color: #1094d5;
    padding-top: 20px;
    margin : 0;
    width: 100%;
}

.footer {
  position: absolute;
  background-color: #1094d5;
  padding-top: 25px;
  width: 99.5%;
  font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
  font-size: 17px;
  color: #fff;
  margin-bottom: 2px;
  margin-top: 5%;
}
  .popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* The actual popup */
  .popup .popuptext {
    visibility: hidden;
    width: 160px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
  }
  /* Toggle this class - hide and show the popup */
  .popup .show {
    visibility: visible;
  }


  a:hover {
    color: red;
    background-color: transparent;
    text-decoration: underline;
  }
  a {
    color: blue;
    font-size: 22px;
    background-color: transparent;
  }

  .login{
    width:75%;
    margin:50px auto;
    font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
    border-radius:10px;
    border:2px solid #ccc;
    padding:10px 40px 25px;
  }

  .popup{
    color: crimson;
    font-weight: bold;
    font-size: 22px;
  }
  

  .login_id{
    width:20%;
    margin:50px auto;
    font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
    border-radius:10px;
    border:2px solid #ccc;
    padding:10px 40px 25px;
    margin-top:70px; 
  }

input[type=number]{
      width:8%;
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

    input{
      width:35%;
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

    button[type=button]{
      width:8%;
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

    input[type=submit]{
      width:25%;
      height: 30%;
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

     input[type=file]{
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
<script>

function displayBoxes() {
	// Number of inputs to create valeur option
    var number = document.getElementById("option").value;
    // Container <div> where dynamic content will be placed
    var container = document.getElementById("container");
    //code UE
    var container = document.getElementById("container");
    // Clear previous contents of the container
    while (container.hasChildNodes()) {
        container.removeChild(container.lastChild);
    }

    for (i=0;i<number;i++){
        // Append a node with a random text
        container.appendChild(document.createTextNode("Nom option"  +  (i+1) + " :"));
        var input = document.createElement("input");
        container.appendChild(document.createElement("br"));
        input.type = "text";
        input.name = "Opti"+(i+1);
        input.required= "required";

        container.appendChild(input);

        container.appendChild(document.createElement("br"));
        container.appendChild(document.createTextNode(" Effectif option "+ (i+1)));
        container.appendChild(document.createElement("br"));
	      var input2 = document.createElement("input");
	      input2.type = "number";
	      input2.name = "Effectif"+(i+1);
        input2.required= "required";
        container.appendChild(input2);

        container.appendChild(document.createElement("br"));
        container.appendChild(document.createTextNode("Code Option"  +  (i+1) + ""));
        container.appendChild(document.createElement("br"));
        var input3 = document.createElement("input");
        input3.type = "text";
        input3.name = "Code"+(i+1);
        input3.required= "required";
    	
        container.appendChild(input3);
        container.appendChild(document.createElement("br"));
        container.appendChild(document.createElement("br"));
        container.appendChild(document.createElement("br"));
    }

}

function verifierCaracteres(event){
      
  var keyCode = event.which ? event.which : event.keyCode;
  var touche = String.fromCharCode(keyCode);
      
  var champ = document.getElementById('mon_input');
      
  var caracteres = '0123456789';
      
  if(caracteres.indexOf(touche) >= 0) {
    champ.value += touche;
  }      
}
</script>
<div class="haut"></div>
<p style="text-align: center;"><img src="logo.jpg" style="width: 650px;height: 220px;">
<div class="login_id" style="text-align: center;">
<p style="font-size: 25px;">Identifiant de connexion<h3><?php echo ''.$_SERVER['REMOTE_USER'].'';?>
</div>
<br><br>
<div class="login" style="text-align: center;">
        <form name="initOption" enctype="multipart/form-data" action="page-envoi.php" method="post">
        
        <p style=" font-size:30px;">Veuillez renseigner le numéro de l'option (0-1-2-3...)</p>
        <input type="number" id="jour" step="1" value="0" min="0" name="jour" onFocus="javascript:this.value=''" onkeypress="verifierCaracteres(event); return false;" value="jour" required/>         
        <div class="popup" onmouseover="displayInfo()" onmouseout = "displayInfo()">?
          <span class="popuptext" id="myPopup">Attention les numeros des options doivent se suivre et commencer par 0 (0-1-2...)</span>
        </div>
        <script>
          function displayInfo() {
            var popup = document.getElementById("myPopup");
            popup.classList.toggle("show");
          }
        </script>
        

        <p style=" font-size:30px;">Veuillez renseigner le nombre d'UE(s) dans cette option</p>
        <input type="number" id="option" step="1"  min="1" name="nbOpt" onFocus="javascript:this.value=''" onkeypress="verifierCaracteres(event); return false;" value="NbOpti" required/> 
        
        <button style="font-size:20px;" type="button" onclick="displayBoxes()">OK</button>
        <div class="popup" onmouseover="displayInfo2()" onmouseout = "displayInfo2()">?
          <span class="popuptext" id="myPopup2">Attention le code des UE est tres important, le bon fonctionnement de l'algorithme ce fera grace a ce dernier</span>
        </div>
        <script>
          function displayInfo2() {
            var popup = document.getElementById("myPopup2");
            popup.classList.toggle("show");
          }
        </script>
        <div style="font-size:20px;" id="container" >
            <br>
        </div><br>
        <br>
        <br><br><br><br>
      </div>  
        <div style="text-align: center;">
          <input type="submit" name="submit" value="Envoyer">
        </div>
        </form>
        <div class="footer" style="text-align: center; margin-left: -2px;"> Affectation des options 1</div>

</HTML>
