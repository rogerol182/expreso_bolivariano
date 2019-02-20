
    "use strict";
      

  	jQuery(document).ready(function(){

        var LocsA = [
          {
              lat:12.5518826,
              lon:-81.7163086,
              title:'Bolivariano',
              html: ['<h3>Expreso</h3>'].join(''),
              zoom: 11,	
              icon:'images/misc/pin_map.png',
              animation:google.maps.Animation.DROP
          },

          {
              lat:10.833306,	 
              lon:-75.0146484,	
              title: 'Bolivariano',
              html: ['<h3>Expreso</h3>'].join(''),
              zoom: 11,
              icon: 'images/misc/pin_map.png',
              animation: google.maps.Animation.DROP
          },

          {
              lat:6.5336451,	 
              lon:-75.3662109,	
              title: 'Bolivariano',
              html: ['<h3>Expreso</h3>'].join(''),
              zoom: 11,
              icon: 'images/misc/pin_map.png',
              animation: google.maps.Animation.DROP
          }
          
      ];


      var styles = {

          'Ultracem': [{
              featureType: 'all',
              stylers: [
                  { saturation: -100 },
                  { gamma: 0.50 }
              ]
          }],
          
          'Ultracem': [
              {
                  "featureType": "road",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "visibility": "off"
                      }
                  ]
              },
              {
                  "featureType": "poi",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "visibility": "off"
                      }
                  ]
              },
              {
                  "featureType": "landscape",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "color": "#fffffa"
                      }
                  ]
              },
              {
                  "featureType": "water",
                  "stylers": [
                      {
                          "lightness": 50
                      }
                  ]
              },
              {
                  "featureType": "road",
                  "elementType": "labels",
                  "stylers": [
                      {
                          "visibility": "off"
                      }
                  ]
              },
              {
                  "featureType": "transit",
                  "stylers": [
                      {
                          "visibility": "off"
                      }
                  ]
              },
              {
                  "featureType": "administrative",
                  "elementType": "geometry",
                  "stylers": [
                      {
                          "lightness": 40
                      }
                  ]
              }
          ]
      };

      var styled = new Maplace({
        map_div: '#ruta-map',
        locations: LocsA,
        start: 1,
        styles: styles,
        map_options: {
            zoom: 8
        }
      });
      if($("#ruta-map").length>0 )
        styled.Load();

      var styled2 = new Maplace({
        map_div: '#pinteres-map',
        locations: LocsA,
        start: 1,
        styles: styles,
        map_options: {
            zoom: 8
        }
      });

      if($("#pinteres-map").length>0 )
        styled2.Load();


      var styled3 = new Maplace({
        map_div: '#sucursal-map',
        locations: LocsA,
        start: 1,
        styles: styles,
        map_options: {
            zoom: 8
        }
      });

      if($("#sucursal-map").length>0 )
        styled3.Load();
      


    $(".accordion .btn-link").click(function(){
        setTimeout(function(){
            $(".accordion .collapse").each(function(index){
                var btn=$(this).parent().find(".btn-link");
                btn.removeClass("active");
                if( $(this).hasClass("show")){
                    btn.addClass("active");
                }
            });
        },500);
        
    });


    $("#chat_bot .base").click(function(){
        if ($("#chat_bot").hasClass("active") ){
            $("#chat_bot").removeClass("active");
        }else{
            $("#chat_bot").addClass("active");
        }
    });


    
  });


  
function _classCallCheck(instance,Constructor){
    if(!(instance instanceof Constructor))throw new TypeError("Cannot call a class as a function")}function _defineProperties(target,props){
    for(var i=0;
    i<props.length;
    i++){
        var descriptor=props[i];
    descriptor.enumerable=descriptor.enumerable||!1,descriptor.configurable=!0,"value"in descriptor&&(descriptor.writable=!0),Object.defineProperty(target,descriptor.key,descriptor)}}function _createClass(Constructor,protoProps,staticProps){
        return protoProps&&_defineProperties(Constructor.prototype,protoProps),staticProps&&_defineProperties(Constructor,staticProps),Constructor}var RedesSociales=function(){
            function RedesSociales(){
                _classCallCheck(this,RedesSociales),this.parent=null,this.video=null,this.image=null
            }
            return _createClass(RedesSociales,[{
                    key:"setInitRandom",value:function(images){
                    images.forEach(function(img){
                    img.setAttribute("data-ran",Math.floor(199*Math.random())+1)})}},{
                    key:"scrollImgs",value:function(images,value){
                    images.forEach(function(img){
                    var result=value/window.innerHeight*parseInt(img.getAttribute("data-ran"));
                    img.style.transform="translateY(".concat(result,"px)")}
                    )}
                    }]),RedesSociales}();
!function(myClass){
    var media=new RedesSociales;
    window.addEventListener("load",function(e){
        media.setInitRandom(document.querySelectorAll(".socialmedia__emoticon"))}),
        window.addEventListener("scroll",function(e){
        media.scrollImgs(document.querySelectorAll(".socialmedia__emoticon"),
        window.scrollY)})}();


