<?php 

session_start();
echo $_SESSION['u_id'];

echo "<script> 
	const name = '".$_SESSION['u_id']."'
</script>";
?>


<script src="test.js"> </script>
