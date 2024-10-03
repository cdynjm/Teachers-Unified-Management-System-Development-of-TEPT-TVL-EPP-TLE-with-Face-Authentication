@php
    use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
@endphp

@extends('modals.admin.view-elem-school-modal')
@extends('modals.admin.view-high-school-modal')

@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Map'])
    <div class="container-fluid py-4">

        <style>
            .leaflet-container {
            width: 97%;
            align-items: center;
            height: 100vh;
            }
        </style>

        <div class="row">
            <div class="col-md-12 mb-4">
                <p class="ms-1 mb-0 fw-bolder ms-4">Elementary Schools</p>
                <p class="ms-1 mb-0 fw-normal text-sm ms-4 mt-1">Select school to display records</p>
            </div>
            <div class="col-12">
                <center>
                    <div id="elementary-map" class="leaflet-container rounded mb-4 leaflet-touch leaflet-retina leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0" style="position: relative; outline: none; z-index: 5"><div>
                </center>
            </div>
            <script> 
        
                const elemSchool = L.layerGroup();
                
                var icon = L.icon({
                    iconUrl: "{{ asset('storage/icons/wired-flat-18-location-pin.gif') }}",
                    iconSize:     [30, 30], // adjust size if needed
                    iconAnchor:   [15, 30], // move anchor to center bottom of the icon
                    popupAnchor:  [0, -30]  // adjust popup to be centered above the icon
                });

                
                @foreach ($elementarySchools as $elem)
                    
                    var latitude = parseFloat({{ $elem->latitude }});
                    var longitude = parseFloat({{ $elem->longitude }});


                    @php
                        $elemTeacherID = collect();
                        $elemDocumentID = collect();
                    @endphp

                    var information = 

                    `
                        
                            <input type="hidden" name="school" value={{ $aes->encrypt($elem->id) }}>
                            <input type="hidden" name="year" value={{ Session::get('year') }}>
                            <button class="text-xs bg-white border-0" id="view-elem-school">{{ strtoupper($elem->school) }}</button>
                            <hr class="my-1">
                            <p class="text-xs fw-light ms-1 my-0">Recent Requests: </p>
                            @foreach ($documents->take(3) as $doc)
                                @php
                                    $status = false;
                                @endphp
                                <div class="mt-2 ms-2">
                                    <p class="text-xs fw-bolder my-0" id="status-{{ $elem->id }}">{{ $doc->description }}</p>
                                    @foreach ($elemTeachers->where('elemSchoolID', $elem->id) as $et)
                                        @foreach ($attachments->where('teacherID', $et->id)->where('requestID', $doc->id) as $at)
                                            @php
                                                $elemTeacherID->push($at->teacherID);
                                                $elemDocumentID->push($at->requestID);
                                            @endphp
                                        @endforeach
                                        @if(!($elemTeacherID->contains($et->id) && $elemDocumentID->contains($doc->id)) && ($doc->position == $et->position || $doc->position == 3))
                                            <p class="text-xs fw-normal ms-4 my-0 text-danger">{{ $et->teacher }}
                                            @if($et->position == 1)
                                                - T
                                            @endif
                                            @if($et->position == 2)
                                                - P
                                            @endif
                                            </p>
                                            @php $status = true; @endphp
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach

                    `;
                
                    var elem_marker_{{ $elem->id }} = new L.marker([longitude, latitude], {icon: icon}).addTo(elemSchool).bindPopup(information, {closeOnClick:false,closeButton:false,autoClose:false, zoomControl:true}).openPopup();
                    
                    setTimeout(() => {
                        elem_marker_{{ $elem->id }}.openPopup();
                    }, 500);

                @endforeach
            
                const elemMbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
                const elemMbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
        
                const elemStreets = L.tileLayer(elemMbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: elemMbAttr});
                const elemHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                    maxZoom: 20,
                    subdomains:['mt0','mt1','mt2','mt3']
                });
                const elemOsm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                });
                const elemMap = L.map('elementary-map', {
                    center: [10.311990529874368, 124.947002214600867],
                    zoom: 15,
                    layers: [elemOsm, elemSchool, elemHybrid]
                });
                const elemBaseLayers = {
                    'Hybrid': elemHybrid,
                    'OpenStreetMap': elemOsm,
                };
                const elemOverlays = {
                    'Elementary': elemSchool,
                };
                const elemLayerControl = L.control.layers(elemBaseLayers, elemOverlays).addTo(elemMap);
                const elemSatellite = L.tileLayer(elemMbUrl, {id: 'mapbox/satellite-v9', tileSize: 512, zoomOffset: -1, attribution: elemMbAttr});
                L.Control.geocoder().addTo(elemMap);
                L.control.browserPrint().addTo(elemMap);

            </script>
        </div>

        <div class="row">
            <div class="col-md-12 mb-4">
                <p class="ms-1 mb-0 fw-bolder ms-4">High Schools</p>
                <p class="ms-1 mb-0 fw-normal text-sm ms-4 mt-1">Select school to display records</p>
            </div>
            <div class="col-12">
                <center>
                    <div id="high-school-map" class="leaflet-container rounded mb-4 leaflet-touch leaflet-retina leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0" style="position: relative; outline: none; z-index: 5"><div>
                </center>
            </div>
            <script> 
        
                const highSchool = L.layerGroup();
                
                var icon = L.icon({
                    iconUrl: "{{ asset('storage/icons/wired-flat-18-location-pin.gif') }}",
                    iconSize:     [30, 30], // adjust size if needed
                    iconAnchor:   [15, 30], // move anchor to center bottom of the icon
                    popupAnchor:  [0, -30]  // adjust popup to be centered above the icon
                });
                
                @foreach ($highSchools as $hs)
                    
                    var latitude = parseFloat({{ $hs->latitude }});
                    var longitude = parseFloat({{ $hs->longitude }});

                    @php
                        $highSchoolTeacherID = collect();
                        $highSchoolDocumentID = collect();
                    @endphp

                    var information = 
                   
                    `
                        
                            <input type="hidden" name="school" value={{ $aes->encrypt($hs->id) }}>
                            <input type="hidden" name="year" value={{ Session::get('year') }}>
                            <button class="text-xs bg-white border-0" id="view-high-school">{{ strtoupper($hs->school) }}</button>
                            <hr class="my-1">
                            <p class="text-xs fw-light ms-1 my-0">Recent Requests: </p>
                            @foreach ($documents->take(3) as $doc)
                                @php
                                    $status = false;
                                @endphp
                                <div class="mt-2 ms-2">
                                    <p class="text-xs fw-bolder my-0" id="status-{{ $hs->id }}">{{ $doc->description }}</p>
                                    @foreach ($highSchoolTeachers->where('highSchoolID', $hs->id) as $ht)
                                        @foreach ($attachments->where('teacherID', $ht->id)->where('requestID', $doc->id) as $at)
                                            @php
                                                $highSchoolTeacherID->push($at->teacherID);
                                                $highSchoolDocumentID->push($at->requestID);
                                            @endphp
                                        @endforeach
                                        @if(!($highSchoolTeacherID->contains($ht->id) && $highSchoolDocumentID->contains($doc->id)) && ($doc->position == $ht->position || $doc->position == 3))
                                            <p class="text-xs fw-normal ms-4 my-0 text-danger">{{ $ht->teacher }}
                                            @if($ht->position == 1)
                                                - T
                                            @endif
                                            @if($ht->position == 2)
                                                - P
                                            @endif
                                            </p>
                                            @php $status = true; @endphp
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach

                    `;
                
                    var hs_marker_{{ $hs->id }} = new L.marker([longitude, latitude], {icon: icon}).addTo(highSchool).bindPopup(information, {closeOnClick:false,closeButton:false,autoClose:false, zoomControl:false}).openPopup();
                    
                    setTimeout(() => {
                        hs_marker_{{ $hs->id }}.openPopup();
                    }, 500);

                @endforeach
            
                const hsMbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
                const hsMbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
                
                const hsStreets = L.tileLayer(hsMbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: hsMbAttr});
                const hsHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                    maxZoom: 20,
                    subdomains:['mt0','mt1','mt2','mt3']
                });
                const hsOsm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                });
                const highSchoolMap = L.map('high-school-map', {
                    center: [10.311990529874368, 124.947002214600867],
                    zoom: 14,
                    layers: [hsOsm, highSchool, hsHybrid]
                });
                const hsBaseLayers = {
                    'Hybrid': hsHybrid,
                    'OpenStreetMap': hsOsm,
                };
                const hsOverlays = {
                    'High School': highSchool,
                };
                const hsLayerControl = L.control.layers(hsBaseLayers, hsOverlays).addTo(highSchoolMap);
                const hsSatellite = L.tileLayer(hsMbUrl, {id: 'mapbox/satellite-v9', tileSize: 512, zoomOffset: -1, attribution: hsMbAttr});
                L.Control.geocoder().addTo(highSchoolMap);
                L.control.browserPrint().addTo(highSchoolMap);

            </script>
        </div>
    @include('layouts.footers.auth.footer')
    </div>
@endsection