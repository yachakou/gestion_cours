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
    <?php  include "../header.php"; ?>

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
//fonction recherche par login 
$login=$_POST['login'];

try{
   
if(empty($login))
{
 echo "Le champ login est vide !";
 exit();
}

$fp=fopen('../prof.csv','r');
$file2=fopen('recap.csv','w');
$file3=fopen('../log.txt','r');

  while(!feof($file3))
    {
        $ligne2=fgets($file3);
        $tokens2=explode(';',$ligne2);
        if($login==$tokens2[0])
        {
            
            $name=$tokens2[2];
            $prenom=$tokens2[3];

        }//if

    
    }//while
    

     echo "Professeur : ".$name." ".$prenom;
     
    $string="login;matiere;nombre d'heures enseignees;Code apogee".';'."Professeur : "." ".$name.' '.$prenom;
    fwrite($file2,$string);
    fputs($file2,"\r\n");
     
     
    echo "<table class='table'>";
    echo "<thead><tr><th>Login</th><th>Matière</th><th>Nombre d'heures enseignees</th><th>Code Apogée</th></tr></thead>";
    
    //echo "<thead><tr><th>Login</th><th>Matière</th><th>Nombre d'heures enseignees</th></tr></thead>";

   
    
    
    while(!feof($fp))
    {
        $ligne=fgets($fp);
        $tokens=explode(';',$ligne);
        

        if($login==$tokens[0])
        {
            echo "<tr><td>$tokens[0]</td><td>$tokens[1]</td> <td>$tokens[2]</td><td>$tokens[3]</td></tr>";
            fwrite($file2,$tokens[0].";".$tokens[1].";".$tokens[2].';'.$tokens[3]);
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