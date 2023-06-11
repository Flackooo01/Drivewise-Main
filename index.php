<?php
require_once("include/initialize.php");

$content = 'home.php';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : 0;
$cap = (isset($_GET['cap']) && $_GET['cap'] != '') ? $_GET['cap'] : '';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
$page = (isset($_GET['p']) && $_GET['p'] != '') ? $_GET['p'] : '';

switch ($view) {
  case 'myprofile':
    $title = "My Profile";
    $content = 'myprofile.php';
    break;

  case 'violationlist':
    $title = "Violation List";
    $content = 'Violation/violationlist.php';
  break;

  case 'violationadd':
    $title = "Violation List";
    $content = 'Violation/violationadd.php';
  break;

  case 'violationedit':
    $title = "Violation List";
    $content = 'Violation/violationedit.php';
  break;

  case 'vehicletypelist':
    $title = "Vehicle Type List";
    $content = 'VehicleType/vehicletypelist.php';
  break;
  
  case 'vehicletypeadd':
      $title = "Vehicle Type List";
    $content = 'VehicleType/vehicletypeadd.php';
  break;

  case 'vehicletypeedit':
    $title = "Vehicle Type List";
    $content = 'VehicleType/vehicletypeedit.php';
  break;

  case 'reportlist':
    $title = "Report List";
    $content = 'Report/reportlist.php';
  break;

  case 'dashboard':
    $title = "My Library";
    $content = 'dashboard.php';
  break;
  
  case 'userreport':
    $title = "My Library";
    $content = 'userreport.php';
  break;

  case 'userlist':
    $title = "User List";
    $content = 'Users/userlist.php';
  break;



  case 'viewreport':
    $title = "View Report";
    $content = 'Report/viewreport.php';
  break;


  default:
    $title = "Home";
    $content    = 'home.php';
}


require_once("main.php");

?>