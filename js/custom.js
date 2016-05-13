jQuery(function(){
	var isMobile = {
		Android: function() {
		    return navigator.userAgent.match(/Android/i);
		},
		BlackBerry: function() {
		    return navigator.userAgent.match(/BlackBerry/i);
		},
		iOS: function() {
		    return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
		Opera: function() {
		    return navigator.userAgent.match(/Opera Mini/i);
		},
		Windows: function() {
		    return navigator.userAgent.match(/IEMobile/i);
		},
		 any: function() {
		    return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};
	
	if(isMobile.any()){
		jQuery(".sub-menu").addClass("dropdown-menu");
		jQuery(".sub-menu").wrap('<div class="dropdown"></div>');
		jQuery(".dropdown").css({'position':'relative','bottom':'30px','margin-bottom':'-32px'});
        jQuery(".sub-menu").css({'top':'100%','min-width':'0','border-top':'0 transparent solid'});
		jQuery(".sub-menu").parent().each(function(){
		jQuery(this).html('<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="caret"></i></button>'+jQuery(this).html());
		});
		jQuery(".dropdown button").css('width','100%');
		jQuery(".dropdown button").css({'background':'transparent','color':'black','border':'none','box-shadow':'none'});
		jQuery(".sub-menu .sub-menu").remove();
	}
if (jQuery('.textwidget img').length!=0)
	jQuery('.textwidget img').addClass('img-responsive');
});