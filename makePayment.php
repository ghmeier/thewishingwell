<?php
    $description = ($_POST["desc"]);
    $amount = ($_POST["amount"]);
    $token = ($_POST["token"]);
    $personId = ($_POST["id"]);
    $fname = ($_POST["fname"]);
    $lname = ($_POST["lname"]);
    if ($fname == null) {
		$fname = "Default";
	}
	if ($lname == null) {
		$lname = "User";
	}
    
    $con=mysqli_connect("localhost","root","Goringelitistmarmot1","isu_hackathon");

    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
    $rows = mysqli_num_rows(mysqli_query($con,"SELECT * FROM activity"));
    $query = "INSERT INTO activity VALUES(0,'" . $fname . " " . $lname . "',0,".-$amount.",'".$description."');";
    $result = mysqli_query($con,$query);
	if (!$result) {
		echo "it failed\n";
	}
    mysqli_close($con);
    
    
    $url = "https://api.venmo.com/v1/payments?access_token=" . $token . "&amp;email=g.hmeier%40yahoo.com&amp;amount=".$amount."&amp;note=hahaha";
    $cURL = curl_init();
    
    curl_setopt($cURL, CURLOPT_URL, $url);
    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, TRUE);
    
    $result = curl_exec($cURL);
    
    curl_close($cURL);
	//echo $url."<br/>";
    $json = json_decode($result, true);
    print_r($json);
	
	echo '<a href="access_token=', urlencode($token), '">';
    
?>