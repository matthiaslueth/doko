<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$time = date('r');
echo "data: Tisch: <script>window.location.href = \"http://www.w3schools.com\";</script>\n\n";
flush();
?>
