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
	var response = postRequest(
		"https://api.venmo.com/v1/payments?access_token=" + access_token +
			"&user_id=" + user + "&amount=" + amount + 
			"&note=" + note + "&recipients=garret-meier");
	return response;
};

var authorize = function()
{
	window.location.replace("https://api.venmo.com/v1/oauth/authoraize?client_id=1670&scope=make_payments&response_type=token");
};
