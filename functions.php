<?php
    function print_debug($message)
    {
        print($message);  //pour faire la redirection 
    }

    function showLogins()
    {
        echo "<table class='table'>";
        echo "<thead><th>Login</th> <th>Nom</th> <th>Prenom</th> <th>Mail</th></thead>";
    
        try{
            $fp = fopen('log.txt', 'r');
            
            while (!feof($fp))
            { 
                $page = fgets($fp); // lecture du contenu de la ligne
                $tokens = explode(';', $page); // retourne chaque ligne dans un tableau de caractère sans les ";"
                echo "<tr><td>$tokens[0]</td> <td>$tokens[2]</td> <td>$tokens[3]</td> <td><a href='mailto:$tokens[4]'>$tokens[4]</a></td></tr>";
            }//while
            
            fclose ($fp);
        } // try
        catch(Exception $e)
    	{
    		echo 'Exception re�ue : ', $e->getMessage(), "\n";
    	}//catch
    		
    	echo "</table>";
    }
    
    function showLogin($login)
    {
        echo "<table class='table'>";
        echo "<thead><th>Login</th> <th>Nom</th> <th>Prenom</th> <th>Mail</th></thead>";
    
        if(empty($login)) { exit(); }
    
        try 
        {
            $fp = fopen('log.txt', 'r');
            
            
            while (!feof($fp))
            { 
                $page = fgets($fp); // lecture du contenu de la ligne
                $tokens = explode(';', $page); // retourne chaque ligne dans un tableau de caractère sans les ";"
                
                if($tokens[0] == $login)
                {
                    echo "<tr><td>$tokens[0]</td> <td>$tokens[2]</td> <td>$tokens[3]</td> <td><a href='mailto:$tokens[4]'>$tokens[4]</a></td></tr>";
                }
            }//while
            
            fclose ($fp);
        } // try
        catch(Exception $e)
    	{
    		echo 'Exception re�ue : ', $e->getMessage(), "\n";
    	}//catch
    		
    	echo "</table>";
    }
    
    function connectionCheck($login)
    {
        if(empty($login))
        {
            echo "Vous êtes déconnecté, veuillez <a href='index.php'>vous connecter ou vous inscrire</a>.";
            exit();
        }
    }
    
    function disconnect()
    {
        // On appelle la session
        session_start();
        
        // On écrase le tableau de session
        $_SESSION = array();
        
        // On détruit la session
        session_destroy();
        
         header("Location: index2.php",true);
        //http_redirect("Projet.php");//marche pas
    }
    
    function valeur($login)
    {
        
     if(empty($login)) { exit(); }
    
        try 
        {
            $fp = fopen('log.txt', 'r');
            
            
            while (!feof($fp))
            { 
                $page = fgets($fp); // lecture du contenu de la ligne
                $tokens = explode(';', $page); // retourne chaque ligne dans un tableau de caractère sans les ";"
                
                if($tokens[0] == $login)
                {
                $tab=$tokens;
                }
            }//while
            
            fclose ($fp);
        } // try
        catch(Exception $e)
    	{
    		echo 'Exception re�ue : ', $e->getMessage(), "\n";
    	}//catch   
        
        
        return $tab;
        
        
    }
    
?>
