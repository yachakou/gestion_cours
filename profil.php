<?php 
    session_start();
    //print_r($_SESSION);
    $login=$_SESSION["login"];
    include "functions.php";
    connectionCheck($login);
    //onClick="javascript:document.location.href='modif_profil.php'"
?>

<html>
<head>
<style>
        #form
        {
            visibility:hidden;
            height:0;
    
        }
        </style>
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
           
             //verif formulaire
          
        
            function affiche()
            {
                 if(document.getElementById("form").style.visibility=="hidden")
                    {
                        document.getElementById("form").style.visibility="visible";
                        document.getElementById("form").style.height='50%';
    
                    }
                    else
                    {
                        document.getElementById("form").style.visibility="hidden";
                        document.getElementById("form").style.height='0';
                       
                    }
                             return true;
            }
</script>

    <title>Profil de <?php echo $login; ?> | Gestion des vacataires</title>
    <?php include "header.php"; ?>

    <div class="container">
        <div class="jumbotron">
            <center>
              <h2>Profil</h2>
            </center>
        </div>
        
        <div class="panel panel-default">
            <?php
                
                showLogin($login);
                
            ?>
            <br/><input type="button" name="modif" value="Modifier"  onclick="affiche()" > 
        </div>
    
    <?php
    
    $fp = fopen('log.txt', 'r');
    while (!feof($fp))
            { 
                $page = fgets($fp); // lecture du contenu de la ligne
                $tokens = explode(';', $page); // retourne chaque ligne dans un tableau de caractère sans les ";"
                if($tokens[0]==$login)
                {
                    $nom=$tokens[2];
                    $prenom=$tokens[3];
                    $mail=$tokens[4];
                    $login=$tokens[0];
                    $harpege=$tokens[5];
                    $mdp=$tokens[2];
                }
            
            }//while
    fclose($fp);
    
    ?>
     <div id="form">
            <div class="panel panel-default">
                <div class="panel-heading"><center>Modifier profil</center></div>
                 <div class="panel-body">
                 <form id='f2' method='post' action="modif_profil.php" onsubmit="return verif(this)"></br>
        				<fieldset>
                            <div class="input-group"><span class="input-group-addon">Nom</span> <input type='text' class="form-control" name='name' onblur="verifChar(this)" value="<?php echo $nom?>"></div></br>
                            <div class="input-group"><span class="input-group-addon">Prénom</span> <input type='text' class="form-control" name='prenom' onblur="verifChar(this)" value="<?php echo $prenom?>"></div></br>
        					<div class="input-group"><span class="input-group-addon">Email</span> <input type='email' class="form-control" name='email' onblur="verifEmail(this)" onblur="verifEmail(this)" value="<?php echo $mail?>"></div></br>
        					<div class="input-group"><span class="input-group-addon">Login</span> <input type='text' class="form-control" name='log' onblur="verifChar(this)" value="<?php echo $login?>"></div></br>
        					<div class="input-group"><span class="input-group-addon">N° Harpège</span> <input type='text' class="form-control" name='harpege' onblur="verifChar(this)" value="<?php echo $harpege?>"></div></br>
        					<div class="input-group"><span class="input-group-addon">Mot de passe</span> <input type='password' class="form-control" name='pwd' onblur="verifChar(this)"></div></br>
        					<center><input type="submit" class="btn btn-default" value="S'inscrire" ></center>
        				</fieldset>
        			</form>
        		</div>
        		</div>
        	</div>
        	</div>
    
<?php include "footer.php" ?>