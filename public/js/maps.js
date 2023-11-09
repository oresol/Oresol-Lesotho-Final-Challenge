let indexedDB = window.indexedDB || window.mozIndexDB || window.webkitIndexDB || window.msIndexDB
let db, tx, store



var map = L.map('map').setView([-29.316758, 27.493764], 14);


L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

// localStorage.setItem('flag', "home");

// var lttt = "<?=$stores?>";
// console.log(lttt)

// console.log(vayr)

// var circle = L.circle([51.508, -0.11], {
//     color: 'red',
//     fillColor: '#f03',
//     fillOpacity: 0.5,
//     radius: 500
// }).addTo(map);

// var polygon = L.polygon([
//     [51.509, -0.08],
//     [51.503, -0.06],
//     [51.51, -0.047]
// ]).addTo(map);

// marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
// circle.bindPopup("I am a circle.");
// polygon.bindPopup("I am a polygon.");


var popup = L.popup();

function onMapClick(e) {
    let flag = localStorage.getItem('flag'); // 'dark'
    
    if(flag=="create" || flag == "update")
    {
        var lat = document.getElementById('latitude');
        var lng = document.getElementById('longitude');
        lat.value = e.latlng.lat;
        lng.value = e.latlng.lng;
    }
    

    // popup
    //     .setLatLng(e.latlng)
    //     .setContent("You clicked the map at " + e.latlng.toString())
    //     .openOn(map);
}

map.on('click', onMapClick);

const setOptions = (type) =>{
    var icon;

    switch(type)
    {
        case "Spaza":
            icon = "icons/red.png";
            break; 
        case "Container":
            icon = "icons/blue.png";
            break; 
        case "Stand alone":
            icon = "icons/black.png";
            break; 
        case "Inside Mall":
            icon = "icons/green.png";
            break; 
        case "Hawker":
            icon = "icons/purple.png";
            break;
        default:
            icon = "icons/blue.png";
        
    }
    var iconOptions = {
        iconUrl: icon,
        iconSize: [38,90]
    }
    return iconOptions;
}

$(document).ready(function(){

            $.ajax({
            url: 'getStore',
            type: 'get',
            dataType: 'json',
            success: function(response){
                indexDb(response.data)

                response.data.forEach(ele => {
                    localStorage.setItem(ele.latitude.toString() + ele.longitude.toString(), ele.id.toString());
                    var customIcon = L.icon(setOptions(ele.type))
                    var markerOptions = {
                        icon: customIcon
                    }
                    var marker = L.marker([ele.latitude, ele.longitude], markerOptions ).addTo(map ).bindPopup(buttonRemove);
                    marker.on("popupopen", removeMarker);
                });
            },
            error: function(response){
                indexDb([])
            }
        });
})


const buttonRemove =
  '<button type="button" class="remove">Selected Marker</button>';

// remove marker
function removeMarker(){
    let flag = localStorage.getItem('flag'); // 'dark'
    const marker = this;
    if(flag === "select")
    {
        localStorage.setItem('flag', "update");

        console.log(window.location.href)

        let value = localStorage.getItem(marker._latlng.lat.toString()+marker._latlng.lng.toString())
        window.location.href = "store-edit/" + value
    }
    if(flag === "delete")
    {
        localStorage.setItem('flag', "home");
        
        let value = localStorage.getItem(marker._latlng.lat.toString()+marker._latlng.lng.toString())
        window.location.href = "store-delete/" + value
    }
    // else
    // {
    //     const btn = document.querySelector(".remove");
    //     btn.addEventListener("click", function () {
    //         console.log("marker", marker)
    //         map.removeLayer(marker);
    //   });
    // }
}
    

const setFlag = (e)=> {
    if(e == "home"|| e == "select" || e == "home" || "create")
    {
        console.log("Deleted check Databsee")
        var request = indexedDB.deleteDatabase('MyDbase')
        request.onsuccess = ()=>{
            console.log("Deleted Databsee")
        }
        if(e == "home")
        {        
            localStorage.clear()
        }
    }
    localStorage.setItem('flag', e);
}

const indexDb = (dta)=>{
    var coords = []
    const request = indexedDB.open('MyDbase', 1)

    request.onupgradeneeded = function(e){
        let db = request.result
        db.createObjectStore("StoresStore", { keyPath: "id" });
    }

    request.onerror = function(e){
        console.log("There was an error", e.target.errorCode)
    }


    request.onsuccess = function(e){
            db = request.result;
            tx = db.transaction("StoresStore", "readwrite");
            store = tx.objectStore("StoresStore");

            if(dta.length !== 0)
            {
                dta.forEach(dt => {
                    store.put(dt)
                });
            }
            else{

                let requests = db.transaction("StoresStore").objectStore("StoresStore").getAll()
                requests.onsuccess = () =>{
                    requests.result.forEach(ele => {
                        localStorage.setItem(ele.latitude.toString() + ele.longitude.toString(), ele.id.toString());
                        var customIcon = L.icon(setOptions(ele.type))
                        var markerOptions = {
                            icon: customIcon
                        }
                        var marker = L.marker([ele.latitude, ele.longitude], markerOptions ).addTo(map ).bindPopup(buttonRemove);
                        marker.on("popupopen", removeMarker);
                    });
                }
            }



    }

}