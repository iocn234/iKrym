/*-----------------------------------------------------------------------*/
    /*!
     * classie - class helper functions
     * from bonzo https://github.com/ded/bonzo
     *
     */

    /*jshint browser: true, strict: true, undef: true */
    /*global define: false */

( function( window ) {

    'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

    function classReg( className ) {
        return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
    }

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
    var hasClass, addClass, removeClass;

    if ( 'classList' in document.documentElement ) {
        hasClass = function( elem, c ) {
            return elem.classList.contains( c );
        };
        addClass = function( elem, c ) {
            elem.classList.add( c );
        };
        removeClass = function( elem, c ) {
            elem.classList.remove( c );
        };
    }
    else {
        hasClass = function( elem, c ) {
            return classReg( c ).test( elem.className );
        };
        addClass = function( elem, c ) {
            if ( !hasClass( elem, c ) ) {
                elem.className = elem.className + ' ' + c;
            }
        };
        removeClass = function( elem, c ) {
            elem.className = elem.className.replace( classReg( c ), ' ' );
        };
    }

    function toggleClass( elem, c ) {
        var fn = hasClass( elem, c ) ? removeClass : addClass;
        fn( elem, c );
    }

    var classie = {
        // full names
        hasClass: hasClass,
        addClass: addClass,
        removeClass: removeClass,
        toggleClass: toggleClass,
        // short names
        has: hasClass,
        add: addClass,
        remove: removeClass,
        toggle: toggleClass
    };

// transport
    if ( typeof define === 'function' && define.amd ) {
        // AMD
        define( classie );
    } else {
        // browser global
        window.classie = classie;
    }

})( window );

//rng-group.ru/geo.class.js а что было делать,нужно сдать же все в сроки(
var Geo = {
    map:false,
    getPositionCallbackFunctions: [], // Служебная переменная: массив callback-функций для запроса позиции
    needReload:true,
    userLatitude: false,
    userLongitude:false,
    geolocationOptions:{
        enableHighAccuracy:false,//режим получения наиболее точных данных
        timeout:10000,          //максимальное время ожидания ответа
        maximumAge:10000        //максимальное время жизни полученных данных
    },
    cookiesExpiresTime:3600,//время жизни кукисов в секундах
    cookiesDomain:false,
    geocoder:false,


    getPosition:function(){
        var callback,options;
//            if(typeof(arguments[1] != "object")){
//                options = {};
//            }
        if(arguments[1]){
            options = arguments[1];
        }
        //else options = arguments[1];
        if(options.update == null) options.update = false;
        if(options.manual == null) options.manual = false;

        if(typeof(arguments[0]) == "function"){
            var callback = arguments[0];
            this.getPositionCallbackFunctions.push(callback);
        }
        if(this.getCookie('userLatitude') != null && this.getCookie('userLongitude') && options.update === false){
            var position = {coords: {latitude: parseFloat(this.getCookie('userLatitude')), longitude: parseFloat(this.getCookie('userLongitude'))}};
            // this.console('Позиция загружена из кукисов.');
            Geo.positionCallback(position);
            //  return;
        }
        if(options.noreload){
            this.needReload = false;
        }
        if(options.manual){
            this.getManualPosition();
            return;
        }
        if(navigator.geolocation && options.manual === false){

            //https://developer.mozilla.org/en-US/docs/Web/API/window.navigator.geolocation.getCurrentPosition
            //navigator.geolocation.getCurrentPosition(success, error, options)
            navigator.geolocation.getCurrentPosition(
                //обработка координат

                //A callback function that takes a Position object as its sole input parameter.
                function(position){
                    Geo.positionCallback(position);
                },
                //обработка ошибок
                function(){

                },
                //Настройки определения местоположения
                this.geolocationOptions
            );
        }else{

        }
        //получение местонахождения
    },
    positionCallback:function(position){
        this.userLatitude = position.coords.latitude;
        this.userLongitude = position.coords.longitude;

        //cоздаем куки
        this.setCookie('userLatitude',this.userLatitude,"/",this.getCookieDomain());
        this.setCookie('userLongitude',this.userLongitude,"/",this.getCookieDomain());
        initializeFirst();


    },


    setCookie:function(name,value,path,domain,secure){
        var d = new Date();

        d.setSeconds(this.cookiesExpiresTime);
        expires = d.toUTCString();
        document.cookie = name + "=" + escape(value) +
            ((expires)?"; expires="+expires:"") +
            ((path)?"; path="+path:"")+
            ((domain)?"; domain="+domain:"")+
            ((secure)?"; secure" : "");
    },
    getCookie:function(name){
        var cookie = " " + document.cookie;
        var search = " " + name + "=";
        var setStr = null;
        var offset = 0;
        var end = 0;
        if(cookie.length > 0){
            offset = cookie.indexOf(search);
            if(offset != -1){
                offset += search.length;
                end = cookie.indexOf(";", offset)
                if(end == -1)
                    end = cookie.length;
                setStr = unescape(cookie.substring(offset, end));
            }
        }
        return(setStr);

    },
    getCookieDomain:function(){
        if(!this.cookieDomain){
            var domain = document.location.host;
            if(/^[0-9]{2,}\.[0-9]{1,}\.[0-9]{1,}\.[0-9]{1,}$/i.test(domain))
                return domain;
            if(/^www./i.test(domain))
                this.cookiesDomain = domain.replace(/^www./, '');
            else this.cookiesDomain = domain;
        }
        return this.cookiesDomain;
    },
    getGeocoder:function(){
        if(!this.geocoder){
            this.geocoder = new google.maps.Geocoder();
        }
    },
    getAddress: function(){
            var myLatLng = new google.maps.LatLng(Geo.getCookie("userLatitude"),Geo.getCookie("userLongitude"));//Geo.getLatLng(Geo.getCookie("userLatitude"),Geo.getCookie("userLongitude"));
            Geo.getAddressByCoordinates(
            myLatLng,
            function(address){
                $('.update_location').find('#location_now').html(address);

            },
            function(){
                //$('#i-do-not-know-where-you-are').show();
            }
        );
    },
//получаем адрес по координатам
    getAddressByCoordinates: function(latlng, callback, error_callback){

        this.geocoder = new google.maps.Geocoder();
        this.geocoder.geocode({location: latlng}, function(results, status){
            if(status != google.maps.GeocoderStatus.OK){
                error_callback();
            }else{
                callback(results[0].formatted_address);
            }
        });


    },
    showRoute:function(lat,log){
        $('#map-modal').modal('show');

    }


};


