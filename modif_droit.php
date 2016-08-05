<?php
try
{
    
    $droit=$_POST["droit"];
    $log=$_POST["login"];
    
    include "functions.php";

    $tab=valeur($log);
    $var=$tab[0].';'.$tab[1].';'.$tab[2].';'.$tab[3].';'.$tab[4].';'.$tab[5].';'.$droit.';';
    $donnee=file("log.txt");
    
    
    
    
    $fichier=fopen('log.txt',"w");
    fputs($fichier,$var);
    fputs($fichier,"\r\n");
    foreach($donnee as $ligne)
    {
        $tokens=explode(';', $ligne);
     
        if($tokens[0]!=$log)
        {
            fputs($fichier,$ligne);
           // fputs($fichier,"\r\n");
        }
    }
    fclose($fichier);
   
   echo '<center>Modification appliqué <br/><a href="dashboard.php">Retourner au Tableau de Bord</a></center>';
    




}

catch(Exception $e)
	{
		echo 'Exception re�ue : ', $e->getMessage(), "\n";
	}//catch
	
exit();

?>
