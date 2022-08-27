<?php
	session_start();

	require_once("connect_db.php");

	//*** Update Status
	$sql = "UPDATE db_admin SET LoginStatus = '0', LastUpdate = '0000-00-00 00:00:00' WHERE tb_admin_id  = '".$_SESSION['tb_admin_id']."' ";
	$query = mysqli_query($conn,$sql);

	session_destroy();
	header("location: ../index.php");
