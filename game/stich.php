<?php
session_start();

$tcards = $_POST['cards'];

$super = 0;

$sid = $_SESSION['sid'];

if ($tcards!=null) {
  $id = $_SESSION['gid'];

  echo $tcards;

  $tpath = $id . "/tisch.txt";
  $file = file_get_contents($tpath, true);
  $tisch = json_decode($file);

  $spath = $id . "/zug.txt";
  $file = file_get_contents($spath, true);
  $stsp = json_decode($file);


  if($_SESSION['name'] == $stsp[0]) {
    echo "Du bist dran :) </br>";

    if ($tisch[0] == "") {
      echo "Tisch ist frei.";

      $super = 1;
    }

    else {
      $mpath = $id . "/modus.txt";
      $file = file_get_contents($mpath, true);
      $modus = json_decode($file);
      $modus = "spiel/" . $modus[0] . "/";

      $handc = file_get_contents($id . '/spieler' . $sid . '.txt', true);
      $handc = json_decode($handc);

      $file = file_get_contents($modus . "trumpf.txt", true);
      $trumpf = json_decode($file);

      if (in_array($tisch[0],$trumpf)) {
        if(in_array($tcards,$trumpf)) {
          $super = 1;
        }
        else {

          $handrr = array_intersect($handc,$trumpf);

          if ($handrr == null) {
            $super = 1;
          }

        }
      }

      else {
        echo "Farbe!";
        $x = $_SESSION['sid'];

        $handr = array_diff($handc, $trumpf);


        if (substr($tisch[0],0,1) == "H") {
          $file = file_get_contents($modus . "herz.txt", true);
          $farbe = json_decode($file);
          $m = "H";
          echo "Herz!<br/>";
        }
        if (substr($tisch[0],0,1) == "P") {
          $file = file_get_contents($modus . "pik.txt", true);
          $farbe = json_decode($file);
          $m = "P";
          echo "Pik!<br/>";
        }
        if (substr($tisch[0],0,1) == "K") {
          $file = file_get_contents($modus . "kreuz.txt", true);
          $farbe = json_decode($file);
          $m = "K";
          echo "Kreuz!<br/>";
        }

        $handrr = array_intersect($handr,$farbe);
        var_dump($handrr);

        if ($handrr == null OR substr($tcards,0,1) == $m) {
          $super = 1;
          }


        else {
          echo "Falsch bedient! Arschloch.";
        }
      }
      }
  }

  else {
    echo "Du bist nicht dran.";
  }

  if ($super == 1) {

  $sppath = $id . "/spieler" . $sid . ".txt";
  $file = file_get_contents($sppath, true);
  $hand = json_decode($file);

  if(in_array($tcards,$hand)){
    echo "alles ist super";
    $j = array_search($tcards,$hand);
    unset($hand[$j]);
    $hand = array_values($hand);

    file_put_contents($sppath, json_encode($hand));

    array_push($tisch,$tcards);
    file_put_contents($tpath, json_encode($tisch));
    $stspush = array($_SESSION['opp'][1]);
    file_put_contents($spath, json_encode($stspush));

    $mega = 1;
    }
  else {
    "Es wurde neu gegeben.";
  }
  }
  else {
echo "nichts ist super";
}



$d = count($tisch);
if ($mega = 1 AND $d == 4) {
  sleep(2);
  $trumpfi = array_intersect($tisch, $trumpf);
  $trumpfi = array_values($trumpfi);
  if($trumpfi != null) {
    echo "trumpfiii!!";
    $p = count($trumpfi);
    echo "Peeh ist " . $p;
    if ($p == 1) {
      echo "<br/>p ist 1";
      $gew = array_search($trumpfi[0],$tisch);
    }
    else {
      $i = 0;
      $ind = [];
      while ($i<$p) {
        $ind[$i] = array_search($trumpfi[$i],$trumpf);
        $i++;
      }
      $max = max($ind);
      $z = array_search($max,$ind);
      $gew = array_search($trumpfi[$z],$tisch);
    }
    $gew++;
    echo "<br/>Der Gewinner ist Karte " . $gew;
  }
  else {
    echo "farbi!!!!";
    $farbi = array_intersect($tisch, $farbe);
    $farbi = array_values($farbi);
    $p = count($farbi);
    echo "Peeh ist " . $p;
    if ($p == 1) {
      echo "<br/>p ist 1";
      $gew = array_search($farbi[0],$tisch);
    }
    else {

      $i = 0;
      $ind = [];
      while ($i<$p) {
        $ind[$i] = array_search($farbi[$i],$farbe);
        $i++;
      }
      $max = max($ind);
      $z = array_search($max,$ind);
      $gew = array_search($farbi[$z],$tisch);
    }
    $gew++;
    echo "<br/>Der Gewinner ist Karte " . $gew;
    }
    if ($gew == 4) {
      $gew =0;
    }

    $gewinner = $_SESSION['opp'][$gew];

    $sppath = $id . "/spieler.txt";
    $file = file_get_contents($sppath, true);
    $spieler = json_decode($file);

    $y = array_search($gewinner,$spieler);
    $y++;

    $path = $id . "/stapel" . $y . ".txt";
    $file = file_get_contents($path, true);
    $stapel = json_decode($file);

    if ($stapel == null) {
      $stapel = [];
    }

    array_push($stapel, $tisch[0],$tisch[1],$tisch[2],$tisch[3]);

    file_put_contents($path, json_encode($stapel));
    file_put_contents($id . "/gewinner.txt", "[\"" . $gewinner . "\"]");
    file_put_contents($id . "/zug.txt", "[\"" . $gewinner . "\"]");
    file_put_contents($id . "/oldtisch.txt", json_encode($tisch));
    file_put_contents($tpath, "[]");

  }
}


?>

<meta http-equiv="refresh" content="0, URL=./">
