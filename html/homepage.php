<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>DBMS</title>
  <meta name="description" content="dbms" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  
  <!-- style -->
  <link rel="stylesheet" href="../assets/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="../assets/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../assets/material-design-icons/material-design-icons.css" type="text/css" />

  <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
  <!-- build:css ../assets/styles/app.min.css -->
  <link rel="stylesheet" href="../assets/styles/app.css" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="../assets/styles/font.css" type="text/css" />
  <style>          
    #map { 
      height: 800px;    
      width: 100%;            
    }          
  </style> 
</head>
<body class="pace-done black" ui-class="black">
  <div class="app" id="app">

<!-- ############ LAYOUT START-->

  <!-- aside -->
  <div id="aside" class="app-aside modal fade folded md show-text nav-dropdown">
    <div class="left navside black dk" layout="column">
      <div class="navbar no-radius">
        <!-- brand -->

        <!-- / brand -->
      </div>
      <div flex class="hide-scroll">
          <nav class="scroll nav-active-primary">
            
              <ul class="nav" ui-nav>
                <li class="nav-header hidden-folded">
                  <small class="text-muted">Main</small>
                </li>
                
                <li>
                  <a href="homepage.php" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe3fc;
                        <span ui-include="'../assets/images/i_0.svg'"></span>
                      </i>
                    </span>
                    <span class="nav-text">Home</span>
                  </a>
                </li>
                <li>
                  <a href="https://drive.google.com/drive/folders/1kHWvWWPtG4DLUZ9kuEHSq2-c7tbcqXbw" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe3fc;
                        <span ui-include="'../assets/images/i_0.svg'"></span>
                      </i>
                    </span>
                    <span class="nav-text">Query Archive</span>
                  </a>
                </li>
				                <li>
                  
            
              </ul>
          </nav>
      </div>
      <div flex-no-shrink>
        <div ui-include="'../views/blocks/aside.top.1.html'"></div>
      </div>
    </div>
  </div>
  <!-- / aside -->
  
  <!-- content -->
  <div id="content" class="app-content box-shadow-z3" role="main">
    <div class="app-header white box-shadow">
        <div class="navbar navbar-toggleable-sm flex-row align-items-center">
            <!-- Open side - Naviation on mobile -->
            <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
              <i class="material-icons">&#xe5d2;</i>
            </a>
            <!-- / -->
        
            <!-- Page title - Bind to $state's title -->
            <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>
        
            <!-- navbar collapse -->

            <!-- / navbar collapse -->
        
            <!-- navbar right -->

            <!-- / navbar right -->
        </div>
    </div>

    <div ui-view class="app-body" id="view">
      
