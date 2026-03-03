@extends('layout')

@section('content')
<div class="container my-5">

    <!-- HEADER -->
    <div class="mb-4 text-center">
        <h3 class="fw-bold text-danger">🩸 Find a Blood Drive in Kochi</h3>
        <p class="text-muted">
            Major hospitals and medical institutions in Kochi with active blood banks.
            Search, explore on map, and get directions instantly.
        </p>
    </div>

    <!-- SEARCH WITH AUTOCOMPLETE -->
    <!-- SEARCH WITH AUTOCOMPLETE -->
<div class="search-wrapper mb-4">
    <input type="text"
           id="searchHospital"
           class="form-control shadow-sm"
           placeholder="🔍 Search hospital name..."
           autocomplete="off">

    <ul id="suggestions"
        class="list-group shadow-sm"></ul>
</div>


    <!-- MAP -->
    <div id="map" style="height: 420px;" class="rounded shadow mb-5"></div>

    <!-- HOSPITAL CARDS -->
    <div class="row g-4">

        @php
        $hospitalsList = [
            ['id'=>1,'name'=>'Government Medical College, Kalamassery','loc'=>'Kalamassery, Ernakulam','type'=>'Government'],
            ['id'=>2,'name'=>'Amrita Institute of Medical Sciences (AIMS)','loc'=>'Ponekkara, Kochi','type'=>'Private'],
            ['id'=>3,'name'=>'Lakeshore Hospital','loc'=>'Nettoor, Kochi','type'=>'Private'],
            ['id'=>4,'name'=>'Rajagiri Hospital','loc'=>'Aluva, Ernakulam','type'=>'Private'],
            ['id'=>5,'name'=>'Ernakulam General Hospital','loc'=>'Ernakulam North','type'=>'Government'],
            ['id'=>6,'name'=>'Aster Medcity','loc'=>'Cheranalloor, Kochi','type'=>'Private'],
            ['id'=>7,'name'=>'Medical Trust Hospital','loc'=>'MG Road, Kochi','type'=>'Private'],
            ['id'=>8,'name'=>'Lisie Hospital','loc'=>'Kaloor, Kochi','type'=>'Private'],
            ['id'=>9,'name'=>'Renai Medicity','loc'=>'Palarivattom, Kochi','type'=>'Private'],
            ['id'=>10,'name'=>'Sunrise Hospital','loc'=>'Kakkanad','type'=>'Private']
        ];
        @endphp

        @foreach($hospitalsList as $hospital)
<div class="col-md-6 hospital-item">
    <div class="hospital-card"
         onclick="focusMarker({{ $hospital['id'] }})">

        <!-- TOP INFO -->
        <div class="hospital-header">
            <div>
                <h6 class="hospital-name">
                    {{ $hospital['name'] }}
                </h6>
                <p class="hospital-loc">
                    📍 {{ $hospital['loc'] }}
                </p>
            </div>

            <span class="badge
                {{ $hospital['type']=='Government'
                    ? 'bg-danger-subtle text-danger'
                    : 'bg-secondary-subtle text-dark' }}">
                {{ $hospital['type'] }}
            </span>
        </div>

        <!-- ACTION -->
        <div class="hospital-actions">
            <a target="_blank"
               onclick="event.stopPropagation()"
               href="https://www.google.com/maps/search/?api=1&query={{ urlencode($hospital['name'].' '.$hospital['loc']) }}"
               class="btn btn-sm btn-outline-danger">
                🧭 Get Directions
            </a>
        </div>

    </div>
</div>
@endforeach

    </div>

    <!-- NOTE -->
    <div class="alert alert-info mt-5">
        <strong>Note:</strong>
        Hospital locations open directly in Google Maps using verified names.
    </div>

</div>

<!-- UI STYLES -->
<style>
    /* Search wrapper above map */
.search-wrapper {
    position: relative;
    z-index: 2000; /* higher than Leaflet */
}

/* Autocomplete dropdown */
#suggestions {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: #fff;
    border-radius: 0 0 8px 8px;
    max-height: 220px;
    overflow-y: auto;
    display: none;
    z-index: 2001;
}

