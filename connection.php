<?php
 
try
{

    $login = $_POST['log'];
    $passwd = $_POST['pwd'];
    
    if (empty($login) || empty($passwd))
    {
        print("<center>Le '<b>login</b>' ou le '<b>passwd</b>' est vide !</center>");
        exit();
    }//if
    
    $f = fopen('log.txt', 'r');
    while(!feof($f))
    {
        $page = fgets($f); // lecture du contenu de la ligne
        $tokens = explode(';', $page); // retourne chaque ligne dans un tableau de caractère sans les ";"
       // print_r($tokens[0]);
                
        if(($login==$tokens[0]) && (crypt($passwd,$tokens[1]) == $tokens[1])) // si jamais le login existe déjà, alors on affiche le message d'erreur.
        {
            // l'utilisateur est connecté....
            // echo "Connexion reussie";
            session_start();
            $_SESSION["login"]=$login;
            $_SESSION["passwd"]=$passwd;
            header("Location: dashboard.php",true);
           //http_redirect('dashboard.php'); //marche pas
        }//if
        
    }//while
    echo "<div style='text-align:center;margin-left:auto;margin-right:auto;margin-top:300px;font-size:22px;width:266px;padding:22px;border:1px solid black;border-radius:11px;'><p>erreur, le login ou le mdp existe pas</p>";
    echo "<p><a href=index.php>ressayer</a></p></div>";
    
}//try
catch (Exception $e) {
    echo 'Exception re�ue : ', $e->getMessage(), "\n";
}
exit();


?>