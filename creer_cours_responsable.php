<script type="text/javascript">
            function colore(champ,erreur)
            {
                if(erreur)
                    champ.style.backgroundColor = "#fba";
                else
                    champ.style.backgroundColor = "";
           
            }
            function verifChar(champ)
            {
                if(champ.value.length===0)
                 {
                     colore(champ, true);
                     return false;
                 }
                 else
                   {
                      colore(champ, false);
                      return true;
                   }
           
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
                      colore(champ, false);
                      return true;
                   }
           
            }
            function verifCours(c)
            {   var erreur="";
                var nom=verifChar(c.nom);
                if(nom!==true)erreur=c.nom;
                var heure=verifNum(c.heure);
                if(heure!==true)erreur=c.heure;
                var coef=verifNum(c.coef);
                if(coef!==true)erreur=c.coef;
                if(nom && heure && coef)
                    return true;
                else
                {
                    alert("Erreur d'inscription, veuillez remplir les champs en rouge (les chiffres ne peuvent être inférieur ou égale à 0)");
                    erreur.focus();
                    return false;
                }
           
            }

</script>

<?php



$droit=droits($login);
//$droit ="l3_class";
echo "droit : $droit";

$tab=explode('_',$droit);

?>

<form method='post' action="verif_cours.php" onsubmit="return verifCours(this)"></br>
    <fieldset>
        <div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span><input type='text' class="form-control" name='nom' placeholder="Nom de la matière"  onblur="verifChar(this)"></div></br>
        <div class="input-group"><input type='number' class="form-control" name='heure' placeholder="Nombre d'heures"  onblur="verifChar(this)"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div></br>
        <div class="input-group"><input type='number' class="form-control" name='coef' placeholder="Coefficient"  onblur="verifChar(this)"><span class="input-group-addon">.00</span></div></br>
       
        <div class="input-group">
            <label for="formation">Formation</label><br/>
                <?php
                
                if($tab[0]=="responsable") // si c'est un responsable, alors il peut modifier certains champs.
                {
                    
                    if($tab[1]=="L3") // ici, on va tester chaque champs pour que le responsable ne puisse qu'ajouter des cours que pour sa formation
                    {
                    echo "<input id='formation' type='radio' class='form-control' name='formation' value='L3' checked> Licence 3";
                    }?>
                   
                    <?php
                    if($tab[1]=="M1")
                    {
                    echo "<input type='radio' class='form-control' name='formation' value='M1'> Master 1";
                    }?>
                   
                    <?php
                    if($tab[1]=="M2")
                    {
                    echo "<input type='radio' class='form-control' name='formation' value='M2'> Master 2";
                    }?>
            </div>
            <div class="input-group">
                <label for="parcours">Parcours</label><br/>
                    <?php
                    if($tab[2]=="App")
                    {
                    echo "<input id='parcours' type='radio' class='form-control' name='parcours' value='App'> Apprentissage";
                    }?>
                    
                    <?php
                    if($tab[2]=="Class")
                    {
                    echo "<input type='radio' class='form-control' name='parcours' value='Class' checked> Classique";
                    }
                }//if(&tab[0]=="responsable")
                ?>
        </div><br/>
        <center><input class="btn btn-default" type="submit" value="Inscrire"></center>
    </fieldset>
</form>



