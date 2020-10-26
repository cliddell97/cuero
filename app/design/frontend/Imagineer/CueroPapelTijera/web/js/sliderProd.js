/*
require(['jquery'],function($){

        $(document).ready(function() {

		var imagenesProd = $('#prodSlider').html();
		var textProd = '<div id="jssor_2" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;"> <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);"> <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="/pub/media/spin.svg"/> </div><div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">'+imagenesProd+'</div><div data-u="navigator" class="jssorb052" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75"> <div data-u="prototype" class="i" style="width:16px;height:16px;"> <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;"> <circle class="b" cx="8000" cy="8000" r="5800"></circle> </svg> </div></div><div data-u="arrowleft" class="jssora053" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75"> <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;"> <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline> </svg> </div><div data-u="arrowright" class="jssora053" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75"> <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;"> <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline> </svg> </div></div>';
		$('#prodSlider').html(textProd);

		//codigo de jssor

/*
                var jssor_2_SlideoTransitions = [

              [{b:0,d:600,y:-290,e:{y:27}}],

              [{b:0,d:1000,y:185},{b:1000,d:500,o:-1},{b:1500,d:500,o:1},{b:2000,d:1500,r:360},{b:3500,d:1000,rX:30},{b:4500,d:500,rX:-30},{b:5000,d:1000,rY:30},{b:6000,d:500,rY:-30},{b:6500,d:500,sX:1},{b:7000,d:500,sX:-1},{b:7500,d:500,sY:1},{b:8000,d:500,sY:-1},{b:8500,d:500,kX:30},{b:9000,d:500,kX:-30},{b:9500,d:500,kY:30},{b:10000,d:500,kY:-30},{b:10500,d:500,c:{x:125.00,t:-125.00}},{b:11000,d:500,c:{x:-125.00,t:125.00}}],

              [{b:0,d:600,x:535,e:{x:27}}],

              [{b:-1,d:1,o:-1},{b:0,d:600,o:1,e:{o:5}}],

              [{b:-1,d:1,c:{x:250.0,t:-250.0}},{b:0,d:800,c:{x:-250.0,t:250.0},e:{c:{x:7,t:7}}}],

              [{b:-1,d:1,o:-1},{b:0,d:600,x:-570,o:1,e:{x:6}}],

              [{b:-1,d:1,o:-1,r:-180},{b:0,d:800,o:1,r:180,e:{r:7}}],

              [{b:0,d:1000,y:80,e:{y:24}},{b:1000,d:1100,x:570,y:170,o:-1,r:30,sX:9,sY:9,e:{x:2,y:6,r:1,sX:5,sY:5}}],

              [{b:2000,d:600,rY:30}],

              [{b:0,d:500,x:-105},{b:500,d:500,x:230},{b:1000,d:500,y:-120},{b:1500,d:500,x:-70,y:120},{b:2600,d:500,y:-80},{b:3100,d:900,y:160,e:{y:24}}],

              [{b:0,d:1000,o:-0.4,rX:2,rY:1},{b:1000,d:1000,rY:1},{b:2000,d:1000,rX:-1},{b:3000,d:1000,rY:-1},{b:4000,d:1000,o:0.4,rX:-1,rY:-1}]

            ];


            var jssor_2_options = {

              $AutoPlay: 1,

              $Idle: 5000,

	      $FillMode: 1, 

              $CaptionSliderOptions: {

                $Class: $JssorCaptionSlideo$,

                $Transitions: jssor_2_SlideoTransitions,

                $Breaks: [

                  [{d:2000,b:1000}]

                ]

              },

              $ArrowNavigatorOptions: {

                $Class: $JssorArrowNavigator$

              },

              $BulletNavigatorOptions: {

                $Class: $JssorBulletNavigator$

              }

            };


            var jssor_2_slider = new $JssorSlider$("jssor_2", jssor_2_options);


            /*#region responsive code begin*/

/*
            var MAX_WIDTH_2 = 980;


            function ScaleSlider2() {

                var containerElement = jssor_2_slider.$Elmt.parentNode;

                var containerWidth = containerElement.clientWidth;


                if (containerWidth) {


                    //var expectedWidth = Math.min(MAX_WIDTH_2 || containerWidth, containerWidth);
                    jssor_2_slider.$ScaleSize(containerWidth, containerWidth);

                }

                else {

                    window.setTimeout(ScaleSlider2, 30);

                }

            }


            ScaleSlider2();


            $(window).bind("load", ScaleSlider2);

            $(window).bind("resize", ScaleSlider2);

            $(window).bind("orientationchange", ScaleSlider2);

            /*#endregion responsive code end*/
/*
        });
});
*/
