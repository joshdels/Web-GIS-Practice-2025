<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joshua First Webmap</title>

    <!-- Careful sa CSS, medyo dehado ako dito -->

    <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.0/leaflet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="source/jquery-ui.min.css">
    <link rel="stylesheet" href="Plugins/sidebar/leaflet-sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.css" />
    <link rel="stylesheet" href="Plugins/mouse_position/L.Control.MousePosition.css">
    <link rel="stylesheet" href="https://unpkg.com/@geoman-io/leaflet-geoman-free@latest/dist/leaflet-geoman.css" />
    <link rel="stylesheet" href="Plugins/mini_map/Control.MiniMap.min.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.0/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.0/leaflet-src.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src="source/jquery-ui.min.js"></script>
    <script src="Plugins/sidebar/leaflet-sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>
    <script src="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.js"></script>
    <script src="Plugins/mouse_position/L.Control.MousePosition.js"></script>
    <script src="https://unpkg.com/@geoman-io/leaflet-geoman-free@latest/dist/leaflet-geoman.js"></script>
    <script src="Plugins/mini_map/Control.MiniMap.min.js"></script>
    <script src="Plugins/ajax/leaflet.ajax.js"></script>

    <style>
        .bold {
            font-weight: bold;
            font-size: 16px;
        }

        .errorMsg {
            padding: 0;
            text-align: center;
            background-color: darksalmon;
        }
    </style>


