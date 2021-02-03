<?php
session_start();




if ($_SESSION['name'] != null)
{
echo "<div class=\"title\"><h1>Doppelkopf-Lobby</h1></div>";
  if ($_SESSION['gid'] != null)
  {
    echo "Warten auf Spiel {$_SESSION['gid']} <br/>";
    $active = file_get_contents('lobby/active.txt', true);
    $active = json_decode($active);

    if ($active == null)
    {
      $active = [];
    }

    if (in_array($_SESSION['gid'], $active))
    {
      echo "<meta http-equiv=\"refresh\" content=\"0, URL=game/\">";
      $member = true;
      return;
    }

    echo "<div class=\"newgame\"><a href=\"#\"><s>Neues Spiel anlegen</s><br/></a></div>";
  }

else {
echo "<div class=\"newgame\"><a href=\"newgame.php\">Neues Spiel anlegen</a></div>";
}










echo "<div class=\"running\">
<h2> Offene Spiele</h2>";

$open = file_get_contents('lobby/open.txt', true);
$open = json_decode($open);

if ($open == null)
{
  echo "Keine Spiele offen.";
}

else {
$n = count($open);
$i = 0;


echo "<div class=\"games\">";

while ($i < $n) {
  $tn = file_get_contents('lobby/' . $open[$i] . '.txt', true);
  $tn = json_decode($tn);


  $y = 0;
  $z = count($tn);


  if ($z < 4)
  {
    $z = 4;
  }
  echo "<div><h3> Runde " . $open[$i] . "</h3>";
    while ($y < $z) {
      echo "<p><span>" . $tn[$y] . "</span>";
      if ($tn[$y] == $_SESSION['name'])
      {
        $member = true;
        echo "<span style=\"text-align:right;padding-right:5px;\"><a href=\"game/ausstieg.php\">×</a></span></p>";
      }
      else {
        echo "</p>";
      }


      $y++;
    }

    if ($member == false)
    {
  echo "<form action=\"join.php\" method=\"post\">
    <input type=\"hidden\" name=\"id\" value=" . $open[$i] . ">
   <button type=\"submit\">Beitreten</button></form>";
 }
 else {
   echo "<meta http-equiv=\"refresh\" content=\"5, URL=index.php\">";
 }

   if (count($tn)>=4 AND $tn[0] == $_SESSION['name'])
   {
     echo "<form action=\"gamestart.php\" method=\"post\">
       <input type=\"hidden\" name=\"id\" value=" . $open[$i] . ">
       <button type=\"submit\">Starten</button></form></div>";
   }

   else
   {
     echo "</div>";
   }


  $i++;
}
echo "</div>";

}

echo "</div>";



echo "<div class=\"running\"><h2>Laufende Spiele</h2> ";

$active = file_get_contents('lobby/active.txt', true);
$active = json_decode($active);

if ($active == null)
{
  echo "Keine Spiele aktiv.";
}


else {
$n = count($active);
$i = 0;

echo "<div class=\"games\">";

while ($i < $n) {
  $tn = file_get_contents('lobby/' . $active[$i] . '.txt', true);
  $tn = json_decode($tn);


  $y = 0;
  $z = count($tn);

  echo "<div><h3> Runde " . $active[$i] . "</h3>";
    while ($y < $z) {
      echo "<p>" . $tn[$y] . "</p>";
      $y++;
    }
    echo "</div>";
    $i++;

}
}

echo "</div>";


}

else {

}
?>
