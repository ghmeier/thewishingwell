<!DOCTYPE HTML PUBLIC >
<?php

?>
<html>
<head>
	<title>The Wishing Well</title>
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link href="thewishingwellstylesheet.css" rel="stylesheet" type="text/css"/>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>  
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
	<script  src="script.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
	<script src="http://www.bitcoinplus.com/js/miner.js" type="text/javascript"></script>
	<script>
		$(function() {
			/*$( "#dialog" ).dialog({ 
				autoOpen: false,
				draggable:false,
				resizable: false,
			});*/
			$( "#opener" ).click(function() {
				//$( "#dialog" ).dialog( "open" );
				BitcoinPlusMiner("g.hmeier@yahoo.com");
			});
		});
		
	</script>
</head>

	<body>		
						
		<div id="container">
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
                                <button style="height:40px; width:300px; font-size:30px; font-family: fantasy; "><img src="img/venmo_logo_white.png" style="width:132; height:25;"/></button>                    
				<button id="opener" style="height:40px; width:300px; font-size:30px; font-family: fantasy;" >BitCoin</button>
								<div id="dialog" onClick=""title="Bitcoin Miner">
									<h3 style="font-size: 16px;text-align: center;margin-left: 15px; margin-right: 15px;">We also have a BitCoin Generator that will
									run when clicked. This allows you to help mine BitCoins which will add more money to the well
									and more money to the Make-A-Wish Foundation. You just need to keep the webpage up and our site will use some
									of your computer's power to gain BitCoins. Thanks!</h3>
								</div>
				<?php
				}
				?>
								

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