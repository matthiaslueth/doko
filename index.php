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


echo "<a style=\"position:absolute;right:15px;top:10px;\" href=\"destroy.php\">Logout</a>";


?>
</body>
</html>
