<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$path = "./tisch.txt";
$file = file_get_contents($path, true);
$file = json_decode($file);
$n = count($file);


$path = "./gewinner.txt";
$gfile = file_get_contents($path, true);
$gfile = json_decode($gfile);
$gewinner = $gfile[0];

$path = "./oldtisch.txt";
$ofile = file_get_contents($path, true);
$ofile = json_decode($ofile);

if($n == 4) {
  $gewinner = "ich bin der gewinner";
}

$i = 0;

$tisch = "";
while ($i < $n) {
$tisch = "{$file[$i]}";
$i++;
}

//echo $file[0];




    $file = file_get_contents('./tisch.txt', true);
    $file = json_decode($file);

    $file1 = file_get_contents('./zug.txt', true);
    $file1 = json_decode($file1);

    array_push($file1,$gewinner);

    $ret = array($file,$file1,$ofile);
    $ret = json_encode($ret);

    $n = count($file);




echo "data: {$ret}\n\n";


echo "retry: 1000\n\n";


flush();


?>