<!-- ############ PAGE START-->
<div class="dker">
  <div class="tab-content tab-alt">
    <div class="tab-pane in active" id="world">
      <div class="padding">
        <form action="#" class="m-b-md">
          <div class="input-group input-group-lg">
            <input type="text" class="form-control" placeholder="Type keyword">
            <span class="input-group-btn">
              <button class="btn b-a no-shadow white" type="button">Search</button>
            </span>
          </div>
        </form>
  <div class="row">
  <div class="col-md-8">

        
        
            <div id="map"></div>
       
        
        <script type="text/javascript">
        var map;
        
        function initMap() {                            
            var latitude = 36.15133938719693; // YOUR LATITUDE VALUE
            var longitude = -115.13688643328034; // YOUR LONGITUDE VALUE
            
            var myLatLng = {lat: latitude, lng: longitude};
            
            map = new google.maps.Map(document.getElementById('map'), {
              center: myLatLng,
              zoom: 12,
              disableDoubleClickZoom: true, // disable the default map zoom on double click
              styles : [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8ec3b9"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1a3646"
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#4b6878"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#64779e"
      }
    ]
  },
  {
    "featureType": "administrative.province",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#4b6878"
      }
    ]
  },
  {
    "featureType": "landscape.man_made",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#334e87"
      }
    ]
  },
  {
    "featureType": "landscape.natural",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#283d6a"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#6f9ba5"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#3C7680"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#304a7d"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#98a5be"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#2c6675"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#255763"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#b0d5ce"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#98a5be"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#283d6a"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#3a4762"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#0e1626"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#4e6d70"
      }
    ]
  }
]
            });
            
            
            // Update lat/long value of div when anywhere in the map is clicked    
            google.maps.event.addListener(map,'click',function(event) {                

                document.getElementById('latclicked').innerHTML = event.latLng.lat();
                document.getElementById('longclicked').innerHTML =  event.latLng.lng();
                document.getElementById('chosen_latitude').value = event.latLng.lat();
                document.getElementById('chosen_longitude').value = event.latLng.lng();
            });
            
            // Update lat/long value of div when you move the mouse over the map
            google.maps.event.addListener(map,'mousemove',function(event) {
                document.getElementById('latmoved').innerHTML = event.latLng.lat();
                document.getElementById('longmoved').innerHTML = event.latLng.lng();
            });
                    
            var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              //title: 'Hello World'
              
              // setting latitude & longitude as title of the marker
              // title is shown when you hover over the marker
              title: latitude + ', ' + longitude 
            });    
            
            // Update lat/long value of div when the marker is clicked
            marker.addListener('click', function(event) {              
              document.getElementById('latclicked').innerHTML = event.latLng.lat();
              document.getElementById('longclicked').innerHTML =  event.latLng.lng();
            });
            
            // Create new marker on double click event on the map
            google.maps.event.addListener(map,'dblclick',function(event) {
                var marker = new google.maps.Marker({
                  position: event.latLng, 
                  map: map, 
                  title: event.latLng.lat()+', '+event.latLng.lng()
                });
                
                // Update lat/long value of div when the marker is clicked
                marker.addListener('click', function() {
                  document.getElementById('latclicked').innerHTML = event.latLng.lat();
                  document.getElementById('longclicked').innerHTML =  event.latLng.lng();
                });            
            });
            
            // Create new marker on single click event on the map
            /*google.maps.event.addListener(map,'click',function(event) {
                var marker = new google.maps.Marker({
                  position: event.latLng, 
                  map: map, 
                  title: event.latLng.lat()+', '+event.latLng.lng()
                });                
            });*/
        }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqIBgNE7R0PVjediptZeJYHbEGl8S_YdU&callback=initMap"
        async defer></script>
    </div>
    <div class="col-md-4">
    <h3 class="m-0 m-b-xs">Chosen location:</h3>
     <p> </p>  
    <div ><h3 class="m-0 m-b-xs text-info" id="latclicked"></h3></div>
        <div ><h3 class="m-0 m-b-xs text-info" id="longclicked"></h3></div><br>
        <h3 class="m-0 m-b-xs">Pointer location:</h3>
        <p> </p>  
        <div ><h3 class="m-0 m-b-xs text-primary" id="latmoved"></h3></div>
        <div ><h3 class="m-0 m-b-xs text-primary" id="longmoved"></h3></div>
        
          <form action = "propertylistings.php" method = "post" id="form1">
          <input type="hidden" id="chosen_latitude" name="chosen_latitude" value="">
        <input type="hidden" id="chosen_longitude" name="chosen_longitude" value="">
        </form>
       
        <button form="form1" class="btn btn-fw primary">Submit</button>

  </div>


    </div>
  </div>
    <div class="tab-pane" id="usa">
      <div class="padding">

    </div>
  </div>

