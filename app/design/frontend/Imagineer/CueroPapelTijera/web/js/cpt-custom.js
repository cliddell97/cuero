require(['jquery'],function($){
	//si el url no incluye el pais, redireccionar a la tienda actual
/*	if(window.location.pathname == "" || window.location.pathname == "/"){
		if(window.checkout.storeId == '5')
			window.location.href = "/cr";
		else
			window.location.href = "/us";
	} else {
	//si el url no corresponde a la tienda actual, redireccionar
		if(window.checkout.storeId == '5' && window.location.pathname.includes("/us"))
			window.location.href = "/cr";
		else if(window.checkout.storeId == '6' && window.location.pathname.includes("/cr"))
			window.location.href = "/us";
	}
*/

/*
	if(window.location.pathname.includes("/cr")){
		$("#crLogo").css('display', 'none');
		$("#interLogo").css('display', 'inline');
	} else {
		$("#crLogo").css('display', 'inline');
		$("#interLogo").css('display', 'none');
	}
*/



	var enMenu = false;

	//expandir el header cuando se navegan submenus (estetica)
	function expandMenu(){
		if(enMenu){
			$("#myHeader").css("padding-bottom","10%");
			$("#myHeader").css("background-color","white");
			$("#myHeaderCentrado").css("padding-bottom","10%");
			$("#myHeaderCentrado").css("background-color","white");
//			$("#lineaHeaderMenu").css("display", "block");
		} else {
			$("#myHeader").css("background-color","unset");
			$("#myHeader").css("padding-bottom","20px");
			$("#myHeaderCentrado").css("background-color","unset");
			$("#myHeaderCentrado").css("padding-bottom","20px");
//			$("#lineaHeaderMenu").css("display", "none");
		}
	}

	$(document).ready(function(){/*
		$(window).scroll(function(el){
		  var height = $(window).scrollTop();
		  if(jQuery('#myHeader').find('.langs-wrapper').length == 0) {
				jQuery(jQuery(".langs-wrapper")[0]).detach().appendTo('#myHeader');
				jQuery(jQuery(".langs-wrapper")[0]).detach().appendTo('#myHeader');
			}
		  }
		  
		  if(height >= 1600){
		  	$("#up").fadeIn("fast");
		  }else{
		  	$("#up").fadeOut("fast");
		  }		  

/*
		  if((height >= 1000){
			$("#myHeader").css("position", "relative");
			$("#myHeader").css("opacity", "1");
		  } else {
			$("#myHeader").css("position", "fixed");
			$("#myHeader").css("opacity", "0.2");
		  }*/
		//});
		var headerContent = $("div.header.content").html();
		//var languageSwitcher = $("#switcher-store").html();
		$("div.header.content").remove();
		$("#actionsTop").append(headerContent);
		//$("#actionsTop").append("<div class='switcher store switcher-store' id='switcher-store'>"+languageSwitcher+"</div>");

		$(document).on("click","#up",function(){
			$('html, body').animate({scrollTop:0}, 400);	
		});

		//hacer que el header no tenga collision si esta en el homepage
		if(window.location.pathname == "/cuero" || window.location.pathname =="/us" || window.location.pathname =="/us/" || window.location.pathname =="/es/" || window.location.pathname =="es/" || window.location.href.includes("?___store=us")|| window.location.href.includes("?___store=es")){
			$("#myHeader").css("position", "fixed");
			//$("#myHeader").css("opacity", "0.2");
		} else {
			$("#myHeader").css("position", "relative");
			$("#myHeader").css("top", "0");
			//$("#myHeader").css("opacity", "1.0");

		}

		if(jQuery('#flags').find('.langs-wrapper').length == 0) {
			jQuery(jQuery(".langs-wrapper")[1]).detach().appendTo('#flags');
		}else {
			setTimeout(function(){
		if($('#flags').find('.langs-wrapper').length == 0) {
			console.log("4");
			jQuery(jQuery(".langs-wrapper")[1]).detach().appendTo('#flags');
		}
		//do something special
		 }, 5000);	
		}

		$( ".level0.parent" ).mouseover(function() {
			enMenu = true;
			expandMenu();
		  });
		
		$( ".level1" ).mouseover(function() {
			enMenu = true;
			expandMenu();
		  });
			
		$( ".level2" ).mouseover(function() {
			enMenu = true;
			expandMenu();
		  });
		
		$( ".level0.parent" ).mouseout(function() {
			enMenu = false;
			expandMenu();
		  });
		$( ".submenu" ).mouseout(function() {
		enMenu = false;
		expandMenu();
		});
		  
	});	
});	

