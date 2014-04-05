<!DOCTYPE HTML PUBLIC >
<?php

?>
<html>
<head>
	<title>The Wishing Well</title>
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link href="thewishingwellstylesheet.css" rel="stylesheet" type="text/css"/>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>  
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
	<script  src="script.js"></script>
	<script src="ProbablyFacebook.js"></script>
	<script>
		$(function() {
			$( "#dialog" ).dialog({ 
				autoOpen: false,
				draggable:false,
				resizable: false,
			});
			$( "#opener" ).click(function() {
				$( "#dialog" ).dialog( "open" );
			});
		});
		
	</script>
</head>

	<body>
		
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=388085874667662";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
		
		
		<div id="container">	
			
		
	
		<div id="container">
			<div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false"></div>
			<div id="theWell">
				<img src="img/wishingwell.png"/>
			</div>
			
			<div id="backgroundWishForm">
            </div>
			
			<div id="wishForm">
				<h1 style="font-size: 35px; margin-left: 0px;">Make A Wish!</h1>
				<?php
				$query = parse_url($_SERVER['PATH_INFO'], PHP_URL_QUERY);
				parse_str($query, $params);
				$token = $params['access_token'];
				if($token != null || $token != "")
				{
				?>
                                <button style="height:40px; width:300px; font-size:30px; font-family: fantasy;" onclick="authorize()">Venmo</button>
                                <?php
				echo "Logined in";
				?>
                                
                                
                                <button id="opener" style="height:40px; width:300px; font-size:30px; font-family: fantasy;" >BitCoin</button>
								<div id="dialog" title="Dialog Title">
									<h3 style="font-size: 16px;text-align: center;margin-left: 15px; margin-right: 15px;">We also have a BitCoin Generator that will
									run when clicked. This allows you to help mine BitCoins which will add more money to the well
									and more money to the Make-A-Wish Foundation. You just need to keep the webpage up and our site will use some
									of your computer's power to gain BitCoins. Thanks!</h3>
								</div>
								

			</div>

			<div id="backgroundUserFeed">
                        </div>
			<div id="userFeed">
				<div>
				<h1>FEED!!!</h1>
				<!--This is where the feed goes when it's up-->
				</div>
			</div>
		</div>

	</body>
</html>