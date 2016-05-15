
module.exports = {

		iniciar: function () {
			//mapa
			var mapOptions = {
		          center: new google.maps.LatLng(-12.21436, -76.93976),//Empresa
		          zoom: 17,mapTypeId: google.maps.MapTypeId.ROADMAP};
		    var map = new google.maps.Map(document.getElementById("mapa"),mapOptions);
			//marcador con la ubicación de Madelimp SAC
			var place = new google.maps.LatLng(-12.21436, -76.93976);
			var marker = new google.maps.Marker({
				position: place
				, map: map
				, title: 'Pulsa aquí'
				, animation: google.maps.Animation.DROP,});

		    //globo de informacion del marcador
			var popup = new google.maps.InfoWindow({
				content: 'Madelimp SAC'});
			popup.open(map, marker);

		    //globo de informacion al dar un clic en el marcador
		    function showInfo() {
		           map.setZoom(18); //aumenta el zoom
		           map.setCenter(marker.getPosition());
		           var contentString = 'Madelimp SAC';
		           var infowindow = new google.maps.InfoWindow({
		              content: 'Sector 2 Mz. F Lte. 10 Grupo 20'});
		           infowindow.open(map,marker);}
		//Dispara accion al dar un clic en el marcador
		 google.maps.event.addListener(marker, 'click', showInfo);
		}

};
