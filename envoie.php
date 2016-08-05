<?php

include "conexio_bd2.php"; // pour la fonction print_debug()

try
{
		$mdp = $_POST['password'];
		$log=$_POST['login'];
	
//	echo $log;
//	echo $mdp;
		
		$pdo=connexion();
		
		$pdo->exec("INSERT INTO Enseignant(IdEnseignant,login,password,nom,prenom,compte_actif,email,num_arpege,id_status) VALUES(001,"'.$login.'","'.$mdp.'",'root','root',1,'root@toot.fr','ADM1',1)");
		
		
		header("location:dashboard.php");
}

	catch(Exception $e)
		{
			echo 'Exception re�ue : ', $e->getMessage(), "\n";
		}//catch
		



?>