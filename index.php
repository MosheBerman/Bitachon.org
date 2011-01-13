<?php

/* ---------------------------------------------
/	File: index.php
/
/
/	Created By: Moshe Berman
/
/	On: October 14, 2010
/
/	Last Edited on: January 12, 2010
/
/	Contains: The template for Bitachon.org
/
/ ------------------------------------------- */




?>

<!DOCTYPE html>
<html>
	<head>
		<title>
			Bitachon.org
		</title>
		<style type="text/css">
			@import "reset.css";
			@import "stickyfooter.css";
			@import "style.css";
		</style>
		<!--[if !IE 7]>
	    <style type="text/css">
		    #wrap {display:table;height:100%}
	    </style>
   <![endif]-->
   <script src="jquery-1.4.2.min.js"></script>
   <script src="bitachon.js"></script>	
	</head>
	<body>
		<div id="wrap">
			<div id="main">
						
				<div id="topbar" class="dark-bg">
					<div id="banner">
					</div>
					<div id="flyout">
						<a id="showRequestFormButton" href="#">Show</a>						
						<div id="requestFormContainer" style="display: none;">	
							<div id="requestFormWindow">
								<a id="hideRequestFormButton" style="display: none;" href="#">Hide</a>
								<form id="requestForm" action="#" style="display:none;">
									<label>Name:</label><input type="text" name="name" id="name" class="textbox" />
									<label>Street:</label><input type="text" name="street" id="street" class="textbox" />
									<label>City:</label><input type="text" id="city" class="textbox" />
									<label>State:</label><input type="text" id="state" class="textbox" />
									<label>Zip:</label><input type="text" id="zip" class="textbox" />
									<input type="submit" value="Send Me a Bitachon Builder!" id="submitButton" />
								</form>
							</div>
						</div>
					</div>					
					<div id="nav">
						<a href="http://bitachon.org" class="link">
							Search
						</a>
						<a href="http://bitachon.org" class="link">
							Browse
						</a>
						<a href="http://bitachon.org" class="link">
							Donate
						</a>	
					</div>
				</div>
			</div>
		</div>
		<div id="footer" class="dark-bg">
		  <div class="collapsed-view center full-width">
		  	<a href="" id="showContactInfo" class="toggle-link">Contact Priority-1</a> <a href="" id="showAboutSite" class="toggle-link">About Bitachon.org</a>
		  	<div>
		  	</div>
		  </div>
		  <div id="contactInfo" class="expanded-view full-width">
			<div class="center full-width">
				<div class="footer-expanded-column">
					<img src="images/logo-sm.png" class="footer-logo" />
					<address>
						Priority-1<br />
						PO Box 486<br />
						Cedarhurst, NY 11516<br />
						<a href="tel:+1-800-333-6738" class="phone">800-33-FOREVER</a> <br />
						info@priority-1.org <br />
						</address>
					</div>
			</div>
			<a href="" id="hideContactInfo" class="toggle-link close-link shiny-link"><img src="./images/downarrow.png" class="arrow"/> Close</a>
		</div>
		  <div id="aboutSite" class="expanded-view full-width">
			<div class="center full-width">
				<div class="footer-expanded-column">
					<img src="images/logo-sm.png" class="footer-logo" /><br />
					<h4 id="site-info">Bitachon.org version 0.2 by <a href="http://www.mosheberman.com" class="footer-link shiny-link">Moshe Berman</a></h4>
				</div>
			</div>
			<a href="" id="hideAboutSite" class="toggle-link close-link shiny-link"><img src="./images/downarrow.png" class="arrow"/> Close</a>
		</div>
		</div>
	</body>
</html>
