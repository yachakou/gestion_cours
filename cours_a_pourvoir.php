<?php
    try {
        $cours = fopen('cours.csv', 'r');
        
        while(!feof($cours))
        {
            $ligne=fgets($cours);
            $tab=explode(';',$ligne);
            
            $heures = 0;
            
            $prof = fopen('prof.csv', r);
            
            while(!feof($prof))
            {
                $ligne=fgets($prof);
                $tab2=explode(';',$ligne);
                
                if($tab2[3] == $tab[3])
                {
                    $heures += $tab2[2];
                }
            }
            
            fclose($prof);
            
            $h_restantes = ($tab[1] - $heures);
            
            if($h_restantes > 0)
                echo "Il reste <b>$h_restantes heures</b> à allouer au cours <b>$tab[3]</b><br />";
        }
        
        fclose($cours);
    }
    catch (Exception $e)
    {
        echo 'Exception re�ue : ', $e->getMessage(), "\n";
    }
?>