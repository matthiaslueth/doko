<?php

session_start();

$id = $_POST['id'];

echo $id;

$tn = file_get_contents('lobby/' . $id . '.txt', true);
$tn = json_decode($tn);

array_push ($tn, $_SESSION['name']);

$_SESSION['gid'] = $id;

file_put_contents('lobby/' . $id . '.txt', json_encode($tn));



 ?>

<meta http-equiv="refresh" content="0.5, URL=index.php">
