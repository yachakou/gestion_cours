<?php 

try{
    $matiere=$_POST['nom'];
    $nbheure=$_POST['heure'];
    $coef=$_POST['coef'];
    $formation=$_POST['formation'];
    $parcours=$_POST['parcours'];
   // print_r($_POST);
    
    if(empty($matiere) || empty($nbheure) || empty($coef)){
        
        echo "Un des champs est manquant";
        exit();
    }
    if(empty($formation) || empty($parcours))
    {
        echo "erreur dans la formation ou du parcours";
        exit();
    }
    $code_apogee=$formation.'_'.$parcours.'_'.$matiere;
    echo $code_apogee;
    $fp = fopen('cours.csv', 'a+');
  
    while (!feof($fp))
            { 
                $page = fgets($fp); 
                $tokens = explode(';', $page); 
                print_r($tokens);
                
                if(($matiere==$tokens[0]) &&($code_apogee==$tokens[3]))
                {
                     echo "<div style='text-align:center;margin-left:auto;margin-right:auto;margin-top:300px;font-size:22px;width:266px;padding:22px;border:1px solid black;border-radius:11px;'><p>Cette matiere existe deja ou les donnees sont incorrectes </p>";
                      echo "<p><a href=dashboard.php>ressayer</a></p></div>";
                    exit();
                }
                else if($nbheure<=0 || $coef<=0)
                {
                echo "<div style='text-align:center;margin-left:auto;margin-right:auto;margin-top:300px;font-size:22px;width:266px;padding:22px;border:1px solid black;border-radius:11px;'><p>les donnees entree sont incorrectes  </p>";
                echo "<p><a href=dashboard.php>ressayer</a></p></div>";
                exit();
                }   
                    
                
            }
    $cours=$matiere.';'.$nbheure.';'.$coef.';'.$code_apogee.';';
    //$liste=array($matiere,$nbheure,$coef);
     
    //print_r($liste);
    // print_r($cours);
     
    
    fputs($fp,"\r\n");
    fputs($fp,$cours);
    echo "la matiére a bien été sauvgardée";
    fclose($fp);
    header("Location: dashboard.php",true);
    	

}//try

catch (Exception $e) {
    echo 'Exception re�ue : ', $e->getMessage(), "\n";
}
exit();


?>