<?php
try
{

$donnee=file("cours.csv");

$prof=file("prof.csv");

$cours=$_POST["cours"];
$formation=$_POST['formation'];
$parcours=$_POST['parcours'];
   if(empty($cours)){
        
        echo "Un des champs est manquant";
        exit();
    }
    if(empty($formation) || empty($parcours))
    {
        echo "erreur dans la formation ou du parcours";
        exit();
    }
    $code_apogee=$formation.'_'.$parcours.'_'.$cours;
    echo $code_apogee;
    
    
$fichier2=fopen('prof.csv',"w");
foreach($prof as $d)
{
    $tokens=explode(';', $d);
    if($tokens[3]!=$code_apogee)
    {
        fputs($fichier2,$d);
    }
}


fclose($fichier2);


$fichier=fopen('cours.csv',"w");
$i=0;
foreach($donnee as $d)
{
    $tokens=explode(';', $d);
    if($tokens[3]!=$code_apogee)
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