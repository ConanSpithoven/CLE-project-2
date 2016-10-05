<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script>
		window.onload = function() {

			function genMap() {
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
				    if (this.readyState == 4 && this.status == 200) {
				    	if(this.responseText == 1) {
				    		console.log("image generated");
				    		document.getElementById("map").src = 'images/map.png?time=' + new Date();
				    	}else {
				    		console.log("error generating image");
				    	}
				    }
				};
			  xhttp.open("GET", "map.php", true);
			  xhttp.send();
			}

			window.setInterval(function() {genMap()}, 3000);
		}
	</script>
</head>
<body>
<img id="map" width="1000px" height="1000px" src="images/map.png"/>
</body>
</html>