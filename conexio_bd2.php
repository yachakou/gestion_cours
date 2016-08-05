<?php


//fonction a mysql avec pdo


function connexion() {

try{
    
    

$connStr = 'mysql:host=mysql1.alwaysdata.com;dbname=sealteamsix_database'; //Ligne 1
$arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); //Ligne 2$utilisateur = 'root';
$motDePasse = 'root';
$utilisateur = '84540';
$pdo = new PDO($connStr, $utilisateur,$motDePasse , $arrExtraParam);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Ligne 4

//echo "Connexion reussi!";
echo "Bienvenue ";



return $pdo;


}//try 

    catch(PDOException $e) {
    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
    }


catch(Exception $e)
	{
		echo 'Exception re�ue : ', $e->getMessage(), "\n";
	}//catch


}





function RecupMax($champ,$table)
{
    
    try{
        
        $pdo=connexion();
        $resultats=$pdo->query("SELECT MAX(IdEnseignant) as Maximum FROM Enseignant");
        $resultats->setFetchMode(PDO::FETCH_OBJ);
             while( $resultat = $resultats->fetch() )
         {
                $res=$resultat->Maximum;
                
                
            }
                $resultats->closeCursor();
        
        return $res;
        
    }
    
    catch(Exception $e)
	{
		echo 'Exception re�ue : ', $e->getMessage(), "\n";
	}//catch
    
    
}

?>





