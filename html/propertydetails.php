<?php
$pid=$_POST['prop_id'];
include 'lat_long_hotfix.php';
$latitude=$data[0];
$longitude=$data[1];

include 'cat_not_by_property_but_by_bus.php';

?>

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
</head>
<body>
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

  <div class="row">
  <div class="col-md-6">
    <div class="box">
      <div class="box-header">
      <?php include 'property_details_abnb.php';?>
        <h2>Property Details</h2>
      </div>
      <div class="box-divider m-0"></div>
      <ul class="list">
      
            
            
            

                <li class="list-item">
               <div class="list-body">

               <img src="<?php echo $property_details[3]; ?>" height="400" width="500"/>
               <br/>
                <p> Description</p>
                <small class="block text-muted"><?php echo $property_details[2]; ?></small>
                </div>
                </li>
                <li class="list-item">
               <div class="list-body">
               
                
                <p> ZipCode</p>
                <small class="block text-muted"><?php echo $property_details[5]; ?></small>
                </div>
                </li>
                <li class="list-item">
               <div class="list-body">
               
                
                <p> Type of Accomodation</p>
                <small class="block text-muted"><?php echo $property_details[6]; ?></small><br/>
                <button class="btn btn-fw info" 
            onclick="window.location.href = '<?php echo $property_details[1]; ?> ';">
            View Original Listing</button> 
                </div>
                </li>
            
       

      </ul>
    </div>
    </div>
    <div class="col-md-6">
      

      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box">
          <div class="box-header">
            <h3>Restaurants Reachable by bus</h3>
            <small>Restaurants that can be accessed via bus from the property.</small>
          </div>
          <div class="box-body text-center">
            
              
                <div class="inline">
                  <div ui-jp="easyPieChart" class="easyPieChart" ui-refresh="app.setting.color" data-redraw="true" data-percent="<?php echo $result*100;?>" ui-options="{
                      percent: <?php echo round($result*100);?>,
                      lineWidth: 5,
                      trackColor: 'rgba(0,0,0,0.05)',
                      barColor: '#0cc2aa',
                      scaleColor: 'transparent',
                      size: 75,
                      scaleLength: 0,
                      lineCap: 'butt',
                      animate:{
                        duration:0,
                        enabled:false
                      }
                    }">
                    <div>
                    <?php echo round($result*100).'%';?>
                    </div>
                  <canvas height="75" width="75"></canvas></div>
                
             
              
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box">
          <div class="box-header">
            <h3>Restaurant Categories nearby</h3>
            <small>Types of Restaurants that can be accessed via bus from the property.</small>
          </div>
          <div class="box-body text-center">
            <div class="row-col">
              <div class="row-cell">
                <div class="inline">
                    <?php include 'total_categories_reachable_by_bus.php'; ?>
                  <div ui-jp="easyPieChart" class="easyPieChart" ui-refresh="app.setting.color" data-redraw="true" data-percent="<?php echo round(($tot_cat/617)*100);?>" ui-options="{
                      percent: <?php echo round(($tot_cat/617)*100);?>,
                      lineWidth: 5,
                      trackColor: 'rgba(0,0,0,0.05)',
                      barColor: '#0cc2aa',
                      scaleColor: 'transparent',
                      size: 75,
                      scaleLength: 0,
                      lineCap: 'butt',
                      animate:{
                        duration:0,
                        enabled:false
                      }
                    }">
                    
                    <div>
                    <?php echo round(($tot_cat/617)*100).'%';?>
                    </div>
                  <canvas height="75" width="75"></canvas></div>
                </div>
              </div>
 
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box">
          <div class="box-header">
            <h3>Safe Restaurants</h3>
            <small>Safe restaurants with atleast one bus route.</small>
          </div>
          <div class="box-body text-center">
            <div class="row-col">
              <div class="row-cell">
                <div class="inline">
                    <?php include 'least_likely_crime_and_one_bus.php'; ?>
                  <div ui-jp="easyPieChart" class="easyPieChart" ui-refresh="app.setting.color" data-redraw="true" data-percent="<?php echo $least_likely;?>" ui-options="{
                      percent: <?php echo $least_likely;?>,
                      lineWidth: 5,
                      trackColor: 'rgba(0,0,0,0.05)',
                      barColor: '#0cc2aa',
                      scaleColor: 'transparent',
                      size: 75,
                      scaleLength: 0,
                      lineCap: 'butt',
                      animate:{
                        duration:0,
                        enabled:false
                      }
                    }">
                    <div>
                    <?php echo $least_likely;?>
                    </div>
                  <canvas height="75" width="75"></canvas></div>
                </div>
              </div>
            
            </div>
          </div>
        </div>
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
            include 'BUS_FREQUENCY_FOR_PROPERTY.php';
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
                          } if($bus_timing[$i]==2){
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
            <h3>Popularity of Categories reachable by Property</h3>
            <small class="block text-muted">A slice of the most popular categories of restaurants within the vicinity of this property.</small>
          </div>
          <div class="box-body">
            <div ui-jp="chart" ui-options="{
                tooltip : {
                  trigger: 'item',
                  formatter: '{a} <br/>{b} : {c} ({d}%)'
                },
                legend: {
                    orient : 'vertical',
                    x : 'left',
                    data:['0-150','150-300','300-450','450-600']
                },
                calculable : true,
                series : [
                    {
                        name:'Source',
                        type:'pie',
                        radius : ['50%', '70%'],
                        data:[
                            <?php include 'props_restaraunt_diversity_distribution.php'; ?>
                            {value:<?php echo $cat[0]; ?>, name:'0-150'},
                            {value:<?php echo $cat[1]; ?>, name:'150-300'},
                            {value:<?php echo $cat[2]; ?>, name:'300-450'},
                            {value:<?php echo $cat[3]; ?>, name:'450-600'}
                            
                        ]
                    }
                ]
            }" style="height: 300px; -webkit-tap-highlight-color: transparent; user-select: none; background-color: rgba(0, 0, 0, 0); cursor: default;" _echarts_instance_="1556860484197"><div style="position: relative; overflow: hidden; width: 1112px; height: 300px;"><div data-zr-dom-id="bg" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 1112px; height: 300px; user-select: none;"></div><canvas width="1112" height="300" data-zr-dom-id="0" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 1112px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="1112" height="300" data-zr-dom-id="1" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 1112px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="1112" height="300" data-zr-dom-id="_zrender_hover_" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 1112px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><div class="echarts-tooltip zr-element" style="position: absolute; display: none; border-style: solid; white-space: nowrap; transition: left 0.4s ease 0s, top 0.4s ease 0s; background-color: rgb(0, 0, 0); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font-family: Arial, Verdana, sans-serif; padding: 10px 15px; left: 515px; top: 78px;">Source <br>Search : 1,548 (60.42%)</div></div></div>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="box">
          <div class="box-header">
            <h3>Crime Trends</h3>
            <small class="block text-muted">Change in Crime near the property over the years</small>
          </div>
          <div class="box-body">
            <div ui-jp="chart" ui-options="{
                tooltip : {
                    trigger: 'axis'
                },
                legend: {
                    data:['Crime']
                },
                calculable : true,
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
                series : [
                    {
                        name:'Crime',
                        type:'line',
                        smooth:true,
                        itemStyle: {normal: {areaStyle: {type: 'default'}}},
                        data:[<?php
                            include 'crime_data_based_on_property_id.php';
                            for ($i=1; $i<count($crime);$i+=2){
                                echo $crime[$i].',';
                            }
                           ?> ]
                    }
                ]
                    
            }" style="height: 300px; -webkit-tap-highlight-color: transparent; user-select: none; background-color: rgba(0, 0, 0, 0);" _echarts_instance_="1556852541494"><div style="position: relative; overflow: hidden; width: 1112px; height: 300px;"><div data-zr-dom-id="bg" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 1112px; height: 300px; user-select: none;"></div><canvas width="1112" height="300" data-zr-dom-id="0" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 1112px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="1112" height="300" data-zr-dom-id="1" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 1112px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="1112" height="300" data-zr-dom-id="_zrender_hover_" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 1112px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas></div></div>
          </div>
        </div>
      </div>
      
      <div class="col-sm-6">
        <div class="box">
          <div class="box-header">
            <h3>Types of Crime</h3>
            <small class="block text-muted">Frequency of the highest types of crimes near retaurants near the property.</small>
          </div>
          <?php include 'most_common_crime_by_restaraunt.php'; ?>
          <div class="box-body">
            <div ui-jp="chart" ui-options="{
                tooltip : {
                    trigger: 'axis'
                },
                legend: {
                    data:['Incident Count']
                },
                calculable : true,
                grid : {
                  x: 60
                },
                xAxis : [
                    {
                        type : 'value',
                        boundaryGap : [0, 0.01]
                    }
                ],
                yAxis : [
                    {
                        type : 'category',
                        data : [<?php  
                        
                        for ($i = 0 ; $i < count($crime_by_rest); $i+=2){
                           echo '\''. $crime_by_rest[$i] . '\',';
                        }
                        ?>]
                    }
                ],
                series : [
                    {
                        name:'Incident Count',
                        type:'bar',
                        data:[<?php  
                        for ($i = 1 ; $i <= count($crime_by_rest); $i+=2){
                           echo '\''. $crime_by_rest[$i] . '\',';
                        }
                        ?>]
                    },
                    
                ]
            }" style="height: 300px; -webkit-tap-highlight-color: transparent; user-select: none; background-color: rgba(0, 0, 0, 0); cursor: default;" _echarts_instance_="1556862818201"><div style="position: relative; overflow: hidden; width: 1112px; height: 300px;"><div data-zr-dom-id="bg" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 1112px; height: 300px; user-select: none;"></div><canvas width="1112" height="300" data-zr-dom-id="0" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 1112px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="1112" height="300" data-zr-dom-id="1" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 1112px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="1112" height="300" data-zr-dom-id="_zrender_hover_" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 1112px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><div class="echarts-tooltip zr-element" style="position: absolute; display: none; border-style: solid; white-space: nowrap; transition: left 0.4s ease 0s, top 0.4s ease 0s; background-color: rgb(0, 0, 0); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font-family: Arial, Verdana, sans-serif; padding: 10px 15px; left: 145px; top: 86px;">World(M)<br>2011 : 630,230<br>2012 : 681,807</div></div></div>
          </div>
        </div>
      </div>
      
    </div>

<!-- ############ PAGE END-->

    </div>
  </div>
  <!-- / -->

  <!-- theme switcher -->
 
  </div>


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
