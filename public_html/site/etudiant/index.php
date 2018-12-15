<?php
   session_start();
?>

<?php
    include("pindex.php");
    include("lindex.php");  
?>
<!doctype html>


<head>


  <meta charset="UTF-8">
  <title>Authentification</title>

    <script src='https://www.google.com/recaptcha/api.js'></script>
 	  <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="js/jquery.diaporama.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" href="style.css">
		
</head>
<body>
<style>
.login{
width:360px;
margin:50px auto;
font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
border-radius:10px;
border:2px solid #ccc;
padding:10px 40px 25px;
margin-top:70px; 
}

input[type=text], input[type=password]{
width:99%;
padding:10px;
margin-top:8px;
border:1px solid #ccc;
padding-left:5px;
font-size:16px;
font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; 
}
input[type=submit]{
width:100%;
background-color:#009;
color:#fff;
border:2px solid #06F;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:5px;
margin-bottom:15px; 
}
</style>


<p style="text-align: center;"><img src="logo_amu_rvb" style="/* background-size: 200px,200px; *//* text-align: center; */width: 600px;height: 200px;">

  <div id="test">
    <form method="POST"> 


    <div class="login">
    <h2 align="center">Authentification</h2>
    <form  method="post" style="text-align:center;">
    <input type="text" id="IdEtudiant" name="IdEtudiant"><br/><br/>
    <input type="password" id="Motdepasse" name="Motdepasse"><br/><br/>
    <!-- Error Message -->
    <span><?php echo $error; ?></span>
     
     <div class="g-recaptcha" data-sitekey="6Le6OXYUAAAAADn58qoJ1MXAKnCdqjGQ-klY1ol3" style="width: 300px; margin: 0 auto 1em auto;"></div>
     <br>
     <br>
    
     <input type="submit" value="Se connecter" name="submitpost">
     
  </form>


  </body>
</html>