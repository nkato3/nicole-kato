var markersArray = [];
var map;  
var bus;
var bus_pos;
var i = 0;
var j = 0;
var mePos = new google.maps.LatLng(40.833061, -108.917969);
var highSchoolPos = new google.maps.LatLng(31.253633, -117.397620);
var collegePos = new google.maps.LatLng(38.907597, -74.352049);
var NIHPos = new google.maps.LatLng(35.295267, -78.199237);
var USPTOPos = new google.maps.LatLng(31.295267, -78.199237);
var DOTPos = new google.maps.LatLng(35.205816, -73.553324);
var accenturePos = new google.maps.LatLng(41.884739, -87.630730);
var disneyPos = new google.maps.LatLng(34.160149, -118.283143);

function initialize() {
	if(isMobile.any()) {
        var center_pos = new google.maps.LatLng(35.6,-113);
    } else {
        var center_pos = new google.maps.LatLng(39.6,-98);
    }
    
    var myOptions = {
      zoom: 4,
      center: center_pos,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("resume_canvas"), myOptions);

	//High School 
	var meMap = new google.maps.Marker({
        position: mePos, 
        map: map,
        title: "Me"
    });
    meMap.setIcon("../public/images/myPic_logo.png");
	
	google.maps.event.addListener(meMap, "click", function (e) {
			$('#meOverlay').show();
	});

	//High School 
	var highSchoolMap = new google.maps.Marker({
        position: highSchoolPos, 
        map: map,
        title: "Campbell Hall Episcopal"
    });
    highSchoolMap.setIcon("../public/images/campbellHall_logo.png");
	
	google.maps.event.addListener(highSchoolMap, "click", function (e) {
			$('#highSchoolOverlay').show();
	});


   //College
	var collegeMap = new google.maps.Marker({
        position: collegePos, 
        map: map,
        title: "Swarthmore College"
    });
	collegeMap.setIcon("../public/images/swarthmore_icon.png");

	google.maps.event.addListener(collegeMap, "click", function (e) {
			$('#collegeOverlay').show();
	});



    //NIH
	var NIHMap = new google.maps.Marker({
        position: NIHPos, 
        map: map,
        title: "Communications Engineering Branch at National Institues of Health"
    });
	NIHMap.setIcon("../public/images/NIH_Logo.png");               

	google.maps.event.addListener(NIHMap, "click", function (e) {
			$('#NIHOverlay').show();
	});

    //DOT
	var DOTMap = new google.maps.Marker({
        position: DOTPos, 
        map: map,
        title: "Research and Innovative Technology Administration at Department of Transportation"
    });
	DOTMap.setIcon("../public/images/DOT_logo.png");

	google.maps.event.addListener(DOTMap, "click", function (e) {
			$('#PNTOverlay').show();
	});

	
    //USPTO
	var USPTOMap = new google.maps.Marker({
        position: USPTOPos, 
        map: map,
        title: "United States Patent and Trademark Office"
    });
	USPTOMap.setIcon("../public/images/USPTO_logo.png");               

	google.maps.event.addListener(USPTOMap, "click", function (e) {
			$('#USPTOOverlay').show();
	});

	//Accenture 
	var accentureMap = new google.maps.Marker({
        position: accenturePos, 
        map: map,
        title: "Accenture LLC"
    });
	accentureMap.setIcon("../public/images/Accenture_logo.png");

	google.maps.event.addListener(accentureMap, "click", function (e) {
			$('#accentureOverlay').show();
	});


    //Disney
	var disneyMap = new google.maps.Marker({
        position: disneyPos, 
        map: map,
        title: "Walt Disney Park &amp; Resorts Online"
    });
	disneyMap.setIcon("../public/images/disney_logo.png");

	google.maps.event.addListener(disneyMap, "click", function (e) {
			$('#disneyOverlay').show();
	});

$(".close_button").click(function() {
  if(($(this).parent().parent()).is(":visible")){
  	($(this).parent().parent()).hide();
  }
});
}

$( document ).ready(function() {
    initialize();
});