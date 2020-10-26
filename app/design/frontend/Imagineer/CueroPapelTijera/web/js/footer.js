require(['jquery'],function($){

$(document).ready(function(){

	//cambiar links y contenido del footer si la pagina esta en us
	if(window.location.pathname.includes("/es") || window.location.href.includes("?___store=es")){ 
		var footerHtml = `
<div class="container">
<div class="row">
<div class="col-lg-12"><img id="logoBlanco" src="https://imagineercx.net/cuero/pub/media/cuero-papel-tijera-logo-blanco.png" alt="Logo Cuero, Papel y Tijera"></div>
<div class="col-lg-4 listaFooter">
<ul>
<li><a href="/sofia-protti?___store=es" alt="Sofia Protti">Sofía Protti</a></li>
<li><a href="/get-to-know-us?___store=es" alt="Conocenos">Con&oacute;cenos</a></li>
<li><a href="/blog?___store=es" alt="Blog">Blog</a></li>
<li><a href="/stores?___store=es" alt="Tiendas">Tiendas</a></li>
</ul>
</div>
<div class="col-lg-4">
<div class="redesSociales">
<a href="https://www.facebook.com/cueropapeltijera/"><img class="redesSocialesAll" src="https://imagineercx.net/cuero/pub/media/logo-facebook.png" alt=""> </a>
<a href="https://instagram.com/cueropapelytijera?igshid=1e6i92q3vf43k"><img class="redesSocialesAll" src="https://imagineercx.net/cuero/pub/media/logo-instagram.png" alt=""> </a>
<a href="https://www.waze.com/ul?ll=9.93958200%2C-84.10612600&navigate=yes"><img class="redesSocialesAll" src="https://imagineercx.net/cuero/pub/media/waze.png" alt=""></a> 
</div>
<img class="separadorFooter" src="https://imagineercx.net/cuero/pub/media/separador-footer.png"  alt=""></div>

<div class="col-lg-4 listaFooter">
<ul>
<li><a href="/contact-us?___store=es" alt="Contáctanos">Contáctanos</a></li>
<li><a href="/changes?___store=es" alt="Política de cambios">Política de cambios</a></li>
<li><a href="/service?___store=es" alt="Terminos y condiciones">Términos y condiciones</a></li>
<li><a href="/privacy?___store=es" alt="Política de Privacidad">Política de privacidad</a></li>
</ul>
</div>
</div>
<div class="row">
<div class="col-lg-4">&nbsp;</div>
<div class="col-lg-4">
<h4 id="suscribirseFooter">Suscríbase a nuestro boletín</h4>
<form><input id="correoFooter" name="email" type="text" placeholder="Email"> <input id="suscribirme" type="submit" value="Suscribirme"></form></div>
<div class="col-lg-4">&nbsp;</div>
</div>
</div>
`;

$('.footercpt').html(footerHtml);
}
});

});