/* Dropdown items */
#suggestions li {
    cursor: pointer;
    padding: 10px 14px;
    font-size: 14px;
}

#suggestions li:hover {
    background-color: #f8f9fa;
}

    /* Hospital card – eRaktKosh style */
.hospital-card {
    background: #fff;
    border-radius: 14px;
    padding: 18px 20px;
    height: 100%;
    border: 1px solid #e5e7eb;
    cursor: pointer;
    position: relative;
    transition: all 0.25s ease;
}

/* Left accent bar */
.hospital-card::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background: #dc3545;
    border-radius: 14px 0 0 14px;
    opacity: 0;
    transition: opacity 0.25s ease;
}

.hospital-card:hover::before {
    opacity: 1;
}

.hospital-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 14px 30px rgba(0,0,0,0.12);
}

/* Header row */
.hospital-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 12px;
}

.hospital-name {
    font-weight: 700;
    color: #dc3545;
    margin-bottom: 4px;
    font-size: 15px;
}

.hospital-loc {
    font-size: 13px;
    color: #6c757d;
    margin: 0;
}

/* Actions */
.hospital-actions {
    display: flex;
    justify-content: flex-end;
    margin-top: 10px;
}

.hospital-actions .btn {
    padding: 6px 14px;
    font-size: 13px;
}

</style>

<!-- LEAFLET -->
<link rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    // MAP INIT
    var map = L.map('map').setView([9.9312, 76.2673], 11);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // MARKERS
    var markers = {};

    var hospitals = [
        { id:1, name:"Government Medical College, Kalamassery", lat:10.0560, lng:76.3128 },
        { id:2, name:"Amrita Institute of Medical Sciences (AIMS)", lat:10.0286, lng:76.3089 },
        { id:3, name:"Lakeshore Hospital", lat:9.9059, lng:76.3192 },
        { id:4, name:"Rajagiri Hospital", lat:10.1098, lng:76.3499 },
        { id:5, name:"Ernakulam General Hospital", lat:9.9819, lng:76.2774 },
        { id:6, name:"Aster Medcity", lat:10.0240, lng:76.2704 },
        { id:7, name:"Medical Trust Hospital", lat:9.9695, lng:76.2850 },
        { id:8, name:"Lisie Hospital", lat:9.9993, lng:76.2925 },
        { id:9, name:"Renai Medicity", lat:10.0074, lng:76.3044 },
        { id:10, name:"Sunrise Hospital", lat:10.0028, lng:76.3570 }
    ];

    hospitals.forEach(h => {
        let marker = L.marker([h.lat, h.lng])
            .addTo(map)
            .bindPopup(`<strong>${h.name}</strong>`);
        markers[h.id] = marker;
    });

    function focusMarker(id) {
        let m = markers[id];
        if (m) {
            map.setView(m.getLatLng(), 14);
            m.openPopup();
        }
    }
</script>

<!-- AUTOCOMPLETE SEARCH -->
<script>
const searchInput = document.getElementById('searchHospital');
const suggestionsBox = document.getElementById('suggestions');

const hospitalData = hospitals.map(h => ({
    id: h.id,
    name: h.name
}));

searchInput.addEventListener('keyup', function () {
    let value = this.value.toLowerCase();
    suggestionsBox.innerHTML = '';

    if (!value) {
        suggestionsBox.style.display = 'none';
        return;
    }

    let matches = hospitalData.filter(h =>
        h.name.toLowerCase().startsWith(value)
    );

    if (matches.length === 0) {
        suggestionsBox.style.display = 'none';
        return;
    }

    matches.forEach(h => {
        let li = document.createElement('li');
        li.className = 'list-group-item';
        li.textContent = h.name;

        li.onclick = () => {
            searchInput.value = h.name;
            suggestionsBox.style.display = 'none';
            focusMarker(h.id);
        };

        suggestionsBox.appendChild(li);
    });

    suggestionsBox.style.display = 'block';
});

document.addEventListener('click', function (e) {
    if (!searchInput.contains(e.target)) {
        suggestionsBox.style.display = 'none';
    }
});
</script>
@endsection
