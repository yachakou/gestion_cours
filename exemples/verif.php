<?php

$F_NAME = 'log.txt';

function print_debug($message) {
    //print($message);  //pour faire la redirection 
}

try {
    $login = $_POST['log'];
    $passwd = $_POST['pwd'];

    if (empty($login) || empty($passwd)) {
        print("<center>Le '<b>login</b>' ou le '<b>passwd</b>' est vide !</center>");
        exit();
    } else {
        print_debug("login = {$login} passwd = {$passwd} <br>");
    }

// lecture du fichier login et recherche de la correspondance

    print_debug('ouverture fichier <br>');

    $f = fopen("$F_NAME", "r");

    if (${f})//permet d'isoler la variable dans une chaine de caractere
	{
        print_debug('verif mdp <br>');

        while (!feof($f)) {
            $ligne = fgets($f);
            print_debug($ligne);
            // lignes de la forme � login ; passwd crypt� ; uid ; nom ; pr�nom �
            $tokens = explode(';', $ligne);
            print_debug('---->' . $tokens[0]);


            if ($tokens[0] == $login) {
                print_debug(' login match ');

                if (crypt($passwd, $tokens[1]) == $tokens[1]) { // voir http://fr2.php.net/crypt
                    print_debug(' passwd match ');

                    header("Location: http://localhost:8888/PhpProject1/afficheProduit.php?uid=11", false);
					//la redirection marche que s'il n'y pas d'affichage avant celui-ci.
                }
            }
            print_debug("<br>");
        }
    } else {
        print('Erreur interne : fichier $F_NAME illisible');
    }
} catch (Exception $e) {
    echo 'Exception re�ue : ', $e->getMessage(), "\n";
}
exit();
?>
