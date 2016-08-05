<?php
session_start();
    //print_r($_SESSION);
    $login=$_SESSION["login"];
    
    include "functions.php";
  
    
    ?>
    
<html>
<body>

 <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Connexion</div>
                <div class="panel-body">
                   <form id='f1' action="envoie.php" method='post'  onSubmit="crypt();"></br>
                    	<fieldset>
                            <div class="input-group"><span class="input-group-addon">Login</span> <input type='text' class="form-control" name='login' required></div></br>
        					<div class="input-group"><span class="input-group-addon">Mot de passe</span> <input type='password' class="form-control" id='pwd' name="password" required></div></br>
                            <center><input type="submit" class="btn btn-default" value="Se connecter"  ></center>
                    	</fieldset>
                    </form>
                </div>
            </div>
        </div>
    
    
    </html>
    </body>
    

    <script type="text/javascript" src="Crypt/crypto.js" ></script>
    
     <script type="text/javascript">
   function crypt ()
   {
    
         var mdp=document.getElementById("pwd").value;
         var mdpc=SHA512(mdp);
         document.getElementById("pwd").style.visibility
         document.getElementById("pwd").value=mdpc;
   }
    
    
    
    
    
    
    </script>
    
