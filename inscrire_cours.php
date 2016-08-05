<?php


// Inscription à un cours pour les vacataires
// Fonction qui affiche les nom des cours sous forme de tableau.


try{
    session_start();
    //print_r($_GET);
    $matiere=$_GET['nom'];
    $nbheuretot=$_GET['nbheure'];
    $nbheure=$_POST['nbheureEns'];
    $login=$_SESSION["login"];
    $code=$_GET['code'];
    //print_r($_SESSION);
    
    //$fp=fopen("log.txt",'r');
   // $cours=fopen("cours.csv",'r');
    $file=fopen("prof.csv",'a+');
    
    $var=0;
    
    if($nbheure<0)
    {
        echo "la valeur $nbheure est incorrecte";
        exit();
    }
    while(!feof($file)){
        $ligne=fgets($file);
        $t=explode(';',$ligne);
        if($t[3]==$code){
            $var=$var+$t[2];
           
            if($var==$nbheuretot)
                {
                 
                 echo "<div style='text-align:center;margin-left:auto;margin-right:auto;margin-top:300px;font-size:22px;width:266px;padding:22px;border:1px solid black;border-radius:11px;'><p>cette matiere est deja enseignée à plein temps</p>";
                 echo "<p><a href=dashboard.php>retour au tableau de bord</a></p></div>";
                exit();
                }
            if($t[0]==$login)
            {
                 echo "<div style='text-align:center;margin-left:auto;margin-right:auto;margin-top:300px;font-size:22px;width:266px;padding:22px;border:1px solid black;border-radius:11px;'><p>vous enseignez déjà cette matière</p>";
                 echo "<p><a href=dashboard.php>retour au tableau de bord</a></p></div>";
                exit();
            }
        
        }
        
      
    }
   
    $temp=$nbheuretot-$var-$nbheure;
    if($temp>=0)
    {
    $prof=$login.';'.$matiere.';'.$nbheure.';'.$code.';';
    fputs($file,"\r\n");
    fputs($file,$prof);
    header("Location: dashboard.php",true);
    
    }

  //  fclose($fp);
   // fclose($cours);
    fclose($file);
     echo "<div style='text-align:center;margin-left:auto;margin-right:auto;margin-top:300px;font-size:22px;width:266px;padding:22px;border:1px solid black;border-radius:11px;'><p>Vous ne pouvez pas vous inscrire, le nombre d'heure est dépassé</p>";
     echo "<p><a href=dashboard.php>retour au tableau de bord</a></p></div>";
   
}//try

catch(Exception $e)
	{
		echo 'Exception re�ue : ', $e->getMessage(), "\n";
	}//catch
	
?>	

