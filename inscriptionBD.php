<?php

include "conexio_bd2.php"; // pour la fonction connexio()


  try
{
    $pdo=connexion();
    
		$nom = $_POST['name'];
		$prenom=$_POST['prenom'];
		$mail= $_POST['email'];
		$passwd=$_POST['pwd'];
		$log=$_POST['log'];
		$harpege=$_POST['harpege'];
		
	$var=RecupMax();
        
        
    $var=$var+1;
    echo $var;
    $pdo->exec("INSERT INTO Enseignant(IdEnseignant,login,password,nom,prenom,compte_actif,email,num_arpege,id_status) VALUES('.$res.','.$login.','.$mdp.', "'.$nom.'","'root',1,'root@toot.fr','ADM1',1)");
		
	
    
    
}

catch (Exception $e){
echo 'Probléme connexion',$e->getMessage(),"\n"; 
}





?>