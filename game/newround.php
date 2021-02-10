<?php session_start();

$id = $_SESSION['gid'];

function shuffle_assoc(&$array) {
    $keys = array_keys($array);

    shuffle($keys);

    foreach($keys as $key) {
        $new[$key] = $array[$key];
    }

    $array = $new;

    return true;
}


$cards = array('T' => 10, 'J' => 2, 'Q' => 3, 'K' => 4, 'A' => 11);
$types = array('C', 'S', 'H', 'D');


/*$karten = array(
  'CT1' => 10, 'CJ1' => 2, 'CQ1' => 3, 'CK1' => 4, 'CA1' => 11,'CT2' => 10, 'CJ2' => 2, 'CQ2' => 3, 'CK2' => 4, 'CA2' => 11, 'PT1' => 10, 'PJ1' => 2, 'PQ1' => 3, 'PK1' => 4, 'PA1' => 11,'PT2' => 10, 'PJ2' => 2, 'PQ2' => 3, 'PK2' => 4, 'PA2' => 11, 'HT1' => 10, 'HJ1' => 2, 'HQ1' => 3, 'HK1' => 4, 'HA1' => 11,'HT2' => 10, 'HJ2' => 2, 'HQ2' => 3, 'HK2' => 4, 'HA2' => 11, 'KT1' => 10, 'KJ1' => 2, 'KQ1' => 3, 'KK1' => 4, 'KA1' => 11,'KT2' => 10, 'KJ2' => 2, 'KQ2' => 3, 'KK2' => 4, 'KA2' => 11
);*/

/*
$karten = array(
'HK1', 'HK2', 'HA1', 'HA2', 'PK1', 'PK2', 'PT1', 'PT2', 'PA1', 'PA2', 'KK1', 'KK2', 'KT1', 'KT2', 'KA1', 'KA2', 'CK1', 'CK2', 'CT1', 'CT2', 'CA1', 'CA2', 'CJ1', 'CJ2', 'HJ1', 'HJ2', 'PJ1', 'PJ2', 'KJ1', 'KJ2', 'CQ1', 'CQ2', 'HQ1', 'HQ2', 'PQ1', 'PQ2', 'KQ1', 'KQ2', 'HT1', 'HT2'
);*/

/*$karten = array(
'HK1' => 1, 'HK2' => 2, 'HA1' => 3, 'HA2'=>4, 'PK1'=>5, 'PK2'=>6, 'PT1'=>7, 'PT2'=>8, 'PA1'=>9, 'PA2'=>10, 'KK1'=>11, 'KK2'=>12, 'KT1'=>13, 'KT2'=>14, 'KA1'=>15, 'KA2'=>16, 'CK1'=>17, 'CK2'=>18, 'CT1'=>19, 'CT2'=>20, 'CA1'=>21, 'CA2'=>22, 'CJ1'=>23, 'CJ2'=>24, 'HJ1'=>25, 'HJ2'=>26, 'PJ1'=>27, 'PJ2'=>28, 'KJ1'=>29, 'KJ2'=>30, 'CQ1'=>31, 'CQ2'=>32, 'HQ1'=>33, 'HQ2'=>34, 'PQ1'=>35, 'PQ2'=>36, 'KQ1'=>37, 'KQ2'=>38, 'HT1'=>39, 'HT2'=>40
);*/

