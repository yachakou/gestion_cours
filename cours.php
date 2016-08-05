
<?php

try{
    session_start();
 // print_r($_SESSION);
  $fp = fopen('cours.csv', 'r');
  echo "<table class='table'>";
  echo "<thead><th>Code Apogée</th><th>Matière</th><th>Nombre d'heures</th><th>Coefficient</th></thead>";
  while (!feof($fp))
    { 
        $page = fgets($fp); 
        $tokens = explode(';', $page); 

        echo "<tr><td><a href='affiche_cours.php?nom=$tokens[0]&amp;nbheure=$tokens[1]&amp;code=$tokens[3]'>$tokens[3]</a></td><td>$tokens[0]</td> <td>$tokens[1]</td> <td>$tokens[2]</td></tr>";

    }
    echo "</table>";
    fclose($fp);


}
catch(Exception $e)
	{
		echo 'Exception re�ue : ', $e->getMessage(), "\n";
	}//catch

?>




