<?php

session_start();

$id = $_SESSION['gid'];
$name = $_SESSION['name'];

$_SESSION['gid'] = null;



$del = file_get_contents('../lobby/' . $id . '.txt', true);
$del = json_decode($del);


if (($key = array_search($name, $del)) !== false) {
    unset($del[$key]);
}

$del = array_values($del);

file_put_contents('../lobby/' . $id . '.txt', json_encode($del));





 ?>

<meta http-equiv="refresh" content="0.5, URL=../index.php">
