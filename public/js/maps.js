let db, tx, store

var map = L.map('map').setView([-29.316758, 27.493764], 14);
var layerGroup = L.layerGroup().addTo(map)
var layerGroupCoder = L.layerGroup().addTo(map)


L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


try{
    var geocoder = L.Control.geocoder({
        defaultMarkGeocode: true
      }).addTo(map);
}
catch(e){
    console.log("Unable to search at this page", e)
}

function onMapClick(e) {
    let flag = localStorage.getItem('flag'); // 'dark'

    if(flag=="create" || flag == "update")
    {
        try{
            var lat = document.getElementById('latitude');
            var lng = document.getElementById('longitude');
            lat.value = e.latlng.lat;
            lng.value = e.latlng.lng;
        }
        catch(e)
        {
            console.log("Error occured", e)
        }
    }
    
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

const getAllStores = () =>{

    const flag = localStorage.getItem('flag')

    $.ajax({
        url: 'get-stores',
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
                var props = markerProperties(ele);
                
                if(flag == null || flag == undefined)
                {
                    var marker = L.marker([ele.latitude, ele.longitude], markerOptions ).addTo(layerGroup);
                }
                else
                {
                    var marker = L.marker([ele.latitude, ele.longitude], markerOptions ).addTo(layerGroup).bindPopup(props);
                    marker.on("popupopen", removeMarker);
                }
            });
        },
        error: function(response){
            indexDb([])
        }
    });
}

$(document).ready(function(){
    getAllStores()
})

const markerProperties = (store)=>{
    const props =
      `<div class="rosw">
            <p class="m-0 p-0 h5 fw-bold">${store.name}</p>
            <p class="m-0 p-0">${store.address}</p>
            <p class="m-0 p-0">${store.telephone}</p>
            <img width="70" height="70" src="images/${store.image}" alt="alss"> 
            <p class="m-0 p-0">${store.tags}</p>
     </div>`;
    return  props;
}


function removeMarker(){
    let flag = localStorage.getItem('flag'); 
    const marker = this;
    if(flag === "select")
    {
        localStorage.setItem('flag', "update");

        let value = localStorage.getItem(marker._latlng.lat.toString()+marker._latlng.lng.toString())
        window.location.href = "store-edit/" + value
    }
    if(flag === "delete")
    {
        localStorage.setItem('flag', "home");
        
        let value = localStorage.getItem(marker._latlng.lat.toString()+marker._latlng.lng.toString())
        window.location.href = "store-delete/" + value
    }
}

const indexDb = (dta, filter = false)=>{
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

            if(filter === true)
            {
                store.clear()
                layerGroup.clearLayers();
                dta.forEach(ele => {
                    localStorage.setItem(ele.latitude.toString() + ele.longitude.toString(), ele.id.toString());
                    var customIcon = L.icon(setOptions(ele.type))
                    var markerOptions = {
                        icon: customIcon
                    }
                    
                    var props = markerProperties(ele);
                    var marker = L.marker([ele.latitude, ele.longitude], markerOptions ).addTo(layerGroup ).bindPopup(props);
                    marker.on("popupopen", removeMarker);
                });
            }
            else if(dta.length !== 0)
            {
                    dta.forEach(dt => {
                        store.put(dt)
                    });
            }
        else{
                let requests = store.getAll()
                requests.onsuccess = () =>{
                    requests.result.forEach(ele => {
                        localStorage.setItem(ele.latitude.toString() + ele.longitude.toString(), ele.id.toString());
                        var customIcon = L.icon(setOptions(ele.type))
                        var markerOptions = {
                            icon: customIcon
                        }
                        var marker = L.marker([ele.latitude, ele.longitude], markerOptions ).addTo(layerGroup ) 
                    });
                }
            }

    }

}

const filterType = (e)=>{
    var sel = document.getElementById('typeSelect');
    if(sel.value === "")
        getAllStores()
    else
        getStoresByType(sel.value)

}

const getStoresByType = (id) =>{

    $.ajax({
        url: 'get-stores/'+id,
        type: 'get',
        dataType: 'json',
        success: function(response){
            indexDb(response.data,true)
        },
        error: function(e){
            console.error("Error retriving stores",e )
        }
    });
}

