<script src="js/jquery-3.1.0.js"></script>
   
   
 <script>
    $(document).ready(function() {
       var loader='<img src="images/ajax-loader.gif" />';
       
	   
	   //if submit button is clicked
     
		$('#submit').click(function () {       
			
			//show the loader
			$('.loading').html(loader).fadeIn();     
		  
			var name = $('input[name=name]').val();
			var email = $('input[name=email]').val();
			var password = $('input[name=password]').val();
			var contact = $('input[name=contact]').val();
			var address = $('input[name=address]').val();
			 
	 
			
			//organize the data properly
			var form_data = 
			  'name='+name+
			  '&email='+email+
			  '&password='+password+
			  '&contact='+contact+
			  '&address='+address;
			 
			//disabled all the text fields
			$('.text').attr('disabled','true');
			 
			 
			//start the ajax
			$.ajax({
				//this is the php file that processes the data and send mail
				url: "ajax/process.php",
				 
				//POST method is used
				type: "POST",
	 
				//pass the data        
				data: form_data,    
				 
				
				//success
				success: function (html) {             
					//if process.php returned 1/true (send mail success)
					if (html==1) {                 
						//hide the form
						$('#register_form').fadeOut('slow');                
						 
						 
						 //hide the loader
						 $('.loading').fadeOut();   
						 
						//show the success message
						$('.message').html('Successfully Registered ! ').fadeIn('slow');
						 
						 
						 
					//if process.php returned 0/false
					} else alert('Sorry, unexpected error. Please try again later.');              
				}      
			});
			 
			//cancel the submit button default behaviours
			return false;
    });
}); 
 
 
 </script>
