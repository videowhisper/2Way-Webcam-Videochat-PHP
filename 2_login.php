<?php
include("inc.php");
$username=$_COOKIE[user_name];
$room=$_GET['room_name'];
$loggedin=1;

if (!$room||!$username)
	{
		$loggedin=0;
		$message=urlencode("<a href=\"index.php\">You need a cookie enabled browser!</a>");
}

//replace bad words or expression
$filterRegex=urlencode("(?i)(fuck|cunt)(?-i)");
$filterReplace=urlencode(" ** ");

$day=date("y-M-j",time());
$chat="uploads/$room/Log$day.html";
$chatlog="The transcript of this conversation, including snapshots is available at <U><A HREF=\"$chat\" TARGET=\"_blank\">$chat</A></U>.";

if (!$welcome) $welcome="Welcome to $room! This will try to use P2P video streaming if possible between peers and stream trough server if that's not possible: use connection button to toggle if available. There is a next button that can lead to a different room if enabled. High quality snapshots of other person can be taken on request. $chatlog";

//verboseLevel (higher reports more to user):
//0 = Nothing
//1 = Failure
//2 = Warning / Recoverable Failure
//3 = Success
//4 = Action

//layout obtained by sending in public chat box "/videowhisper layout"; fill in new line between layoutEND markers
$layoutCode=<<<layoutEND
id=soundfx&x=766&y=571; id=bFul&x=15&y=105; id=VideoSlot2&x=510&y=140; id=ChatSlot&x=250&y=505; id=VideoSlot1&x=10&y=140; id=TextInput&x=250&y=670; id=head2&x=510&y=100; id=logo&x=389&y=25; id=bSnd&x=920&y=107; id=head&x=10&y=100; id=next&x=186&y=521; id=bVid&x=885&y=109; id=connection&x=186&y=571; id=bLogout&x=950&y=10; id=bFul2&x=955&y=105; id=bSwap&x=120&y=111; id=bSwap2&x=850&y=111; id=snapshot&x=766&y=621; id=camera&x=186&y=621; id=bCam&x=85&y=109; id=bMic&x=50&y=107; id=buzz&x=766&y=521
layoutEND;

$chatTextColor = "#";
for ($i=0;$i<3;$i++) $chatTextColor .= rand(0,70);

?>fixOutput=decoy&server=<?=$rtmp_server?>&serverAMF=<?=$rtmp_amf?>&serverProxy=best&serverRTMFP=<?=$rtmfp_server?>&room=<?=urlencode($room)?>&welcome=<?=urlencode($welcome)?>&username=<?=$username?>&msg=<?=$message?>&loggedin=<?=$loggedin?>&showTimer=1&showCredit=1&disconnectOnTimeout=0&camWidth=320&camHeight=240&camFPS=15&camBandwidth=70000&limitByBandwidth=1&camPicture=0&showCamSettings=1&camMaxBandwidth=250000&disableBandwidthDetection=1&disableUploadDetection=1&verboseLevel=4&disableVideo=0&disableSound=0&bufferLive=0.2&bufferFull=0.2&bufferLivePlayback=0.2&bufferFullPlayback=0.2&videoCodec=H263&codecProfile=main&codecLevel=3.1&soundCodec=Nellymoser&soundQuality=9&micRate=22&silenceLevel=0&silenceTimeout=0&micGain=50&filterRegex=<?=$filterRegex?>&filterReplace=<?=$filterReplace?>&disableEmoticons=0&showTextChat=1&sendTextChat=1&webfilter=0&enableP2P=0&enableServer=1&configureConnection=0&configureSource=0&enableNext=1&enableBuzz=1&enableSoundFx=1&requestSnapshot=1&enableButtonLabels=1&enableFullscreen=1&enableSwap=1&enableLogout=1&enableLogo=1&enableHeaders=1&enableTitles=1&videoW=480&videoH=365&video2W=480&video2H=365&layoutCode=<?=urlencode($layoutCode)?>&chatTextColor=<?=$chatTextColor?>&autoSnapshots=1&snapshotsTime=20000&adServer=<?=urlencode('2_ads.php')?>&adsInterval=600000&adsTimeout=20000&pushToTalk=0&silenceToTalk=1&templateFolder=2wvc&imageBackground=background.jpg&imageLogo=logo.png&loadstatus=1