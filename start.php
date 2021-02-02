<?php
session_start();

$name = $_POST['name'];

if ($name == NULL) {

}

else {
  $_SESSION['name'] = $name;

}

if ($_SESSION['name'] == NULL)
{


  echo "<form action=\"index.php\" method=\"post\">
          Name: <input name=\"name\" type=\"text\">
          <button type=\"submit\">Absenden</button>
        </form>";
}

else {
  echo "Hallo {$_SESSION['name']}! Session läuft :)";
}



?>
