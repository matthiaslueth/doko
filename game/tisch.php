<?php
session_start();

$hcards = $_SESSION['cards'];
/*var_dump($_SESSION['opp']);
echo $stsp[0];
echo $z;*/
?>


<input type="radio" id="a0" class="a0" name="tisch">
<input type="radio" id="a1" name="tisch">
<input type="radio" id="a2" name="tisch">
<input type="radio" id="a3" name="tisch">




<div id="result"></div>


<head>
  <style>
  #result {

  }
  <?php

  $a = rand(0,20);
  $a = $a-10;

  $b = rand(0,20);
  $b = $b-10;

  $c = rand(0,20);
  $c = $c-10;

  $d = rand(0,20);
  $d = $d-10;
  echo "

    .b {
      position: absolute;
      margin-top: auto;
      margin-bottom: auto;
      margin-left:auto;
      margin-right:auto;
      top: 0;
      filter:sepia(0.5);
      transform: rotate({$d}deg);
      left: 0;
      right: 0;
      max-height:200px;
    }";
    $a = $a + 0;
    $b = $b + 90;
    $c = $c + 180;
    $d = $d + 270;

    if ($z == 0) {

    echo "
      .a0 {
        top: 100px;
        transform: rotate({$a}deg);
      }
      .a1 {
        transform: rotate({$b}deg);
        left: -150px;
      }
      .a2 {
        top: -100px;
        transform: rotate({$c}deg);
      }
      .a3 {
        transform: rotate({$d}deg);
        right: -150px;
      }";
  }

    if ($z == 1) {

    echo "
      .a0 {
        left: -150px;
        transform: rotate({$b}deg);
      }
      .a1 {
        transform: rotate({$c}deg);
        top: -100px;
      }
      .a2 {
        right: -150px;
        transform: rotate({$d}deg);
      }
      .a3 {
        top: 100px;
        transform: rotate({$a}deg);

      }";
  }

  if ($z == 2) {

  echo "
    .a0 {
      top: -100px;
      transform: rotate({$c}deg);
    }
    .a1 {
      transform: rotate({$d}deg);
      right: -150px;
    }
    .a2 {
      top: 100px;
      transform: rotate({$a}deg);
    }
    .a3 {
      transform: rotate({$b}deg);
      left: -150px;
    }";
}

if ($z == 3) {

echo "
  .a0 {
    right: -150px;
    transform: rotate({$d}deg);
  }
  .a1 {
    transform: rotate({$a}deg);

    top: 100px;
  }
  .a2 {
    left: -150px;
    transform: rotate({$b}deg);
  }
  .a3 {
    transform: rotate({$c}deg);
    top: -100px;
  }";
}

   ?>
  </style>
</head>

<script>
if(typeof(EventSource) !== "undefined") {


  var source = new EventSource("<?php echo $_SESSION['gid']; ?>/info.php");

  source.onmessage = function(event) {
    document.getElementById("result").innerHTML ="";
    var obj = JSON.parse(event.data);
    var n = obj[0].length;
    if (n >= 4) {
        document.getElementById("dran").innerHTML = "<meta http-equiv=\"refresh\" content=\"3, URL=../\">";
    }
    var i = 0;
    while (i<n) {
      document.getElementById("result").innerHTML += "<label for=\"a" + i + "\" style=\"display:flex;\" class=\"b a" + i + "\"><img src=\"<?php echo $hcards; ?>/" + obj[0][i] + ".png\"/></label>";
      i++;
    }
    document.getElementById("dran").innerHTML = obj[1][0] + " • Gewinner:" + obj[1][1] + " • Letzter Stich: " + obj[2][0] + ", " +  obj[2][1] + ", " + obj[2][2] + ", " + obj[2][3];
if (obj[2][0] != null) {
    document.getElementById("lstich").innerHTML = "<img src=\"<?php echo $hcards; ?>/" + obj[2][0]+ ".png\"/>" + "<img src=\"<?php echo $hcards; ?>/" + obj[2][1] + ".png\"/>" + "<img src=\"<?php echo $hcards; ?>/" + obj[2][2]+ ".png\"/>" + "<img src=\"<?php echo $hcards; ?>/" + obj[2][3]+ ".png\"/>";
}
else {
  document.getElementById("lstich").innerHTML = "<head><style>#lstich + span {display:none;}</style></head>";
}

  };
} else {
  document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
}
</script>
