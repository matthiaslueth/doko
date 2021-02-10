<?php

echo "<div class=\"opp\">";

$_SESSION['opp'][0] = $_SESSION['name'];

while ($y<3) {

if ($x+1 > count($open))
{
  $x = 0;
}

echo "<div class=\"hiddenwrap\">";
echo "<div style=\"margin-top:80px;width:0;height:0;z-index:1\"><span style=\"background-color:rgba(60,60,60,0.5);padding:5px;border-radius:3px;opacity:0.75;font-weight:700;color:#eee;\">" . $open[$x] . "</span></div>";
/*echo $open[$x];*/
$_SESSION['opp'][$y+1] = $open[$x];


$k = 0;
while ($k < $a)
{
  $angle = ($k-$a/2)*3;
  $trans = ($k-$a/2)*($k-$a/2)*2.5;

  echo "<div class=\"hiddencard\" style=\"transform:rotate({$angle}deg) translate(0px, {$trans}px);width:80px;\"><img src=\"{$hcards}/back.png\"></div>";
  $k++;
}




echo "</div>";
$x++;
$y++;
}



  $stsp = file_get_contents($id . '/gewinner.txt', true);
  $stsp = json_decode($stsp);




$z = array_search($stsp[0], $_SESSION['opp']);
//echo $z;
echo "</div>";


?>
