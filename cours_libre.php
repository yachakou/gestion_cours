<?php
//affichage des cours ayant des heures libres 



   

                
try{
    
     function nbheure($matiere)//retourne le nombre d'heures enseigner dans une matiere 
        {
            $var=0;
            $file=fopen("prof.csv",'r');
                
    while(!feof($file))
        {
        $ligne=fgets($file);
        $tab=explode(';',$ligne);
       
        if($tab[3]==$matiere)
        {
            $var+=$tab[2];
                }
                   
        }
        
        fclose($file);
        //echo $val;
        return $var;
        }
    
    echo "<table class='table'>";
    echo "<thead><tr><th>Matiére</th><th>Nombre d'heure libre</th><th>Nombre d'heure total</th><th>Code Filiére et formation</th></tr></thead>";
    
    
    $file2=fopen("cours.csv",'r');
    $file3=fopen("libre.csv",'w');
    
    fputs($file3,"Matiére;Nombre d'heure libre;Nombre d'heure total;Code Filiére et formation;");
    fputs($file3,"\r\n");
     while(!feof($file2))
        {
            
        $ligne=fgets($file2);
        $tokens=explode(';',$ligne);
        
        $cal=nbheure($tokens[3]);
        
        

        $nb=$tokens[1]-$cal;
        
        fputs($file3,"$tokens[0];$nb;$tokens[1];$tokens[3];");
        fputs($file3,"\r\n");

        
        if($nb>0)
        {
            
            //echo "la matiere  a $nb heure(s) de libre(s) pour la fomation $tokens[3]";
            echo "\n";
            //affiche les matieres qui ont des heures libres 
            echo "<tr><td>$tokens[0]</td> <td>$nb</td> <td>$tokens[1]</td> <td>$tokens[3]</td> </tr>";

        }

    }
    echo "</table>";
    echo "<center><a href='libre.csv' class='btn btn-primary'>Télécharger au format csv</a></center>";
    
    fclose($file2);
    fclose($file3);
    
}


catch(Exception $e)
 {
  echo 'Exception re?ue : ', $e->getMessage(), "\n";
 }//catch
    
    

?>
