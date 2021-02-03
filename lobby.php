<?php
session_start();

if ($_SESSION['name'] != null)
{
echo "<a href=\"newgame.php\">Spiel starten</a> <br/> <hr>";





echo "Runde beitreten <br/>";

$open = file_get_contents('lobby/open.txt', true);
$open = json_decode($open);

if ($open == null)
{
  echo "Keine Spiele offen,";
}

else {
$n = count($open);
$i = 0;

echo "<div style=\"display:flex;width:600px;\">";

while ($i < $n) {
  $tn = file_get_contents('lobby/' . $open[$i] . '.txt', true);
  $tn = json_decode($tn);


  $y = 0;

  echo "<div style=\"width:100px; background:#ccc;border:1px solid black;border-radius:5px;margin:10px;padding:5px\"> Runde " . $open[$i] . ": <br/>";
    while ($y < 4) {
      echo $tn[$y] . "<br/> ";
      $y++;
    }
  echo "<form action=\"join.php\" method=\"post\">
    <input type=\"hidden\" name=\"id\" value=" . $open[$i] . ">
   <button type=\"submit\">Beitreten</button></div></form>";

  $i++;
}
echo "</div>";

}

echo "<hr>";





echo "Laufende Runden <br/> <hr>";

}
?>
