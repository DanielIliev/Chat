<?php
	class Chat {
		protected $stream;
		protected $lines = 0;
		protected $data;

		function countLines() {
			while (!feof($this->stream)) {
				$this->lines++;
			}
			return $this->lines;
		}

		function Close() {
			fclose($this->stream);
		}

		function __construct($filename) {
			$this->stream = fopen($filename, 'r');
		}

		function __destruct() {}
	}

	$chat = new Chat('../other/chatData.txt');
	echo $chat->countLines();
	$chat->Close();
?>
