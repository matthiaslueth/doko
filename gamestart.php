<?php

session_start();

$id = $_POST['id'];

echo "Starte Spiel " . $id;


$open = file_get_contents('lobby/open.txt', true);
$open = json_decode($open);

if (($key = array_search($id, $open)) !== false) {
    unset($open[$key]);
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

$file = array($_SESSION['name']);




 ?>


<meta http-equiv="refresh" content="0.5, URL=game/">
