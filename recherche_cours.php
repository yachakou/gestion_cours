<?php
    include "header.php";
    $formation=$_POST['formation'];
    $parcours=$_POST['parcours'];
    
    if(empty($formation) && empty($parcours))
    {
        $formation = 'null'; $parcours = 'null';
    }
    
    echo '<div class="container">';
    echo '<div class="jumbotron"><h2>Resultat pour ';
    if ($formation != 'null')
        echo $formation;
    echo ' ';
    if($parcours != 'null')
        echo $parcours;
    echo '</h2></div>';
    
    echo '<div class="panel panel-default">';
    echo '<div class="panel-body">';
    
    
    try {
        $file = fopen('cours.csv', 'r');
        $recap = fopen('recap_cours_libre.csv','w');
         fputs($recap,"matiere;nombre d'heures enseignées;coefficient;Code Apogee");
         fputs($recap,"\r\n");
        echo "<table class='table'>";
        echo "<thead><tr><th>Matière</th><th>Nombre d'heures enseignees</th><th>Coeeficient</th><th>Numéro Apogée</th></tr></thead>";
        
        while(!feof($file))
        {
            $ligne=fgets($file);
            $tab=explode(';',$ligne);
            $curr = explode('_', $tab[3]);
            
            
            if($formation != 'null' && $parcours != 'null')
            {
                if($formation == $curr[0] && $parcours == $curr[1])
                {
                    echo "<tr><td>$tab[0]</td><td>$tab[1]</td><td>$tab[2]</td><td>$tab[3]</td></tr>";
                    fputs($recap,"$tab[0];$tab[1];$tab[2];$tab[3]");
                     fputs($recap,"\r\n");
                }
            }
            else if($formation != 'null')
            {
                if($formation == $curr[0])
                {
                    echo "<tr><td>$tab[0]</td><td>$tab[1]</td><td>$tab[2]</td><td>$tab[3]</td></tr>";
                     fputs($recap,"$tab[0];$tab[1];$tab[2];$tab[3]");
                     fputs($recap,"\r\n");
                }
            }
            else if($parcours != 'null')
            {
                if($parcours == $curr[1])
                {
                    echo "<tr><td>$tab[0]</td><td>$tab[1]</td><td>$tab[2]</td><td>$tab[3]</td></tr>";
                     fputs($recap,"$tab[0];$tab[1];$tab[2];$tab[3]");
                     fputs($recap,"\r\n");
                }
            }
            
        }
        
        fclose($file);
        fclose($recap);

    }catch (Exception $e){
        echo 'Exception re�ue : ', $e->getMessage(), "\n";
    }
    echo "</table>";
    echo "</div></div></div>";

	echo "<center><a href='recap_cours_libre.csv' class='btn btn-primary'>Télécharger au format CSV</a></center>";
    
    include "footer.php";
?>