/*------------------------------S.T.A.R.T--------------------------------*/
    $(document).ready(function(){


      //  $.ajax({type:"POST",dataType:"json",contentType:"application/json; charset=utf-8",data:jsonObj,url:"http://s-group.in.ua/yalta/public/json/reserve_table.php",success:function(data){console.log("success");},error:function(data){alert("error");}});
        //http://stackoverflow.com/questions/15380192/firebug-shows-posted-json-data-using-ajax-but-php-says-post-is-empty
        $('#myModal').find('input[type="submit"]').bind('click',function(){
                       // var dataForm = $('#reserve_table_form').serialize();
            var jsonObj =
            {

                name_reservation_table:$('#myModal').find('input[type="text"]:eq(0)').val(),
                people_reservation_table:$('#myModal').find('input[type="text"]:eq(1)').val(),
                telephone_reservation_table:$('#myModal').find('input[type="text"]:eq(2)').val()

        };

            var postData = JSON.stringify(jsonObj);
//            var postArray = {json:postData};


            $.ajax({
                url: 'http://s-group.in.ua/yalta/public/json/data.json',
                type: "POST",
                dataType: "json",
                data:postData,
                success: function (data) {
                    console.log(data);
                }
            });
        });

//                       $.ajax({
//                            type: 'GET',
//                            url: "http://s-group.in.ua/yalta/public/json/reserve_table.php",
//                            dataType:"json",
////                            data: postArray,
//                            success: function(data){
//                                // Do some action here with the data variable that contains the resulting message
//                                console.log('successful send data to reserve_table.php file = ' + data)
//                            },
//                            error: function(data){
//                                // Do some action here with the data variable that contains the resulting message
//                                console.log('error get data to reserve_table.php file' + $.parseJSON(data))
//                            },
//                            done:function(data){
//                                console.log('done send data to reserve_table.php file' + data)
//                            }
//                        });


        //Скрываем результаты фильтра
        $('.attraction-list').css('opacity','0');

        /*      http://tympanus.net/Development/ModalWindowEffects/     */
        $('.container-fluid').bind('click',function(){
            if($('.container-fluid').css('opacity','0,1')){
                $('.container-fluid').css('opacity','1');
                $('.nav').addClass('.navbar-fixed-top').css('opacity','1');
            }
        });
            $('.md-close').bind('click',function(){
            $('.hero-unit').removeClass('md-show');
            $('.container-fluid').css('opacity','1');
            $('.nav').addClass('.navbar-fixed-top').css('opacity','1');
        });
        function init(){
          //  alert('init');
           var overlay = document.querySelector('.overlay')


          //  [].slice.call(document.querySelectorAll('.md-trigger')).forEach(function(el,i){
                var modal = document.querySelector('#modal-1');
                   // close = modal.querySelector('.md-close');

                    function removeModal( hasPerspective ) {
                        classie.remove( modal, 'md-show' );

                        if( hasPerspective ) {
                            classie.remove( document.documentElement, 'md-perspective' );
                        }
                    }

                    function removeModalHandler(){
                        removeModal(classie.has(modal,'md-setperspective'));
                    }
                    //document.addEventListener('onload',function(ev){

                       classie.add(modal,'md-show');
                      //classie.add(overlay,'overlay-show');


                       $('.container-fluid').css('opacity','0.1');
                       $('.nav').addClass('.navbar-fixed-top').css('opacity','0.1');


                       overlay.removeEventListener('click',removeModalHandler);
                       overlay.addEventListener('click',removeModalHandler);


                      if(classie.has(modal,'md-setperspective')){
                          setTimeout(function(){
                              classie.add(document.documentElement,'md-perspective')},25);
                      }

        }
        init();
                //Фильтруем список по темам
                $('#attraction_filter').click(function(){
                    $('.attraction-list').animate({
                      opacity:1
                    },3000);
                });



    });




