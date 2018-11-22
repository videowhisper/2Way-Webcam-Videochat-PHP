<?php
/*
POST Variables:
u=Username
s=Session, usually same as username
r=Room
ct=session time (in milliseconds)
lt=last session time received from this script in (milliseconds)
*/

$room=$_POST[r];
$session=$_POST[s];
$username=$_POST[u];

$currentTime=$_POST[ct];
$lastTime=$_POST[lt];

$maximumSessionTime=0; //900000ms=15 minutes (in free mode this is forced)

$redirect_url=urlencode(""); //disconnect and redirect to url
$disconnect=urlencode(""); //disconnect with that message to standard disconnect page
$message=urlencode(""); //show this message to user
$send_message=urlencode(""); //user sends this message to room
$next_room=urlencode(""); //user is moved to this room

?>timeTotal=<?=$maximumSessionTime?>&timeUsed=<?=$currentTime?>&lastTime=<?=$currentTime?>&disconnect=<?=$disconnect?>&message=<?=$message?>&send_message=<?=$send_message?>&redirect_url=<?=$redirect_url?>&loadstatus=1