<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$path = "./tisch.txt";

$file = file_get_contents($path, true);

$file = json_decode($file);

$n = count($file);

$i = 0;

$tisch = "";
while ($i < $n) {
$tisch .= "<img src=\"cards/{$file[$i]}\".gif>";
$i++;
}

//echo $file[0];




  $time = date('r');

echo "data: Tisch: {$tisch}\n\n";
echo "retry: 1000\n\n";

flush();


?>
