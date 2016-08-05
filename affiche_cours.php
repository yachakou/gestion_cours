<?php 
    session_start();
    //print_r($_SESSION);
    $login=$_SESSION["login"];
    $droit=$_SESSION['droit'];
    $tab2=explode('_',$droit);
    print_r($tab);
    include "functions.php";
    connectionCheck($login);
    
    $matiere=$_GET['nom'];
    $res=$tab2[1].'_'.$tab2[2].'_'.$matiere;
   // print_r($code);
    
?>
<html>
<head>
    <title>Affichage de <?php echo $matiere; ?> | Gestion des vacataires</title>
    <?php include "header.php"; ?>
    
    <div class="container">
        <?php
            
            try{
            
                $nbheuretot=$_GET['nbheure'];// nombre d'heure total
                $code=$_GET['code'];
                
                echo  " res : ".$res;
                echo "  code : ".$code;
                
                $var=0;
                $file=fopen("prof.csv",'r');
                //contient le nom du prof, la matiere qui enseigne, le nombre d'heures enseignés
                $file2=fopen("recap.csv","w");
                fputs($file2,"Pseudo Vacataire;Matiere;Nombre d'heure");
                fputs($file2,"\r\n");
                echo "<table class='table'>";
                echo "<thead><tr><th>Vacataire</th><th>Nombre d'heures enseignees</th><th>Matière</th><th>code apogée</th>";
                echo "</tr></thead>";
                while(!feof($file))
                {
                    $ligne=fgets($file);
                    $tab=explode(';',$ligne);
                    //print_r($tab[3]);
                    if($tab[3]==$code)
                    {
                     echo "<tr><td>$tab[0]</td> <td>$tab[2]</td> <td>$tab[1]</td><td>$tab[3]</td>"; 
                     if($droit=='root' || $droit=='gestionnaire')
                     {
                         echo "<td><a href='desinscrire_user.php?nom=$matiere&amp;code=$code&amp;login=$tab[0]' style='border:solid black 1px; padding:10px; border-radius:10px;text-decoration:none;font-size: 18px;'>Le désinscrire</a></td>";
                     }
                     else if($res==$code)
                     {
                          echo "<td><a href='desinscrire_user.php?nom=$matiere&amp;code=$code&amp;login=$tab[0]' style='border:solid black 1px; padding:10px; border-radius:10px;text-decoration:none;font-size: 18px;'>Le désinscrire</a></td>";
                    
                     }
                     
                     echo "</tr>";
                      $var=$var+$tab[2];
                      fputs($file2,$ligne);
                    }
                   
                }
                
                echo "</table>";
                $temp=$nbheuretot-$var;
                echo "<p>nombre d'heure restantes : <span id='nb'>$temp</span></p>";
                
                fclose($file);
                fclose($file2);
            }//try
            
            catch(Exception $e)
            	{
            		echo 'Exception re�ue : ', $e->getMessage(), "\n";
            	}//catch
            		
            
            //exit();
        ?>
        <script type="text/javascript">
            function colore(champ,erreur)
            {
                if(erreur)
                    champ.style.backgroundColor = "#fba";
                else
                    champ.style.backgroundColor = "";
            
            }
            
            function verifNum(champ)
            {
                if(champ.value.length===0 || champ.value<=0)
                 {
                     colore(champ, true);
                     return false;
                 }
                 
                 else
                   {
                        var nb=document.getElementById('nb'); //marche pas
                        if(nb-champ.value<0)    //erreur
                        {
                            colore(champ, true);
                            return false;
                        
                        }
                        else{
                          colore(champ, false);
                          return true;
                        }
                   }
            
            }
            function verifCours(c)
            {   
               
               var heure=verifNum(c.nbheureEns);
               if(heure)
                    return true;
                else
                {
                    alert("Erreur d'inscription, veuillez remplir les champs en rouge (les chiffres ne peuvent être inférieur ou égale à 0)");
                    c.nbheureEns.focus();
                    return false;
                }
            
            }
        </script>
        
        
        <form method='post' action="inscrire_cours.php?nom=<?php echo $matiere;?>&amp;nbheure=<?php echo $nbheuretot;?>&amp;code=<?php echo $code;?>" onsubmit="return verifCours(this)"></br>
        					
        					<fieldset>
                                 <legend> Inscrire à un cours </legend> 
                                <label> Nombre d'heures : <input type='number' name='nbheureEns' size="12"  onblur="verifNum(this)"></br>
        						<input type="submit" value="Envoyer" >
        					</fieldset>
        					
        						
                                
        </form>
        
        <a href="desinscrire.php?nom=<?php echo $matiere ?>&amp;code=<?php echo $code ?>" style="border:solid black 1px; padding:10px; border-radius:10px;text-decoration:none;position:relative;
left: 526;bottom: -15px;font-size: 18px;">Se désinscrire du cours</a>

        
        

        <a href="recap.csv" style="border:solid black 1px; padding:10px; border-radius:10px;text-decoration:none;position:relative;
left: 695px;bottom: 150px;font-size: 18px;"> telecharger en format csv</a>
    </div>
    
    
</body>
</html>