<style type="text/css">
<!--
a {
	color: #F63;
}
input {
	border: 1px solid #CCC;
	color: #666;
	font-weight: normal;
}
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 15px;
	color: #666;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	letter-spacing: -1px;
}
.info
{
	text-align:left;
	padding: 10px;
	margin: 10px;
	background-color: #FFF9CE;
	border: 1px dotted #F90;
}

-->
</style>

<BODY>
<div style="background-color:#333; padding:10px">
<a href="https://videowhisper.com/?p=2+Way+Video+Chat"><img src="templates/2wvc/logo.png" alt="2 Way Video Chat Script" border="0"></a></div>
<p>
<?php
$room = $_POST['room'];
$r = $_GET['r'];

include_once("incsan.php");
sanV($room);
sanV($r);



if ($r)
{
	?>
<div class="info">
  <strong>Who are you? </strong>
   <script language="JavaScript">
			function censorName()
			{
				document.adminForm.username.value = document.adminForm.username.value.replace(/^[\s]+|[\s]+$/g, '');
				document.adminForm.username.value = document.adminForm.username.value.replace(/[^0-9a-zA-Z_\-]+/g, '-');
				document.adminForm.username.value = document.adminForm.username.value.replace(/\-+/g, '-');
				document.adminForm.username.value = document.adminForm.username.value.replace(/^\-+|\-+$/g, '');
				if (document.adminForm.username.value.length>3) return true;
				else
				{
				alert("Username should be 3 chars or more!");
				document.adminForm.button.disabled=false;
				document.adminForm.button.value="Enter Video Chat";
				return false;
				}
			}
			</script>
<form id="form1" name="adminForm" method="post" action="2wvideochat.php" onSubmit="return censorName()">
  I am
    <input name="username" type="text" id="username" value="Guest" size="12" maxlength="16" onChange="censorName()" />.
  <input name="r" type="hidden" id="r" value="<?=$r?>" size="16" maxlength="32" />
  <br>
  <br>
  <input type="submit" name="button" id="button" value="Enter Video Chat" onclick="this.disabled=true; censorName(); this.value='Loading...'; adminForm.submit();" />
</form>
</div>
<div class="info">
  <p><strong>Instructions</strong></p>
  <p> <img src="images/flashplayer.png" alt="Flash Player" width="48" height="48" align="absmiddle">This application requires Flash browser plugin. <script type="text/javascript" src="flash_detect_min.js"> </script>
	<script type="text/javascript">

	var updateWarning = false;

	if(FlashDetect.installed)
	{
	document.write("Flash version detected: " + FlashDetect.major + "."+ FlashDetect.minor + " ");


	if(!FlashDetect.versionAtLeast(11, 2))
	{
		document.write("Flash was detected but is too old to run this application. Upgrade your Flash plugin to proceed!");
		updateWarning = true;
	}

	}
	else
	{
		document.write("Flash was not detected in your browser: Flash plugin is required to use this application!");
		updateWarning = true;
	}

	if (updateWarning)	document.write("<B class=warning>Update to latest flash player: <a href=\"https://get.adobe.com/flashplayer/\" target=\"_blank\">https://get.adobe.com/flashplayer/</a> !</B>");
	</script> <br>
    <img src="images/headphones.png" alt="Headphones" width="48" height="48" align="absmiddle">To avoid echo make sure your microphone is not pointed to your speakers or  use headphones. <br>
  <img src="images/settings.png" alt="Settings" width="48" height="48" align="absmiddle">Allow flash to send your stream and select the right video and audio devices you want to use:</p>
  <table width="100%" border="0">
    <tr valign="top">
      <td><img src="images/flashsettings.png" alt="Use Headphones"></td>
      <td><p>        When the application starts, flash will ask you if you want to start streaming your camera and microphone. Click in this order:<br>
          <strong>1</strong>. <u>Allow,</u> to enable streaming your webcam and microphone.<br>
          <strong>2</strong>. <u>Remember</u>, so you don't get asked about this each time.<br>
          <strong>3</strong>. <u>Close</u>, to close this dialog and start chatting.</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>          Flash settings will also show for changing camera or microphone device. <br>
        </p>
        <p>Hardware selection can be started in 2 ways:<br>
          a.
From the chat application by hovering the mouse over the panel with your webcam an clicking webcam or microhone icon and title. If this settings panel is disabled by webmaster use second method:<br>
b. Right
click flash and select Settings... in the popup menu.
Click bottom icons to see different setting panels (i.e. the webcam icon on the right for webcam selection).</p>
<p>        Depending on  computer hardware and installed drivers multiple audio video devices can be availabe including internal/external cameras, tuners, virtual screen sharing drivers. If you don't know which one  is the webcam you want to use, just try each item in the list. </p></td>
    </tr>
  </table>
</div>
    <?
}
elseif ($room)
{
	if ($room=="InstantChat") $room="InstantChat_".base_convert((time()-1225000000).rand(0,10),10,36);

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

	$url= $protocol . $_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];
	$roomlink=$url."?r=".urlencode($room);

?>   <div class="info">
      <p>Step 2:
        <strong>Instant Video Chat Room
        <em>
  <?=$room?>
        </em>Created! </strong>
        <SCRIPT LANGUAGE="JavaScript">
function copytext(theField) {
var tempval=eval("document."+theField);
tempval.focus();
tempval.select();
textrange=tempval.createTextRange()
textrange.execCommand("Copy");
}
        </script>
</p>
      </p>
      <form name="linkform" id="linkform" method="post">
        <div align="center">
  <p align="left">
  <u>Room Access Link</u><br>
    <input name="linktext" id="linktext" type="text" value="<?=$roomlink?>
" size="85" maxlength="200" readonly="readonly" />
  <input onClick="copytext('linkform.linktext')" type="button" value="Select" name="cpy">
  </p>
  <p align="left">1. Send the link above to invite somebody by email or instant message to an instant private 2 way video chat!<br />
    2. <a href="<?=$roomlink?>">Click here to enter the room</a> and wait for the other person to join.</p>
</div>
</form></div>
<?
}else
{
	?>   <div class="info">
<p>Step 1: <strong>Create instantly a 2 Way Video Chat room</strong></p>
    			<script language="JavaScript">
			function censorName()
			{
				document.adminForm.room.value = document.adminForm.room.value.replace(/^[\s]+|[\s]+$/g, '');
				document.adminForm.room.value = document.adminForm.room.value.replace(/[^0-9a-zA-Z_\-]+/g, '-');
				document.adminForm.room.value = document.adminForm.room.value.replace(/\-+/g, '-');
				document.adminForm.room.value = document.adminForm.room.value.replace(/^\-+|\-+$/g, '');
				if (document.adminForm.room.value.length>0) return true;
				else
				{
				alert("A room name is required!");
				document.adminForm.button.disabled=false;
				document.adminForm.button.value="Create";
				return false;
				}
			}
			</script>
<form id="form1" name="adminForm" method="post" action="index.php">
  <input name="room" type="text" id="room" value="InstantChat" size="20" maxlength="64" onChange="censorName()"/>
  <input type="submit" name="button" id="button" value="Create" onclick="this.disabled=true; censorName(); this.value='Loading...'; adminForm.submit();"/>

</form></div>
    <?
}

include("clean_older.php");
?>
