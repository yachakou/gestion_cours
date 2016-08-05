
<?php 
try{
  
    session_start();
    //print_r($_SESSION);
    $login=$_SESSION["login"];
    $droit=$_SESSION["droit"];
    include "functions.php";
    connectionCheck($login);
 
    $nom=$_POST['name'];
    $prenom=$_POST['prenom']; 
    $mail=$_POST['email']; 
    $log=$_POST['log'];
    $harp=$_POST['harpege']; 
    $pass=$_POST['pwd']; 

    $donnee=file("log.txt");
   
   
    
    $pwd=crypt($pass);
    $var=$log.';'.$pwd.';'.$nom.';'.$prenom.';'.$mail.';'.$harp.';'.$droit.';';
    $fichier=fopen('log.txt',"w");
    fputs($fichier,$var);
    fputs($fichier,"\r\n");
    foreach($donnee as $ligne)
    {
        $tokens=explode(';', $ligne);
     
        if($tokens[0]!=$login)
        {
            fputs($fichier,$ligne);
           //fputs($fichier,"\r\n");
        }
    }
    fclose($fichier);
   
   echo 'Modification appliqué';
   
   header("Location:dashbord.php",true);

}

catch(Exception $e)
	{
		echo 'Exception re�ue : ', $e->getMessage(), "\n";
	}//catch
	
exit();
?>

