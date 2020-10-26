require(['jquery', 

'domReady!',   

'Magento_Checkout/js/model/quote',

'Magento_Checkout/js/model/shipping-rate-registry'

], 

function($, quote, rateRegistry){

  var cuota = quote;
  var tarifa = rateRegistry;

  $(document).ready(function(){

    var asignado = false;

    var zip = '';

    conseguirZip();

    function conseguirZip(){

      zip = document.getElementsByName('postcode')[0];

      if(typeof zip == 'undefined'){ 

        if(!asignado){

          setTimeout(conseguirZip, 2000);  //actualiza la direccion luego de 2 segundos de haber cambiado el zip

        }

      } else {

        asignado = true;

        asignarListener();

      }


    }    

    function asignarListener(){


      $("[name='postcode']").change(function() { 

        console.log("actualizando direccion");

        //get address from quote observable

        var address = cuota.shippingAddress();


        //changes the object so observable sees it as changed

        address.trigger_reload = new Date().getTime();


        //create rate registry cache

        //the two calls are required 

        //because Magento caches things

        //differently for new and existing

        //customers (a FFS moment)

        tarifa.set(address.getKey(), null);

        tarifa.set(address.getCacheKey(), null);


        //with rates cleared, the observable listeners should

        //update everything when the rates are updated

        cuota.shippingAddress(address);

      });

    }

  });

});

