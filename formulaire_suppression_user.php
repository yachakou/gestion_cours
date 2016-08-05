
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
            function verif(f)
            {
                var user=verifChar(f.user);
                if(user)
                    return true;
                else
                {
                    alert("Erreur suppression. Veuillez remplir le champ désiré");
                    f.user.focus();
                    return false;
                }
            
            }
            function verif2(f)
            {
                var cours=verifChar(f.cours);
                if(cours)
                    return true;
                else
                {
                    alert("Erreur suppression. Veuillez remplir le champ désiré");
                    f.cours.focus();
                    return false;
                }
            
            }
            
            </script>
  
            
<div class="container" id="root">
    <div class="jumbotron">
            <center>
              <h2>Menu <b>Root</b></h2>
               <p>Vous disposez de droits supplémentaires</p>
            </center>
    </div>
   
 <div class="row">
 
    <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Suppression d'un user</div>
                    <div class="panel-body">
                        <form id='f1' method='post' action="suppression_user.php" onsubmit="return verif(this)"></br>
                    	    <fieldset>
                              <div class="input-group"><span class="input-group-addon">user</span> <input type='text' class="form-control" name='user' onblur="verifChar(this)"></div></br>
                                <center><input type="submit" class="btn btn-default" value="Supprimer" ></center>
                        	</fieldset>
                        </form>
                    </div>
                </div>
            
    </div>
    
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Suppression d'un cours</div>
                    <div class="panel-body">
                        <form id='f1' method='post' action="suppression_cours.php" onsubmit="return verif2(this)"></br>
                        	<fieldset>
                               <div class="input-group"><span class="input-group-addon">cours</span> <input type='text' class="form-control" name='cours' onblur="verifChar(this)" placeholder="nom matiere"></div></br>
                               <div class="input-group">
                                    <label for="formation">Formation</label><br/> 
                                        <input id="formation" type='radio' class="form-control" name='formation' value="L3" checked> Licence 3</id>
                                        <input type='radio' class="form-control" name='formation' value="M1"> Master 1
                                        <input type='radio' class="form-control" name='formation' value="M2"> Master 2
                                </div>
                                <div class="input-group"> 
                                    <label for="parcours">Parcours</label><br/>
                                        <input id="parcours" type='radio' class="form-control" name='parcours' value="App"> Apprentissage
                                        <input type='radio' class="form-control" name='parcours' value="Class" checked> Classique
                                </div></br>
                               <center><input type="submit" class="btn btn-default" value="Supprimer" ></center>
                        	</fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>