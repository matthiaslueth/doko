<?php

session_start();

$id = $_POST['id'];

echo "Starte Spiel " . $id;


$open = file_get_contents('lobby/open.txt', true);
$open = json_decode($open);

if (($key = array_search($id, $open)) !== false) {
    unset($open[$key]);
    $open = array_values($open);
}

file_put_contents('lobby/open.txt', json_encode($open));


$active = file_get_contents('lobby/active.txt', true);
$active = json_decode($active);

if ($active == null)
{
  $active = [];
}

array_push($active, $id);

file_put_contents('lobby/active.txt', json_encode($active));

#$file = array($_SESSION['name']);

$id = $_SESSION['gid'];

$fold = "game/" . $id;

echo $id;

echo "<br/>";



mkdir($fold, 0777);

$n = $fold . "/spieler.txt";

echo $n;

$nfile = fopen($n, "w");


$spieler = file_get_contents('lobby/' . $id . '.txt', true);
$spieler = json_decode($spieler);

$out = "[\"" . $spieler[0] . "\",\"" . $spieler[1] . "\",\"" . $spieler[2] . "\",\"" . $spieler[3] . "\"]";
fwrite($nfile, $out);



copy('game/info.php','game/'. $id . '/info.php');

$q = $fold . "/startspieler.txt";
$qfile = fopen($q, "w");

$qout = "[\"" . $_SESSION['name'] ."\"]";
fwrite($qfile, $qout);
fclose($qfile);

/*$t = $fold . "/tisch.txt";
$tfile = fopen($t, "w");

$tout = "[]";
fwrite($tfile, $tout);
fclose($tfile);*/

$first = 'game/';
include('game/newround.php');

 ?>


<meta http-equiv="refresh" content="0.5, URL=game/">
