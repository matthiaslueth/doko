<!DOCTYPE html>
<html>
<head>
  <style>
  * {margin:0;padding:0;}

  .card {
    width:117px;
    height:206px;
    margin-left:-26px;
    margin-top:0;
    transition: margin 0.5s;
  }

  .card:hover {
    transition: margin 0.5s;
    margin-top:-50px;
  }

input[type="radio"]:checked + label {
    border-radius:10px;
    background-color: green;
    margin-top:-50px;
    transition: margin 0.5s;
}

input[type="radio"] {
  display:none;
}

label {
  display:flex;
  justify-content: center;
  align-items: center;
}

  </style>
</head>
<body style="height:100vh;overflow:hidden;">

<?php

$arr = ["cards/CK1.png","cards/CK2.png","cards/CQ1.png","cards/CJ2.png","cards/CK1.png","cards/CK2.png","cards/CQ1.png","cards/CQ2.png","cards/CT1.png","cards/CT2.png"];

$i = 0;

$a = count($arr);

?>



<div style="position:absolute;bottom:-10px;display:flex;align-items:center;justify-content:center;width:100vw;">

<input type="radio" id="c" name="cards">
<label for="c" style="position:absolute;background:none;width:100vw;height:100vw;"></label>

<?php
while ($i < $a)
{
  $angle = ($i-$a/2)*3;
  $trans = ($i-$a/2)*($i-$a/2)*2.5;

  echo "<input type=\"radio\" id=\"c{$i}\" name=\"cards\">";
  echo "<label for=\"c{$i}\" class=\"card\" style=\"transform:rotate({$angle}deg) translate(0px, {$trans}px);\"><img src=\"" . $arr[$i] . "\"></label>";
  $i++;
}


?>
<div>

</body>
</html>
