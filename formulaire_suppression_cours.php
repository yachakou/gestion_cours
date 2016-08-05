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