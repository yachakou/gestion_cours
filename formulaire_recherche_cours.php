    <div class="panel panel-default">
        <div class="panel-heading"><center>Rechercher un cours<center></div>
        <div class="panel-body">
            <center>
            <form id="cours" method="post" action="../recherche_cours.php" >
               <label for="formation">Formation</label>
               <select name="formation" id="formation">
                   <option value="null">--</option>
                   <option value="L3">L3</option>
                   <option value="M1">M1</option>
                   <option value="M2">M2</option>
               </select>&emsp;
               
               <label for="parcours">Parcours</label>
               <select name="parcours" id="parcours">
                   <option value="null">--</option>
                   <option value="Class">Classique</option>
                   <option value="app">Apprentissage</option>
               </select>&emsp;
               
               <input type="submit" class="btn btn-default" value="Rechercher" >
            </form>
            </center>
        </div>
    </div>
       
</div>