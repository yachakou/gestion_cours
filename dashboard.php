<?php 
    session_start();
    //print_r($_SESSION);
    $login=$_SESSION["login"];
    
    include "functions.php";
    include "droits.php";
    $_SESSION['droit']=droits($login);
    $tab=explode('_',$_SESSION['droit']);
    connectionCheck($login);

?>

<html>
<head>
    <title>Tableau de bord | Gestion des vacataires</title>
<?php include "header.php"; ?>
    

    <div class="container">
        <div class="jumbotron">
            <center>
              <h2>Tableau de bord</h2>
              <p>Gérer et inscrire des cours</p>
            </center>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><center><h2 class="panel-title">Cours</h2></center></div>
                    <?php include "cours.php"; ?>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><center><h2 class="panel-title">Inscrire un cours</h2></center></div>
                    
                    <?php
                    if($_SESSION['droit']=="root" || $_SESSION['droit']=="gestionnaire")
                    {
                       echo "<div class='panel-body'>"; include "creer_cours.php";echo"</div>";  
                    }
                    else if($tab[0]=="responsable")
                    {
                      echo "<div class='panel-body'>"; include "creer_cours_responsable.php";
                      echo"</div>"; 
                    }
                    
                    ?>
                    
                </div>
            </div>
        </div>
        
        <?php include "formulaire_recherche_cours.php"; ?>

	<div class="container">
	<div class="panel panel-default">
		<div class="panel-body">
			<?php include "cours_libre.php"; ?>
		</div>
	</div>
	</div>
        
        
    </div>

<?php include "formulaire_recherche.php";
        
        if($login=="root"){
        include "formulaire_suppression_user.php";
        include "formulaire_droit.php";
        }
      include "footer.php"; ?>
