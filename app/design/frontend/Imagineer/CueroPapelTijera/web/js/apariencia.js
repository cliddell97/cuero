require(['jquery'],function($){

	$(document).ready(function(){
//		var tienda = window.checkout.storeId; //5 cr, 6 us


        	$('.ui-icon-carat-1-e').css('display', 'relative');
		$('.authentication-wrapper').css('display', 'none');
		//eliminar <p></p> vacios
		$('p').each(function() {
			var $this = $(this);
			if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
				$this.remove();
		});
		//las lineas comentadas son para el layout del header en /Magento_Theme/templates/html/sectionsDOSHEADERS.phtml
		if(window.location.href.includes("?___store=es") || window.location.href.includes("?___store=us")){		
//			$("#myHeaderCentrado").css('display', 'block');
			$(document).scroll( function(){
				if( !($(window).scrollTop()) > 0 ){
					$('#myHeader').css('background-color','white');
//					$('#myHeader').css('display','none');
//					$('#myHeaderCentrado').css('display','block');
				} else { 
//					$('#myHeader').css('display','block');
//					$('#myHeaderCentrado').css('display','none');
					$('#myHeader').css('background-color','white');
					$('#myHeader').removeClass("transparente");
				}
			})
			$(".page-main").css("cssText","max-width: 100% !important; padding-left: 0 !important; padding-right: 0 !important; background-color:white;");
			$(".column.main").css("background-color","white");
//			$("#myHeader").css('display', 'none');
		} else {
			$("#myHeaderCentrado").css('display', 'none');
	        	$(".column.main").css("background-color","#f5f1eb");
			$(".page-main").css("cssText","background-color: #f5f1eb; max-width: 100%; padding: 2% !important;");
			if(window.location.pathname.includes('checkout') ){
				$(".page-main").css("cssText","background-color: #f5f1eb; max-width: 100% !important; padding-left: 9% !important; padding-right: 9% !important; padding-top:3% !important;");
			}
                }

  	//responsive 
		var width = $(window).width();
		if (width < 900){
			//$('#conocenosSofia').insertBefore('#conocenosSofiaLabel');
			//if(window.location.href.includes("?___store=es") || window.location.href.includes("?___store=us")){
				$('#mageplaza-bannerslider-block-before-page-top-1').css('margin-top', $('#myHeader').css('height'));
			//} else {
			//	$('#mageplaza-bannerslider-block-before-page-top-2').css('margin-top', $('#myHeader').css('height'));
			//}		

		} else {
			//$('#conocenosSofiaLabel').insertBefore('#conocenosSofia');
			
		}






	});

});
