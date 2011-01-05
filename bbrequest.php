<?php

/* ---------------------------------------------
/	File: bbrequest.php
/
/
/	Created By: Moshe Berman
/
/	On: October 14, 2010
/
/	Last Edited on: December 2, 2010
/
/	Contains: 	The server-side AJAX logic for
/				emailing a bitachon builder request.
/
/
/ ------------------------------------------- */

//Check to see 
function checkReq($name){ 
	if(isset($_POST[$name]) && $_POST[$name] != ''){
		return true;
	}else{
		return false; 
	}
}

if(checkReq('name') && checkReq('street') && checkReq('city') && checkReq('state') && checkReq('zip')){

	$name = htmlspecialchars($_POST['name']);
	$street = htmlspecialchars($_POST['street']);
	$city = htmlspecialchars($_POST['city']);
	$state = htmlspecialchars($_POST['state']);
	$zip = htmlspecialchars($_POST['zip']);
	
  //send the email
  echo "Your request has been sent. Please allow 6-8 weeks for delivery to: <address><br />" . $name . " <br />" . $street ." <br />" . $city . ", " . $state . " " . $zip."</address>";
  	
}else{
	echo "We were unable to send your request. Please try again, or call us.";
}

?>