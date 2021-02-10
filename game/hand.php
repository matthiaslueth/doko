<?php
session_start();

$hcards = $_SESSION['cards'];

$x = array_search($_SESSION['name'], $open)+1;

$_SESSION['sid'] = $x;

$handc = file_get_contents($id . '/spieler' . $x . '.txt', true);
$handc = json_decode($handc);

$i = 0;

$a = count($handc);

?>



<form class="hand" action="stich.php" method="POST">


<!--input type="radio" id="c" name="cards">
<label for="c" style="position:absolute;background:none;width:120vw;height:30vh;box-shadow:0 0 0 0;"></label-->

<?php
while ($i < $a)
{
  $angle = ($i-$a/2)*3;
  $trans = ($i-$a/2)*($i-$a/2)*2.5;

  echo "<input type=\"radio\" id=\"c{$i}\" name=\"cards\" value=\"{$handc[$i]}\">";
  echo "<label for=\"c{$i}\" class=\"card\" style=\"transform:rotate({$angle}deg) translate(0px, {$trans}px);\"><img src=\"{$hcards}/" . $handc[$i] . ".png\"></label>";
  $i++;
}


?>
<input type="submit" class="ccc" value="Karte spielen">
</form>
