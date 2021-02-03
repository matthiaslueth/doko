<?php

session_start();

$id = file_get_contents('lobby/id.txt', true);
$id++;
file_put_contents('lobby/id.txt', json_encode($id));

$file = array($_SESSION['name']);



$open = file_get_contents('lobby/open.txt', true);
$open = json_decode($open);

if ($open == null)
{
  $open = [];
}

array_push($open, $id);

file_put_contents('lobby/open.txt', json_encode($open));



file_put_contents('lobby/' . $id . '.txt', json_encode($file));

$_SESSION['gid'] = $id;
 ?>

Spiel erstellt.
<meta http-equiv="refresh" content="0.5, URL=index.php">
