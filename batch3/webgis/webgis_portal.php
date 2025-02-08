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
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.min.css" rel="stylesheet">


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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.all.min.js"></script>

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

        .new_feature {
            display: none;
        }

        .successMsg {
            text-align: center;
            background-color: #85c1e9;
            font-weight: bold;
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
        
        <!-- Tab Panels -->
        <div class="sidebar-content">
            <!-- Home Tab -->
            <div class="sidebar-pane" id="home">
                <h1 class="sidebar-header">Home<span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                </h1>
            </div>

            <!-- Valve Tab -->
            <div class="sidebar-pane" id="valve">
                <h1 class="sidebar-header">Valves<span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                </h1>

                <div id="divValve" class="col-xs-12">
                    <div class="col-xs-12" style="height: 10px;"></div>
                </div>
                
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
                    <div class="col-xs-12" id="valve_information"></div>
                    <div class="col-xs-12" style="height: 60px;"> </div>

                    <!-- adding lower part html user add details -->
                    <div id="newValve" class="col-xs-12">
                        <div class = "col-xs-8">
                            <button type = "button" class="btn btn-info btn-block" id="btn_valve_form">
                                Insert New Valve</button>
                        </div>
                        <div class = "col-xs-4">
                            <button type = "button" class="btn btn-success btn-block" id="btn_valve_refresh">
                                Refresh</button>
                        </div>

                        <div class="col-xs-12" style="height: 10px;"></div>
                    
                        <!-- valve_id -->
                        <div id="new_valve_information" class="col-xs-12 new_feature">
                            <label class="control-label col-sm-4" for="valve_id_new">Valve ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="valve_id_new" id="valve_id_new">
                            </div>
                        
                        <!-- valve_type -->
                        <div class="col-xs-12" style="height: 10px;"> </div>
                            <label class="control-label col-sm-4" for="valve_type"> Valve Type </label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" name="valve_type" id="valve_type">
                                    <option value=""></option>
                                    <option value="Gate Valve">Gate Valve</option>
                                    <option value="Washout Valve">Washout Valve</option>
                                    <option value="Air Release Valve">Air Release Valve</option>
                                </select>
                            </div>
                                
                        <!-- valve_dma_id -->
                        <div class="col-xs-12" style="height: 10px;"> </div>
                            <label class="control-label col-sm-4" for="valve_dma_id"> DMA ID </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="valve_dma_id" id="valve_dma_id">
                            </div>
                            
                        <!-- valve_diamter -->
                        <div class="col-xs-12" style="height: 10px;"> </div>
                            <label class="control-label col-sm-4" for="valve_diameter"> Diameter (mm) </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="valve_diameter" id="valve_diameter">
                                </div>

                        <!-- valve_Visibility -->
                        <div class="col-xs-12" style="height: 10px;"> </div>
                        <label class="control-label col-sm-4" for="valve_visbility"> Visibility </label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" name="valve_visibility" id="valve_visibility">
                                    <option value=""></option>
                                    <option value="Visible">Visible</option>
                                    <option value="Invisible">Invisible</option>
                                </select>
                            </div>
                        
                        <!-- valve_Location -->
                        <div class="col-xs-12" style="height: 10px;"> </div>
                        <label class="control-label col-sm-4" for="valve_location"> Location </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="valve_location" id="valve_location">
                            </div>

                        <!-- valve_geometry -->
                        <div class="col-xs-12" style="height: 10px;"> </div>
                        <label class="control-label col-sm-4" for="valve_geometry"> Geometry </label>
                            <div class="col-sm-8">
                                <textarea name="valve_geometry" id="valve_geometry" disabled> </textarea>
                            </div>

                            <div class="col-xs-12" style="height: 10px;"> </div>

                        <!-- cancel/insert button -->
                            <!-- cancel button -->
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-danger btn block" id="btn_valve_cancel"> 
                                    Cancel 
                                </button>
                            </div>
                            <!-- insert button -->
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-success btn block" id="btn_valve_insert"> 
                                    Insert Valve 
                                </button>
                            </div>  
                            
                            <div class="col-xs-12" style="height: 10px;"> </div>
                            <div id="valve_status" class="col-xs-12 successMsg"> </div>

                        </div>
                    </div>
            </div>
            
            <!-- Pipeline Tab -->
            <div class="sidebar-pane" id="pipeline">
                <h1 class="sidebar-header">Pipelines<span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                </h1>

                <div id="divPipeline" class="col-xs-12">
                    <div class="col-xs-12" style="height: 10px;"></div>
                </div>

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
                    <div class="col-xs-12" style="height: 60px;"> </div>

                    <!-- adding lower part html user add details -->
                    <div id="newPipeline" class="col-xs-12">
                        <div class = "col-xs-8">
                            <button type = "button" class="btn btn-info btn-block" id= "btn_pipeline_form">
                                Insert New Pipeline
                            </button>
                        </div>
                        <div class = "col-xs-4">
                            <button type = "button" class="btn btn-success btn-block" id= "btn_pipeline_refresh">
                                Refresh
                            </button>
                        </div>
                    </div>

                        <div class="col-xs-12" style="height: 10px;"></div>

                        <!-- pipeline_id -->
                        <div class="col-xs-12" style="height: 10px;"> </div>
                            <div id="new_pipeline_information" class="col-xs-12 new_feature">
                            <label class="control-label col-sm-4" for="new_pipeline_id">Pipeline ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="new_pipeline_id" id="new_pipeline_id">
                            </div>
                            
                        <!-- pipeline_category -->
                        <div class="col-xs-12" style="height: 20px;"> </div>
                            <label class="control-label col-sm-4" for="pipeline_category"> Category </label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" name="pipeline_category" id="pipeline_category">
                                    <option value=""></option>
                                    <option value="Reticulation Pipeline">Reticulation Pipeline</option>
                                    <option value="Distribution Pipeline">Distribution Pipeline</option>
                                    <option value="Transmission Pipeline">Transmission Pipeline</option>
                                </select>
                            </div>
                                
                        <!-- pipeline_dma_id -->
                        <div class="col-xs-12" style="height: 10px;"> </div>
                            <label class="control-label col-sm-4" for="pipeline_dma_id">DMA ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pipeline_dma_id" id="pipeline_dma_id">
                            </div>
                            
                        <!-- pipeline_diameter -->
                        <div class="col-xs-12" style="height: 10px;"> </div>
                        <label class="control-label col-sm-4" for="pipeline_diameter">Diamter (mm)</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pipeline_diameter" id="pipeline_diameter">
                            </div>           

                        <!-- pipeline_method -->
                        <div class="col-xs-12" style="height: 10px;"> </div>
                        <label class="control-label col-sm-4" for="pipeline_method">Construction Method</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" name="pipeline_method" id="pipeline_method">
                                    <option value=""></option>
                                    <option value="OT">OT</option>
                                    <option value="HDD">HDD</option>
                                </select>
                            </div>

                        <!-- pipeline_Location -->
                        <div class="col-xs-12" style="height: 10px;"> </div>
                        <label class="control-label col-sm-4" for="pipeline_location">Location</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pipeline_location" id="pipeline_location">
                            </div>

                        <!-- pipeline_geometry -->
                        <div class="col-xs-12" style="height: 10px;"> </div>
                        <label class="control-label col-sm-4" for="pipeline_geometry"> Geometry </label>
                            <div class="col-sm-8">
                                <textarea name="pipeline_geometry" id="pipeline_geometry" disabled ></textarea>
                            </div>

                            <div class="col-xs-12" style="height: 10px;"> </div>

                        <!-- cancel/insert button -->
                            <!-- cancel button -->
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-danger btn block" id="btn_pipeline_cancel"> 
                                    Cancel 
                                </button>
                            </div>
                            <!-- insert button -->
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-success btn block" id="btn_pipeline_insert"> 
                                    Insert Pipeline 
                                </button>
                            </div>                 
                    
                    </div>      
            </div>
            <div class="col-xs-12" style="height: 10px;"> </div>
            <div id="pipeline_status" class="col-xs-12 successMsg"> </div>
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
                <div class="col-xs-12" style="height: 60px;"> </div>
                
                </div>

                <!-- adding lower part html user add details -->
                <div id="newBuilding" class="col-xs-12"> 

                    <div class = "col-xs-8">
                        <button type = "button" class="btn btn-info btn-block" id= "btn_building_form">
                            Insert New Building
                        </button>
                    </div>
                    <div class = "col-xs-4">
                        <button type = "button" class="btn btn-success btn-block" id= "btn_building_refresh">
                            Refresh
                        </button>
                    </div>

                </div>

                <div class="col-xs-12" style="height: 10px;"> </div>

                <!--building_id -->
                    <div id="new_building_information" class="col-xs-12 new_feature">
                    
                    <label class="control-label col-sm-4" for="new_building_id">Building ID </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="new_building_id" id="new_building_id">
                    </div>

                    <div class="col-xs-12" style="height: 20px;"> </div>
                    
                <!-- building_category-->
                    <label class="control-label col-sm-4" for="building_category">Building Type</label>
                    <div class="col-sm-8">
                        <select type="text" class="form-control" name="building_category" id="building_category">
                            <option value=""></option>
                            <option value="Open Plot">Open Plot</option>
                            <option value="Building">Building</option>
                            <option value="Tin Shed">Tin Shed</option>
                            <option value="Under Construction">Under Construction</option>
                        </select>
                    </div>
                        
                    <div class="col-xs-12" style="height: 10px;"> </div>

                <!-- building_dma_id -->
                    <label class="control-label col-sm-4" for="building_dma_id"> DMA ID </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="building_dma_id" id="building_dma_id">
                    </div>

                    <div class="col-xs-12" style="height: 10px;"> </div>
                    
                <!-- building_storey -->
                <label class="control-label col-sm-4" for="building_storey"> Storey </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="building_storey" id="building_storey">
                    </div>


                <!-- building_population -->
                <div class="col-xs-12" style="height: 10px;"> </div>
                <label class="control-label col-sm-4" for="building_population"> Population </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="building_population" id="building_population">
                    </div>

                <!-- building_Location -->
                <div class="col-xs-12" style="height: 10px;"> </div>
                <label class="control-label col-sm-4" for="building_location"> Location </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="building_location" id="building_location">
                    </div>

                <!-- building_geometry -->
                <div class="col-xs-12" style="height: 10px;"> </div>
                <label class="control-label col-sm-4" for="building_geometry"> Geometry </label>
                    <div class="col-sm-8">
                        <textarea name="building_geometry" id="building_geometry" disabled></textarea>
                    </div>

                <!-- cancel/insert button -->
                <div class="col-xs-12" style="height: 10px;"> </div>
                    <!-- cancel button -->
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-danger btn block" id="btn_building_cancel"> 
                            Cancel 
                        </button>
                    </div>
                    <!-- insert button -->
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-success btn block" id="btn_building_insert"> 
                            Insert Building
                        </button>
                    </div>                 
                    <div class="col-xs-12" style="height: 10px;"> </div>
                </div>
                
            </div>
            </div>
            <div id="building_status" class="col-xs-12 successMsg"> </div>
        </div>
        
    </div>

    <div id="mapdiv" class="col-md-12"></div>

    <script>

        var mymap;
        var baseLayers;
        var overlays;
        var lyrSearch;

        var layerValves;
        var layerPipelines;
        var layerBuildings;

        var valves_array = [];
        var pipelines_array = [];
        var buildings_array = [];
        

         // initialize the map on the "map" div with a given center and zoom
         // control you map "mymap"
        var mymap = L.map("mapdiv", {
            center: [23.73, 90.44],
            zoom: 13,
            attributionControl: false,
            zoomControl: false,
        });
        //Basemap
        var openStreetMap = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?',{maxZoom:33}).addTo(mymap);

        var OpenStreetMap_HOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            maxZoom: 21,
           });

        var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        maxZoom: 21,
        });

        var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            maxZoom: 213,
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

        //This is to capture geoman polygon details 
        mymap.on("pm:create", function(e){
            //console.log(e);
            var jsn = e.layer.toGeoJSON().geometry;
            console.log(jsn);
            var jsn_modified;

            if (e.shape == 'Marker') {

                if(confirm("Are you sure you want to add this new Valve")){
                    jsn_modified = {type: 'Point', coordinates:jsn.coordinates};
                    $("#valve_geometry").val(JSON.stringify(jsn_modified));
                }
            }

            if (e.shape == 'Line') {
                if(confirm("Are you sure you want to add this new Pipeline?")){
                    jsn_modified = {type: 'MultiLineString', coordinates:[jsn.coordinates]};
                    $("#pipeline_geometry").val(JSON.stringify(jsn_modified));
               }               
            }

            if (e.shape == 'Polygon') {
                if(confirm("Are you sure you want to add this new Building")){
                    jsn_modified = {type: 'MultiPolygon', coordinates:[jsn.coordinates]};
                    $("#building_geometry").val(JSON.stringify(jsn_modified));
                }
            }   

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

        //HOME
        load_valves();
        load_pipelines();
        load_buildings();
    
        
        //VALVE

        //connect to database to load data _updated napod ni sya ug data na live ginafeed sa table
        function load_valves() {
            $.ajax({
                url:'load_data.php',
                data: {table:'valves'},
                type: 'POST',
                success: function(response) {
                    if (response.trim().substr(0,5) =='ERROR'){
                        //console.log(response);
                    } else {
                        //console.log(response);
                        var jsnValve = JSON.parse(response); //unsa ning parse?
                        //console.log(jsnValve);

                        if (layerValves) {
                            layerValves.remove();
                            control_layers.removeLayer(layerValves);
                        }

                        layerValves = L.geoJSON(jsnValve, {pointToLayer: style_valves})
                            .addTo(mymap);

                        //Overlay Valves
                         control_layers.addOverlay(layerValves, "Valves");
                         mymap.fitBounds(layerValves.getBounds());

                    }
                    //console.log(response);
                },
                error: function(xhr, status, error) {
                    console.log("ERROR: "+error);
                }
            });
        }

        function refresh_valves() {
            $.ajax({
                url:'load_data.php',
                data: {table:'valves'},
                type: 'POST',
                success: function(response) {
                    if (response.trim().substr(0,5) =='ERROR'){
                        //console.log(response);
                    } else {
                        //console.log(response);
                        var jsnValve = JSON.parse(response); //unsa ning parse?
                        //console.log(jsnValve);

                        if (layerValves) {
                            layerValves.remove();
                            control_layers.removeLayer(layerValves);
                        }

                        layerValves = L.geoJSON(jsnValve, {pointToLayer: style_valves})
                            .addTo(mymap);

                        //Overlay Valves
                         control_layers.addOverlay(layerValves, "Valves");
                    }
                    //console.log(response);
                },
                error: function(xhr, status, error) {
                    console.log("ERROR: "+error);
                }
            });
        }

        $("#valve_id").autocomplete({
              source: valves_array,
        }); 

        function style_valves(json, latlng) {
            var att = json.properties;
            var color;
            var fill_color;
            var radius = 5;
            var fillOpacity = 1;
            
            //console.log(att.valve_id);
            valves_array.push(att.valve_id); // got no idea sa .push() haha

            //color catergorize scenario
            switch(att.valve_type) {
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
            return L.circleMarker(latlng, style).bindTooltip("Valve ID: " + att.valve_id+"<br>Valve Type: "+att.valve_type+"<br>Diameter (mm): "+
                att.valve_diameter+"<br>Location: "+att.valve_location+"<br>Valve DMA ID: "+att.valve_dma_id+"<br>Valve Visibility: "+att.valve_visibility);
          
        }

       
        $('#findValve').click(function() {
            var valve_id = $("#valve_id").val();
            
            returnLayerByAttribute("valves", "valve_id", valve_id, function(lyr){
                console.log(lyr);

                if (lyr) {
                    var att = lyr.feature.properties;

                    if (lyrSearch) {
                        lyrSearch.remove();
                    }
        
                    //console.log(lyr.getLatLng());

                    lyrSearch = L.circle(lyr.getLatLng(), {radius: 15, color:'red', weight:10,
                        opacity:0.6, fillOpacity:0.3}).addTo(mymap);

                    mymap.setView(lyr.getLatLng(), 20);
                    layerValves.bringToFront();

                    $("#valve_information").html("Valve Type: "+att.valve_type+"<br>DMA ID: "+att.valve_dma_id+
                        "<br>Diameter (mm): "+ att.valve_diameter+"<br>Remarks: "+att.valve_remarks +"<br>turn Status: "+att.valve_turn+"<br>Visibility: "
                        +att.valve_visibility+"<br>Location: "+att.valve_location); 

           } else {
                $("#valve_error").html("valve not found");
           }
            });

        });

        //New Insert Feature for Valve
        $("#btn_valve_form").click(function(){
            $("#new_valve_information").show();
        });

        $("#btn_valve_cancel").click(function(){
            $("#new_valve_information").hide();
        });

        $("#btn_valve_insert").click(function(){
            var valve_id = $("#valve_id_new").val();
            var valve_type = $("#valve_type").val();
            var valve_dma_id = $("#valve_dma_id").val();
            var valve_diameter = $("#valve_diameter").val();
            var valve_visibility = $("#valve_visibility").val();
            var valve_location = $("#valve_location").val();
            var valve_geometry = $("#valve_geometry").val();

            if (valve_id == "" || valve_type == "" || valve_dma_id == "" || valve_geometry == "") {
                    $("#valve_status").html("Please fill up all the fields");
            } else {
                $.ajax({
                    url:'insert_data.php',
                    data:{
                        valve_id: valve_id,
                        valve_type: valve_type,
                        valve_dma_id: valve_dma_id,
                        valve_diameter: valve_diameter,
                        valve_visibility: valve_visibility,
                        valve_location: valve_location,
                        valve_geometry: valve_geometry,
                        request: 'valves',
                    },
                    type: 'POST',
                    success:function(response) {
                        if (response.trim().substr(0,5) =='ERROR'){
                            console.log(response);
                            $("#valve_status").html(response);
                        } else {
                            $("#valve_status").html("Valve Inserted Successfully!");
                            refresh_valves();
                            
                            $("#valve_id_new").val("");
                            $("#valve_type").val("");
                            $("#valve_dma_id").val("");
                            $("#valve_diameter").val("");
                            $("#valve_visbility").val("");
                            $("#valve_location").val("");
                            $("#valve_geometry").val("");

                        }
                    },
                    error:function(xhr, status, error) {
                        $("#valve_status").html(error);
                    }
                });
            }
            
            //console.log(valve_id);
        });

        $('#btn_valve_refresh').click(function(){
            refresh_valves();
        })

        //PIPELINES

        $("#pipeline_id").autocomplete({
            source: pipelines_array,
        });

        function  load_pipelines() {
            $.ajax({
                url:'load_data.php',
                data: {table:'pipelines'},
                type: 'POST',
                success: function(response) {
                    if (response.trim().substr(0,5) =='ERROR'){
                        //console.log(response);
                    } else {
                        //console.log(response);
                        var jsnPipeline = JSON.parse(response); //unsa ning parse?
                        // console.log(jsnPipeline);

                        if (layerPipelines) {
                            layerPipelines.remove();
                            control_layers.removeLayer(layerPipelines);
                        }

                        layerPipelines= L.geoJSON(jsnPipeline, {style: style_pipelines, 
                            onEachFeature: process_pipelines}).addTo(mymap);

                        //Overlay Valves
                         control_layers.addOverlay(layerPipelines, "Pipelines");
                    

                    }
                    //console.log(response);
                },
                error: function(xhr, status, error) {
                    console.log("ERROR: "+error);
                }
            });
        }

        $("#pipeline_id").autocomplete({
            source: pipelines_array,
        });

    
        function style_pipelines(json) {
            var att = json.properties;

            switch(att.pipeline_category) {
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
            lyr.bindTooltip("Pipe ID: "+att.pipe_id+"<br>Diameter: "+att.pipeline_diameter+"<br>Location: "+
                att.pipeline_location+"<br>Category: "+att.pipeline_category+"<br>Length: "+att.pipeline_length).bindPopup(

                `<div class="popup-container">

                    <input type="hidden" name="pipeline_database_id" class="updatePipeline" value='${att.pipeline_database_id}'>
                    <input type="hidden" name="pipeline_id_old" class="updatePipeline" value='${att.pipe_id}'>

                    <div class="popup-form-group">
                        <label class="control-label popup-label">Pipe ID</label>
                        <input type="text" class="form-control popup-input text-center updatePipeline" value='${att.pipe_id}' name="pipeline_id">
                    </div>
                    <div class="popup-form-group">
                        <label class="control-label popup-label">DMA ID</label>
                        <input type="text" class="form-control popup-input text-center updatePipeline" value='${att.pipeline_dma_id}' name="pipeline_dma_id">
                    </div>
                    <div class="popup-form-group">
                        <label class="control-label popup-label">Diameter (mm)</label>
                        <input type="number" class="form-control popup-input text-center updatePipeline" value='${att.pipeline_diameter}' name="pipeline_diameter">
                    </div>
                    <div class="popup-form-group">
                        <label class="control-label popup-label">Location</label>
                        <input type="text" class="form-control popup-input text-center updatePipeline" value='${att.pipeline_location}' name="pipeline_location">
                    </div>
                    <div class="popup-form-group">
                        <label class="control-label popup-label">Category</label>
                        <input type="text" class="form-control popup-input text-center updatePipeline" value='${att.pipeline_category}' name="pipeline_category">
                    </div>
                    <div class="popup-form-group">
                        <label class="control-label popup-label">Length (m) </label>
                        <input type="number" class="form-control popup-input text-center updatePipeline" value='${att.pipeline_length}' name="pipeline_length">
                    </div>
                    
                    <div class="popup-button-group">
                        <button type="submit" class="btn btn-success popup-button" onclick = 'updatePipeline()'>Update</button>
                        <button type="submit" class="btn btn-danger popup-button" onclick = 'deletePipeline()'>Delete</button>
                    </div>

                </div>`

                );
            }

            function updatePipeline(){
                var jsn = returnFromData('updatePipeline');
                console.log(jsn);
                jsn.request = "pipelines";

                Swal.fire({
                    title: "Do you want to save the changes?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Save",
                    denyButtonText: `Don't save`
                }).then((result) => {
                    if (result.isConfirmed) {
                        //update data ajax call
                        $.ajax({
                        url:'update_data.php',
                        data:jsn,
                        type: 'POST',
                        success: function(response){
                            Swal.fire("Saved!", "", "success");
                            load_pipelines();
                        },
                        error: function(error){
                            console.log("ERROR " +error);
                        }
                    });
        
                    } else if (result.isDenied) {
                        Swal.fire("Changes are not saved", "", "info");
                    }
                });
                
            }

            function deletePipeline(){
                var jsn = returnFromData('updatePipeline');
                console.log(jsn);
                jsn.request = "pipelines";

                Swal.fire({
                    title: "Do you want to delete this pipeline?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    denyButtonText: `Don't Delete`
                }).then((result) => {
                    if (result.isConfirmed) {
                        //update data ajax call
                        $.ajax({
                        url:'delete_data.php',
                        data:jsn,
                        type: 'POST',
                        success: function(response){
                            Swal.fire("Delete!", "", "success");
                            load_pipelines();
                        },
                        error: function(error){
                            console.log("ERROR " +error);
                        }
                    });

                    } else if (result.isDenied) {
                        Swal.fire("Changes are not delete", "", "info");
                    }
                });
            }

            
         

        $("#findPipeline").click(function(){
            var pipeline_id = $("#pipeline_id").val();
            
            returnLayerByAttribute("pipelines", "pipe_id", pipeline_id, function(lyr){
                if (lyr) {
                var att = lyr.feature.properties;

                if (lyrSearch) {
                    lyrSearch.remove();
                }

                lyrSearch = L.geoJSON(lyr.toGeoJSON(), {style:{color:'red', weight:10,
                    opacity:0.5}}).addTo(mymap);

                mymap.fitBounds(lyr.getBounds());
                layerPipelines.bringToFront();

                $("#pipeline_information").html("Category: "+att.pipeline_category+"<br>DMA ID: "+
                    att.pipeline_dma_id+"<br>Material: "+att.pipeline_material+"<br>Length: "+
                    att.pipeline_length+"<br>Location: "+att.pipeline_location +"<br>Construction Method: "+ att.pipeline_method);

                } else {
                     $("#pipeline_error").html("Pipeline not found");
                }
            });

        });

        //New Insert Feature for Pipeline
        $("#btn_pipeline_form").click(function(){
          $("#new_pipeline_information").show();
        });

        $("#btn_pipeline_cancel").click(function(){
            $("#new_pipeline_information").hide();
        });

        $("#btn_pipeline_insert").click(function(){
            var pipeline_id = $("#new_pipeline_id").val();
            var pipeline_category = $("#pipeline_category").val();
            var pipeline_dma_id = $("#pipeline_dma_id").val();
            var pipeline_diameter = $("#pipeline_diameter").val();
            var pipeline_method = $("#pipeline_method").val();
            var pipeline_location = $("#pipeline_location").val();
            var pipeline_geometry = $("#pipeline_geometry").val();
            
            if (pipeline_id == "" || pipeline_category == "" || pipeline_geometry == "") {
                $("#pipeline_status").html("Please fill up all the fields");
            } else {

                $.ajax({
                    url:'insert_data.php',
                    data:{
                        pipeline_id: pipeline_id,
                        pipeline_category: pipeline_category,
                        pipeline_dma_id: pipeline_dma_id,
                        pipeline_diameter: pipeline_diameter,
                        pipeline_method: pipeline_method,
                        pipeline_location: pipeline_location,
                        pipeline_geometry: pipeline_geometry,
                        request: 'pipelines',
                    },
                    type: 'POST',
                    success:function(response) {
                        if (response.trim().substr(0,5) =='ERROR'){
                            console.log(response);
                            $("#pipeline_status").html(response);
                        } else {
                            $("#pipeline_status").html("Pipeline Inserted Successfully!");
                            load_pipelines();
                            
                            $("#new_pipeline_id").val("");
                            $("#pipeline_category").val("");
                            $("#pipeline_dma_id").val("");
                            $("#pipeline_diameter").val("");
                            $("#pipeline_method").val("");
                            $("#pipeline_location").val("");
                            $("#pipeline_geometry").val("");

                        }
                    },
                    error:function(xhr, status, error) {
                        $("#pipeline_status").html(error);
                    }
                });
            }
        })

        $("#btn_pipeline_refresh").click(function(){
            load_pipelines();
        });
           

        //BUILDINGS
        
        function load_buildings() {
            $.ajax({
                url:'load_data.php',
                data: {table:'buildings'},
                type: 'POST',
                success: function(response) {
                    if (response.trim().substr(0,5) =='ERROR'){
                        //console.log(response);
                    } else {
                        //console.log(response);
                        var jsnBuilding = JSON.parse(response); //unsa ning parse?
                        // console.log(jsnPipeline);

                        if (layerBuildings) {
                            layerBuildings.remove();
                            control_layers.removeLayer(layerBuildings);
                        }

                        layerBuildings= L.geoJSON(jsnBuilding, {style:style_buildings, 
                            onEachFeature:process_buildings}).addTo(mymap);

                        //Overlay Valves
                         control_layers.addOverlay(layerBuildings, "Buildings");
                        

                    }
                    //console.log(response);
                },
                error: function(xhr, status, error) {
                    console.log("ERROR: "+error);
                }
            });

        };

         $("#building_id").autocomplete({
            source: buildings_array,
         });


         function style_buildings(json){
            var att = json.properties;
            var storey = att.building_storey;
            var color;
            var fill_color;
            var fill_opacity = 1;

            switch(att.building_category) {
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
                    color = '#7dcea0';
                    fill_color = '#7dcea0';
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

            //When Click details show up
            lyr.bindTooltip("Catergory: "+att.building_category+"<br>Storey: "+att.building_storey+"<br>Location :"+
                att.building_location+"<br>Account Number: " + att.account_no+"<br>Building Population: "+att.building_population).bindPopup(
                    
                    `<div class="popup-container">

                        <input type="hidden" name="building_database_id" class="updateBuilding" value='${att.building_database_id}'>
                        <input type="hidden" name="account_no" class="updateBuilding" value='${att.account_no}'>

                        <div class="popup-form-group">
                            <label class="control-label popup-label">Account No.</label>
                            <input type="text" class="form-control popup-input text-center updateBuilding" value='${att.account_no}' name="account_no_old">
                        </div>
                        <div class="popup-form-group">
                            <label class="control-label popup-label">DMA ID</label>
                            <input type="text" class="form-control popup-input text-center updateBuilding" value='${att.building_dma_id}' name="building_dma_id">
                        </div>
                        <div class="popup-form-group">
                            <label class="control-label popup-label">Category</label>
                            <input type="text" class="form-control popup-input text-center updateBuilding" value='${att.building_category}' name="building_category">
                        </div>
                        <div class="popup-form-group">
                            <label class="control-label popup-label">Storey</label>
                            <input type="number" class="form-control popup-input text-center updateBuilding" value='${att.building_storey}' name="building_storey">
                        </div>
                        <div class="popup-form-group">
                            <label class="control-label popup-label">Population</label>
                            <input type="text" class="form-control popup-input text-center updateBuilding" value='${att.building_population}' name="building_population">
                        </div>
                        <div class="popup-form-group">
                            <label class="control-label popup-label">Location</label>
                            <input type="text" class="form-control popup-input text-center updateBuilding" value='${att.building_location}' name="building_location">
                        </div>
                        
                        <div class="popup-button-group">
                            <button type="submit" class="btn btn-success popup-button" onclick='updateBuilding()'>Update</button>
                            <button type="submit" class="btn btn-danger popup-button" onclick='deleteBuilding()'>Delete</button>
                        </div>

                    </div> `

                );
         }

         function updateBuilding(){
            var jsn = returnFromData('updateBuilding');
            console.log(jsn);
            jsn.request = "buildings";

            Swal.fire({
                title: "Do you want to save the changes?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Save",
                denyButtonText: `Don't save`
            }).then((result) => {
                if (result.isConfirmed) {
                    //update data ajax call
                    $.ajax({
                    url:'update_data.php',
                    data:jsn,
                    type: 'POST',
                    success: function(response){
                        Swal.fire("Saved!", "", "success");
                        load_buildings();
                    },
                    error: function(error){
                        console.log("ERROR " +error);
                    }
                });
    
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
            
         }

        function deleteBuilding(){
            var jsn = returnFromData('updateBuilding');
            console.log(jsn);
            jsn.request = "buildings";

            Swal.fire({
                title: "Do you want to delete this building?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Delete",
                denyButtonText: `Don't Delete`
            }).then((result) => {
                if (result.isConfirmed) {
                    //update data ajax call
                    $.ajax({
                    url:'delete_data.php',
                    data:jsn,
                    type: 'POST',
                    success: function(response){
                        Swal.fire("Delete!", "", "success");
                        load_buildings();
                    },
                    error: function(error){
                        console.log("ERROR " +error);
                    }
                });

                } else if (result.isDenied) {
                    Swal.fire("Changes are not delete", "", "info");
                }
            });
        
        }

    

         $("#findBuilding").click(function(){
            var account_no = $("#building_id").val();
            
            returnLayerByAttribute("buildings", "account_no", account_no, function(lyr){
                if (lyr) {
                var att = lyr.feature.properties;

                    if (lyrSearch) {
                        lyrSearch.remove();
                    }

                    lyrSearch = L.geoJSON(lyr.toGeoJSON(), {style:{color:'red', weight:10,
                        opacity:1, fillOpacity:0}}).addTo(mymap);

                    mymap.fitBounds(lyr.getBounds());

                    $("#building_information").html("Category: "+att.building_category+"<br>Storey: "+att.building_storey+
                        "<br>Population: "+att.building_population+"<br>Location: "+att.building_location+"<br>DMA ID: "+
                        att.building_dma_id);

                    } else {
                            $("#building_error").html("Building not found");
                    }
            });
        });

        $("#btn_building_form").click(function(){
          $("#new_building_information").show();
        });

        $("#btn_building_cancel").click(function(){
            $("#new_building_information").hide();
        });

        $("#btn_building_insert").click(function(){
            var account_no = $("#new_building_id").val();
            var building_category = $("#building_category").val();
            var building_dma_id = $("#building_dma_id").val();
            var building_storey = $("#building_storey").val();
            var building_population = $("#building_population").val();
            var building_location = $("#building_location").val();
            var building_geometry = $("#building_geometry").val();
            
            if (account_no == "" || building_category == "" || building_geometry == "") {
                $("#building_status").html("Please fill up all the fields");
            } else {

                $.ajax({
                    url:'insert_data.php',
                    data:{
                        account_no: account_no,
                        building_category: building_category,
                        building_dma_id: building_dma_id,
                        building_storey: building_storey,
                        building_population: building_population,
                        building_location: building_location,
                        building_geometry: building_geometry,
                        request: 'buildings',
                    },
                    type: 'POST',
                    success:function(response) {
                        if (response.trim().substr(0,5) =='ERROR'){
                            console.log(response);
                            $("#building_status").html(response);
                        } else {
                            $("#building_status").html("Building Inserted Successfully!");
                            load_buildings();
                            
                            $("#new_building_id").val("");
                            $("#building_category").val("");
                            $("#building_dma_id").val("");
                            $("#building_storey").val("");
                            $("#building_population").val("");
                            $("#building_location").val("");
                            $("#building_geometry").val("");

                        }
                    },
                    error:function(xhr, status, error) {
                        $("#building_status").html(error);
                    }
                });
            }
        })

        $("#btn_building_refresh").click(function(){
            load_buildings();
        });


         //GENERAL FUNCTIONS
        function returnLayerByAttribute(table, field, value, callback) {
            $.ajax({
                url:'find_data.php',
                data: {table:table, field:field, value:value},
                type:'POST',
                success: function(response) {
                    if (response.trim().substr(0,5) =='ERROR'){
                        console.log(response);
                    } else {

                        //debugging and uderstanding the code
                            //more general view raw data comming from the database
                                var jsn = JSON.parse(response);
                                // console.log(jsn);
                            
                            //moving the raw data into Leaflet format
                                var layer = L.geoJSON(jsn);
                                // console.log(layer);

                            //more specific to under layer
                                var layer = layer.getLayers();
                                // console.log(layer)

                        if (layer.length>0) {
                            callback(layer[0]);
                            
                        } else {
                            callback(false);
                        }
                    }
                   
                },
                error: function(xhr, status, error) {
                    console.log("ERROR: "+error);
                }
            })
        } 

        function returnFromData(inpClass) {
            var objFormData = {};

            $("."+inpClass).each(function(){
                objFormData[this.name] = this.value;
            })

            return objFormData;
        }

        
    

        
    </script>

</body>
</html>