<?php session_start();

$karten = array(
 'HK1' => 4, 'HK2' => 4, 'HA1' => 11, 'HA2'=>11, 'PK1'=>4, 'PK2'=>4, 'PT1'=>10, 'PT2'=>10, 'PA1'=>11, 'PA2'=>11, 'KK1'=>4, 'KK2'=>4, 'KT1'=>10, 'KT2'=>10, 'KA1'=>11, 'KA2'=>11, 'CK1'=>4, 'CK2'=>4, 'CT1'=>10, 'CT2'=>10, 'CA1'=>11, 'CA2'=>11, 'CJ1'=>2, 'CJ2'=>2, 'HJ1'=>2, 'HJ2'=>2, 'PJ1'=>2, 'PJ2'=>2, 'KJ1'=>2, 'KJ2'=>2, 'CQ1'=>3, 'CQ2'=>3, 'HQ1'=>3, 'HQ2'=>3, 'PQ1'=>3, 'PQ2'=>3, 'KQ1'=>3, 'KQ2'=>3, 'HT1'=>10, 'HT2'=>10
);

//$nr = $_SESSION['nr'];

$pfad = "spieler.txt";
$spieler = file_get_contents($pfad, true);
$spieler = json_decode($spieler);

for ($j = 0; $j < count($spieler); $j++)
{

  $nr = $j+1;
$path = "./stapel" . $nr . ".txt";
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
?>
