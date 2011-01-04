<?php

/* ---------------------------------------------
/	File: template.php
/
/
/	Created By: Moshe Berman
/
/	On: October 14, 2010
/
/	Last Edited on: December 5, 2010
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
   <script type="text/javascript">
	$(document).ready(function() {
    
    // progressive enhancement: adjust the footer to the height
    // of the 'collapsed-view'
    var collapsedHeight = $('#footer .collapsed-view').outerHeight(true);
    var expandedBBRequestHeight = $('#footer #requestBitachonBuilder').outerHeight(true);
    var expandedContactInfoHeight = $('#footer #contactInfo').outerHeight(true);
    var expandedAboutSiteHeight = $('#footer #aboutSite').outerHeight(true);
    $('#footer').css({
        'margin-top': -collapsedHeight,
        'height': collapsedHeight
    });
    $('#main').css({ 'padding-bottom': collapsedHeight });
    
    /* Show the Bitachon Builder Request Section */
    
    $('#showBBRequest').click(function(evt) {
        $('#footer .collapsed-view').fadeOut();
        $('#main').animate({
            'padding-bottom': expandedBBRequestHeight
        });
        $('#footer').animate({
            'margin-top': -expandedBBRequestHeight,
            'height': expandedBBRequestHeight
        }, null, null, function() {
            $('#footer #requestBitachonBuilder').fadeIn();
        });
        return false;
    });
    
    /* Hide the BB Request Section */
    
    $('#hideBBRequest').click(function(evt) {
        $('#footer #requestBitachonBuilder').fadeOut();
        $('#main').animate({
            'padding-bottom': collapsedHeight
        });
        $('#footer').animate({
            'margin-top': -collapsedHeight,
            'height':collapsedHeight
        }, null, null, function() {
            $('#footer .collapsed-view').fadeIn();
        });
        return false;
    });

	/* show the contact info footer section */
    $('#showContactInfo').click(function(evt) {
        $('#footer .collapsed-view').fadeOut();
        $('#main').animate({
            'padding-bottom': expandedContactInfoHeight
        });
        $('#footer').animate({
            'margin-top': -expandedContactInfoHeight,
            'height':expandedContactInfoHeight
        }, null, null, function() {
            $('#footer #contactInfo').fadeIn();
        });
        return false;
    }); 
    
    $('#hideContactInfo').click(function(evt) {
        $('#footer #contactInfo').fadeOut();
        $('#main').animate({
            'padding-bottom': collapsedHeight
        });
        $('#footer').animate({
            'margin-top': -collapsedHeight,
            'height':collapsedHeight
        }, null, null, function() {
            $('#footer .collapsed-view').fadeIn();
        });
        return false;
    }); 
    
    $('#showAboutSite').click(function(evt) {
        $('#footer .collapsed-view').fadeOut();
        $('#main').animate({
            'padding-bottom': expandedAboutSiteHeight
        });
        $('#footer').animate({
            'margin-top': -expandedAboutSiteHeight,
            'height':expandedAboutSiteHeight
        }, null, null, function() {
            $('#footer #aboutSite').fadeIn();
        });
        return false;
    }); 
    
    $('#hideAboutSite').click(function(evt) {
        $('#footer #aboutSite').fadeOut();
        $('#main').animate({
            'padding-bottom': collapsedHeight
        });
        $('#footer').animate({
            'margin-top': -collapsedHeight,
            'height':collapsedHeight
        }, null, null, function() {
            $('#footer .collapsed-view').fadeIn();
        });
        return false;
    }); 
    
    /* Submit the bitachon builder request via AJAX*/
    
    $('#submitButton').click(function(){
    	$('#BBRequestBox').html('<img src="images/loading.gif" />');
  		$.ajax({
				type: "POST",
   				url: "./bbrequest.php",
	   			data: {name: $('#name').val(), street: $('#street').val(), city: $('#city').val(), state: $('#state').val(), zip: $('#zip').val() },
   				success: function(msg){
    				$('#BBRequestBox').html('<p>' + msg + '</p>');
				},
				error: function(XMLHttpRequest, textStatus, errorThrown){
					$('#BBRequestBox').html('<p> There\'s been an error: ' + errorThrown + '</p>');
				}
		});
  		return false;
	});
		
});   
   </script>	
	</head>
	<body>
		<div id="wrap">
			<div id="main">
				<div id="topbar" class="dark-bg">
					<div id="banner">
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
		  	<a href="" id="showBBRequest" class="toggle-link">Get a Bitachon Builder</a> <a href="" id="showContactInfo" class="toggle-link">Contact Priority-1</a> <a href="" id="showAboutSite" class="toggle-link">About Bitachon.org</a>
		  	<div>
		  	</div>
		  </div>
		  <div id="requestBitachonBuilder" class="expanded-view full-width">
		  	  <div class="center">
			 	 <div class="footer-expanded-column narrow border">
			  		<h4 class="title">Please enter your address:</h4>
			  		<span id="BBRequestBox">
					<form action="#">
						<label>Name:</label><input type="text" id="name" class="textbox" value="" />
						<label>Street:</label><input type="text" id="street" class="textbox" value="" />
						<label>City:</label><input type="text" id="city"class="textbox" value="" />
						<label>State:</label><input type="text" id="state" class="textbox" value="" />
						<label>Zip:</label><input type="text" id="zip" class="textbox" value="" />
						<input type="submit" value="Send Me a Bitachon Builder!" id="submitButton" />
					</form>
					</span>
				</div>
		  </div>	
		  <a href="" id="hideBBRequest" class="toggle-link close-link shiny-link"><img src="./images/downarrow.png" class="arrow"/> Close</a>
		</div>
		  <div id="contactInfo" class="expanded-view full-width">
			<div class="center full-width">
				<div class="footer-expanded-column">
					<img src="images/logo-sm.png" id="footer-logo" />
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
					<img src="images/logo-sm.png" id="footer-logo" /><br />
					<h4 id="site-info">Bitachon.org version 1.1 <br />by <a href="http://www.mosheberman.com" class="footer-link shiny-link">Moshe Berman</a></h4>
				</div>
			</div>
			<a href="" id="hideAboutSite" class="toggle-link close-link shiny-link"><img src="./images/downarrow.png" class="arrow"/> Close</a>
		</div>
	</body>
</html>