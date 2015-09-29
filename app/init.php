<?php 

// start Session 
session_start();

// include composer autoloader
include_once("libs/autoload.php");

// init facebook APP
Facebook\FacebookSession::setDefaultApplication("app_id", "secret_key");

// create facebook app helper
$helper = new Facebook\FacebookRedirectLoginHelper("http://localhost/fb_login/index.php");

try
{
	if($session = $helper->getSessionFromRedirect())
	{
		$_SESSION['fb_token'] = $session->getToken();

		header("Location: index.php");
	}


	// check if facebook session isset 
	// if true get user information 
	if(isset($_SESSION['fb_token']))
	{
		$session = new Facebook\FacebookSession($_SESSION['fb_token']);
		$request = new Facebook\FacebookRequest($session, "GET", "/me");
		$request = $request->execute();

		// get User Graph
		$user = $request->getGraphObject()->asArray();

		//echo "<pre>", print_r($user), "</pre>";
	}

}
catch(Facebook\FacebookRequestExeption $e)
{
	// if facebook return an Error
}
catch(\Exeption $e)
{
	// if local issue
}