</div>
<div class="row">
<div class="col-sm-6">
        <div class="box">
          <div class="box-header">
            <h3>Bus Frequency</h3>
            <small class="block text-muted">Bus frequency over 24 hours</small>
          </div>
          <div class="box-body">
            <?php 
            include 'BUS_FREQUENCY.php';
            ?>
            <div ui-jp="chart" ui-options="{
               tooltip: {
                  trigger: 'item'
              },
              calculable: true,
              grid: {
                  borderWidth: 0
              },
              xAxis: [
                  {
                      type: 'category',
                      show: false,
                      data: [<?php 
                       for( $i = 0; $i<count($bus_timing); $i+=2 ) {
                        
                        if($bus_timing[$i]==1){
                          echo '\'0-1\'';
                        }
                        if($bus_timing[$i]==2){
                          echo '\'1-2\'';
                        }  if($bus_timing[$i]==3){
                          echo '\'2-3\'';
                        }  if($bus_timing[$i]==4){
                          echo '\'3-4\'';
                        }  if($bus_timing[$i]==5){
                          echo '\'4-5\'';
                        }  if($bus_timing[$i]==6){
                          echo '\'5-6\'';
                        }  if($bus_timing[$i]==7){
                          echo '\'6-7\'';
                        }  if($bus_timing[$i]==8){
                          echo '\'7-8\'';
                        }  if($bus_timing[$i]==9){
                          echo '\'8-9\'';
                        }  if($bus_timing[$i]==10){
                          echo '\'9-10\'';
                        }  if($bus_timing[$i]==11){
                          echo '\'10-11\'';
                        }  if($bus_timing[$i]==12){
                          echo '\'11-12\'';
                        }  if($bus_timing[$i]==13){
                          echo '\'12-13\'';
                        }  if($bus_timing[$i]==14){
                          echo '\'13-14\'';
                        } if($bus_timing[$i]==15){
                          echo '\'14-15\'';
                        }if($bus_timing[$i]==16){
                          echo '\'15-16\'';
                        }if($bus_timing[$i]==17){
                          echo '\'16-17\'';
                        }if($bus_timing[$i]==18){
                          echo '\'17-18\'';
                        }if($bus_timing[$i]==19){
                          echo '\'18-19\'';
                        }if($bus_timing[$i]==20){
                          echo '\'19-20\'';
                        }if($bus_timing[$i]==21){
                          echo '\'20-21\'';
                        }if($bus_timing[$i]==22){
                          echo '\'21-22\'';
                        }if($bus_timing[$i]==23){
                          echo '\'22-23\'';
                        }if($bus_timing[$i]==24){
                          echo '\'23-24\'';
                        }
                        
                        if ($i!=count($bus_timing)-1) {echo ',';}
                     }
                      
                      ?>]
                  }
              ],
              yAxis: [
                  {
                      type: 'value',
                      show: false
                  }
              ],
              series: [
                  {
                      name: 'Bus',
                      type: 'bar',
                      itemStyle: {
                          normal: {
                              color: function(params) {
                                  var colorList = [
                                    '#C1232B','#B5C334','#FCCE10','#E87C25','#27727B',
                                     '#FE8463','#9BCA63','#FAD860','#F3A43B','#60C0DD',
                                     '#D7504B','#C6E579','#F4E001','#F0805A','#26C0C0',
                                     '#D7504B','#C6E579','#F4E001','#F0805A'

                                  ];
                                  return colorList[params.dataIndex]
                              },
                              label: {
                                  show: true,
                                  position: 'top',
                                  formatter: '{b}\n{c}'
                              }
                          }
                      },
                      data: [
                        <?php 
                       for( $i = 1; $i<=count($bus_timing); $i+=2 ) {

                        echo '\''.$bus_timing[$i].'\'';
                        if ($i!=count($bus_timing)-1) {echo ',';}
                     }
                      
                      ?>]
                  }
              ]
            }" style="height:300px" >
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="box">
          <div class="box-header">
            <h3>Crime Stastics</h3>
            <small class="block text-muted">Change in crime occurences over the years</small>
          </div>
          <div class="box-body">
            <div ui-jp="chart" ui-options="{
                tooltip : {
                    trigger: 'axis'
                },
                legend: {
                    data:['Burglary','Robbery','Assault','Stolen Vehicle','Auto Burglary']
                },
                xAxis : [
                    {
                        type : 'category',
                        boundaryGap : false,
                        data : ['2015','2016','2017','2018']
                    }
                ],
                yAxis : [
                    {
                        type : 'value'
                    }
                ],
                grid : {
                  x2 : 100
                },
                series : [
                    {
                        name:'Burglary',
                        type:'line',
                        stack: 'total',
                        <?php 
                        include 'BURGLARY_DATA.php';
                        ?>
                        data:[<?php 
                            for ($i=1;$i<=count($burglary);$i+=2){
                              echo $burglary[$i].',';
                            }
                          ?>
                           ]
                    },
                    {
                        name:'Robbery',
                        type:'line',
                        stack: 'total',
                        <?php 
                        include 'robbery_data.php';
                        ?>
                        data:[<?php 
                            for ($i=1;$i<=count($robbery);$i+=2){
                              echo $robbery[$i].',';
                            }
                          ?>  ]
                    },
                    {
                        name:'Assault',
                        type:'line',
                        stack: 'total',
                        <?php 
                        include 'assault_battery.php';
                        ?>
                        data:[
                          <?php 
                            for ($i=1;$i<=count($assault);$i+=2){
                              echo $assault[$i].',';
                            }
                          ?> ]
                    },
                    {
                        name:'Stolen Vehicle',
                        type:'line',
                        stack: 'total',
                        <?php 
                        include 'STOLEN_MOTOR_VEHICLE_DATA.php';
                        ?>
                        data:[
                          <?php 
                            for ($i=1;$i<=count($stolen_vehicle);$i+=2){
                              echo $stolen_vehicle[$i].',';
                            }
                          ?>                          
                          ]
                    },
                    {
                        name:'Auto Burglary',
                        type:'line',
                        stack: 'total',
                        <?php 
                        include 'auto_burglary_data.php';
                        ?>
                        data:[
                          <?php 
                            for ($i=1;$i<=count($auto_burglary);$i+=2){
                              echo $auto_burglary[$i].',';
                            }
                          ?>  ]
                    }
                ]
            }" style="height: 300px; -webkit-tap-highlight-color: transparent; user-select: none; background-color: rgba(0, 0, 0, 0); cursor: default;" _echarts_instance_="1556364248290"><div style="position: relative; overflow: hidden; width: 623px; height: 300px;"><div data-zr-dom-id="bg" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 1112px; height: 300px; user-select: none;"></div><canvas width="623" height="300" data-zr-dom-id="0" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 623px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="623" height="300" data-zr-dom-id="1" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 623px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="623" height="300" data-zr-dom-id="_zrender_hover_" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 623px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><div class="echarts-tooltip zr-element" style="position: absolute; display: none; border-style: solid; white-space: nowrap; transition: left 0.4s ease 0s, top 0.4s ease 0s; background-color: rgb(0, 0, 0); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font-family: Arial, Verdana, sans-serif; padding: 10px 15px; left: 433px; top: 68px;">Fri<br>E : 1,290<br>D : 390<br>C : 190<br>B : 290<br>A : 90</div></div></div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="box">
          <div class="box-header">
            <h3>Restaurant Categories</h3>
            <small class="block text-muted">Showing distribution of different retaurant categories</small>
          </div>
          <div class="box-body" id="pie">
            <div ui-jp="chart" ui-options="{
                title: {
                    text: '',
                    subtext: '',
                    x: 'center',
                    y: 'center',
                    itemGap: 20,
                    textStyle : {
                        color : 'rgba(30,144,255,0.8)',
                        fontSize : 20,
                        fontWeight : 'bolder'
                    }
                },
                tooltip : {
                    show: true,
                    formatter: '{a} <br/>{b} : {c} ({d}%)'
                },
                legend: {
                    orient : 'vertical',
                    x : $('#pie').width()/2 + 10,
                    y : 25,
                    itemGap:12,
                    data:['47% Restaurants','27% Fast Food','11% Bars', '8% Nightlife', '7% American (Traditional)']
                },
                series : [
                    {
                        name:'1',
                        type:'pie',
                        clockWise:false,
                        radius : [105, 130],
                        itemStyle : {
                           normal: {
                              label: {show:false},
                              labelLine: {show:false}
                          }
                        },
                        data:[
                            {
                                value:47,
                                name:'47% Restaurants'
                            },
                            {
                                value:32,
                                name:'invisible',
                                itemStyle : {
                                    normal : {
                                        color: 'rgba(0,0,0,0)',
                                        label: {show:false},
                                        labelLine: {show:false}
                                    },
                                    emphasis : {
                                        color: 'rgba(0,0,0,0)'
                                    }
                                }
                            }
                        ]
                    },
                    {
                        name:'2',
                        type:'pie',
                        clockWise:false,
                        radius : [80, 105],
                        itemStyle : {
                           normal: {
                              label: {show:false},
                              labelLine: {show:false}
                          }
                        },
                        data:[
                            {
                                value:27, 
                                name:'27% Fast Food'
                            },
                            {
                                value:71,
                                name:'invisible',
                                itemStyle : {
                                    normal : {
                                        color: 'rgba(0,0,0,0)',
                                        label: {show:false},
                                        labelLine: {show:false}
                                    },
                                    emphasis : {
                                        color: 'rgba(0,0,0,0)'
                                    }
                                }
                            }
                        ]
                    },
                    {
                        name:'3',
                        type:'pie',
                        clockWise:false,
                        radius : [55, 80],
                        itemStyle : {
                           normal: {
                              label: {show:false},
                              labelLine: {show:false}
                          }
                        },
                        data:[
                            {
                                value:11, 
                                name:'11% Bars'
                            },
                            {
                                value:97,
                                name:'invisible',
                                itemStyle : {
                                    normal : {
                                        color: 'rgba(0,0,0,0)',
                                        label: {show:false},
                                        labelLine: {show:false}
                                    },
                                    emphasis : {
                                        color: 'rgba(0,0,0,0)'
                                    }
                                }
                            }
                        ]
                    },
                    {
                        name:'4',
                        type:'pie',
                        clockWise:false,
                        radius : [30, 55],
                        itemStyle : {
                           normal: {
                              label: {show:false},
                              labelLine: {show:false}
                          }
                        },
                        data:[
                            {
                                value:8, 
                                name:'8% Nightlife'
                            },
                            {
                                value:97,
                                name:'invisible',
                                itemStyle : {
                                    normal : {
                                        color: 'rgba(0,0,0,0)',
                                        label: {show:false},
                                        labelLine: {show:false}
                                    },
                                    emphasis : {
                                        color: 'rgba(0,0,0,0)'
                                    }
                                }
                            }
                        ]
                    },
                    {
                        name:'5',
                        type:'pie',
                        clockWise:false,
                        radius : [5, 30],
                        itemStyle : {
                           normal: {
                              label: {show:false},
                              labelLine: {show:false}
                          }
                        },
                        data:[
                            {
                                value:7, 
                                name:'7% American (Traditional)'
                            },
                            {
                                value:97,
                                name:'invisible',
                                itemStyle : {
                                    normal : {
                                        color: 'rgba(0,0,0,0)',
                                        label: {show:false},
                                        labelLine: {show:false}
                                    },
                                    emphasis : {
                                        color: 'rgba(0,0,0,0)'
                                    }
                                }
                            }
                        ]
                    }
                ]
            }" style="height:300px" >
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="box">
          <div class="box-header">
            <h3>Price Distribution ($)</h3>
            <small class="block text-muted">Pie chart showing AirBnB daily prices distribution in $</small>
          </div>
          <div class="box-body">
            <?php  
            include 'PRICES_BASED_ON_FREQUENCY.php';
            ?>
            <div ui-jp="chart" ui-options="{
                tooltip : {
                  trigger: 'item',
                  formatter: '{a} <br/>{b} : {c} ({d}%)'
                },
                legend: {
                    orient : 'vertical',
                    x : 'left',
                    data:['0-100','100-200','200-300','300-400','500-600','600-700',
                    '700-800','800-900', '900-1000','1000+'       
                    
                      ]
                },
                calculable : true,
                series : [
                    {
                        name:'Source',
                        type:'pie',
                        radius : ['50%', '70%'],
                        data:[
                          <?php 
                          $prop_range=0;
                          for ($i=0;$i<count($price);$i++){
                            echo '{value:';
                            echo $price[$i];
                            echo ',';
                            echo 'name:';
                            echo '\'';
                            if ($prop_range==1000){
                              echo '1000+';
                            } else{

                            
                            echo $prop_range.'-'.($prop_range+100);
                          } 
                            echo '\'},';  
                            $prop_range+=100;  
                          }
                    ?>
                         
                        ]
                    }
                ]
            }" style="height:300px" >
            </div>
          </div>
        </div>
      </div>

