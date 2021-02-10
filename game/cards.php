<?php session_start();

//$_SESSION['cards'] = "hcards/cards4";

?>
<html>
<head>
  <link rel="stylesheet" href="../style.css">
  <style>
  img {
    width:100px;
    height:150px;
  }

  label {
    width:auto;
    margin-top:20px;
  }

  input[type="radio"]:checked + label {
    margin:0;
    margin-top:20px;
  }
  </style>
</head>
<body>
<h1>Karten wechseln</h1>
<form action="./" method="post">
  <?php
    $i = 1;
    $n = 4;

    while ($i <= $n) {
    echo "<input type=\"radio\" id=\"x{$i}\" value=\"hcards/cards{$i}\" style=\"display:none;\" name=\"hcards\">";
    echo "<label for=\"x{$i}\"><img src=\"hcards/cards{$i}/back.png\"><img src=\"hcards/cards{$i}/CA.png\"></label>";
    $i++;
  }
    ?>
     <input type="submit" style="margin-left:50%;margin-top:20px;">
</form>
</body>
</html>
