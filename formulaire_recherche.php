
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
           
             //verif formulaire
            function verif1(f)
            {
                var login=verifChar(f.login);
                if(login)
                    return true;
                else
                {
                    alert("Erreur recherche par login. Veuillez remplir le login désiré");
                    f.login.focus();
                    return false;
                }
            
            }
            function verif3(f2)
            {   var erreur;
                var nom=verifChar(f2.name);
                if(nom!==true)erreur=f2.name;
                var prenom=verifChar(f2.prenom);
                 if(prenom!==true)erreur=f2.prenom;
                 if(nom && prenom)
                    return true;
                else
                {
                    alert("Erreur recherche par nom et prenom. Veuillez remplir tous les champs (en rouge)");
                    erreur.focus();
                    return false;
                }
            
            }
        
            function affiche()
            {
                 if(document.getElementById("vac").style.display=="none")
                    {
                        document.getElementById("vac").style.display="block";
			document.getElementById("vac-button").value="Masquer la liste des vacataires";
    
                    }
                    else
                    {
                        document.getElementById("vac").style.display="none";
			document.getElementById("vac-button").value="Afficher la liste des vacataires";
                    }
                             return true;
            }
</script>

<div class="container">
        <div class="jumbotron">
            <center>
              <h2>Rechercher des vacataires</h2>
               <p>Entrez votre recherche dans les champs correspondants</p>
            </center>
        </div>


     <center><input type="submit" class="btn btn-default" id="vac-button" value="Afficher la liste des vacataires" onclick="affiche()"></center>
    </br>
    <div id="vac" style="display : none;">
            <div class="panel panel-default">
                <div class="panel-heading"><center>Vacataire</center></div>
                 <div class="panel-body">
                    <?php include"affiche_vacataire.php";?>
        		</div>
        		</div>
        	</div>


    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Rechercher par Login</div>
                 <div class="panel-body">
                    <form id="f1" method='post' action="../recherche/recherche_log.php" onsubmit="return verif1(this)"></br>
                        <fieldset>
                				<div class="input-group"><span class="input-group-addon">Login</span> <input type='text' class="form-control" name='login' onblur="verifChar(this)"></div></br>
                				<center><input type="submit" class="btn btn-default" value="Rechercher" ></center>
                		</fieldset>
                    </form>
        		</div>
        		</div>
        	</div>

      



        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Rechercher par Nom et Prénom</div>
                <div class="panel-body">
                    <form id="f2" method='post' action="../recherche/recherche_nom.php" onsubmit="return verif3(this)"></br>
                        <fieldset>
            				
            				<div class="input-group"><span class="input-group-addon">Nom</span> <input type='text' class="form-control" name='name' onblur="verifChar(this)"></div></br>
                            <div class="input-group"><span class="input-group-addon">Prénom</span> <input type='text' class="form-control" name='prenom' onblur="verifChar(this)"></div></br>
                            <center><input type="submit" class="btn btn-default" value="Rechercher" ></center>
                            
                        </fieldset>
                    </form> 
                    </br> 	
        		</div>
        		</div>
        	</div>

    </div>
    
   
    
    
    
</div>
<!--
<div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Recher par matiere</div>
                <div class="panel-body">
                        <form id="f3" method='post' action="recherhce_vacataire.php"></br>
                            <fieldset>
                			<div class="input-group"><span class="input-group-addon">Nom de la matiére</span> <input type='text' class="form-control" name='matiere'></div></br>
                            <center><input type="submit" class="btn btn-default" value="Rechercher" ></center>
                            </fieldset>
                        </form> 
                    
        		</div>
        		</div>
        	</div>

-->
        				
 
 


