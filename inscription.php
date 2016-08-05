<?php

//include(functions.php); // pour la fonction print_debug()

try
{
		$nom = $_POST['name'];
		$prenom=$_POST['prenom'];
		$mail= $_POST['email'];
		$passwd=$_POST['pwd'];
		$log=$_POST['log'];
		$harpege=$_POST['harpege'];
		//print_r($_POST);
		
		if (empty($nom))// || empty($passwd) || empty($email)  || empty($prenom))
		{
			print("<center>Le '<b>nom</b>' est vide !</center>");
			exit();
		}//if
		if (empty($prenom))
		{
			print("<center>Le '<b>prenom</b> est vide !</center>");
			exit();
		}//if
		if (empty($mail))
		{
			print("<center>L''<b>email</b> est vide !</center>");
			exit();
		}//if
		if (empty($passwd))
		{
			print("<center>Le '<b>passwd</b> est vide !</center>");
			exit();
		}//if
		if (empty($log))
		{
			print("<center>Le '<b>login</b> est vide !</center>");
			exit();
		}//if
	    if (empty($harpege))
		{
			print("<center>Le '<b>N°harpège</b> est vide !</center>");
			exit();
		}//if
	    if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
            {
                    echo "Cette adresse email n'est pas valide";
                    exit();
            }
		    
            //  print_debug("login = {$login} passwd = {$passwd} <br>");
    		
    		$fp = fopen('log.txt', 'a+');
    		
    		//verification si le login n'y étais pas déjà
            while (!feof($fp))
            { 
                $page = fgets($fp); // lecture du contenu de la ligne
                $tokens = explode(';', $page); // retourne chaque ligne dans un tableau de caractère sans les ";"
                print_r($tokens[0]);
                
                if(($log==$tokens[0]) || ($mail==$tokens[4])) // si jamais le login existe déjà, alors on affiche le message d'erreur.
                {
                    
                    echo "<div style='text-align:center;margin-left:auto;margin-right:auto;margin-top:300px;font-size:22px;width:266px;padding:22px;border:1px solid black;border-radius:11px;'><p>Cette adresse email ou ce login existe deja</p>";
                     echo "<p><a href=index.php>ressayer</a></p></div>";
                    exit();
                }
            
            }//while
    		
    	// l'inscription s'est déroulée avec succès 
    	session_start();
        $_SESSION["login"]=$log;
       //$_SESSION["passwd"]=$passwd;
        
        $nom=strtolower($nom).';';
        $prenom=strtolower($prenom).';';
        $mail=$mail.';';
        $mdpcrypt=crypt($passwd).';';
        $log=$log.';';
        $harpege=$harpege.';';
        $droit='vacataire'.';';
            
        $_SESSION["droit"]=$droit; 
        fputs($fp,"\r\n");
        fwrite($fp,$log.$mdpcrypt.$nom.$prenom.$mail.$harpege.$droit);
        print("Le nom et le mail ont ete stockee dans un fichier log");
        
    	
    	fclose ($fp);
    	header("Location: dashboard.php",true);
		//http_redirect("dashboard.php"); //marche pas
		
	
}//try

		catch(Exception $e)
		{
			echo 'Exception re�ue : ', $e->getMessage(), "\n";
		}//catch
		
		exit();
	
	
?>	
