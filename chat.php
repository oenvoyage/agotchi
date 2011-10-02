<?php
include "../connect.php";
include "functions.php";

print "<div id=\"chat\">"; # main div for chat
#---------------tests----------------
#------------------------------------
        #-------------- anti spam idle time SLEEPY mode -------------------
	#----checks if the sleepy=1 value is on , this value is set on refresh meta in headers.php

if (isset($_GET[input_json])) {
	$input_json = $_GET['input_json'];
	output("input JSON = $input_json");
	$input = json_decode($input_json,TRUE);
	output("input array");
	print_r($input);
	if ($input["msg"]) {
		$msg=$input["msg"];
		output("MESSAGE ----$msg");
	}
		
	output("----");
}
else {
	output("no input JSON");
}
if ($msg=clean_msg($msg)) {
	#------not SLEEPY---------
        $query = "INSERT INTO _rm_babel values('','v5_o','no fake nick','$msg',NOW(),'n','')";
        mysql_query($query);
}
	#$query="SELECT id,nick,fake_nick,msg,hour(heure)+14 AS heure,date_format(heure,'%i') AS minute,type,rem FROM _rm_$_SESSION[room] WHERE (type<>'p' OR (type='p' AND nick='$_SESSION[nick]') OR (type='p' AND rem='$_SESSION[nick]')) ORDER BY id DESC LIMIT $_SESSION[line]";
        $query = "SELECT * FROM _rm_babel ORDER BY id DESC LIMIT 10";
        $results = mysql_query($query);
	while ($row = mysql_fetch_object($results)) {
		$nick = $row->nick;
		$msg = $row->msg;
		$rem = $row->rem;
		$when = $row->heure;
		$type = $row->type;
		#print "$type : $nick ($when) :: $msg <br/>";
		$output_json .= json_encode($row);
	}
	print $output_json;

print "</div>";
?>
