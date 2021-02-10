<?php
session_start();
?>

<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>



<?php

//Session starten, wenn keine existiert.

include("start.php");
include("lobby.php");

if ($_SESSION['name'] != NULL){

echo "<div style=\"position:absolute;right:0px;top:0px;padding:10px;background-color:#eee;border-left:1px solid black;border-bottom:1px solid black;border-radius:0 0 0 5px;\">{$_SESSION['name']} • <a href=\"destroy.php\">Logout</a></div>";
}

?>


</body>
</html>
