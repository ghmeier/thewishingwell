<?php
    $description = ($_POST["desc"]);
    $amount = ($_POST["amount"]);
    $token = ($_POST["token"]);
    $personId = ($_POST["id"]);
    $fname = ($_POST["fname"]);
    $lname = ($_POST["lname"]);
    
    
    
    /**$con=mysqli_connect("localhost","root","Goringelitistmarmot1","isu_hackathon");

    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
    
    $query = "Insert into activity values ('" . $fname . " " . $lname . "',0,".$amount.",'".$description."');";
    mysqli_query($query);
    mysqli_close($con);*/
    
    $url = "https://api.venmo.com/v1/payments?access_token=" . $token . "&amp;user_id=1670&amp;note=hahahaha&amp;amount=" . $amount;
    
    $cURL = curl_init();
    
    curl_setopt($cURL, CURLOPT_URL, $url);
    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, TRUE);
    
    $result = curl_exec($cURL);
    
    curl_close($cURL);
    echo $url."<br/>";
    $json = json_decode($result, true);
    print_r($json);
    
    
?>