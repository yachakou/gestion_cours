<?php

try
{
    $file=fopen("log.txt",'r');
    session_start();
    $login=$_SESSION['login'];
    
    if($login=="root")
    {
     $recap=fopen("recap_pseudo.csv","w");
    fputs($recap,"Login Vacataire;password;nom;prenom;email;harpege");
    fputs($recap,"\r\n");
     echo "<table class='table'>";
    echo "<thead><tr><th>Login</th><th>Nom</th><th>Prénom</th><th>Adresse email</th><th>Numéro Harpège</th><th>Statut</th></tr></thead>";
    
    while(!feof($file))
                {
                    $ligne=fgets($file);
                    $tab=explode(';',$ligne);
                    fputs($recap,$ligne);
                    //print_r($tab);
                     echo "<tr><td>$tab[0]</td> <td>$tab[2]</td>  <td>$tab[3]</td> <td>$tab[4]</td> <td>$tab[5]</td><td>$tab[6]</td></tr>";

                }
                
                echo "</table>";
                echo "<center><a href='recap_pseudo.csv' class='btn btn-primary'>Télécharger au format csv</a></center>";
                fclose($recap);
                
                
    }
    else
    {
    $recap=fopen("recap_pseudo.csv","w");
    fputs($recap,"Pseudo Vacataire;nom;prenom;email");
    fputs($recap,"\r\n");
    echo "<table class='table'>";
    echo "<thead><tr><th>pseudo</th><th>nom</th><th>prenom</th><th>email</th><th>statut</th></tr></thead>";
    
    while(!feof($file))
                {
                    $ligne=fgets($file);
                    fputs($recap,"$tab[0];$tab[2];$tab[3];$tab[4];$tab[6]");
                     fputs($recap,"\r\n");
                    $tab=explode(';',$ligne);
                    //print_r($tab);
                     echo "<tr><td>$tab[0]</td> <td>$tab[2]</td>  <td>$tab[3]</td> <td>$tab[4]</td><td>$tab[6]</td></tr>";

                }
                
                echo "</table>";
                
                 
                echo "<center><a href='recap_pseudo.csv' class='btn btn-primary'>telecharger au format csv</a></center>";
                fclose($recap);
    }
    
    
                fclose($file);
}
catch(Exception $e)
            	{
            		echo 'Exception re�ue : ', $e->getMessage(), "\n";
            	}//catch
            

?>
