<?php session_start(); ?>
<html>

<head>
	<title></title>

	<style>
		#messages {

			margin: 0 auto;
			margin-top: 30px;
			border: 1px solid #ddd;
			max-width: 600px;
			height: 500px;
			padding: 40px;
			overflow-x: hidden;
			overflow-y: auto;
			display: block;
			/* width: fit-content */
			/* word-break: break-all;  */

		}

		/** input */
		#msg {
			padding: 18px;
			border: 1px solid #ddd;
			width: 620px;
			/* margin: 10px; */
			align-items: flex-start;
		}

		#sender_name {
			color: green;
			margin-top: 2px
		}

		#receiver_name {
			color: red;
			margin-top: 2px;

		}

		#msg-btn {
			/* padding: 5px; */
			font-size: 18px;
			font-family: 'Courier New', Courier, monospace;
			background: dodgerblue;
			color: white;
			border: 0 solid
				/* width: 200px; */
				/* height:inherit; */
				/* margin:10px */
		}

		.sender {
			font-size: 18px;
			padding: 10px;
			margin-left: auto;
			word-wrap:break-word;
			background: dodgerblue;
			color: white;
			margin-top: 5px;
			border-radius: 15px;
			max-width:fit-content;
			min-width:auto;
			/* text-align: center; */
			/* word-break: break-all; */
			/* margin-l:89px */
		}

		.receiver {
			font-size: 18px;
			padding: 10px;
			margin-right: auto;
			word-wrap: break-word;
			text-align: center;
			/* word-break: inherit; */

			background: #eee;
			margin-top: 5px;
			border-radius: 15px;
			max-width:fit-content;
			min-width:auto;
		}
	</style>

</head>


<body>

	<?php

	if (isset($_REQUEST['oid']) && isset($_REQUEST['oname'])) {

		echo "your peer is :" . $_REQUEST['oname'] . "<a href='../users/logout.php'>logout</a>";

		//creating a session id for other_id[for peer]

		$_SESSION['other_id'] = $_REQUEST['oid'];
		$_SESSION['oname'] = $_REQUEST['oname'];
	}


	echo "<script> 
        const my_id = '" . $_SESSION['u_id'] . "'
	const other_id = '" . $_SESSION['other_id'] . "'
	const my_name = '" . $_SESSION['u_uname'] . "';
	const other_name = '" . $_SESSION['oname'] . "';
</script>";

	?>






	<!-- chat box-->
	<div id="messages">

	</div>

	<div style="padding-top:10px;width:fit-content;display:block;margin:0 auto;display:flex;flex-direction:row">
		<input type="text" id="msg" name="message">
		<button type="submit" onclick="sendMessage()" id="msg-btn">send</button>
		<input type="hidden" value="<?php echo $_REQUEST['oid'];  ?>" id="other_id">
	</div>

	<script src="main.js"> </script>

</body>

</html>