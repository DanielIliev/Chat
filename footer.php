	<!-- Custom Scripts -->
	<script src="scripts/scripts.js"></script>
	<script>
		$(function() {
			setInterval(function() {
				$("#chat-area").load("scripts/fetchChat.php");
			}, 1000);
		});
	</script>
</body>
</html>