</div>

<!-- ############ PAGE END-->

    </div>
  </div>
  <!-- / -->

  <!-- theme switcher -->
  

  <!-- / -->

<!-- ############ LAYOUT END-->

  </div>
<!-- build:js scripts/app.html.js -->
<!-- jQuery -->
  <script src="../libs/jquery/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
  <script src="../libs/jquery/tether/dist/js/tether.min.js"></script>
  <script src="../libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
  <script src="../libs/jquery/underscore/underscore-min.js"></script>
  <script src="../libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
  <script src="../libs/jquery/PACE/pace.min.js"></script>

  <script src="scripts/config.lazyload.js"></script>

  <script src="scripts/palette.js"></script>
  <script src="scripts/ui-load.js"></script>
  <script src="scripts/ui-jp.js"></script>
  <script src="scripts/ui-include.js"></script>
  <script src="scripts/ui-device.js"></script>
  <script src="scripts/ui-form.js"></script>
  <script src="scripts/ui-nav.js"></script>
  <script src="scripts/ui-screenfull.js"></script>
  <script src="scripts/ui-scroll-to.js"></script>
  <script src="scripts/ui-toggle-class.js"></script>

  <script src="scripts/app.js"></script>

  <!-- ajax -->
  <script src="../libs/jquery/jquery-pjax/jquery.pjax.js"></script>
  <script src="scripts/ajax.js"></script>
<!-- endbuild -->
</body>
</html>
