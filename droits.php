<?php

function droits($pseudo)
{
/*
$pseudo="root";   // On va dire que le pseudo recherché c'est "root"
echo("$pseudo<br/>");
*/

$role;

$role_root="root";
$gestionnaire="gestionnaire";
$l3_class="responsable_L3_Class";
$m1_class="responsable_M1_Class";
$m2_class="responsable_M2_Class";
$l3_app="responsable_L3_App";
$m1_app="responsable_M1_App";
$m2_app="responsable_M2_App";
$role_vac="vacataire";

      

    
    $file=fopen("log.txt",'r');
   
    
    $recap=fopen("recap_pseudo.csv","w");
    fputs($recap,"Login Vacataire;password;nom;prenom;email;harpege");
    fputs($recap,"\r\n");
     /*echo "<table class='table'>";*/
    /* 
    echo "<thead><tr><th>Login</th><th>Password</th><th>Nom</th><th>Prénom</th><th>Adresse email</th><th>Numéro Harpège</th> <th>Rôle</th></tr></thead>";
    */
    
    /*
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
    */
    
    while(!feof($file))
                {
                    $ligne=fgets($file);
                    $tab=explode(';',$ligne);
                    fputs($recap,$ligne);
                    //print_r($tab);
                    
                    if($pseudo===$tab[0]) // on teste : on regarde si le login est égal au pseudo recherché
                    {                     // et si c'est le cas, on affiche la ligne correspondante.
                /*
                        echo "<tr><td>$tab[0]</td> <td>$tab[1]</td> <td>$tab[2]</td>  <td>$tab[3]</td> <td>$tab[4]</td> <td>$tab[5]</td> <td>$tab[6]</td></tr>";
                        */
                        $role = $tab[6];
                        /*
                        echo("Role : $role<br/>");
                        */
                        if($role===$role_root)
                        {
                            return $role_root;
                        }
                        if($role===$role_vac)
                        {
                            return $role_vac;
                        }
                        if($role===$l3_class)
                        {
                            return $l3_class;
                        }
                        if($role===$m1_class)
                        {
                            return $m1_class;
                        }
                        if($role===$m2_class)
                        {
                            return $m2_class;
                        }
                        if($role===$l3_app)
                        {
                            return $l3_app;
                        }
                        if($role===$m1_app)
                        {
                            return $m1_app;
                        }
                        if($role===$m2_app)
                        {
                            return $m2_app;
                        }
                        if($role===$gestionnaire)
                        {
                            return $gestionnaire;
                        }
                    
                    }//if
                    
                }//while(!feof($file))
                /*
                echo "</table>";
                */
                fclose($recap);
                fclose($file);
                
        
  

}//function(droit)

?>