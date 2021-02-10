<?php
session_start();

$id = $_SESSION['gid'];

$karten = array(
 'HK' => 4, 'HA' => 11, 'PK'=>4, 'PT'=>10, 'PA'=>11, 'KK'=>4, 'KT'=>10, 'KA'=>11, 'CK'=>4, 'CT'=>10, 'CA'=>11, 'CJ'=>2, 'HJ'=>2, 'PJ'=>2, 'KJ'=>2, 'CQ'=>3, 'HQ'=>3, 'PQ'=>3, 'KQ'=>3, 'HT'=>10
);


$pfad = $id . "/spieler.txt";
$spieler = file_get_contents($pfad, true);
$spieler = json_decode($spieler);

for ($j = 0; $j < count($spieler); $j++)
{

  $nr = $j+1;
$path = $id . "/stapel" . $nr . ".txt";
$file = file_get_contents($path, true);
$file = json_decode($file);

$wert = 0;

for ($i = 0; $i < count($file); $i++)
{
$wert = $karten[$file[$i]] + $wert;
}

echo $spieler[$j] . ": " . $wert . " Punkte<br/>";
}

echo "<a href=\"./\">Zur&uuml;ck</a>";


$pfad = $id . "/startspieler.txt";
$stsp = file_get_contents($pfad, true);
$stsp = json_decode($stsp);

var_dump($stsp);
echo "<br/>";
var_dump($spieler);

$r = array_search($stsp[0],$spieler);

echo $r;

$r++;
if ($r==4)
{
  $r = 0;
}
$out = [];
array_push($out,$spieler[$r]);

file_put_contents($id . '/startspieler.txt', json_encode($out));
?>
