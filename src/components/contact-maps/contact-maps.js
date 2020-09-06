// ------------------------------------------------------
// Contact Maps Switcher
// ------------------------------------------------------
let senseContactMapSwitcher = function () {
    $('.contact-maps .map-item').not('#map2').hide();
    $('.contact-maps .map-item').removeClass('active');
    $('#map2').addClass('active');
    $('.contact-map-switcher-inner .item').removeClass('active');
    $('#map-item-2').addClass('active');

    $('.contact-map-switcher-inner .item').on('click', function () {

        let curMap = '.' + $(this).attr('id');
        $('.contact-maps .map-item').removeClass('active').hide();
        $(curMap).addClass('active').show();
        $('.contact-map-switcher-inner .item').removeClass('active');
        $(this).addClass('active');
    });
}
senseContactMapSwitcher();

// ------------------------------------------------------
// Contact Maps Switcher Mobi
// ------------------------------------------------------
let senseContactMapSwitcherMobi = function () {
    $('#contact-maps-switcher-mobi').on('change', function () {
        let curSelect = $(this).val();

        $('.contact-map-switcher-inner .item').hide();
        $('.contact-maps .map-item').removeClass('active').hide();

        if (curSelect === 'city-1') {
            $('#map-item-2').css('display', 'flex');
            $('#map2').addClass('active').show();
        }
        if (curSelect === 'city-2') {
            $('#map-item-1').css('display', 'flex');
            $('#map1').addClass('active').show();
        }
        if (curSelect === 'city-3') {
            $('#map-item-3').css('display', 'flex');
            $('#map3').addClass('active').show();
        }
    });
}
senseContactMapSwitcherMobi();




// When the window has finished loading create our google map below
google.maps.event.addDomListener(window, 'load', init);

var senseMapStyle = function () {
    return [{featureType: "all", elementType: "labels", stylers: [{visibility: "on"}]}, {
        featureType: "all",
        elementType: "labels.text.fill",
        stylers: [{saturation: 36}, {color: "#000000"}, {lightness: 40}]
    }, {featureType: "all", elementType: "labels.text.stroke", stylers: [{visibility: "on"}, {color: "#000000"}, {lightness: 16}]}, {
        featureType: "all",
        elementType: "labels.icon",
        stylers: [{visibility: "off"}]
    }, {featureType: "administrative", elementType: "geometry.fill", stylers: [{color: "#000000"}, {lightness: 20}]}, {
        featureType: "administrative",
        elementType: "geometry.stroke",
        stylers: [{color: "#000000"}, {lightness: 17}, {weight: 1.2}]
    }, {featureType: "administrative.country", elementType: "labels.text.fill", stylers: [{color: "#e5c163"}]}, {
        featureType: "administrative.province",
        elementType: "labels",
        stylers: [{visibility: "on"}]
    }, {featureType: "administrative.province", elementType: "labels.text", stylers: [{visibility: "on"}]}, {
        featureType: "administrative.locality",
        elementType: "labels.text",
        stylers: [{visibility: "on"}]
    }, {featureType: "administrative.locality", elementType: "labels.text.fill", stylers: [{color: "#c4c4c4"}]}, {
        featureType: "administrative.neighborhood",
        elementType: "labels.text",
        stylers: [{visibility: "off"}]
    }, {featureType: "administrative.neighborhood", elementType: "labels.text.fill", stylers: [{color: "#fecc00"}]}, {
        featureType: "landscape",
        elementType: "geometry",
        stylers: [{color: "#000000"}, {lightness: 20}]
    }, {featureType: "landscape.natural", elementType: "labels.text", stylers: [{visibility: "on"}]}, {
        featureType: "poi",
        elementType: "geometry",
        stylers: [{color: "#000000"}, {lightness: 21}, {visibility: "on"}]
    }, {featureType: "poi.business", elementType: "geometry", stylers: [{visibility: "on"}]}, {
        featureType: "road.highway",
        elementType: "geometry.fill",
        stylers: [{color: "#fecc00"}, {lightness: "0"}]
    }, {featureType: "road.highway", elementType: "geometry.stroke", stylers: [{visibility: "off"}]}, {
        featureType: "road.highway",
        elementType: "labels.text.fill",
        stylers: [{color: "#000000"}]
    }, {featureType: "road.highway", elementType: "labels.text.stroke", stylers: [{color: "#fecc00"}]}, {
        featureType: "road.arterial",
        elementType: "geometry",
        stylers: [{color: "#000000"}, {lightness: 18}]
    }, {featureType: "road.arterial", elementType: "geometry.fill", stylers: [{color: "#575757"}]}, {
        featureType: "road.arterial",
        elementType: "labels.text.fill",
        stylers: [{color: "#ffffff"}]
    }, {featureType: "road.arterial", elementType: "labels.text.stroke", stylers: [{color: "#2c2c2c"}]}, {
        featureType: "road.local",
        elementType: "geometry",
        stylers: [{color: "#000000"}, {lightness: 16}]
    }, {featureType: "road.local", elementType: "labels.text.fill", stylers: [{color: "#999999"}]}, {
        featureType: "transit",
        elementType: "geometry",
        stylers: [{color: "#000000"}, {lightness: 19}]
    }, {featureType: "water", elementType: "geometry", stylers: [{color: "#000000"}, {lightness: 17}]}];
}

