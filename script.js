var getRequest = function(url)
{
	var req = new XMLHttpRequest();
	req.overrideMimeType("application/json");
	req.open('GET', url, false);
	req.send(null);
	return JSON.parse(req.responseText);
};

var postRequest = function(url)
{
	var req = new XMLHttpRequest();
	req.overrideMimeType("application/json");
	req.open("POST", url, false);
	req.send(null);
	return JSON.parse(req.responseText);
};

var makePayment = function(access_token, user, note, amount)
{
	var ourAccount = "ACCOUNT";
	var response = postRequest(
		"https://api.venmo.com/v1/payments?access_token=" + access_token +
			"&user_id=" + user + "&amount=" + amount + 
			"&note=" + note + "&recipients=" + ourAccount);
};

var authorize = function()
{
	//Redirect to the authorization page
	window.location.replace("https://api.venmo.com/v1/oauth/authoraize?" +
		"client_id=" + /* WHAT */ + "&scope=make_payments&response_type=token");
};
