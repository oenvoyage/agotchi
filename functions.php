<?php
function test($qq) {
	$a=func_get_args();
	print "qq=$qq[3]- a=--$a--<br/>";
	foreach ($a as $line) {
		print "fg =$line<br/>";
	}
}
function debug($debug_text) {
	#print "ddd = $_SESSION[debug]";
    if ($_SESSION[debug]) {
   #if (1) {
	if ($debug_text=="session") {
		print"#### session = ";
		print_r($_SESSION) ;
		print"<br/>";
	}
	else {
		print "### $debug_text<br/>";
	}
    }
}
function output($output,$class="") {
	#print $_SESSION[txt]->general_info." $output<br/>";
	# print "<div class=\"output\">$output</div>";
	print "<div class=\"$class\">$output</div>";
}
function output_spacer() {
	print "------------------<br/>";
}
function clean_msg($msg) {
	#placeholder for cleaning messages
	return $msg;
}
