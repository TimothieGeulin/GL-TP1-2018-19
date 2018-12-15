<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE>Ma page</TITLE>
</HEAD>
  <style>

  .login{
    width:75%;
    margin:50px auto;
    font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
    border-radius:10px;
    border:2px solid #ccc;
    padding:10px 40px 25px;
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
function displayBoxes2(){
  var container = document.getElementById("container");
  var button2 = document.createElement("input");
  container.appendChild(document.createElement("br"));
  button2.type = "button";
  button2.name = "button"+(i);
  container.appendChild(button);
  button2.addEventListener ("click", displayBoxes());
}
var i = 0;

function deleteBoxes() {
  var container = document.getElementById("container");
  for(j = 0; j<11; j++){
    container.removeChild(container.lastChild);
  }
  i --;
}

function displayBoxes() {
	// Number of inputs to create valeur option
    // Container <div> where dynamic content will be placed
    var container = document.getElementById("container");
 

    // Append a node with a random text
    container.appendChild(document.createTextNode("Nom option"  +  (i+1) + " :"));
    var input = document.createElement("input");
    container.appendChild(document.createElement("br"));
    input.type = "text";
    input.name = "Opti"+(i);
    input.required= "required";

    container.appendChild(input);

    container.appendChild(document.createElement("br"));
    container.appendChild(document.createTextNode(" Effectif option "+ (i+1) + " "));

    var input2 = document.createElement("input");
    input2.type = "number";
    input2.name = "Effectif"+(i);
    input2.required= "required";
    container.appendChild(input2);

    container.appendChild(document.createTextNode(" Code Option"  +  (i+1) + " "));
    var input3 = document.createElement("input");
    input3.type = "text";
    input3.name = "Code"+(i);
    input3.required= "required";

    container.appendChild(input3);
    container.appendChild(document.createElement("br"));
    container.appendChild(document.createElement("br"));
    container.appendChild(document.createElement("br"));

  i++;

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
<p style="text-align: center;"><img src="logo.jpg" style="width: 650px;height: 220px;">
<div class="login_id" style="text-align: center;">
<p style="font-size: 25px;">Identifiant de connexion<h3><?php echo ''.$_SERVER['REMOTE_USER'].'';?>
</div>
<br><br>


<div class="login" style="text-align: center;">
      <form name="initOption" enctype="multipart/form-data" action="page-envoi.php" method="post">
       <button style="font-size:20px;" type="button" onclick="displayBoxes2()">Ajouter une option</button>
       <button style="font-size:20px;" type="button" onclick="deleteBoxes()">Supprimer une option</button>
        <div style="font-size:20px;" id="container" >
            <br>
        </div><br>
        <br>
        <!-- <input type="file" name="csvfile" required="required" accept=".csv"/> -->

        <br><br><br><br>
</div>  


        <div style="text-align: center;">
          <input type="submit" name="submit" value="Envoyer">
        </div>
        </form>

</HTML>
