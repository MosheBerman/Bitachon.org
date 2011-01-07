$(document).ready(function(){  
    
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
    
    	//Store the contents of the form
    	var addressArray = new Array($('#name').val(), $('#street').val(), $('#city').val(), $('#state').val(), $('#zip').val());
    		
    	$('#BBRequestBox').html('<img src="images/loading.gif" />');
  		
  		$.ajax({
				type: "POST",
   				url: "./bbrequest.php",
	   			data: {name: addressArray[0], street: addressArray[1], city: addressArray[2], state: addressArray[3], zip: addressArray[4] },
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