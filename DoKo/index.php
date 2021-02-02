<?php session_start();

echo "<style>
input[type=\"submit\"] {height:10vh;width:200px;}
</style>";

#echo "<h1>CHRISTIAN WAR DER GEWINNER!</h1>";

include("spieler.php");
include("tisch.php");
include("stich.php");



echo "<hr>";

$file = file_get_contents('./spieler.txt', true);
$file = json_decode($file);

for ($i = 0; $i < count($file); $i++)
{
echo $file[$i];
if ($i!=count($file)-1)
{echo ", ";}

}
/*echo $file[1];
echo ", ";
echo $file[2];
echo ", ";
echo $file[3];*/

?>