</head>
<body>

        
    
    <div id="sidebar" class="sidebar collapsed">
        <!-- Nav tabs -->
        <div class="sidebar-tabs">
            <ul role="tablist">
                <li><a href="#home" role="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#valve" role="tab"><i class="fa fa-puzzle-piece"></i></a></li>
                <li><a href="#pipeline" role="tab"><i class="fa fa-sliders"></i></a></li>
                <li><a href="#building" role="tab"><i class="fa fa-building"></i></a></li>
            </ul>
        </div>
        
        <!-- Tab panes -->
        <div class="sidebar-content">


            <div class="sidebar-pane" id="home">
                <h1 class="sidebar-header">
                    Home
                    <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                </h1>

           
			
		


            </div>

        <div class="sidebar-pane" id="valve">
            <h1 class="sidebar-header">
                Valves
                <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
            </h1>

            <div id="divValve" class="col-xs-12">

                <div class="col-xs-12" style="height: 10px;"></div>

                <div class="col-xs-12">
                    <p class="text-center bold">Valve Information</p>
                </div>
                <div class="col-xs-12 errorMsg" id="valve_error"></div>

                <div class="col-xs-12" style="height: 10px;"></div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <input type="text" id="valve_id" class="form-control" 
                        placeholder="Valve ID">
                    </div>
                    <div class="col-xs-6">
                        <button id="findValve" class="btn btn-primary btn-block">
                        Find Valve</button>
                    </div>
                </div>

                <div class="col-xs-12" style="height: 15px;"></div>

                <div class="col-xs-12" id="valve_information">
                    
                </div>

            </div>


        </div>
    
            <div class="sidebar-pane" id="pipeline">
                <h1 class="sidebar-header">
                    Pipelines
                    <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                </h1>

                <div id="divPipeline" class="col-xs-12">

                    <div class="col-xs-12" style="height: 10px;"></div>

                    <div class="col-xs-12">
                        <p class="text-center bold">Pipeline Information</p>
                    </div>
                    <div class="col-xs-12 errorMsg" id="pipeline_error"></div>

                    <div class="col-xs-12" style="height: 10px;"></div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <input type="text" id="pipeline_id" class="form-control" placeholder="Pipeline ID">
                        </div>
                        <div class="col-xs-6">
                            <button id="findPipeline" class="btn btn-primary btn-block">Find Pipeline</button>
                        </div>
                    </div>

                    <div class="col-xs-12" style="height: 15px;"></div>

                    <div class="col-xs-12" id="pipeline_information">
                        
                    </div>

                </div>

             

            </div>


            <div class="sidebar-pane" id="building">
                <h1 class="sidebar-header">
                    Buildings
                    <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                </h1>

                <div id="divBuilding" class="col-xs-12">

                    <div class="col-xs-12" style="height: 10px;"></div>

                    <div class="col-xs-12">
                        <p class="text-center bold">Building Information</p>
                    </div>
                    <div class="col-xs-12 errorMsg" id="building_error"></div>

                    <div class="col-xs-12" style="height: 10px;"></div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <input type="text" id="building_id" class="form-control" placeholder="Building Account Number">
                        </div>
                        <div class="col-xs-6">
                            <button id="findBuilding" class="btn btn-primary btn-block">Find Building</button>
                        </div>
                    </div>

                    <div class="col-xs-12" style="height: 15px;"></div>

                    <div class="col-xs-12" id="building_information">
                    
                    </div>

                </div>
            </div>

        </div>
            
    </div>

	

    <div id="mapdiv" class="col-md-12"></div>

    <script>

        var mymap;
        var baseLayers;
        var overlays;
        var lyrSearch;

        var valves_array = [];
        var pipelines_array = [];
        var buildings_array = [];
        

         // initialize the map on the "map" div with a given center and zoom
         // control you map "mymap"
        var mymap = L.map("mapdiv", {
            center: [7.44689, 125.8076],
            zoom: 13,
            attributionControl: false,
            zoomControl: false,
        });
        //Basemap
        var openStreetMap = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?',{maxZoom:33}).addTo(mymap);

        var OpenStreetMap_HOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            maxZoom: 23,
           });

        var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        maxZoom: 23,
        });

        var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            maxZoom: 23,
        });

        var openStreetMap_minimap = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?',{
            maxZoom:33
        });
        


        //OpenStreetMap_HOT.addTo(mymap);
        
        OpenStreetMap_HOT.addTo(mymap);

        //Sidebar
        var sidebar = L.control.sidebar('sidebar', {
            position: 'left'
        });
        
        mymap.addControl(sidebar);
       

        

      

       

        //ZOOM CONTROL
        L.control.zoom({position:"topright"}).addTo(mymap);

        //LAYER CONTROL
        var baseLayers = {
            "Open Street Map Hot": OpenStreetMap_HOT,
            "Open Street Map": openStreetMap,
            "Open TopoMap": OpenTopoMap,
            "Esri World Imagery": Esri_WorldImagery,
        };

        var control_layers = L.control.layers(baseLayers, overlays).addTo(mymap);

        //MEASURE
        L.control.polylineMeasure({position:"topright"}).addTo(mymap);

        //DRAW CONTROL OR GEOMAN -> go documentation of geoman
        mymap.pm.addControls({  
            position: 'topright',  
            drawMarker: true,
            drawPolyline: true,
            drawPolygon: true,
            drawCircleMarker: false,
            rotateMode: false,
            drawCircle: false,
            drawText: false,
            drawRectangle: false,
            editMode: false,
            dragMode: false,
            cutPolygon: false,
            removalMode: true,
        });


 

        //MOUSE POSITION
        L.control.mousePosition({position: 'bottomright'}).addTo(mymap);

       

        mymap.on("pm:create", function(e){
            console.log(e);
        })

        //MINI MAP
        var miniMap = new L.Control.MiniMap(openStreetMap_minimap, {
            position:"bottomright",
            height: 200,
            width: 200,
        }).addTo(mymap);
        

         //Scale
         L.control.scale({position: 'bottomright' , maxWidth: '200', imperial: false }).addTo(mymap);


      

        

     
        //DATA LOADING OPERATIONS

        //VALVE
        var valves = L.geoJSON.ajax('data/valves_105.geojson', {pointToLayer: style_valves}).
            addTo(mymap);

        //automatic adjuster to maps
        valves.on('data:loaded', function(){
            mymap.fitBounds(valves.getBounds());
           $("#valve_id").autocomplete({
              source: valves_array,
           }); 
        
        })

        function style_valves(json, latlng) {
            var att = json.properties;
            var color;
            var fill_color;
            var radius = 5;
            var fillOpacity = 1;
            
            //console.log(att.valve_id);
            valves_array.push(att.valve_id); // got no idea sa .push() haha

            //color catergorize scenario
            switch(att.type) {
                case 'Air Release Valve':
                    color = '#e74c3c';
                    fill_color = '#e74c3c';
                    break;
                case 'Gate Valve':
                    color = '#a569bd';
                    fill_color = '#a569bd';
                    break;
                case 'Washout Valve':
                    color = '#5dade2';
                    fill_color = '#5dade2';
                    break;
                default:
                    color = '#808b96';
                    fill_color = '#808b96';
                    break;
            }

            var style = {radius: radius, color:color, fillColor:fill_color, fillOpacity:fillOpacity}

            //hover over objects
            return L.circleMarker(latlng, style).bindTooltip("Valve ID: " + att.valve_id+"<br>Valve Type: "+att.type+"<br>Diameter (mm): "+att.diameter+"<br>Location: "+att.location);
          
        }

        //Overlay Valves
        control_layers.addOverlay(valves, "Valves")

        //Find valves by using jquery, then show it when retain value == attributes_value from the function
        $("#findValve").click(function(){
            var valve_id = $("#valve_id").val();
            
            var lyr =  returnLayerByAttribute(valves, "valve_id", valve_id);


           if (lyr) {
                var att = lyr.feature.properties;

                if (lyrSearch) {
                    lyrSearch.remove();
                }
    
                //console.log(lyr.getLatLng());

                lyrSearch = L.circle(lyr.getLatLng(), {radius: 10, color:'red', weight:10,
                    opacity:0.5, fillOpacity:0.3}).addTo(mymap);

                mymap.setView(lyr.getLatLng(), 20);
                valves.bringToFront();

                $("#valve_information").html("Valve Type: "+att.type+"<br>DMA ID: "+att.dma_id+
                    "<br>Diamter (mm): "+ att.diamter+"<br>turn Status: "+att.turn+"<br>Visibility: "
                    +att.visibility+"<br>Location: "+att.location);

           } else {
                $("#valve_error").html("valve not found");
           }
        });


        //PIPELINES
        var pipelines = L.geoJSON.ajax('data/pipelines_105.geojson', {style: style_pipelines, 
            onEachFeature: process_pipelines}).addTo(mymap);

       
        $("#pipeline_id").autocomplete({
            source: pipelines_array,
        });
    
        function style_pipelines(json) {
            var att = json.properties;

            switch(att.category) {
                case 'Distribution Pipeline':
                    color = '#27ae60';
                    fill_color = '#27ae60';
                    break;
                case 'Reticulation Pipeline':
                    color = '#7b241c';
                    fill_color = '#7b241c';
                    break;
                case 'Transmission Pipeline':
                    color = '#f4d03f';
                    fill_color = '#f4d03f';
                    break;
                default:
                    color = '#808b96';
                    fill_color = '#808b96';
                    break;
            }
            return {color:color};
        }

        function process_pipelines(json, lyr) {
            var att = json.properties;

            pipelines_array.push(att.pipe_id);

            //Hover to show deails
            lyr.bindTooltip("Pipe ID: "+att.pipe_id+"<br>Diameter: "+att.diameter+"<br>Location: "+att.location+"<br>Category: "+att.category+"<br>Length: "+att.length);
        }

        control_layers.addOverlay(pipelines, "Pipelines");

        $("#findPipeline").click(function(){
            var pipeline_id = $("#pipeline_id").val();
            
            var lyr =  returnLayerByAttribute(pipelines, "pipe_id", pipeline_id);


           if (lyr) {
                var att = lyr.feature.properties;

                if (lyrSearch) {
                    lyrSearch.remove();
                }

                lyrSearch = L.geoJSON(lyr.toGeoJSON(), {style:{color:'red', weight:10,
                    opacity:0.5}}).addTo(mymap);

                mymap.fitBounds(lyr.getBounds());
                valves.bringToFront();

                $("#pipeline_information").html("Category: "+att.category+"<br>DMA ID: "+att.
                    dma_id+"<br>Material: "+att.material+"<br>Length: "+att.length+"<br>Location: "+
                    att.location);

           } else {
                $("#pipeline_error").html("Pipeline not found");
           }
        });


         //BUILDINGS
         var buildings = L.geoJSON.ajax('data/buildings_105.geojson', {style:style_buildings, onEachFeature:process_buildings}).addTo(mymap);

         $("#building_id").autocomplete({
            source: buildings_array,
         });

         function style_buildings(json){
            var att = json.properties;
            var storey = att.storey;
            var color;
            var fill_color;
            var fill_opacity = 1;

            switch(att.category) {
                case 'Building':
                    if (storey>=10) {
                        color = '#922b21';
                        fill_color = '#922b21';
                    } else if (storey >= 8 ){
                        color = '#c0392b';
                        fill_color = '#c0392b';
                    } else if (storey >= 5) {
                        color = '#d98880 ';
                        fill_color = '#d98880';
                    } else if (storey >= 3) {
                        color = '#e6b0aa';
                        fill_color = '#e6b0aa';
                    } else {
                        color = '#f9ebea';
                        fill_color = '#f9ebea';
                    }
                    break;

                case 'Tin Shed':
                    color = '7dcea0';
                    fill_color = '7dcea0';
                    fill_opacity = 0.8;
                    break;
                case 'Open Plot':
                    color = '#f9e79f';
                    fill_color = '#f9e79f';
                    break;
                default:
                    color = 'black';
                    fill_color = 'black';
                    break;
            }
    
            return {color:color, fillColor:fill_color, fillOpacity:fill_opacity};

         }

         function process_buildings(json, lyr) {
            var att = json.properties;

            buildings_array.push(att.account_no);

            building_array.push(att.account_no);

            //When Click details show up
            lyr.bindPopup("Catergory: "+att.category+"<br>Storey: "+att.storey+"<br>Location :"+att.location+"<br>Account Number: " + att.account_no);
         }

         control_layers.addOverlay(buildings, "Buildings");

         $("#findBuilding").click(function(){
            var building_id = $("#building_id").val();
            
            var lyr =  returnLayerByAttribute(buildings, "account_no", building_id);


           if (lyr) {
                var att = lyr.feature.properties;

                if (lyrSearch) {
                    lyrSearch.remove();
                }

                lyrSearch = L.geoJSON(lyr.toGeoJSON(), {style:{color:'red', weight:10,
                    opacity:1, fillOpacity:0}}).addTo(mymap);

                mymap.fitBounds(lyr.getBounds());

                $("#building_information").html("Category: "+att.category+"<br>Storey: "+att.storey+
                    "<br>Population: "+att.population+"<br>Location: "+att.location+"<br>DMA ID: "+
                    att.dma_id);

           } else {
                $("#building_error").html("Building not found");
           }
        });

         //GENERAL FUNCTIONS
         function returnLayerByAttribute(layer,attribute_name, attribute_value) {
            //debugging layer
            //console.log(layer);

            var all_layers = layer.getLayers();
            //console.log(all_layers) --> for debugging

            //[0].feature.properties
            for (var i=0; i<all_layers.length; i++) {
                var retain_value = all_layers[i].feature.properties[attribute_name];
                //console.log(retain_value)

                if (retain_value == attribute_value){
                    return all_layers[i]
                }
            }
            
            return false;
         }

        
    

        
    </script>
</body>
</html>



