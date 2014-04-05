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
		function validateForm()
		{
			var x=document.forms["input"]["desc"].value;
			if (x==null || x=="")
			{
			alert("Please write your wish.");
			return false;
			}
			
			return true;
			
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

				<h1 style="font-size: 35px; margin-left: 0px;">Make A Wish!</h1>
				<?php
				$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
				parse_str($query, $params);
				if(isset($params['access_token'])) {
					$token = $params['access_token'];
				} else {
					$token = null;
				}
				if($token == null || $token == "")
				{
				?>
                                <button id="venmo" class="wellButton" style="height:40px; width:300px;" onclick="authorize()"><img src="img/venmo_logo_white.png" style="width:132; height:25"/></button>                    
                                <button id="open" title="Bitcoin Miner"></button>

			
				<h3 style="font-size: 16px;text-align: center;margin-left: 15px; margin-right: 15px;">We also have a BitCoin Generator that will
				run when clicked. This allows you to help mine BitCoins which will add more money to the well
				and more money to the Make-A-Wish Foundation. You just need to keep the webpage up and our site will use some
				of your computer's power to gain BitCoins. Thanks!</h3>
				
				<?php
				} else {
					$url = 'https://api.venmo.com/v1/me?access_token='.$token;

					$cURL = curl_init();
					
					curl_setopt($cURL, CURLOPT_URL, $url);
					curl_setopt($cURL, CURLOPT_RETURNTRANSFER, TRUE);
					
					$result = curl_exec($cURL);
					
					curl_close($cURL);
					
					$json = json_decode($result, true);
					$personId = $json[data][user][id];
					$first_name = $json[data][user][first_name];
					$last_name = $json[data][user][last_named];

					
						
				
				
					
				?>
				<form name="input" action="makePayment.php" method="post" onsubmit="return validateForm()">
					<table>
						<td>
							<tr><h3>Your Wish</h3></tr>
							<tr><input type="text" name="desc" style="width:360px;"/></tr>
						</td>
					</table>
					<div>
						<div style="position: absolute; margin-left: 15%;">
							<h3>$0.01</h3>
							<input type="radio" name="amount" value="-0.01"/>
						</div>
						<div style="position: absolute; margin-left: 35%;">
							<h3>$0.05</h3>
							<input type="radio" name="amount" value="-0.05"/>
						</div>
						<div style="position: absolute; margin-left: 55%;">
							<h3>$0.10</h3>
							<input type="radio" name="amount" value="-0.10"/>
						</div>
						<div style="position: absolute; margin-left: 75%;">
							<h3>$0.25</h3>
							<input type="radio" name="amount" value="-0.25"/>
						</div>
					</div>
					<input type="hidden" name="token" value="<?php echo $token; ?>"/>
					<input type="hidden" name="id" value="<?php echo $personId; ?>"/>
					<input type="hidden" name="fname" value="<?php echo $first_name; ?>"/>
					<input type="hidden" name="lname" value="<?php echo $last_name; ?>"/>
					<input type="submit" value="Submit" style="margin-top: 20%;"/>
				</form>
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