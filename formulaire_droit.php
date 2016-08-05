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
            function verif5(f)
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
        </script>

<div class="container" id="root">
    <div class="jumbotron">
            <center>
              <h2>Droit</h2>
            </center>
    </div>
<div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Modification droit </div>
                    <div class="panel-body">
                        <form id='f1' method='post' action="modif_droit.php" onsubmit="return verif5(this)"></br>
                        	<fieldset>
                               <div class="input-group"><span class="input-group-addon">pseudo</span> <input type='text' class="form-control" name='login' onblur="verifChar(this)" placeholder="pseudo"></div></br>
                               <div class="input-group">
                                    <label for="droit">Droit</label><br/> 
                                        Gestionnaire<input id="droit" type='radio' class="form-control" name='droit' value="gestionnaire"></id>
                                        Responsable_L3_Class<input type='radio' class="form-control" name='droit' value="responsable_L3_Class">
                                        Responsable_M1_Class<input type='radio' class="form-control" name='droit' value="responsable_M1_Class">
                                        Responsable_M2_Class<input type='radio' class="form-control" name='droit' value="responsable_M2_Class">
                                        
                                        Responsable_L3_App<input type='radio' class="form-control" name='droit' value="responsable_L3_App">
                                        Responsable_M2_App<input type='radio' class="form-control" name='droit' value="responsable_M2_App">
                                        Vacataire<input type='radio' class="form-control" name='droit' value="vacataire" checked>
                                </div>
                               <center><input type="submit" class="btn btn-default" value="valider" ></center>
                        	</fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>