<?php session_start();

if (isset($_POST['stich'])){
  $tisch = file_get_contents('./tisch.txt', true);
  $tisch = json_decode($tisch);

  $stapelpath = "./stapel" . $nr . ".txt";;
  $stapel = file_get_contents($stapelpath, true);
  $stapel = json_decode($stapel);

  if ($stapel == null)
  {
    $stapel = [];
  }



  array_push($stapel, strval($tisch[0][1]));
  array_push($stapel, strval($tisch[1][1]));
  array_push($stapel, strval($tisch[2][1]));
  array_push($stapel, strval($tisch[3][1]));

  //$stapel = json_encode($stapel);
  file_put_contents ($stapelpath, json_encode($stapel));

  $tisch = [];
  $tisch = json_encode($tisch);
  file_put_contents ('./tisch.txt',$tisch);

  echo "<meta http-equiv=\"refresh\" content=\"2; URL=./\">";

  echo "<audio autoplay>
  <source src=\"stich.mp3\" type=\"audio/mpeg\">
  Your browser does not support the audio element.
</audio>";
}

?>
