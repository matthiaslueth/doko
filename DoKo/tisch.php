<?php session_start();

$playcard = $_GET["playcard"];
$player = $_GET["player"];


echo "<h1>Tisch:</h1>";

if (!isset($_GET['playcard'])) {
  $path = "./tisch.txt";

  $file = file_get_contents($path, true);

  $file = json_decode($file);


  if ($file == null)
  {
    echo "Tisch leer";
  }
  else {

/*print_r($file[0][0]);
print_r($file[0][1]);*/
/*var_dump($file[1][3]);*/

echo "<div style=\"display:flex;\">";
  for ($i = 0; $i < count($file); $i++)
  {
    echo "<label for=\"" . $file[$i][1] . "\"><img src=\"cards/";
    echo $file[$i][1];
    echo ".gif\"><br/><div style=\"text-align:center\">" . $file[$i][0] . "</div></label>";
  }
echo "</div>";
}

}

else {

  $file = file_get_contents('./tisch.txt', true);
  $file = json_decode($file);

  if ($file == null)
  {
    $file = [];
    /*echo "<div align=\"center\"> <img src=\"cards/";
    echo $playcard;
    echo ".gif\">";*/
  }

  else {

echo "<div style=\"display:flex;\">";
  for ($i = 0; $i < count($file); $i++)
  {
    echo "<label for=\"" . $file[$i][1] . "\"> <img src=\"cards/";
    /*echo $file[$i][0];*/
    echo $file[$i][1];
    echo ".gif\"></label>";
  }

  echo "<img src=\"cards/";
  echo $playcard;
  echo ".gif\">";
}
echo "</div>";

  $save = [$player, $playcard];

  array_push($file, $save);
  file_put_contents ('tisch.txt', json_encode($file));

  $path = "./spieler" . $nr . ".txt";
  $file = file_get_contents($path, true);
  $file = json_decode($file);

  $key = array_search($playcard, $file);
  //echo $key;

  unset($file[$key]);
$file = array_values($file);
  //var_dump($file);

  file_put_contents ("./spieler" . $nr . ".txt", json_encode($file));

  ?>

<meta http-equiv="refresh" content="0; URL=./">
<?php
}

?>

<div style="display:flex">

<form action="index.php" id="tisch">
  <input style="margin-top:10px" type="submit" value="Ich aktualisiere jetzt den Tisch.">
</form>

<?php
if ($i>=4)
{
  echo "<form action=\"index.php\" id\"stich\" method=\"POST\">
    <input style=\"margin-top:10px\" type=\"submit\" value=\"Ich sammle den Stich jetzt ein.\">
    <input type=\"hidden\" value=\"stich\" name=\"stich\">
  </form>";
}
?>

</div>


<meta http-equiv="refresh" content="10; URL=./">
