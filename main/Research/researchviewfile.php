<?php 
require_once("include/initialize.php");
$id = 	$_GET['id'];
$Research = New Research();
$res = $Research->single_data($id);
$Research = $res->Research;
$ResearchID = $res->ResearchID;
$Location = $res->Location;
$Abstract = $res->Abstract;
$Tags = $res->Tags;
?>

<div class="container">

    <embed src="<?php echo $Location?>" type="application/pdf" width="100%" height="600px" />
</div>