function init() {
    // Basic options for a simple Google Map
    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions

    var mapOptions1 = {
        // How zoomed in you want the map to start at (always required)
        zoom: 9,

        // The latitude and longitude to center the map (always required)
        center: new google.maps.LatLng(51.9999109, 20.4720558),

        // How you would like to style the map.
        // This is where you would paste any style found on Snazzy Maps.

        styles: senseMapStyle()
    };

    var mapOptions2 = {
        // How zoomed in you want the map to start at (always required)
        zoom: 13,

        // The latitude and longitude to center the map (always required)
        center: new google.maps.LatLng(50.0608525, 19.9368939),

        // How you would like to style the map.
        // This is where you would paste any style found on Snazzy Maps.
        styles: senseMapStyle()
    };

    var mapOptions3 = {
        // How zoomed in you want the map to start at (always required)
        zoom: 13,

        // The latitude and longitude to center the map (always required)
        center: new google.maps.LatLng(52.4130125, 16.9147073),

        // How you would like to style the map.
        // This is where you would paste any style found on Snazzy Maps.
        styles: senseMapStyle()
    };

    // Get the HTML DOM element that will contain your map
    // We are using a div with id="map" seen below in the <body>
    var mapElement1 = document.getElementById('map1');
    var mapElement2 = document.getElementById('map2');
    var mapElement3 = document.getElementById('map3');

    // Create the Google Map using our element and options defined above
    var map1 = new google.maps.Map(mapElement1, mapOptions1);
    var map2 = new google.maps.Map(mapElement2, mapOptions2);
    var map3 = new google.maps.Map(mapElement3, mapOptions3);

    let curHostname = window.location.origin;
    if (curHostname.includes('localhost')) {
        curHostname = 'http://localhost:3000/sense';
    }
    let curUrlIcon = `${curHostname}/wp-content/themes/sense/images/pin.png`;

    // Let's also add a marker while we're at it
    var marker1 = new google.maps.Marker({
        position: new google.maps.LatLng(52.0316507, 20.6889452),
        map: map1,
        icon: curUrlIcon,
        title: 'Warszawa'
    });
    var marker2 = new google.maps.Marker({
        position: new google.maps.LatLng(50.0698823, 19.9441827),
        map: map2,
        icon: curUrlIcon,
        title: 'Kraków'
    });
    var marker2 = new google.maps.Marker({
        position: new google.maps.LatLng(52.4117084, 16.9332233),
        map: map3,
        icon: curUrlIcon,
        title: 'Poznań'
    });

}
