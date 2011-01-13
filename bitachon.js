$(document).ready(function(){  
    
    // progressive enhancement: adjust the footer to the height
    // of the 'collapsed-view'
    
    
    var collapsedHeight = $('#footer .collapsed-view').outerHeight(true);
    var expandedBBRequestHeight = $('#footer #requestBitachonBuilder').outerHeight(true);
    var expandedContactInfoHeight = $('#footer #contactInfo').outerHeight(true);
    var expandedAboutSiteHeight = $('#footer #aboutSite').outerHeight(true);
    
    var collapsedWidth = 60;
    var fullWidthOfWindow = $(document).width();
    var formObj = "";
    
    $('#footer').css({
        'margin-top': -collapsedHeight,
        'height': collapsedHeight
    });
    
    $('#main').css({ 'padding-bottom': collapsedHeight });
    
    /* ----------------- Show the Bitachon Builder Request Section --------------------------- */
    
    $('#showRequestFormButton').click(
    	function(evt){
    		
    		//If the form has been saved, reload it now.
    		if(formObj){
    			$('#requestForm').html(formObj);
    		}
    
    		//Hide the "show" button
    		$('#showRequestFormButton').fadeOut();
    		
    		//	
    		//	In case the user resizes their window
    		//	while using the site, reassign this value
    		//
    		
    		if(fullWidthOfWindow){
    			fullWidthOfWindow = $(document).width();
    		}
    		
    		//animate the flyout
    		$('#flyout').animate({
    			'width': fullWidthOfWindow
    		}, null, null, function(){
    			$('#requestForm').fadeIn();
    	
    			//fade the hide button in
   		 		$('#hideRequestFormButton').fadeIn();
    		});
    		
    		$('#requestFormContainer').fadeIn();
    		
    		return false;
    		
    	}
    	
    );
    
    
		//Reverse everything
		$('#hideRequestFormButton').click(
    	function(evt){
    		
    		//Hide the "show" button
    		$('#requestForm').fadeOut();
    		$('#requestFormContainer').fadeOut(
    			function(evt){
    				//animate flyout width to the narrower state
    				$('#flyout').animate({
    					'width': 160
    				});
    			}
    		
    		);
    		
    		
    		//Hide the form
    		$('#hideRequestFormButton').fadeOut();
    		
    		//fade the hide button in
    		$('#showRequestFormButton').fadeIn();
    		    		
    		return false;
    	}
    );
    
    /* ----------------- END Show the Bitachon Builder Request Section --------------------------- */
    
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
    
    
    $('#submitButton').live('click',function(evt){
    
    	//Store the contents of the form
    	var addressArray = new Array($('#name').val(), $('#street').val(), $('#city').val(), $('#state').val(), $('#zip').val());
    		
    	formObj = $('#requestForm').html();
    	
    	$('#requestForm').html('<img src="images/loading.gif" />');
  		
  		$.ajax({
				type: "POST",
   				url: "./bbrequest.php",
	   			data: {name: addressArray[0], street: addressArray[1], city: addressArray[2], state: addressArray[3], zip: addressArray[4] },
   				success: function(msg){
    				$('#requestForm').html('<p class="formResponse">' + msg + '</p>');
    				return false;
				},
				error: function(XMLHttpRequest, textStatus, errorThrown){
					$('#requestForm').html('<p class="formResponse"> There\'s been an error: ' + errorThrown + '</p>');
					
					return false;
				}
		});
  	return false;
	});
  	
});   