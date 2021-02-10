<?php session_start();

echo "<div class=\"top\">
  <a href=\"ausstieg.php\">Aussteigen</a>";

  echo "<a href=\"cards.php\"> • Kartenuswahl</a>";

if ($open[0] == $_SESSION['name']) {
  echo "<a href=\"newround.php\"> • Neu geben</a>";
}

echo "<span> • Name: " . $_SESSION['name'] . "</span>";
echo "<span> • Am Zug: <span id=\"dran\"></span></span>";
echo "</div>";

echo "<div><div id=\"lstich\"></div><span>Letzter Stich</span></div>";


?>
