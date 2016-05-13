jQuery(function(){
	jQuery('#send-z-form').click(sendForm);
	function sendForm(){
 		var inputs = jQuery("#feedbck").find('input');
 		if (jQuery("#feedbck").find('input:invalid').length==0 ){  
		    params=jQuery("#feedbck").serialize();
		    jQuery.ajax({
		      type:'POST',
		      url:"wp-content/themes/myrtheme/shortcodes/ajax-answer.php",
		      dataType:'json',
		      data:params,
		      success:function(data){
		      if (data.result){
		        jQuery('#result-answer').show('slow');
		        setTimeout(function(){ jQuery('#result-answer').hide()},2000);
      		   }
      	  	}
      	   });
     	return false;
 		}
	}	
});
