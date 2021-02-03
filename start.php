<?php
session_start();

$name = $_POST['name'];

if ($name != NULL) {
  $_SESSION['name'] = $name;
}

if ($_SESSION['name'] == NULL)
{
  echo "
  <div class=\"login\">
  <h1>Doppelkopf 2.0</h1>
          <form action=\"index.php\" method=\"post\">
            <input name=\"name\" type=\"text\" placeholder=\"Lege einen Namen fest...\">
            <button type=\"submit\">Absenden</button>
          </form>
        </div>";


}

else {
  echo "Hallo {$_SESSION['name']}! Session läuft :)<br/>";
}





/*$file = file_get_contents('user/' . $name . '.txt', true);
$file = json_decode($file);

if ($file == NULL)
{
  $file =[];
}
$a = date('r');
$b = time();

$new = array($a, $b);

file_put_contents ('user/' . $name . '.txt', json_encode($new), FILE_APPEND );*/



?>
