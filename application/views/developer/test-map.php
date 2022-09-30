<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-oCZxBoNcEj-LrD3MLJXBDRi2BtwUuRM&callback=initMap"></script>

<div>
    lat <input type="text" id="lat" readonly>
    lng <input type="text" id="lng" readonly>
</div>
<br>
<div id="map" style="height:80%"></div>

<script>
    let inputLat = document.getElementById("lat");
    let inputLng = document.getElementById("lng");
    let myMarker;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: -34.397,
                lng: 150.644
            },
            zoom: 8
        });

        // Create marker
        myMarker = new google.maps.Marker({
            position: {
                lat: -34.397,
                lng: 150.644
            },
            draggable: true,
            map,
            title: "Hello World!",
        });

        // Marker drag event
        myMarker.addListener("drag", function(e) {
            updateInputLatLng(e.latLng);
        });

        // Map click event
        map.addListener("click", (e) => {
            // Move marker to clicked position
            myMarker.setPosition(e.latLng);

            // Update inputs
            updateInputLatLng(e.latLng);
        });


        function updateInputLatLng(position) {
            inputLat.value = position.lat();
            inputLng.value = position.lng();
        }
    }
</script>