<?php
 session_start();
    //print_r($_SESSION);
    $log=$_SESSION["login"];
include "../functions.php";
connectionCheck($log);
?>
<html>
<head>

    <title>Resultat de votre recherche</title>
    <?php   include "../header.php"; ?>

    <div class="container">
        <div class="jumbotron">
            <center>
              <h2>Resultat de votre recherche</h2>
            </center>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><center><h2 class="panel-title">Cours</h2></center></div>
                    
              
<?php

 
//fonction recherche par nom et prenom 
$nom=$_POST['name'];
$prenom=$_POST['prenom'];

try{
   
if(empty($nom) || empty($prenom))
{
 echo "Un ou plusieurs champs sont vide!";
 exit();
}


$file=fopen('../log.txt','r');



    while(!feof($file))
    {
        $li=fgets($file);
        $tab=explode(';',$li);
        
        if($nom==$tab[2] && $prenom==$tab[3])
        {
            $login=$tab[0];
            
        }//if
        
    
    }//while

    
    if(empty($login))
    {
     echo "Aucune personne trouvé pour $nom $prenom";
     exit();
    }

    fclose($file);
    $fp=fopen('../prof.csv','r');
    $file2=fopen('recap.csv','w');
    
    echo "Professeur : ".$nom." ".$prenom;
     
    $string="login;matiere;nombre d'heures enseignees;code Apogee".';'."Professeur : "." ".$nom.' '.$prenom;
    
     fwrite($file2,$string);
     fputs($file2,"\r\n");
    echo "<table class='table'>";
    echo "<thead><tr><th>Login</th><th>Matière</th><th>Nombre d'heures enseignees</th><th>Code Apogée</th></tr></thead>";
    while(!feof($fp))
    {
        $ligne=fgets($fp);
        $tokens=explode(';',$ligne);
        if($login==$tokens[0])
        {
            echo "<tr><td>$tokens[0]</td> <td>$tokens[1]</td> <td>$tokens[2]</td><td>$tokens[3]</td> </tr>";
            fwrite($file2,$tokens[0].";".$tokens[1].";".$tokens[2].";".$tokens[3]);
            fputs($file2,"\r\n");
            
        }//if
        
    
    }//while

echo "</table>";
fclose($fp);
fclose($file2);



}//try

catch(Exception $e)
            	{
            		echo 'Exception re�ue : ', $e->getMessage(), "\n";
            	}//catch

//exit();
?>
<a href="recap.csv" style="border:solid black 1px; padding:10px; border-radius:10px;text-decoration:none;position:relative;
left: 670px;bottom: 67px;font-size: 18px;"> telecharger en format csv</a>
 </div>

</div>
  </div>
  </div>

</body>
</html>