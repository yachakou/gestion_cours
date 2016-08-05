<?php
    session_start();

    $login=$_SESSION["login"];
    
    include "functions.php";
    $matiere=$_GET['nom'];
    echo $matiere;
    $code=$_GET['code'];
    try
    {
    $donnee=file("prof.csv");
    $fichier=fopen('prof.csv',"w");
    $i=0;
    foreach($donnee as $d)
    {
        $tokens=explode(';', $d);
        print_r($tokens[0]);
        if($tokens[3]!=$code || $tokens[0]!=$login)
        {
            fputs($fichier,$d);
        }
        $i++;
    }
    fclose($fichier);
   header("Location: dashboard.php",true);
    }
    
    catch(Exception $e)
    	{
    		echo 'Exception re�ue : ', $e->getMessage(), "\n";
    	}//catch
    	
    exit();




?>