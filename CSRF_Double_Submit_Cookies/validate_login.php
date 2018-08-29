<?php

	if(isset($_POST['username']) && isset($_POST['password']))
	{
		$uname=$_POST['username'];
		$psw=$_POST['password'];

		if (($uname=='root') && ($psw=='root'))
		{	
			session_start();
			$csrf_token_value = base64_encode(openssl_random_pseudo_bytes(32));
			$_SESSION['csrf_token'] = $csrf_token_value;
			$session_id = session_id();
			setcookie('session_cookie',$session_id,time()+60*60*24*30,'/');
			setcookie('csrf_cookie',$_SESSION['csrf_token'],time()+60*60*24*30,'/');

            readfile("home.php");
		}

		else
		{
			echo "INVALID LOGIN. PLEASE TRY AGAIN.";
			exit();
		}

	}

?>
