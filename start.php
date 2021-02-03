<?php
session_start();

$name = $_POST['name'];

if ($name != NULL) {

  $file = file_get_contents('user/user.txt', true);
  $file = json_decode($file);

  if ($file == NULL)
  {
    $file =[];
  }

  if (in_array($name, $file))
  {
    echo "Username ist vergeben. Session übernehmen?";
  }

  else {
    $_SESSION['name'] = $name;
    array_push($file, $name);
    file_put_contents ('user/user.txt', json_encode($file));
  }

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
  //echo "Hallo {$_SESSION['name']}! Session läuft :)<br/>";
}






?>
