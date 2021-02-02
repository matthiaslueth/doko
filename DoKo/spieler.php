<?php session_start();

if (!isset($_SESSION['username'])) {
  if (!isset($_POST['username'])) {

  ?>

  <form action="index.php" method="POST">
    Benutzername: <br/><input type="text" name="username" size="30"><br/>
    Passwort: <br/><input type="password" name="password" size="30"><br/>
    <input type="submit">
  </form>

<?php
}
 else {



   $username = $_POST["username"];
   $password = $_POST["password"];
   $_SESSION['username'] = $username;
   $_SESSION['password'] = $password;


   $file = file_get_contents('./spieler.txt', true);
   $file = json_decode($file);

   if ($file == null)
   {
     $file = [];
   }

   if (in_array($username, $file)) {
     $nr = array_search($username, $file);
     echo "Willkommen zurück ";
     echo $username . "! ";
     $_SESSION["nr"] = $nr + 1;

   }
   else {

   if (count($file) > 3)
   {
     echo "Tisch ist voll.";
     return;

   }



   //array_push($array, $file);

   array_push($file, $username);

$_SESSION['nr'] = count($file);

   file_put_contents ('spieler.txt', json_encode($file));
   echo "Hallo ";
   echo $username . "! ";
}


   echo "Du bist Spieler ";
   echo $_SESSION['nr'] . ".";
   //echo $password;
   ?>
<form action="index.php" method="POST">
   <input type="submit" value="Weiter">
 </form>

 <?php
 }


} else {
   //echo "Du hast diese Seite zuvor schon aufgerufen";

   $nr = $_SESSION['nr'];

   $path = "./spieler" . $nr . ".txt";

   $file = file_get_contents($path, true);

   $file = json_decode($file);
echo "<h1>Hand:</h1>";

if (count($file) >= 1) {

echo "<form action=\"index.php\" id=\"karte\"><div style=\"display:flex;flex-wrap:wrap;\">";
   for ($i = 0; $i < count($file); $i++)
   {
     echo "<div align=\"center\"><label for=\"" . $file[$i] . "\"> <img src=\"cards/";
     echo $file[$i];
     echo ".gif\"></label>";
     echo "<br/><input type=\"radio\" id=\"" . $file[$i] . "\" name=\"playcard\" value=\"" . $file[$i] . "\"></div>";
   }


   echo "</div>
   <input type=\"hidden\" value=\"" . $_SESSION['username'] . "\" name =\"player\">
   <input type=\"submit\" value=\"Ich spiele die Karte jetzt.\" style=\"margin-top:10px;\">

   </form>";
 }

 else
 {
   echo "<form action=\"ende.php\" id=\"ende\">";
   echo "
   <input type=\"submit\" value=\"Ich beende jetzt das Spiel.\" style=\"margin-top:10px;\">

   </form>";
 }


echo "<hr>";

}



//echo $file[0];
//var_dump($file);

?>
