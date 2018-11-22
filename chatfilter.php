<?php
//this can be used to change messages live on web server before posting, for advanced message filtering functions or integration of chat translation APIs

$message = $_POST['m'];
$session=$_POST['s'];
$username=$_POST['u'];

$filtered = ucwords($message) . " (web filter test - ucwords)";
$filtered = urlencode($filtered);

?>m=<?php echo $filtered; ?>