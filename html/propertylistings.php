<p>submited item</p>
      <?php 
      
        $latitude=$_POST["chosen_latitude"];
        $longitude=$_POST["chosen_longitude"];
    
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
<div class="padding">
 <?php include 'top_10_properties_near_a_point.php'; ?>
  <div class="row">
  	<div class="col-md-4">
  	  <div class="modal-content box-shadow-md black lt m-b">
  			<div class="modal-header">
  			    <h5 class="modal-title">Property List Bus Stop</h5>
        </div>

        <?php 
          
          for($i=0; $i<count($pid); $i++){
          $prop_id=$pid[$i];
          
          include 'single_property.php';

          if ($i%2==0){
            echo '<div class="row">';
          }
          echo '<div class="col-md-5">';
          echo '<div class="modal-body">';
          echo '<p>';
          echo 'Name: '.$single_property[0].'<br>';
          echo 'Price/Day - $'.$single_property[2];
          echo '<div class="item">';
          echo '<img src="'.$single_property[1].'" height="200" width="200">';
          echo '</div><br>';
          echo '<form action="propertydetails.php" method="post" id="form1">';
          echo '<input type="hidden" id="prop_id" name="prop_id" value="'.$prop_id.'">';
          echo '</form>';
          echo '<button form="form1" class="btn btn-fw primary">View Details</button></p>';
          echo '</div>';
          echo '</div>';
          if ($i%2!=0 || $i==count($pid)-1){
            echo '</div>';
          }
        }
        ?>

        <!-- row end -->
  		</div>
    </div>
    <?php include 'rest_rank.php'; ?>
  	<div class="col-md-4">
  	    <div class="modal-content box-shadow-md black lt m-b">
  			<div class="modal-header">
  			    <h5 class="modal-title">Property List Restaurant Rank</h5>
        </div>
        <?php for($i=0; $i<count($pid); $i++){
          $prop_id=$pid[$i];
          
          include 'single_property.php';

          if ($i%2==0){
            echo '<div class="row">';
          }
          echo '<div class="col-md-5">';
          echo '<div class="modal-body">';
          echo '<p>';
          echo 'Name: '.$single_property[0].'<br>';
          echo 'Price/Day - $'.$single_property[2];
          echo '<div class="item">';
          echo '<img src="'.$single_property[1].'" height="200" width="200">';
          echo '</div><br>';
          echo '<form action="propertydetails.php" method="post" id="form1">';
          echo '<input type="hidden" id="prop_id" name="prop_id" value="'.$prop_id.'">';
          echo '</form>';
          echo '<button form="form1" class="btn btn-fw primary">View Details</button></p>';
          echo '</div>';
          echo '</div>';
          if ($i%2!=0 || $i==count($pid)-1){
            echo '</div>';
          }
        }
        ?>


  		</div>
      </div>
    <?php include 'crime_rank.php'; ?>
    <div class="col-md-4">
  	    <div class="modal-content box-shadow-md black lt m-b">
  			<div class="modal-header">
  			    <h5 class="modal-title">Property List Crime</h5>
  			</div>
        <?php for($i=0; $i<count($pid); $i++){
          $prop_id=$pid[$i];
          
          include 'single_property.php';

          if ($i%2==0){
            echo '<div class="row">';
          }
          echo '<div class="col-md-5">';
          echo '<div class="modal-body">';
          echo '<p>';
          echo 'Name: '.$single_property[0].'<br>';
          echo 'Price/Day - $'.$single_property[2];
          echo '<div class="item">';
          echo '<img src="'.$single_property[1].'" height="200" width="200">';
          echo '</div><br>';
          echo '<form action="propertydetails.php" method="post" id="form1">';
          echo '<input type="hidden" id="prop_id" name="prop_id" value="'.$prop_id.'">';
          echo '</form>';
          echo '<button form="form1" class="btn btn-fw primary">View Details</button></p>';
          echo '</div>';
          echo '</div>';
          if ($i%2!=0 || $i==count($pid)-1){
            echo '</div>';
          }
        }
        ?>

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


