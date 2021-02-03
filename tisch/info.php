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
$tisch .= "<img src=\"cards/{$file[$i]}.png\">";
$i++;
}

//echo $file[0];




  $time = date('r');

echo "data: Tisch: <meta http-equiv="refresh" content="5, URL=index.php">\n\n";
echo "retry: 1000\n\n";

flush();


?>
