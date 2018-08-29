<!DOCTYPE html>
<html>

<head>
	<title>Cross Site Request Foregery Protection using Double Submit Cookies</title>
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	$(document).ready(function()
	{
		var name = "csrf_cookie" + "=";
		var cookie_value = "";
		var decoded_cookie = decodeURIComponent(document.cookie);
		var d = decoded_cookie.split(';');
		for(var i = 0; i <d.length; i++) 
		{
			var c = d[i];
			while (c.charAt(0) == ' ') 
			{
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) 
			{
				cookie_value = c.substring(name.length, c.length);
				document.getElementById("csrf_token_hidden").setAttribute('value', cookie_value);
			}
		}
	});
	</script>
</head>

<body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                        <span class="login100-form-title-1">
						Make Order
					</span>
                    </div>

                    <form class="login100-form validate-form" method="post" action="addOrder.php">
                        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                            <span class="label-input100">Item Name</span>
                            <input class="input100" type="text" name="itemName" placeholder="Enter item name">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                            <span class="label-input100">Quantity</span>
                            <input class="input100" type="number" name="quantity" placeholder="Enter Quantity">
                            <span class="focus-input100"></span>
                        </div>
                        <input type="hidden" name="csrf_token" value="" id="csrf_token_hidden"/>

                        <div class="container-login100-form-btn">
                            <input type="submit" class="login100-form-btn" value="Order">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>