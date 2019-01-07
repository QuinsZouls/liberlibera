<?php
		@ob_start();
		session_start();
?>
<?php
  if(!isset($_SESSION))session_start();
  $_SESSION = array();
  unset( $_SESSION );
  setcookie('PHPSESSID', ", time()-360000,'/', ", 0, 0);
	session_destroy();
	header("Location:../../../");
	exit();
?>
