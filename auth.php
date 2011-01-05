<?php

/* ---------------------------------------------
/	File: auth.php
/
/
/	Created By: Moshe Berman
/
/	On: October 14, 2010
/
/	Last Edited on: January 5, 2011
/
/	Contains: The header section for Bitachon.org
/
/ ------------------------------------------- */

function validate_user($user, $password){
	return false;
}

if (!$_SESSION['valid']) {
	if(validate_user($_SESSION['user'],$_SESSION['pwd'])) {
  	$_SESSION['valid'] = true; //Don't forget to SQL sanitize me if validation's against a DB
 	} else {
		die("You are not authorized"); //Saner to redirect to login page or whatever
  }
 }
 
 ?>