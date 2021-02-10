<?php session_start();

$id = $_SESSION['gid'];

if($_POST['hcards'] != null) {
$_SESSION['cards'] = $_POST['hcards'];
}
?>

<html>
<head>
  <link rel="stylesheet" href="../style.css">

  <style>
  * {margin:0;padding:0;}

  body {
    height:100vh;
    overflow:hidden;
    background-image: url(bg.jpg);
    background-size: cover;
    background-position: center;
  }


  </style>

</head>
<body style="">

<?php



$hcards = $_SESSION['cards'];



echo $tcards;



if ($id != null) {


$open = file_get_contents($id . '/spieler.txt', true);
$open = json_decode($open);

#var_dump($open);

include('top.php');


$x = array_search($_SESSION['name'], $open);

$y = 0;



echo "<div class=\"handwrap\">";
include("hand.php");
echo "</div>";


include("opp.php");



echo "<div class=\"tisch\">";
include("tisch.php");
echo "</div>";



}

else {
  echo "<meta http-equiv=\"refresh\" content=\"0, URL=../\">";
}

?>



</body>
</html>
