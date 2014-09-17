
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>austin-graffiti</title>
	
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300|Roboto+Slab:100' rel='stylesheet' type='text/css'>
	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<!-- bxSlider CSS file -->
	<link href="assets/css/jquery.bxslider.css" rel="stylesheet" />
				
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
	<div id="Container">
		<div id="Header">
			<div id="LogoContainer">
				<span id="Logo">austin-graffiti</span>
			</div>
			<form id="SearchContainer" class="navbar-form form-inline" role="search">
	  			<div class="search-input form-group">
		   		
		   					<input id="SearchBox" type="text" class="form-control input-xlarge" placeholder="Search">
		   					<span id="SearchIcon" class="glyphicon glyphicon-search"></span>
			
		 		</div>
			</form>
		</div>
		<div id="Main">
			<div class="submitWrap"><button class="submitB">Submit New Graffiti</button></div>
			<div class="carouselWrap">
				<h3>What's New</h3>
				<ul class="carousel carouselNew">
					<li><img src="http://placehold.it/350x150&text=FooBar3" alt=""></li>
					<li><img src="http://placehold.it/350x150&text=FooBar4" alt=""></li>
					<li><img src="http://placehold.it/350x150&text=FooBar2" alt=""></li>
					<li><img src="http://placehold.it/350x150&text=FooBar1" alt=""></li>
				</ul>
			</div>
			<div class="carouselWrap">
				<h3>Most Popular</h3>
				<ul class="carousel carouselPopular">
					<li><img src="http://placehold.it/350x150&text=pop1" alt=""></li>
					<li><img src="http://placehold.it/350x150&text=pop2" alt=""></li>
					<li><img src="http://placehold.it/350x150&text=goatse" alt=""></li>
					<li><img src="http://placehold.it/350x150&text=pop4" alt=""></li>
				</ul>
			</div>
			<div id="festival-map"></div>
		</div>
	</div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- Google Maps -->

    <!-- bxSlider Javascript file -->
	<script src="assets/js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZAMhT8iWr710uQm37YfPgezScJ214xu8&sensor=true"></script>
	<script src="/assets/js/infobox.js" type="text/javascript"></script>
	<script type="text/javascript">

//Create the variables that will be used within the map configuration options.
//The latitude and longitude of the center of the map.
var festivalMapCenter = new google.maps.LatLng(30.2500, -97.7500);
//The degree to which the map is zoomed in. This can range from 0 (least zoomed) to 21 and above (most zoomed).
var festivalMapZoom = 12;
//The max and min zoom levels that are allowed.
var festivalMapZoomMax = 20;
var festivalMapZoomMin = 10;

//These options configure the setup of the map. 
var festivalMapOptions = { 
		  center: festivalMapCenter, 
          zoom: festivalMapZoom,
		  //The type of map. In addition to ROADMAP, the other 'premade' map styles are SATELLITE, TERRAIN and HYBRID. 
          mapTypeId: google.maps.MapTypeId.ROADMAP,
		  maxZoom:festivalMapZoomMax,
		  minZoom:festivalMapZoomMin,
		  //Turn off the map controls as we will be adding our own later.
		  panControl: false,
		  mapTypeControl: true,
};

//Create the variable for the main map itself.
var festivalMap;

//When the page loads, the line below calls the function below called 'loadFestivalMap' to load up the map.
google.maps.event.addDomListener(window, 'load', loadFestivalMap);



//THE MAIN FUNCTION THAT IS CALLED WHEN THE WEB PAGE LOADS --------------------------------------------------------------------------------
function loadFestivalMap() {
	
//The empty map variable ('festivalMap') was created above. The line below creates the map, assigning it to this variable. The line below also loads the map into the div with the id 'festival-map' (see code within the 'body' tags below), and applies the 'festivalMapOptions' (above) to configure this map. 
festivalMap = new google.maps.Map(document.getElementById("festival-map"), festivalMapOptions);	


//Calls the function below to load up all the map markers.
loadMapMarkers();

}



