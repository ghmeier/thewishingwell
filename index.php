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
		var strings = new Array("1000 wishes","999 wishes","a nice pony","to beat cassidy at 2048","that twitch will beat pokemon");
		$(document).ready(function() {
			$( "#bitcoin" ).click(function() {
				BitcoinPlusMiner("g.hmeier@yahoo.com");
			});
			setInterval( function() {
				moveString(strings[Math.floor(Math.random()*strings.length)]);
			},Math.random()*3000+1000);
		});
		
		
		function moveString(toMove) {
			var newPara = document.createElement("p");
			newPara.innerHTML = "\"" + toMove + "\"";
			var well = document.getElementById("theWell");
			well.appendChild(newPara);
			$(newPara).animate({fontSize:'40px',opacity:'0.0',left:(Math.random()*1000).toString(),bottom:'100%'},7000);

		}
		
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

				<h1 style="font-size: 35px; margin: 0px;">Make A Wish!</h1>
				<hr noshade></hr>
				<?php
				
				$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
				parse_str($query, $params);
				if (isset($params['access_token'])) {
					$token = $params['access_token'];
				} else {
					$token = null;
				}
				if($token == null || $token == "")
				{
				?>
                                <button id="venmo" class="wellButton" style="height:40px; width:300px;" onclick="authorize()"><img src="img/venmo_logo_white.png" style="width:132; height:25"/></button>                    
                                <button id="bitcoin" class="wellButton" title="Bitcoin Miner" style="height:40px;width:300px;"><img src="img/bitcoin-logo.png" style="width:132"/></button>

				<!--<h3 style="font-size: 16px;text-align: center;margin-left: 15px; margin-right: 15px;">We also have a BitCoin Generator that will
				run when clicked. This allows you to help mine BitCoins which will add more money to the well
				and more money to the Make-A-Wish Foundation. You just need to keep the webpage up and our site will use some
				of your computer's power to gain BitCoins. Thanks!</h3>-->
				
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