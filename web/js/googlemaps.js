/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function initMap() {
    
    var mapEl = document.getElementById('gmap');
    
    var uluru = {lat: parseFloat(mapEl.getAttribute('data-long')), lng: parseFloat(mapEl.getAttribute('data-lat'))};
    console.log(uluru);
    var map = new google.maps.Map(mapEl, {
        zoom: 15,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}
   