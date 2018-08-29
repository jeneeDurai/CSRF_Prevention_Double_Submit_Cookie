<?php

$csrf_value = $_POST["csrf_token"];


if(isset($_POST['itemName']) && $_POST['itemName'] !=null && isset($_POST['quantity']) && $_POST['quantity']!=null)
{
    if($_COOKIE['csrf_cookie']!=null)
    {
        if($csrf_value = $_COOKIE['csrf_cookie'])
        {
            
            readfile("success.html");
            
        }
    }
	else
	{
        readfile("error.html");
	}
}

?>