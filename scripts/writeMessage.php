<?php
	$file = '../other/chatData.txt';
	function getNumbersOfLines($filename) {
		$linecount = 0;
		$handle = fopen($filename, 'r');
		while(!feof($handle)){
			$line = fgets($handle);
			$linecount++;
		}
		return $linecount;
		fclose($handle);
	}
	function deleteMessageFromLog($filename) {
		$file = file($filename);
		$output = $file[0];
		unset($file[0]);
		file_put_contents($filename, $file);
	}
	function writeMessage($filename, $user, $msg) {
		$handle = fopen($filename, 'a');
		$temp = $user . ': ' . $msg . "<br>\n";
		fwrite($handle, $temp);
		fclose($handle);
	}
	$user = $_POST['getname'];
	$msg = htmlentities($_POST['usermsg']);
	writeMessage($file, $user, $msg);
	$linesNum = getNumbersOfLines($file);
	if ($linesNum > 20) deleteMessageFromLog($file);
?>
