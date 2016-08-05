<?php 
    session_start();
    //print_r($_SESSION);
    $login=$_SESSION["login"];
    
    include "functions.php";
    include "/Crypt/crypto.js";
    
    // Si utilisateur connecté, rediriger vers Tableau de Bord
    if(!empty($login))
    {
        header("Location: dashboard.php", true);
    }
?>

<html>
<head>

    <title>Gestion des vacataires - UFR SEGMI</title>
    <?php include "header.php"; ?>

    <div class="jumbotron">
        <center>
          <h2>Bienvenue sur l'interface de gestion des vacataires de l'UFR SEGMI</h2>
          <p>Commencez par vous connecter ou vous inscrire.</p>
        </center>
    </div>


         <script type="text/javascript">
            function colore(champ,erreur)
            {
                if(erreur)
                    champ.style.backgroundColor = "#fba";
                else
                    champ.style.backgroundColor = "";
            
            }
            function verifChar(champ)
            {
                if(champ.value.length===0)
                 {
                     colore(champ, true);
                     return false;
                 }
                 else
                   {
                      colore(champ, false);
                      return true;
                   }
            
            }
            function verifEmail(champ)
            {
                 var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
                 if(!regex.test(champ.value))
                  {
                    colore(champ, true);
                     return false;
                  }
                   else
                   {
                      colore(champ, false);
                      return true;
                   }
             }
             //verif formulaire
            function verif(f)
            {
                var nom=verifChar(f.name);
                var prenom=verifChar(f.prenom);
                var email=verifEmail(f.email);
                var login=verifChar(f.log);
                var harpege=verifChar(f.harpege);
                var pwd=verifChar(f.pwd);
                if(nom && prenom && email && login && harpege && pwd)
                    return true;
                else
                {
                    alert("Erreur d'inscription. Veuillez remplir correctement tous les champs (en rouge)");
                    return false;
                }
            
            }
            /* verif connection*/
            function verifconnect(c)
            {
                var login=verifChar(c.log);
                var pwd=verifChar(c.pwd);
                if(login && pwd)
                    return true;
                else
                {
                    alert("Erreur de connexion. Veuillez remplir correctement tous les champs (en rouge)");
                    return false;
                }
            }
        
        </script>
    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Connexion</div>
                <div class="panel-body">
                    <form id='f1' method='post' action="connection.php" onsubmit="return verifconnect(this)"></br>
                    	<fieldset>
                            <div class="input-group"><span class="input-group-addon">Login</span> <input type='text' class="form-control" name='log' onblur="verifChar(this)"></div></br>
        					<div class="input-group"><span class="input-group-addon">Mot de passe</span> <input type='password' class="form-control" name='pwd' onblur="verifChar(this)"></div></br>
                            <center><input type="submit" class="btn btn-default" value="Se connecter" ></center>
                    	</fieldset>
                    </form>
                </div>
            </div>
        </div>
        
        
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Inscription</div>
                <div class="panel-body">
                    <form id='f2' method='post' action="inscription.php" onsubmit="return verif(this)"></br>
        				<fieldset>
                            <div class="input-group"><span class="input-group-addon">Nom</span> <input type='text' class="form-control" name='name' onblur="verifChar(this)"></div></br>
                            <div class="input-group"><span class="input-group-addon">Prénom</span> <input type='text' class="form-control" name='prenom' onblur="verifChar(this)"></div></br>
        					<div class="input-group"><span class="input-group-addon">Email</span> <input type='email' class="form-control" name='email' onblur="verifEmail(this)" onblur="verifEmail(this)"></div></br>
        					<div class="input-group"><span class="input-group-addon">Login</span> <input type='text' class="form-control" name='log' onblur="verifChar(this)"></div></br>
        					<div class="input-group"><span class="input-group-addon">N° Harpège</span> <input type='text' class="form-control" name='harpege' onblur="verifChar(this)"></div></br>
        					<div class="input-group"><span class="input-group-addon">Mot de passe</span> <input type='password' class="form-control" name='pwd' onblur="verifChar(this)"></div></br>
        					<center><input type="submit" class="btn btn-default" value="S'inscrire" ></center>
        				</fieldset>
        			</form>
        		</div>
        	</div>
		</div>
	</div>
    
    </div>
    
    <script type="text/javascript">
    function crypt()
    {
        
    
    
    
    
    }
    
    
    </script>
   
<?php include "footer.php" ?>