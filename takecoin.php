<?php
	$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
	parse_str($query, $params);
	if(isset($params['access_token'])) {
		$token = $params['access_token'];
	} else {
		$token = null;
	}
	
    if ($token == null) {
		echo "";
	}else {	
		if ($fname == null) {
			$fname = "Luke";
		}
		if ($lname == null) {
			$lname = "Geiken";
		}
		$con=mysqli_connect("127.0.0.1","root","","isu_hackathon");

		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
		$denoms = Array(.01,.05,.10,.25);
		$amount = rand(0,count($denoms));
		$rows = mysqli_num_rows(mysqli_query($con,"SELECT * FROM activity"));
		$query = "INSERT INTO activity VALUES(0,'" . $fname . " " . $lname . "',1,0.01,'".$description."');";
		echo $query;
		$result = mysqli_query($con,$query);
		if (!$result) {
			echo "it failed\n";
		}
		mysqli_close($con);
		
		
		
		///exec("curl https://api.venmo.com/v1/payments -d access_token=" . $token . " -d email=g.hmeier%40yahoo.com -d amount=-0.01 -d note=I-took-a-wish-at-The-Wishing-Well");
		//echo "curl https://api.venmo.com/v1/payments -d access_token=" . $token . " -d email=g.hmeier%40yahoo.com -d amount=-0.01 -d note=I-took-a-wish-at-The-Wishing-Well";
		$cURL = curl_init();
		$url = "https://api.venmo.com/v1/payments?access_token=".$token."&amp;email=g.hmeier%40yahoo.com&amp;amount=0.01&amp;note=I-am-a-wish-stealer!";
		curl_setopt($cURL, CURLOPT_URL, $url);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, TRUE);
		
		$result = curl_exec($cURL);
		
		curl_close($cURL);
	   // echo $url."<br/>";
		
		
		$url = "http://localhost/~lucasgeiken/thewishingwell/?access_token=".$token . "&complete=2";
		header("Location: ".$url);
	}
?>