$karten = array (
  'aa'=> 'HK1','ab'=> 'HK2','ac'=> 'HA1','ad'=> 'HA2','ae'=> 'PK1','af'=> 'PK2','ag'=> 'PT1','ah'=> 'PT2','ai'=> 'PA1', 'aj'=>'PA2', 'ak'=>'KK1', 'al'=>'KK2', 'am'=>'KT1','an'=>'KT2','ao'=>'KA1','ap'=>'KA2','aq'=>'CK1','ar'=>'CK2','as'=>'CT1','at'=>'CT2','au'=>'CA1','av'=>'CA2','aw'=>'CJ1','ax'=>'CJ2','ay'=>'HJ1','az'=>'HJ2','ba'=>'PJ1','bb'=>'PJ2','bc'=>'KJ1','bd'=>'KJ2','be'=>'CQ1','bf'=>'CQ2','bg'=>'HQ1','bh'=>'HQ2','bi'=>'PQ1','bj'=>'PQ2','bk'=>'KQ1','bl'=>'KQ2','bm'=>'HT1','bn'=>'HT2'
);
/*
$karten = array(
'HK1' => 4, 'HK2' => 4, 'HA1' => 11, 'HA2'=>11, 'PK1'=>4, 'PK2'=>4, 'PT1'=>10, 'PT2'=>10, 'PA1'=>11, 'PA2'=>11, 'KK1'=>4, 'KK2'=>4, 'KT1'=>10, 'KT2'=>10, 'KA1'=>11, 'KA2'=>11, 'CK1'=>4, 'CK2'=>4, 'CT1'=>10, 'CT2'=>10, 'CA1'=>11, 'CA2'=>11, 'CJ1'=>2, 'CJ2'=>2, 'HJ1'=>2, 'HJ2'=>2, 'PJ1'=>2, 'PJ2'=>2, 'KJ1'=>2, 'KJ2'=>2, 'CQ1'=>3, 'CQ2'=>3, 'HQ1'=>3, 'HQ2'=>3, 'PQ1'=>3, 'PQ2'=>3, 'KQ1'=>3, 'KQ2'=>3, 'HT1'=>10, 'HT2'=>10
);*/
print_r($karten);
echo '<br />';
echo '<br />';
shuffle_assoc($karten);

//var_dump($karten);

print_r($karten);
echo '<br />';
echo '<br />';



$spieler1 = array_slice($karten, -40, 10);
$spieler2 = array_slice($karten, -30, 10);
$spieler3 = array_slice($karten, -20, 10);
$spieler4 = array_slice($karten, -10, 10);

ksort($spieler1);
ksort($spieler2);
ksort($spieler3);
ksort($spieler4);

$spieler1=array_values($spieler1);
$spieler2=array_values($spieler2);
$spieler3=array_values($spieler3);
$spieler4=array_values($spieler4);

$i = 0;
$n = count($spieler1);

while($i<$n){
  $spieler1[$i] = str_replace(array("1","2"),"",$spieler1[$i]);
  $i++;
}

$i = 0;
$n = count($spieler2);

while($i<$n){
  $spieler2[$i] = str_replace(array("1","2"),"",$spieler2[$i]);
  $i++;
}

$i = 0;
$n = count($spieler3);

while($i<$n){
  $spieler3[$i] = str_replace(array("1","2"),"",$spieler3[$i]);
  $i++;
}

$i = 0;
$n = count($spieler4);

while($i<$n){
  $spieler4[$i] = str_replace(array("1","2"),"",$spieler4[$i]);
  $i++;
}

print_r($spieler1);
echo '<br />';
print_r($spieler2);
echo '<br />';
print_r($spieler3);
echo '<br />';
print_r($spieler4);

file_put_contents ($first . $id . '/spieler1.txt', json_encode($spieler1));
file_put_contents ($first . $id . '/spieler2.txt', json_encode($spieler2));
file_put_contents ($first . $id . '/spieler3.txt', json_encode($spieler3));
file_put_contents ($first . $id . '/spieler4.txt', json_encode($spieler4));

file_put_contents ($first . $id . '/stapel1.txt', "");
file_put_contents ($first . $id . '/stapel2.txt', "");
file_put_contents ($first . $id . '/stapel3.txt', "");
file_put_contents ($first . $id . '/stapel4.txt', "");

file_put_contents ($first . $id . '/tisch.txt', "[]");
file_put_contents ($first . $id . '/oldtisch.txt', "[]");


file_put_contents ($first . $id . '/modus.txt', "[\"normal\"]");

$stsp = file_get_contents($first . $id . '/startspieler.txt', true);
file_put_contents ($first . $id . '/gewinner.txt', $stsp);
file_put_contents ($first . $id . '/zug.txt', $stsp);




?>

<meta http-equiv="refresh" content="1.5, URL=./">