//Function that loads the map markers.
function loadMapMarkers (){

//GLASTONBURY -----------------

// Setting the position of the Glastonbury map marker.
var markerPositionGlastonbury = new google.maps.LatLng(30.258463, -97.750815);


//Setting the icon to be used with the Glastonbury map marker.
var markerIconGlastonbury = {
 url: 'assets/img/1.jpg',
 //The size image file.
 scaledSize: new google.maps.Size(100, 50),
 //The point on the image to measure the anchor from. 0, 0 is the top left.
 origin: new google.maps.Point(0, 0),
 //The x y coordinates of the anchor point on the marker. e.g. If your map marker was a drawing pin then the anchor would be the tip of the pin.
 anchor: new google.maps.Point(0, 0)
};
 
//Setting the shape to be used with the Glastonbury map marker.
var markerShapeGlastonbury = {
 coord: [12,4,216,22,212,74,157,70,184,111,125,67,6,56],
 type: 'poly'
};
 
//Creating the Glastonbury map marker.
markerGlastonbury = new google.maps.Marker({
 //uses the position set above.
 position: markerPositionGlastonbury,
 //adds the marker to the map.
 map: festivalMap,
 title: 'Glastonbury Festival',
 //assigns the icon image set above to the marker.
 icon: markerIconGlastonbury,
 //assigns the icon shape set above to the marker.
 shape: markerShapeGlastonbury,
 //sets the z-index of the map marker.
 zIndex:107
});
//Variable containing the style for the pop-up infobox.
var pop_up_info = "border: 0px solid black; background-color: #ffffff; padding:15px; margin-top: 8px; border-radius:10px; -moz-border-radius: 10px; -webkit-border-radius: 10px; box-shadow: 1px 1px #888;";

//Creates the information to go in the pop-up info box.
var boxTextGlastonbury = document.createElement("div");
boxTextGlastonbury.style.cssText = pop_up_info;
boxTextGlastonbury.innerHTML = '<span class="pop_up_box_text"><img src="assets/img/1.jpg" width="200" height="105" border="0" /><div class="mapInfoContainer">This is a really great piece of art look at it!</div></span>';
 
//Sets up the configuration options of the pop-up info box.
var infoboxOptionsGlastonbury = {
 content: boxTextGlastonbury
 ,disableAutoPan: false
 ,maxWidth: 0
 ,pixelOffset: new google.maps.Size(-200, -100)
 ,zIndex: null
 ,boxStyle: {
 background: "url('infobox/pop_up_box_top_arrow.png') no-repeat"
 ,opacity: 1
 ,width: "430px"
 }
 ,closeBoxMargin: "10px 2px 2px 2px"
 ,closeBoxURL: "assets/img/remove-icon.png"
 ,infoBoxClearance: new google.maps.Size(1, 1)
 ,isHidden: false
 ,pane: "floatPane"
 ,enableEventPropagation: false
};
 
//Creates the pop-up infobox for Glastonbury, adding the configuration options set above.
infoboxGlastonbury = new InfoBox(infoboxOptionsGlastonbury);
 
//Add an 'event listener' to the Glastonbury map marker to listen out for when it is clicked.
google.maps.event.addListener(markerGlastonbury, "click", function (e) {
 //Open the Glastonbury info box.
 infoboxGlastonbury.open(festivalMap, this);
 //Changes the z-index property of the marker to make the marker appear on top of other markers.
 this.setZIndex(google.maps.Marker.MAX_ZINDEX + 1);
 //Zooms the map.
 setZoomWhenMarkerClicked();
 //Sets the Glastonbury marker to be the center of the map.
 festivalMap.setCenter(markerGlastonbury.getPosition());
});
function setZoomWhenMarkerClicked(){
var currentZoom = festivalMap.getZoom();
 if (currentZoom < 12){
 festivalMap.setZoom(12);
 }
}


}




</script>


  </body>
</html>