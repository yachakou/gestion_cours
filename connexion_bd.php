<?php 
// on se connecte à MySQL 

function connexion() {
try{

$db = mysql_connect('mysql1.alwaysdata.com', '84540','root'); 

// on sélectionne la base 
mysql_select_db('sealteamsix_database',$db); 

// on crée la requête SQL 
//$sql = 'SELECT nom,prenom,statut,date FROM famille_tbl'; 

$mdp='root';
$out=hash('sha512',$mdp);


$sql = 'insert into Enseignant values(0001,"root","'.$out.'","root","root",1,"root@root.fr",0000,0)';



// on envoie la requête 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

// on fait une boucle qui va faire un tour pour chaque enregistrement 

echo 'ligne inscrite';

// on ferme la connexion à mysql 
mysql_close();


}

catch (Exception $e){
echo 'Probléme connexion',$e->getMessage(),"\n"; 
}

}
?> 